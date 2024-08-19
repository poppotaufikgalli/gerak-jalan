@extends('layouts.master1')
@section('title',"Dashboard")
@section('subtitle',"Dashboard")
@section('content')
    <div class="container-fluid px-4">
        <div class="row">
            @if($katLomba)
                @foreach($katLomba as $key => $value)
                    <div class="col-xl-6 col-md-12">
                        <div class="card bg-light text-dark mb-4">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="fw-bold">{{$value->judul}}</h6>
                                    <p class="h2">{{$jmlPendaftar[$value->id] ?? 0}}</p>
                                </div>
                                <hr>
                                <div>
                                    @if($katPeserta)
                                        <table class="table small table-sm table-striped">
                                        @foreach($katPeserta as $k => $v)
                                            <tr>
                                            @if($v->id_lomba == $value->id)
                                                <td>{{$v->judul}}</td>
                                                <td>{{$jmlPeserta[$value->id][$v->id] ?? 0}}</td>
                                            @endif
                                            </tr>
                                        @endforeach
                                        </table>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                @if(Auth::user()->gid == 1)
                                <a class="small text-dark stretched-link" href="{{route('pendaftar', ['id' => $value->id])}}">Lihat Detail</a>
                                @endif
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
                <div class="table-responsive">
                    <table class="table table-sm small table-striped" id="datatablesSimple">
                        <thead class="table-dark">
                            <tr>
                                <th>Kategori Lomba</th>
                                <th>Kategori Peserta</th>
                                <th>Nama Regu/Instansi</th>
                                <th>PIC</th>
                                <th>Telp. PIC</th>
                                <th>Ketua</th>
                                <th>Telp. Ketua</th>
                                <th>Tanggal Daftar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($pendaftar)
                                @foreach($pendaftar as $key => $value)
                                    <tr>
                                        <td>{{$value->lomba->judul}}</td>
                                        <td>{{$value->kategori_peserta->judul}}</td>
                                        <td>{{$value->nama}}</td>
                                        <td>{{$value->pic}}</td>
                                        <td>{{$value->telp}}</td>
                                        <td>{{$value->ketua}}</td>
                                        <td>{{$value->telp_ketua}}</td>
                                        <td>{{$value->created_at->format('d/m/Y H:i')}}</td>
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