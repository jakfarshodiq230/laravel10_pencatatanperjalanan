@extends('layouts.app')

@section('content')
<div class="wrapper mt-5 px-5">
    <form action="{{ url('listpassport/simpan') }}" method="POST">
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
        <div class="row form-group">
            <div class="col-md-12">
                <label for="title" class="form-label">Judul Acara</label>
                <input class="form-control" name="nama_perjalanan" type="text" id="nama_perjalanan"
                    placeholder="Masukkan Judul Acara">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-3">
                <label for="title">Negara Tujuan</label>
                <select class="form-select selectpicker" data-mdb-filter="true"  name="negara_id" data-live-search="true">
                    <option selected disabled>Pilih Negara Tujuan</option>
                    @foreach ($datanegara as $negara)
                    <option value="{{ $negara->id_negara }}">{{ $negara->id_negara }} - {{ $negara->nama_negara }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="title">Kota Tujuan</label>
                <input type="text" name="kota_tujuan" id="kota_tujuan" class="form-control"
                    placeholder="Isi Kota Tujuan">
            </div>
            <div class="col-md-3">
                <label for="title">Tanggal Keberangkatan</label>
                <input type="date" name="tgl_keberangkatan" id="tgl_keberangkatan" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="title">Tanggal Pulang</label>
                <input type="date" name="tgl_pulang" id="tgl_pulang" class="form-control">
            </div>
        </div>
        <div class="d-flex justify-content-end form-group">
            <button type="submit" class="btn btn-danger">Tambah</button>
        </div>
    </form>

    <div class="container form-group" style="margin-top: -135px;">
        <div class="card shadow">
            <div class="table-responsive" style="padding: 20px;">
                <table id="example" class="table table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">Nomor</th>
                            <th scope="col">Input Personil Dinas</th>
                            <th scope="col">Nama Perjalanan</th>
                            <th scope="col">Negara Tujuan</th>
                            <th scope="col">Kota Tujuan</th>
                            <th scope="col">Tanggal Keberangkatan</th>
                            <th scope="col">Tanggal Pulang</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                $nomor = 0;
                                ?>
                        @foreach ($datakegiatan as $dk)
                        <?php $nomor++;
                                ?>
                        <tr>
                            <td>{{ $nomor }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-warning dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Pilih Tim
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ url('/listpassport/personil/'.$dk->id. '/'.$dk->negara_id.'/advance') }}">Tim
                                            Advance</a>
                                        <a class="dropdown-item"
                                            href="{{ url('/listpassport/maingroup/'.$dk->id. '/'.$dk->negara_id.'/group') }}">Main Group</a>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $dk->nama_perjalanan}}</td>
                            <td>{{ $dk->negara->nama_negara }}</td>
                            <td>{{ $dk->kota_tujuan }}</td>
                            <td>{{ $dk->tgl_keberangkatan }}</td>
                            <td>{{ $dk->tgl_pulang }}</td>

                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-warning" href="{{ url('/listpassport/edit/'.$dk->id) }}">
                                        <i class="bi bi-pen"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal"><i class="bi bi-trash3"></i>
                                    </button>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                ...
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <form action="{{ url('/listpassport/delete/'. $dk->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Lanjut</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection