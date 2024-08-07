@extends('layouts.master1')
@section('title',"Data Penjurian")
@section('subtitle',$subtitle->ket ?? 'Semua')
@section('content')
	<div class="container-fluid px-4">
        <div class="card mb-4">
            <div class="card-body">
                <a class="btn btn-sm btn-primary" href="{{route('penilaian.create',['id' => $id])}}">Tambah</a>
                <hr>
                <table class="table small table-stiped table-sm" id="datatablesSimple">
                    <thead class="table-dark text-center">
                        <tr>
                            <th rowspan="2" width="5%">No</th>
                            <th rowspan="2">&nbsp;</th>
                            <th rowspan="2" width="10%">No Peserta</th>
                            <th rowspan="2" width="20%">Nama Regu/Instansi</th>
                            <th rowspan="2" width="10%">Waktu Tempuh</th>
                            <th colspan="4">Nilai</th>
                            <th rowspan="2" width="10%">Total</th>
                            <th rowspan="2">Diskualifikasi</th>
                        </tr>
                        <tr>
                            <th width="10%">Nilai Waktu</th>
                            <th width="10%">Keutuhan Barisan</th>
                            <th width="10%">Kerapian</th>
                            <th width="10%">Semangat</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@if(isset($data))
							@foreach($data as $key => $value)
		                        <tr>
		                            <td>{{ ($key+1) }}</td>
                                    <td>
                                        <a href="{{route('penilaian.show', ['id' => $value->id])}}" class="btn btn-sm btn-warning">
                                            <i class="bx bx-trophy"></i>
                                        </a>
                                    </td>
                                    <td class="text-center">{{$value->no_peserta}}</td>
		                            <td>{{$value->nama}}</td>
		                            <td class="text-center">{{$value->waktu_tempuh}}</td>
                                    @php($a=$penilaian[$value->id][1] ?? 0)
                                    <td class="text-center">{{$a}}</td>
                                    @php($b=intVal($penilaian[$value->id][2] ?? 0))
                                    <td class="text-center">{{$penilaian[$value->id][2] ?? ''}}</td>
                                    @php($c=intVal($penilaian[$value->id][3] ?? 0))
                                    <td class="text-center">{{$penilaian[$value->id][3] ?? ''}}</td>
                                    @php($d=intVal($penilaian[$value->id][4] ?? 0))
                                    <td class="text-center">{{$penilaian[$value->id][4] ?? ''}}</td>
                                    @php($total=$a + $b +$c+$d ?? 0)
                                    <td class="text-center">{{$total}}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            @if(in_array($value->id, $diskualifikasi))
                                                <div class="bg-danger px-2 py-1 text-white bg-opacity-75">
                                                    <i class="bx bx-user-x"></i>
                                                </div>
                                            @endif
                                        </div>
                                    </td>
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
                let table = new DataTable(datatablesSimple, {
                    layout: {
                        topStart: 'pageLength',
                        topEnd: 'search',
                        bottomStart: 'info',
                        bottomEnd: 'paging',
                    }
                });

                /*table.on('click', 'tr', function(){
                    var id = table.row(this).data()[0]

                    window.location.href = "/penilaian/show/"+id
                })*/
            }
        });
    </script>
@endsection