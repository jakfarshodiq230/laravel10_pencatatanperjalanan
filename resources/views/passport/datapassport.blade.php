@extends('layouts.app')

@section('content')
<div class="container mt-5 px-5">
    <div class="d-flex justify-content-center align-items-center" style="height: 150px;">
        <h1 class="text-danger">Data Passport</h1>
    </div>
    <div class="card mt-2" style="min-width: 1000px;">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">Tabel passport</h6>
            <div class="d-flex justify-content-end mb-2">
                <a href="{{ url('passport/create') }}" class="btn btn-danger" role="button">
                    <i class="fa fa-plus" aria-hidden="true"></i> Tambah data passport</a></td>
            </div>
            <div class="table-responsive">
                <table id="example" class="table table-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Nomor</th>
                            <th scope="col">Nama Pegawai</th>
                            <th scope="col">Foto</th>
                            <th scope="col">No. Passport</th>
                            <th scope="col">Scan Passport</th>
                            <th scope="col">Tanggal Pembuatan</th>
                            <th scope="col">Tanggal Masa Berlaku</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php $nomor = 0; ?>

                        @foreach ($datapassports as $dp)

                        <?php $nomor++; ?>

                        <tr>
                            <th scope="row">{{ $nomor }}</th>
                            <td>{{ $dp->pegawai->nama }}</td>
                            <td>
                                <img class="mb-2 object-fit-cover" src="{{ asset('storage/'. $dp->pegawai->foto) }}"
                                    alt="foto" height="118px" width="88px">
                            </td>
                            <td>{{ $dp->no_passport }}</td>
                            <td>
                                <img class="mb-2" src="{{ asset('storage/'.$dp->scan_passport) }}" alt="foto"
                                    height="100px" width="200px">
                            </td>
                            <td>{{ $dp->tgl_pembuatan }}</td>
                            <td>{{ $dp->tgl_berlaku }}</td>
                            <td>{{ $dp->status }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-warning" href="{{ url('/passport/edit/'.$dp->no_passport) }}">
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
                                                {{ $dp->no_passport }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <form action="{{ url('/passport/delete/'. $dp->no_passport) }}"
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
                        <!-- modal hapus -->
                        <!-- Button trigger modal -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection