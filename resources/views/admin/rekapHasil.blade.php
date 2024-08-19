@extends('layouts.master1')
@section('title', $title ?? 'Rekapitulasi Hasil')
@section('subtitle',$subtitle ?? '')
@section('content')
    <div class="container-fluid px-4">
        <div class="card mb-4">
            <div class="card-body">
                <div class="row gap-2">
                    <label class="col-md-2">Kategori Peserta</label>
                    <div class="col-md-9">
                        <select class="form-control form-control-sm" id="selKategoriPeserta">
                            <option value="" selected>Semua</option>
                            @if($katPeserta)
                                @foreach($katPeserta as $key => $value)
                                    <option value="{{$value->id}}" {{$value->id == $id_peserta ? 'selected' : ''}}>{{$value->lomba->judul}} - {{$value->judul}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table table-sm small table-stiped table-sm" id="datatablesSimple">
                        <thead class="table-dark text-center">
                            <tr>
                                <th width="5%">No</th>
                                <th width="10%">No Peserta</th>
                                <th width="15%">Nama Regu/Instansi</th>
                                <th width="30%">Kategori</th>
                                <th>Waktu Tempuh</th>
                                <th>Dis?</th>
                                <th>Total Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($data))
                                @foreach($data as $key => $value)
                                    <tr class="{{$value->diskualifikasi ? 'text-bg-danger' : ''}}">
                                        <td>{{ ($key+1) }}</td>
                                        <td class="text-center">{{$value->no_peserta}}</td>
                                        <td>{{$value->nama}}</td>
                                        <td>{{$value->lomba?->judul}} - {{$value->kategori_peserta?->judul}}</td>
                                        <td class="text-center">{{gmdate('H:i:s', $value->waktu_tempuh)}}</td>
                                        <td class="text-center">{{$value->diskualifikasi ? 'Ya' : ''}}</td>
                                        <td class="text-center">{{$value->total}}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
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

            document.getElementById("selKategoriPeserta").addEventListener('change', function() {
                //var value = this.value
                window.location.href = "/rekapHasil/"+this.value
            })
        });
    </script>
@endsection