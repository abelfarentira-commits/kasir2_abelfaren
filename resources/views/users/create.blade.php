@extends('adminlte::page')

@section('title', 'Data Users')

@section('content_header')
    <h1>Data Users</h1>
@stop

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form User </h3>
            </div>
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label>nip</label>
                        <input type="text" name="nip" class="form-control" placeholder="Contoh: 123456789" required>
                    </div>

                    <div class="form-group">
                        <label>Nama User</label>
                        <input type="text" name="name" class="form-control" placeholder="Contoh: John Doe" required>
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control" required>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Mata Pelajaran</label>
                        <input type="text" name="mata_pelajaran" class="form-control" placeholder="Contoh: Matematika" required>
                    </div>

                    <div class="form-group">
                        <label>No Telepon</label>
                        <input type="text" name="no_telepon" class="form-control" placeholder="Contoh: 08123456789" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Contoh: johndoe@example.com" required>
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Contoh: johndoe" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                    </div>

                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" class="form-control" required>
                            <option value="">-- Pilih Role --</option>
                            <option value="admin">Admin</option>
                            <option value="guru">Guru</option>
                            <option value="siswa">Siswa</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Nonaktif</option>
                        </select>
                    </div>
                    
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</section>
@stop
