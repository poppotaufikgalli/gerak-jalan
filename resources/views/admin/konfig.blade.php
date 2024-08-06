@extends('layouts.master1')
@section('title',"Konfigurasi")
@section('subtitle',"")
@section('content')
    <div class="container-fluid px-4">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex gap-2">
                    <a class="btn btn-sm btn-primary" href="{{route('konfig')}}">Konfigurasi Baru</a>
                    @if($listData)
                        @foreach($listData as $key => $value)
                            @if($value->aktif == 1)
                                <a class="btn btn-sm btn-success" href="{{route('konfig', ['tahun' => $value->tahun])}}"> 
                                    {{$value->tahun}}
                                    <i class="bx bx-check-circle"></i>
                                </a>
                            @else
                                <a class="btn btn-sm btn-secondary" href="{{route('konfig', ['tahun' => $value->tahun])}}">{{$value->tahun}}</a>
                            @endif
                        @endforeach
                    @endif
                </div>
                <hr>
                <form method="POST" action="{{route('konfig.'.$next)}}">
                    @csrf
                    <input type="hidden" name="id" value="{{isset($data) ? $data->id : ''}}">
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Tahun</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="inputEmail3" name="tahun" value="{{isset($data) ? $data->tahun : old('tahun')}}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Tanggal Buka</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control form-control-sm" id="inputEmail3" name="tgl_buka" value="{{isset($data) ? $data->tgl_buka->format('Y-m-d') : old('tgl_buka')}}" required>
                        </div>
                    
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal Tutup</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control form-control-sm" id="inputEmail3" name="tgl_tutup" value="{{isset($data) ? $data->tgl_tutup->format('Y-m-d') : old('tgl_tutup')}}" required>
                        </div>
                    </div>
                    <div class="row mb-3 d-none">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor Peserta Mulai</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control form-control-sm" id="inputEmail3" name="min_no_peserta" value="{{isset($data) ? $data->min_no_peserta : old('min_no_peserta')}}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10 offset-sm-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck1" name="aktif" {{isset($data) && $data->aktif == 1 ? 'checked' : ''}}>
                                <label class="form-check-label" for="gridCheck1">
                                    Aktif
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            @if($next == 'update' && $data->aktif == 0)
                                <a href="{{route('konfig.destroy', ['id' => $data->id])}}" class="btn btn-danger" data-confirm-delete="true">Hapus</a>
                            @endif
                        </div>
                    </div>
                </form>
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