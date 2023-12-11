@extends('layouts.app')

@section('content')
    <div class="container ml-3">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-6">
                        <h6 class="font-weight-bold text-danger">Edit Data Pegawai</h6>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <a class="btn-close btn-outline-danger" aria-label="close" href="{{ url('pegawai') }}"
                            role="button"></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="card-body col-lg-8 p-3">
                    <form action="{{ url('pegawai/update/' . $edit->nip) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
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
                            <input type="text" name="nama" id="nama" class="form-control"
                                placeholder="Isi Nama Lengkap" value="{{ $edit->nama }}">
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="title" class="form-label">NIP/NRP</label>
                                <input type="text" name="nip" id="nip" class="form-control"
                                    placeholder="Isi NIP/NRP" value="{{ $edit->nip }}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="title" class="form-label">NIK</label>
                                <input type="text" name="nik" id="nik" class="form-control"
                                    placeholder="Isi NIP/NRP" value="{{ $edit->nik }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="title" class="form-label">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"
                                    placeholder="Isi Tempat Lahir" value="{{ $edit->tempat_lahir }}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                <input class="form-control" name="tgl_lahir" type="date" id="tgl_lahir"
                                    placeholder="Isi Tanggal Lahir" value="{{ $edit->tgl_lahir }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" aria-label="Default select example" name="jenis_kelamin"
                                    id="jenis_kelamin">
                                    <option value="Laki-Laki" {{ $edit->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="Perempuan" {{ $edit->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="golongan_darah" class="form-label">Golongan Darah</label>
                                <select class="form-select" aria-label="Default select example" name="golongan_darah"
                                    id="golongan_darah">
                                    <option value="A" {{ $edit->golongan_darah == 'A' ? 'selected' : '' }}>A</option>
                                    <option value="B" {{ $edit->golongan_darah == 'B' ? 'selected' : '' }}>B</option>
                                    <option value="AB" {{ $edit->golongan_darah == 'AB' ? 'selected' : '' }}>AB
                                    </option>
                                    <option value="O" {{ $edit->golongan_darah == 'O' ? 'selected' : '' }}>O
                                    </option>

                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Alamat Domisili</label>
                            <input type="text" name="alamat" id="title" class="form-control"
                                placeholder="Isi Alamat" value="{{ $edit->alamat }}">
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="agama" class="form-label">Agama</label>
                                <select class="form-select" aria-label="Default select example" name="agama"
                                    id="agama">
                                    <option value="Islam" {{ $edit->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                                    <option value="Kristen Katholik" {{ $edit->agama == 'Kristen Katholik' ? 'selected' : '' }}>Kristen Katholik</option>
                                    <option value="Kristen Protestan" {{ $edit->agama == 'Kristen Protestan' ? 'selected' : '' }}>Kristen Protestan</option>
                                    <option value="Hindu" {{ $edit->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                    <option value="Budha" {{ $edit->agama == 'Budha' ? 'selected' : '' }}>Budha</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="no_hp" class="form-label">No. HP</label>
                                <input type="text" name="no_hp" id="no_hp" class="form-control"
                                    placeholder="Isi Nmor Hp" value="{{ $edit->no_hp }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Passport Lama</label>
                                <br>
                                <img class="mb-2 object-fit-cover" src="{{ asset('storage/'. $edit->foto) }}"
                                            alt="foto" height="200px" width="100px">
                            </div>
                            <label for="formFile" class="form-label">Foto</label>
                            <input class="form-control" name="foto" type="file" id="foto">
                            <input class="form-control" name="foto_lama" type="hidden" id="foto_lama"
                                value="{{ $edit->foto }}">
                        </div>
                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Passport Lama</label>
                                <br>
                                <img class="mb-2 object-fit-cover" src="{{ asset('storage/'. $edit->scan_kk) }}"
                                            alt="foto" height="200px" width="400px">
                            </div>
                            <label for="formFile" class="form-label">Scan KK</label>
                            <input class="form-control" name="scan_kk" type="file" id="scan_kk">
                            <input class="form-control" name="scan_kk_lama" type="hidden" id="scan_kk_lama"
                                value="{{ $edit->scan_kk }}">
                        </div>
                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Passport Lama</label>
                                <br>
                                <img class="mb-2 object-fit-cover" src="{{ asset('storage/'. $edit->scan_ktp) }}"
                                            alt="foto" height="200px" width="400px">
                            </div>
                            <label for="formFile" class="form-label">Scan KTP</label>
                            <input class="form-control" name="scan_ktp" type="file" id="scan_ktp">
                            <input class="form-control" name="scan_ktp_lama" type="hidden" id="scan_ktp_lama"
                                value="{{ $edit->scan_ktp }}">
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="title" class="form-label">Pekerjaan</label>
                                <input type="text" name="pekerjaan" id="title" class="form-control"
                                    placeholder="Isi Pekerjaan" value="{{ $edit->pekerjaan }}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                                <select class="form-select" aria-label="Default select example" name="kewarganegaraan"
                                    id="kewarganegaraan">
                                    <option value="WNI" {{ $edit->agama == 'WNI' ? 'selected' : '' }}>WNI</option>
                                    <option value="WNA" {{ $edit->agama == 'WNA' ? 'selected' : '' }}>WNA</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="status_perkawinan" class="form-label">Status Perkawinan</label>
                            <select class="form-select" aria-label="Default select example" name="status_perkawinan"
                                id="status_perkawinan">
                                <option value="Belum Kawin" {{ $edit->agama == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                                <option value="Sudah Kawin" {{ $edit->agama == 'Sudah Kawin' ? 'selected' : '' }}>Sudah Kawin</option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-danger">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
