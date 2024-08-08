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
                        <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="tahun" name="tahun" value="{{isset($data) ? $data->tahun : old('tahun')}}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tgl_buka" class="col-sm-2 col-form-label">Tanggal Buka</label>
                        <div class="col-sm-4">
                            <input type="datetime-local" class="form-control form-control-sm" id="tgl_buka" name="tgl_buka" value="{{isset($data) ? $data->tgl_buka->format('Y-m-d H:i:s') : old('tgl_buka')}}" step="1" required>
                        </div>
                    
                        <label for="tgl_tutup" class="col-sm-2 col-form-label">Tanggal Tutup</label>
                        <div class="col-sm-4">
                            <input type="datetime-local" class="form-control form-control-sm" id="tgl_tutup" name="tgl_tutup" value="{{isset($data) ? $data->tgl_tutup->format('Y-m-d H:i:s') : old('tgl_tutup')}}" step="1" required>
                        </div>
                    </div>
                    <div class="row mb-3 d-none">
                        <label for="min_no_peserta" class="col-sm-2 col-form-label">Nomor Peserta Mulai</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control form-control-sm" id="min_no_peserta" name="min_no_peserta" value="{{isset($data) ? $data->min_no_peserta : old('min_no_peserta')}}" required>
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