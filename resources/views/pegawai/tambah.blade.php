@extends('layouts.app')

@section('content')
<div class="container ml-3">
    <div class="card">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-6">
                    <h6 class="font-weight-bold text-danger">Tambah Data Pegawai</h6>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <a class="btn-close btn-outline-danger" aria-label="close" href="{{ url('pegawai') }}"
                        role="button"></a>
                </div>
            </div>
        </div>

        <div class="card-body col-lg-8 p-3">
            <form action="{{ url('pegawai/simpan') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li> {{ $error }} </li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="mb-3">
                    <label for="title" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Isi Nama Lengkap">
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="title" class="form-label">NIP/NRP</label>
                        <input type="text" name="nip" id="nip" class="form-control" placeholder="Isi NIP/NRP">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="title" class="form-label">NIK</label>
                        <input type="text" name="nik" id="nik" class="form-control" placeholder="Isi NIP/NRP">
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="title" class="form-label">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"
                            placeholder="Isi Tempat Lahir">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                        <input class="form-control" name="tgl_lahir" type="date" id="tgl_lahir"
                            placeholder="Isi Tanggal Lahir">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" aria-label="Default select example" name="jenis_kelamin"
                            id="jenis_kelamin">
                            <option selected disabled>Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="golongan_darah" class="form-label">Golongan Darah</label>
                        <select class="form-select" aria-label="Default select example" name="golongan_darah"
                            id="golongan_darah">
                            <option selected disabled>Pilih Golongan Darah</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Alamat Domisili</label>
                    <input type="text" name="alamat" id="title" class="form-control" placeholder="Isi Alamat">
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="agama" class="form-label">Agama</label>
                        <select class="form-select" aria-label="Default select example" name="agama" id="agama">
                            <option selected disabled>Pilih Agama</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen Katholik">Kristen Katholik</option>
                            <option value="Kristen Protestan">Kristen Protestan</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="no_hp" class="form-label">No. HP</label>
                        <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="Isi Nmor Hp">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Foto</label>
                    <input class="form-control" name="foto" type="file" id="foto">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Scan KK</label>
                    <input class="form-control" name="scan_kk" type="file" id="scan_kk">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Scan KTP</label>
                    <input class="form-control" name="scan_ktp" type="file" id="scan_ktp">
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="title" class="form-label">Pekerjaan</label>
                        <input type="text" name="pekerjaan" id="title" class="form-control" placeholder="Isi Pekerjaan">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                        <br>
                        <select class="form-select" aria-label="Default select example" name="kewarganegaraan"
                            id="kewarganegaraan">
                            <option selected disabled>Pilih kewarganegaraan</option>
                            <option value="WNI">WNI</option>
                            <option value="WNA">WNA</option>
                        </select>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="status_perkawinan" class="form-label"   >Status Perkawinan</label>
                    <select class="form-select" aria-label="Default select example" name="status_perkawinan"
                        id="status_perkawinan">
                        <option selected disabled>Pilih Status Perkawinan</option>
                        <option value="Belum Kawin">Belum Kawin</option>
                        <option value="Sudah Kawin">Sudah Kawin</option>
                    </select>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-danger">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection