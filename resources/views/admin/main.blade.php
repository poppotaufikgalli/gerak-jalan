@extends('layouts.master1')
@section('title',"Dashboard")
@section('subtitle',"Dashboard")
@section('content')
    <div class="container-fluid px-4">
        <div class="row">
            @if($katLomba)
                @foreach($katLomba as $key => $value)
                    <div class="col-xl-2 col-md-6">
                        <div class="card bg-light text-dark mb-4">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="fw-bold">{{$value->judul}}</h6>
                                    <p class="h2">{{$jmlPendaftar[$value->id] ?? 0}}</p>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-dark stretched-link" href="{{route('pendaftar', ['id' => $value->id])}}">Lihat Detail</a>
                                <div class="small text-dark"><i class="bx bx-chevron-right"></i></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="bx bx-table me-1"></i>
                Data Pendaftaran
            </div>
            <div class="card-body">
                <table class="table table-sm" id="datatablesSimple">
                    <thead class="table-dark">
                        <tr>
                            <th>Kategori Lomba</th>
                            <th>Nama Regu/Instansi</th>
                            <th>PIC</th>
                            <th>Telp. PIC</th>
                            <th>Tanggal Daftar</th>
                            <th>Verifikator</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($pendaftar)
                            @foreach($pendaftar as $key => $value)
                                <tr>
                                    <td>{{$value->lomba->judul}}</td>
                                    <td>{{$value->nama}}</td>
                                    <td>{{$value->pic}}</td>
                                    <td>{{$value->telp}}</td>
                                    <td>{{$value->created_at->format('d/m/Y H:i')}}</td>
                                    <td>{{$value->verif_id}}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
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
            new DataTable(datatablesSimple, {
                layout: {
                    topStart: {
                        buttons: ['excelHtml5', 'pdfHtml5']
                    }
                }
            });
        }
    });
    </script>
@endsection