<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Handler\ResumableJSUploadHandler;
use Illuminate\Http\UploadedFile;
use Illuminate\Contracts\View\View;

class UploadController extends Controller
{

    public function upload(Request $request)
    {
        //$receiver = new FileReceiver("file", $request, HandlerFactory::classFromRequest($request));
        $receiver = new FileReceiver("file", $request, ResumableJSUploadHandler::class);


        if ($receiver->isUploaded() === false) {
            return response()->json(['error' => 'Chunk upload failed'], 400);
        }

        $save = $receiver->receive();

        // Check if all chunks have arrived
        if ($save->isFinished()) {
            return $this->saveFile($save->getFile());
        }

        // Returns current uploading progress to the UI
        $handler = $save->handler();
        return response()->json([
            "done" => $handler->getPercentageDone(),
            "status" => true
        ]);
    }

    // protected function saveFile(UploadedFile $file)
    // {
    //     $fileName = time() . '_' . $file->getClientOriginalName();
    //     // Saves file to storage/app/uploads
    //     $path = $file->storeAs('uploads', $fileName, 'local');

    //     return response()->json([
    //         'path' => storage_path('app/' . $path),
    //         'status' => true
    //     ]);
    // }

    /**
     * Saves the file
     *
     * @param UploadedFile $file
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function saveFile(UploadedFile $file)
    {
        // FIX: Explicitly pull the original filename sent by Resumable.js from the request
        $resumableFilename = request()->input('resumableFilename');

        $fileName = $this->createFilename($file, $resumableFilename);

        // Group files by mime type
        $mime = str_replace('/', '-', $file->getMimeType());

        // Group files by the date (week)
        $dateFolder = date("Y-m-W");

        // Build the file path
        $filePath = "upload/{$dateFolder}/";
        $finalPath = storage_path("app/public/" . $filePath);

        // move the file name
        $file->move($finalPath, $fileName);

        return response()->json([
            'path' => $filePath,
            'name' => $fileName,
            'mime_type' => $mime
        ]);
    }

    /**
     * Create unique filename for uploaded file
     * @param UploadedFile $file
     * @param string|null $resumableFilename
     * @return string
     */
    protected function createFilename(UploadedFile $file, $resumableFilename = null)
    {
        // FALLBACK: If request missing param, try original metadata; otherwise, use fallback string
        $originalName = $resumableFilename ?? $file->getClientOriginalName() ?? 'file.tmp';

        // Extract real extension and basename cleanly via pathinfo
        $extension = pathinfo($originalName, PATHINFO_EXTENSION);
        $filenameWithoutExt = pathinfo($originalName, PATHINFO_FILENAME);

        // Double fallback if file is still named "blob" or has no extension
        if (empty($extension) || $filenameWithoutExt === 'blob') {
            $extension = $file->guessExtension() ?? 'bin';
        }

        // Add timestamp hash to name of the file
        return md5(time()) . "." . $extension;
    }

}

