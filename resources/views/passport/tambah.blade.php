@extends('layouts.app')

@section('content')
<div class="container ml-3">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-6">
                    <h6 class="font-weight-bold text-danger">Tambah Data Passport</h6>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <a class="btn-close btn-outline-danger" aria-label="close" href="{{ url('passport') }}"
                        role="button"></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="card-body col-lg-8 p-3">
                <form action="{{ url('passport/simpan') }}" method="POST" enctype="multipart/form-data">
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
                        <select class="form-select mb-3" aria-label="Default select example" name="pegawai_nip"
                            id="pegawai_nip">
                            <option selected disabled>Pilih Data Pegawai</option>
                            @foreach ($datapegawai as $pegawai)
                            <option value="{{ $pegawai->nip }}">{{ $pegawai->nama }} - {{ $pegawai->nip }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">No. Passport</label>
                        <input type="text" name="no_passport" id="no_passport" class="form-control"
                            placeholder="Isi Nomor Passport">
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="title" class="form-label">Tanggal Pembuatan</label>
                            <input type="date" name="tgl_pembuatan" id="tgl_pembuatan" class="form-control">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="title" class="form-label">Tanggal Masa Berlaku</label>
                            <input type="date" name="tgl_berlaku" id="tgl_berlaku" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Scan Passport</label>
                        <input class="form-control" name="scan_passport" type="file"
                            id="scan_passport">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-danger">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection