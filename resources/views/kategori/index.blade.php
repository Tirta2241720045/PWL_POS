@extends('layout.app')

{{-- Customize layout sections --}}
@section('subtitle', 'Kategori')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Kategori')

{{-- Content body: main page content --}}
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Manage Kategori
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
            <div class="card-footer d-flex justify-content-end">
                <a href="{{ url('/kategori/create') }}" class="btn btn-primary">Add</a>
            </div>
        </div>
    </div>
@endsection

{{-- Push scripts --}}
@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
