@extends('layouts.master1')
@section('title',"Data Penjurian")
@section('subtitle',$subtitle->ket ?? 'Semua')
@section('content')
	<div class="container-fluid px-4">
        <div class="card mb-4">
            <div class="card-body">
                <table class="table small table-stiped table-sm" id="datatablesSimple">
                    <thead class="table-dark text-center">
                        <tr>
                            <th rowspan="2" width="5%">No</th>
                            <th rowspan="2" width="10%">No Peserta</th>
                            <th rowspan="2" width="20%">Nama Regu/Instansi</th>
                            <th rowspan="2" width="10%">Waktu Tempuh</th>
                            <th colspan="4">Nilai</th>
                            <th rowspan="2" width="10%">Total</th>
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
                                    <td class="text-center">{{$value->no_peserta}}</td>
		                            <td>{{$value->nama}}</td>
		                            <td class="text-center">{{$value->waktu_tempuh}}</td>
                                    <td>{{$value->nilai_waktu}}</td>
                                    <td>{{$value->keutuhan}}</td>
                                    <td>{{$value->kerapian}}</td>
                                    <td>{{$value->semangat}}</td>
                                    <td>{{$value->total}}</td>
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

                table.on('click', 'tr', function(){
                    var id = table.row(this).data()[0]

                    window.location.href = "/penilaian/show/"+id
                })
            }
        });
    </script>
@endsection