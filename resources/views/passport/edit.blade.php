@extends('layouts.app')

@section('content')
<div class="container px-5">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-6">
                    <h6 class="font-weight-bold text-danger">Edit Data Pasport</h6>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <a class="btn-close btn-outline-danger" aria-label="close" href="{{ url('passport') }}"
                        role="button"></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="card-body">
                <form action="{{ url('passport/update/'.$edit->no_passport) }}" method="POST"  enctype="multipart/form-data">
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
                        <label for="formFile" class="form-label">Passport Lama</label>
                        <br>
                        <img class="mb-2 object-fit-cover" src="{{ asset('storage/'. $edit->scan_passport) }}"
                                    alt="foto" height="200px" width="400px">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Scan Passport</label>
                        <input class="form-control" name="scan_passport_baru" type="file" id="scan_passport_baru">
                        <input class="form-control" name="lama_scan_passport" type="hidden" id="scan_passport"
                            value="{{ $edit->scan_passport }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="title">No. Passport</label>
                        <input type="text" name="no_passport" id="no_passport" class="form-control"
                            placeholder="Isi Nomor Passport" value="{{ $edit->no_passport }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="title">Tanggal Pembuatan</label>
                        <input type="date" name="tgl_pembuatan" id="tgl_pembuatan" class="form-control"
                            value="{{ $edit->tgl_pembuatan }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="title">Tanggal Masa Berlaku</label>
                        <input type="date" name="tgl_berlaku" id="tgl_berlaku" class="form-control"
                            value="{{ $edit->tgl_berlaku }}">
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