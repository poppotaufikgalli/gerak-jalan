@extends('layouts.master1')
@section('title',"Data Pengguna")
@section('subtitle', '')
@section('content')
	<div class="container-fluid px-4">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex gap-2">
                    <a class="btn btn-sm btn-primary" href="{{route('user.create')}}">Tambah</a>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table small table-striped table-sm" id="datatablesSimple">
                        <thead class="table-dark text-center">
                            <tr>
                                <th width="5%">No</th>
                                <th width="25%">Nama</th>
                                <th width="10%">Username</th>
                                <th width="10%">Group</th>
                                <th width="35%">Kategori Penilaian Lomba</th>
                                <th width="10%">Status</th>
                                <th width="5%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                        	@if(isset($data))
    							@foreach($data as $key => $value)
    		                        <tr>
    		                            <td>{{ ($key+1) }}</td>
                                        <td align="left">{{$value->name}}</td>
                                        <td>{{$value->username}}</td>
    		                            <td>{{$jnsJuri[$value->gid]}}</td>
                                        <td>
                                            <div class="d-flex justify-content-between align-items-start">
                                                @if($value->gid == 1)
                                                    <span class="badge text-bg-dark">Semua</span>
                                                @else
                                                    <div class="row row-cols-auto gap-1 ms-0">
                                                    @foreach($value->juri_kategori as $item)
                                                        <span class="col badge text-bg-dark">{{$item->judul}}</span>
                                                    @endforeach
                                                    </div>
                                                    <a href="{{route('user.edit', ['id' => $value->id] )}}" class="bg-warning px-2 py-1 text-dark bg-opacity-75 text-decoration-none" data-bs-toggle="modal" data-bs-target="#kategoriLombaModal" data-bs-id="{{$value->id}}" data-bs-kategori="{{$value->juri_kategori}}">
                                                        <i class="bx bx-edit-alt"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
    		                            <td>{{$value->aktif == 1 ? '' : 'Tidak'}} Aktif</td>
    		                            <td>
                                            <div class="d-flex justify-content-end gap-2">
                                                <a href="{{route('user.edit', ['id' => $value->id] )}}" class="bg-warning px-2 py-1 text-dark bg-opacity-75 text-decoration-none">
                                                    <i class="bx bx-edit"></i>
                                                </a>
                                                <a href="{{route('user.destroy', ['id' => $value->id] )}}" class="bg-danger px-2 py-1 text-white bg-opacity-75 text-decoration-none" data-confirm-delete="true">
                                                    <i class="bx bx-x-circle"></i>
                                                </a>
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
        <!-- Modal -->
        <div class="modal fade" id="kategoriLombaModal" aria-labelledby="kategoriLombaModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="kategoriLombaModalLabel">Daftar Kategori Lomba</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{route('juri_kategori.store')}}">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="user_id" id="user_id">
                            @if($katLomba)
                                @foreach($katLomba as $key => $value)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="id_lomba[]" value="{{$value->id}}" id="ch-{{$value->id}}">
                                        <label class="form-check-label" for="ch-{{$value->id}}">
                                            {{$value->judul}}
                                        </label>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
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
                        },
                        topEnd: 'search',
                        bottomStart: 'pageLength',
                        bottomEnd: 'paging',
                    }
                });
            }

            const kategoriLombaModal = document.getElementById('kategoriLombaModal')
            if (kategoriLombaModal) {
                    kategoriLombaModal.addEventListener('show.bs.modal', event => {
                    // Button that triggered the modal
                    const button = event.relatedTarget
                    // Extract info from data-bs-* attributes
                    const recipient = button.getAttribute('data-bs-id')
                    const kategori = button.getAttribute('data-bs-kategori')
                    // If necessary, you could initiate an Ajax request here
                    // and then do the updating in a callback.

                    // Update the modal's content.
                    //const modalTitle = kategoriLombaModal.querySelector('.modal-title')
                    const modalBodyInput = kategoriLombaModal.querySelector('.modal-body input#user_id')
                    const id_lomba = _.map(JSON.parse(kategori), 'id_lomba')

                    kategoriLombaModal.querySelectorAll('.modal-body input[type="checkbox"]').forEach(el => {
                        let elid = (el.id).replace(/\D/g,'');
                        if(_.includes(id_lomba, parseInt(elid))){
                            el.checked = true
                        }
                        
                    })
                    

                    //modalTitle.textContent = `New message to ${recipient}`
                    modalBodyInput.value = recipient
                })
            }

        });
    </script>
@endsection