@extends('layouts.master1')
@section('title',"Tambah Penilaian")
@section('subtitle',"")
@section('content')
    <div class="container-fluid px-4">
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="mb-3">
                        <label for="ex1" class="form-label">Nomor Peserta</label>
                        <input type="text" class="form-control" id="ex1" value="{{isset($data) ? $data->no_peserta : ''}}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="ex2" class="form-label">Nama Regu/Instansi</label>
                        <input type="text" class="form-control" id="ex2" value="{{isset($data) ? $data->nama : ''}}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="ex2" class="form-label">Kategori</label>
                        <input type="text" class="form-control" id="ex2" value="{{isset($data) ? $data->lomba?->judul .' - '. $data->kategori_peserta?->judul : ''}}" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <h5 class="card-header">
                Pencatatan Waktu
            </h5>
            <div class="card-body">
                <form method="POST" action="{{route('penilaian.'.$next)}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <input type="hidden" name="jns" value="1">
                    <input type="hidden" name="id_lomba" value="{{$data->id_lomba}}">
                    <div class="row">
                        <div class="mb-3 col-md-6 col-sm-12">
                            <label for="waktu_start" class="form-label">Waktu Start</label>
                            <input type="time" class="form-control" id="waktu_start" name="waktu_start" value="{{isset($data) ? $data->waktu_start?->format('H:i:s') : old('waktu_start')}}" step="1">
                        </div>
                        <div class="mb-3 col-md-6 col-sm-12">
                            <label for="waktu_finish" class="form-label">Waktu Finish</label>
                            <input type="time" class="form-control" id="waktu_finish" name="waktu_finish" value="{{isset($data) ? $data->waktu_finish?->format('H:i:s') : old('waktu_finish')}}" step="1">
                        </div>
                        <div class="mb-3 col-md-2 col-sm-12">
                            <label for="waktu_tempuh" class="form-label">Waktu Tempuh</label>
                            <input type="text" class="form-control" id="waktu_tempuh" name="waktu_tempuh" value="{{isset($data) ? $data->waktu_tempuh : ''}}" step="1" readonly>
                        </div>
                        <div class="mb-3 col-md-2 col-sm-12">
                            <label for="waktu_tempuh" class="form-label">Waktu Referensi</label>
                            <input type="text" class="form-control" id="waktu_tempuh" name="waktu_tempuh" value="{{ $waktu_referensi }}" step="1" readonly>
                        </div>
                        <div class="mb-3 col-md-2 col-sm-12">
                            <label for="nilai_waktu" class="form-label">Nilai</label>
                            <input type="number" class="form-control" id="nilai_waktu" name="nilai_waktu" value="{{isset($data) ? $data->nilai_waktu : ''}}" step="1" readonly>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                </form>
            </div>
        </div>
         @if($penilaian)
            @foreach($penilaian as $key => $value1)
                <div class="card mb-4">
                    <h5 class="card-header">
                        Pencatatan Nilai 
                        <span class="float-end">{{$value1->juri->name}}</span>
                    </h5>
                    <div class="card-body">
                        <form method="POST" action="{{route('penilaian.'.$next)}}">
                            @csrf
                            <input type="hidden" name="id" value="{{isset($data) ? $data->id : ''}}">
                            <div class="row row-cols-3">
                                <div class="mb-3">
                                    <label for="inputEmail3" class="form-label">Keutuhan Barisan</label>
                                    <input type="number" class="form-control" id="inputEmail3" name="judul" value="{{isset($data) ? $data->judul : old('judul')}}" min="0" max="110" step="10">
                                </div>
                                <div class="mb-3">
                                    <label for="inputEmail3" class="form-label">Kerapian</label>
                                    <input type="number" class="form-control" id="inputEmail3" name="judul" value="{{isset($data) ? $data->judul : old('judul')}}" min="20" max="100" step="5">
                                </div>
                                <div class="mb-3">
                                    <label for="inputEmail3" class="form-label">Semangat</label>
                                    <input type="number" class="form-control" id="inputEmail3" name="judul" value="{{isset($data) ? $data->judul : old('judul')}}" min="60" max="100" step="5">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
@section('js-content')
    <script type="text/javascript">
        window.addEventListener('DOMContentLoaded', event => {
        // Simple-DataTables
        // https://github.com/fiduswriter/Simple-DataTables/wiki

        const datatablesSimple = document.getElementById('datatablesSimple');
        if (datatablesSimple) {
            new DataTable(datatablesSimple);
        }
    });
    </script>
@endsection