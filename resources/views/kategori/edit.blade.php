@extends('layout.app')
{{-- Customize layout sections --}}
@section('subtitle', 'Kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Edit')
{{-- Content body: main page content --}}
@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Kategori</h3>
            </div>
            <form method="POST" action="{{ route('update', $kategori->kategori_id) }}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="kodeKategori">Kode Kategori</label>
                        <input type="text" class="form-control" id="kodeKategori" name="kodeKategori"
                            value="{{ $kategori->kategori_kode }}" placeholder="Masukkan Kode Kategori">
                    </div>
                    <div class="form-group">
                        <label for="namaKategori">Nama Kategori</label>
                        <input type="text" class="form-control" id="namaKategori" name="namaKategori"
                            value="{{ $kategori->kategori_nama }}" placeholder="Masukkan Nama Kategori">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-primary"
                        onclick="window.location='{{ url('/kategori') }}'">Back</button>
                </div>
            </form>
        </div>
    </div>
@endsection
