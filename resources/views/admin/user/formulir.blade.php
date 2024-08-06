@extends('layouts.master1')
@section('title',"Tambah Pengguna")
@section('subtitle',"")
@section('content')
    <div class="container-fluid px-4">
        <div class="card mb-4">
            <div class="card-body">
                <form method="POST" action="{{route('user.'.$next)}}">
                    @csrf
                    <input type="hidden" name="id" value="{{isset($data) ? $data->id : ''}}">
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="inputEmail3" name="name" value="{{isset($data) ? $data->name : old('name')}}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="inputEmail3" name="username" value="{{isset($data) ? $data->username : old('username')}}" required>
                        </div>
                    </div>
                    @if($next == "store")
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control form-control-sm" id="inputEmail3" name="password" value="">
                        </div>
                    </div>
                    @endif
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Group</label>
                        <div class="col-sm-10">
                            <select class="form-control form-control-sm" name="gid">
                                <option value="" selected disabled>Pilih Group</option>
                                <option value="1" {{isset($data) && $data->gid == 1 ? "selected" : ""}}>Administrator</option>
                                <option value="2" {{isset($data) && $data->gid == 2 ? "selected" : ""}}>Juri</option>
                            </select>
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
                            <a href="{{route('user')}}" type="button" class="btn btn-sm btn-secondary">Batal</a>
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