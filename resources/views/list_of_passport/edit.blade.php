@extends('layouts.app')

@section('content')
<div class="container ml-3">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-6">
                    <h6 class="font-weight-bold text-danger">Edit Kegiatan</h6>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <a class="btn-close btn-outline-danger" aria-label="close" href="{{ url('listpassport') }}"
                        role="button"></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="card-body col-lg-8">
                <form action="{{ url('listpassport/update/'.$edit->id) }}" method="POST">
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
                        <label for="title" class="form-label">Judul Acara</label>
                        <input class="form-control" name="nama_perjalanan" type="text" id="nama_perjalanan"
                            value="{{ $edit->nama_perjalanan }}">
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Negara Tujuan</label>
                        <input type="text" name="tujuan" id="tujuan" class="form-control"
                            placeholder="Isi Tujuan Keberangkatan" value="{{ $edit->tujuan }}">
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="title" class="form-label">Tanggal Keberangkatan</label>
                            <input type="date" name="tgl_keberangkatan" id="tgl_keberangkatan" class="form-control"
                                value="{{ $edit->tgl_keberangkatan }}">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="title" class="form-label">Tanggal Pulang</label>
                            <input type="date" name="tgl_pulang" id="tgl_pulang" class="form-control"
                                value="{{ $edit->tgl_pulang }}">
                        </div>
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