@extends('layout.app')
{{-- Customize layout sections --}}
@section('subtitle', 'User')
@section('content_header_title', 'User')
@section('content_header_subtitle', 'Create')
{{-- Content body: main page content --}}
@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Tambah Data User</h3>
            </div>

            <form method="post" action="user/tambah_simpan">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Masukan Username">
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukan Nama">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukan Password">
                    </div>
                    <div class="form-group">
                        <label>Level ID</label>
                        <input type="number" name="level_id" class="form-control" placeholder="Masukan ID Level">
                    </div>
                </div>

                <div class="card-footer">
                    <input type="submit" class="btn btn-success" value="Simpan">
                </div>
            </form>
        </div>
    </div>
@endsection
