@extends('layout.app')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 d-flex justify-content-between">
            <h2>CRUD User</h2>
            <a class="btn btn-success rounded-pill" href="{{ route('m_user.create') }}">
                <i class="fas fa-plus"></i> Input User
            </a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table id="userTable" class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">User ID</th>
                <th class="text-center">Level ID</th>
                <th class="text-center">Kode Level</th>
                <th class="text-center">Nama Level</th>
                <th class="text-center">Username</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Password</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($useri as $m_user)
                <tr>
                    <td class="text-center">{{ $m_user->user_id }}</td>
                    <td class="text-center">{{ $m_user->level_id }}</td>
                    <td>{{ $m_user->level->level_kode }}</td>
                    <td>{{ $m_user->level->level_nama }}</td>
                    <td>{{ $m_user->username }}</td>
                    <td>{{ $m_user->nama }}</td>
                    <td>{{ $m_user->password }}</td>
                    <td class="text-center">
                        <form action="{{ route('m_user.destroy', $m_user->user_id) }}" method="POST">
                            <a class="btn btn-info btn-sm" href="{{ route('m_user.show', $m_user->user_id) }}">
                                <i class="fas fa-eye"></i> Show
                            </a>
                            <a class="btn btn-primary btn-sm" href="{{ route('m_user.edit', $m_user->user_id) }}">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable();
        });
    </script>
@endpush
