@extends('layout.app')
{{-- Customize layout sections --}}
@section('subtitle', 'Level')
@section('content_header_title', 'Level')
@section('content_header_subtitle', 'Create')
{{-- Content body: main page content --}}
@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Tambah Data Level</h3>
            </div>

            <form method="post" action="level/tambah_simpan">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label>Kode Level</label>
                        <input type="text" name="level_kode" class="form-control" placeholder="Masukan Kode Level"
                            maxlength="10">
                    </div>
                    <div class="form-group">
                        <label>Nama Level</label>
                        <input type="text" name="level_nama" class="form-control" placeholder="Masukan Nama Level"
                            maxlength="100">
                    </div>
                </div>

                <div class="card-footer">
                    <input type="submit" class="btn btn-success" value="Simpan">
                </div>
            </form>
        </div>
    </div>
@endsection
