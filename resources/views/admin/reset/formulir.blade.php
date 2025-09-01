@extends('layouts.master1')
@section('title',"Reset Penilaian")
@section('subtitle',"")
@section('content')
    <div class="container-fluid px-4">
        <div class="card mb-4">
            <div class="card-body">
                <form method="POST" action="{{route('reset', ['id_lomba' => $id_lomba])}}" >
                    @csrf
                    <div class="row g-2">
                        <label class="col-sm-2">Nomor Peserta</label>
                        <div class="col-sm-10">
                            <input type="text" name="no_peserta" class="form-control" value="{{isset($data) ? $data->no_peserta : ''}}">
                        </div>
                        <label class="col-md-2">Pos Juri</label>
                        <div class="col-md-10">
                            <select class="form-control form-control-sm" id="selJuri">
                                <option value="" selected disabled>Pilih Pos Juri</option>
                                @if($posJuri)
                                    @foreach($posJuri as $k => $v)
                                        <option value="{{$v->id}}" >{{$v->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-sm-10 offset-sm-2">
                            <button class="btn btn-sm btn-primary">Cari</button>
                        </div>
                    </div>
                </form>
                @if(isset($data))
                <hr>
                <div class="row g-2">
                    <label class="col-sm-2">Nomor Peserta</label>
                    <label class="col-sm-9 fw-semibold">{{isset($data) ? $data->no_peserta : ''}}</label>
                    <label class="col-sm-2">Nama Regu / Instansi</label>
                    <label class="col-sm-10 fw-semibold">{{isset($data) ? $data->nama : ''}}</label>
                    <label class="col-sm-2">Kategori Lomba</label>
                    <label class="col-sm-10 fw-semibold">{{isset($data) ? $data->lomba?->judul : ''}}</label>
                    <label class="col-sm-2">Kategori Peserta</label>
                    <label class="col-sm-10 fw-semibold">{{isset($data) ? $data->kategori_peserta?->judul : ''}}</label>
                </div>
                @endif
            </div>
        </div>
        <div class="row g-2">
            <div class="col-lg-6 col-md-12">
                <div class="card mb-2">
                    <div class="card-body">
                        <label for="waktu_start" class="form-label">Waktu Start</label>
                        <input type="" class="form-control" id="tanggal_start" name="tanggal_start" value="">
                        <label for="waktu_start" class="form-label">Waktu Finish</label>
                        <input type="" class="form-control" id="tanggal_start" name="tanggal_start" value="">
                    </div>
                </div>    
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card mb-2">
                    <div class="card-body">
                        <label for="waktu_start" class="form-label">Keutuhan Barisan</label>
                        <input type="" class="form-control" id="tanggal_start" name="tanggal_start" value="">
                        <label for="waktu_start" class="form-label">Kerapian</label>
                        <input type="" class="form-control" id="tanggal_start" name="tanggal_start" value="">
                        <label for="waktu_start" class="form-label">Semangat</label>
                        <input type="" class="form-control" id="tanggal_start" name="tanggal_start" value="">
                    </div>
                </div>
            </div>
        </div>
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