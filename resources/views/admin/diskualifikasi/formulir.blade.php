@extends('layouts.master1')
@section('title', "Tambah Pelanggaran")
@section('subtitle', "")
@section('content')
    <div class="container-fluid px-4">
        @if(!isset($data))
            <div class="card mb-4">
                <div class="card-body">
                    <form method="POST" action="{{route('diskualifikasi.search')}}">
                        @csrf
                        <div class="row g-2">
                            <label class="col-sm-2">Nomor Peserta</label>
                            <div class="col-sm-10">
                                <input type="hidden" name="id_lomba" value="{{$id_lomba}}" class="form-control">
                                <input type="text" name="no_peserta" class="form-control">
                            </div>
                            <div class="col-sm-10 offset-sm-2">
                                <button class="btn btn-sm btn-primary">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @else
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row g-2">
                        <label class="col-sm-2">Nomor Peserta</label>
                        <label class="col-sm-10 fw-semibold">{{isset($data) ? $data->no_peserta : ''}}</label>
                        <label class="col-sm-2">Nama Regu / Instansi</label>
                        <label class="col-sm-10 fw-semibold">{{isset($data) ? $data->nama : ''}}</label>
                        <label class="col-sm-2">Kategori Lomba</label>
                        <label class="col-sm-10 fw-semibold">{{isset($data) ? $data->lomba?->judul : ''}}</label>
                        <label class="col-sm-2">Kategori Peserta</label>
                        <label class="col-sm-10 fw-semibold">{{isset($data) ? $data->kategori_peserta?->judul : ''}}</label>
                    </div>
                </div>
            </div>
            @if(Auth::user()->gid == 1 || Auth::user()->gid == 5)
                <div class="card mb-4">
                    <h5 class="card-header">
                        Pelanggaran
                    </h5>
                    <div class="card-body">
                        <form method="POST" action="{{route('diskualifikasi.' . $next)}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$data->id}}">
                            <div class="row">
                                <div class="mb-3 col-md-6 col-sm-12">
                                    <label for="waktu_start" class="form-label">Alasan</label>
                                    <select class="form-select" name="alasan" required>
                                        <option value="" selected>Pilih Alasan</option>
                                        <option>Barisan bubar sebelum memasuki garis finish</option>
                                        <option>Personil barisan tidak sesuai pada Kategori Perlombaan</option>
                                        <option>Salah satu personil atau seluruh anggota regu berlari</option>
                                        <option>Formasi barisan tidak sesuai dengan formasi barisan yang telah ditentukan</option>
                                        <option>Bantuan minum langsung diluar zona pergantian personil</option>
                                        <option>Pergantian Personil diluar regulasi yang telah ditentukan</option>
                                        <option>Melakukan atraksi pada saat memasuki garis finish</option>
                                        <option>Mengganggu barisan peserta lainnya</option>
                                        <option>Menempuh rute diluar ketentuan dari panitia pelaksana</option>
                                        <option>Melanggar kelengkapan dari ketentuan aturan nomor peserta</option>
                                        <option>Menyanyikan lagu – lagu yang mengandung unsur sara dan melanggar norma-norma yang
                                            berlaku</option>
                                        <option>Jalan ditempat saat memasuki garis finish</option>
                                    </select>
                                    <input type="hidden" class="form-control" id="doc" name="doc" required>
                                </div>
                                <div class="mb-3 col-md-6 col-sm-12">
                                    <div id="upload-container" class="p-5 border border-dashed text-center bg-light rounded"
                                        style="cursor: pointer;">
                                        <a id="browseButton" class="btn btn-primary">Upload Foto atau Video</a>
                                    </div>
                                    <div id="progress-container" class="d-none">
                                        <div class="progress">
                                            <div id="progress-bar" class="progress-bar bg-success" role="progressbar"
                                                style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%
                                            </div>
                                        </div>
                                        <p id="upload-status" class="mt-3 text-center fw-bold"></p>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-12 col-sm-12">
                                    <label for="waktu_finish" class="form-label">Keterangan Lokasi/Waktu Kejadian</label>
                                    <input type="text" class="form-control" id="ket" name="ket">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            @endif
            <div class="card mb-4">
                <h5 class="card-header">
                    Data Diskualifikasi
                </h5>
                <div class="card-body">
                    @if($diskualifikasi)
                        <div class="list-group">
                            @foreach($diskualifikasi as $key => $value)
                                <a href="{{$value->doc ? url('storage/' . $value->doc) : '#'}}" target="_blank"
                                    class="list-group-item list-group-item-action" aria-current="true">
                                    <div>
                                        <span class="text-decoration-underline"> {{$value->alasan}}</span>
                                        <span class="badge text-bg-dark float-end">{{$value->juri->name}} |
                                            {{$value->created_at->format('d-m-Y H:i')}}
                                    </div>
                                    <span class="small fw-semibold">
                                        {{$value->ket}}
                                    </span>
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        @endif
    </div>
@endsection
@section('js-content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/resumable.js/1.0.3/resumable.min.js"
        integrity="sha512-OmtdY/NUD+0FF4ebU+B5sszC7gAomj26TfyUUq6191kbbtBZx0RJNqcpGg5mouTvUh7NI0cbU9PStfRl8uE/rw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        const r = new Resumable({
            target: "{{ route('upload.post') }}",
            chunkSize: 2 * 1024 * 1024, // 2MB Chunk chunks
            forceChunkSize: true,
            simultaneousUploads: 1,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() ?? csrf_token() }}' // Laravel Security Token
            },
            query: { _token: '{{ csrf_token() }}' },
            fileParameterName: 'file',
            testChunks: false,
            fileType: ['gif', 'jpg', 'jpeg', 'png', 'bmp', 'webp', 'mp4', 'mkv', 'avi', 'mov', 'wmv', 'flv', 'webm'],
            fileTypeErrorCallback: function (file, errorCount) {
                alert(file.name + ' is not a valid image or video file.');
            }
        });

        // Assign drop area and browse button elements
        r.assignBrowse(document.getElementById('browseButton'));
        r.assignDrop(document.getElementById('upload-container'));

        // Fire upload trigger once a file is chosen
        r.on('fileAdded', function (file) {
            document.getElementById('progress-container').classList.remove('d-none');
            document.getElementById('upload-status').innerText = "Uploading...";
            r.upload();
        });

        // Track progressive percentage complete
        r.on('fileProgress', function (file) {
            const progress = Math.floor(file.progress() * 100);
            const progressBar = document.getElementById('progress-bar');
            progressBar.style.width = progress + '%';
            progressBar.innerHTML = progress + '%';
        });

        // Success Callback
        r.on('fileSuccess', function (file, message) {
            const response = JSON.parse(message);
            console.log(response)
            if (response.name != undefined) {
                document.getElementById("doc").value = response.path + "" + response.name;
            }

            document.getElementById('upload-status').className = "mt-3 text-center fw-bold text-success";
            document.getElementById('upload-status').innerText = "Upload Complete!";
        });

        // Error Callback
        r.on('fileError', function (file, message) {
            document.getElementById('upload-status').className = "mt-3 text-center fw-bold text-danger";
            document.getElementById('upload-status').innerText = "Upload failed. Please retry.";
        });
    </script>
@endsection