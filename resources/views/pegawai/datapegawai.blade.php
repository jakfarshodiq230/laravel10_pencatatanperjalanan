@extends('layouts.app')

@section('content')
<div class="container mt-5 px-5">
    <div class="d-flex justify-content-center align-items-center" style="height: 150px;">
        <h1 class="text-danger">Data Pegawai</h1>
    </div>
    <div class="card shadow mt-2" style="min-width: 1000px;">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">Tabel Pegawai</h6>
            <div class="d-flex justify-content-end mb-2">
                <a href="{{ route('tambahpegawai') }}" class="btn btn-danger mr-2" role="button">
                    <i class="fa fa-plus" aria-hidden="true"></i> Tambah Data pegawai</a>
                <a href="{{ route('exportpegawai') }}" class="btn btn-warning mr-2" role="button">
                    <i class="fa fa-plus" aria-hidden="true"></i> Export Excel</a>
                    <a href="{{ route('pdfpegawai') }}" class="btn btn-warning" role="button">
                        <i class="fa fa-plus" aria-hidden="true"></i> PDF</a>
            </div>
            <div class="table-responsive">
                <table id="example" class="table table-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <td scope="col">Nomor</td>
                            <td scope="col">Foto</td>
                            <td scope="col">Nama</td>
                            <td scope="col">NIP</td>
                            <td scope="col">NIK</td>
                            <td scope="col">Scan KK</td>
                            <td scope="col">Scan KTP</td>
                            <td scope="col">Tempat_lahir</td>
                            <td scope="col">Tanggal Lahir</td>
                            <td scope="col">Jenis Kelamin</td>
                            <td scope="col">Golongan Darah</td>
                            <td scope="col">Alamat</td>
                            <td scope="col">Agama</td>
                            <td scope="col">Status Perkawinan</td>
                            <td scope="col">Pekerjaan</td>
                            <td scope="col">NO. HP</td>
                            <td scope="col">Kewarganegaraan</td>
                            <td scope="col">Action</td>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $nomor = 0;
                        ?>
                        @foreach ($datapegawai as $item)
                        <?php $nomor++;
                        ?>

                        <tr>
                            <td>{{ $nomor }}</td>
                            <td>
                                <img class="mb-2" src="{{ asset('storage/'. $item->foto) }}" alt="foto"
                                    height="118px" width="88px">
                                </br>Tanggal Upload: {{ $item->updated_at }}
                            </td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->nip}}</td>
                            <td>{{ $item->nik}}</td>
                            <td>
                                <img class="mb-2" src="{{ asset('storage/' . $item->scan_kk) }}" alt="foto"
                                    height="100px" width="200px">
                            </td>
                            <td>
                                <img class="mb-2" src="{{ asset('storage/' . $item->scan_ktp) }}" alt="foto"
                                    height="100px" width="200px">
                            </td>
                            <td>{{ $item->tempat_lahir }}</td>
                            <td>{{ $item->tgl_lahir }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->golongan_darah }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->agama }}</td>
                            <td>{{ $item->status_perkawinan }}</td>
                            <td>{{ $item->pekerjaan }}</td>
                            <td>{{ $item->no_hp }}</td>
                            <td>{{ $item->kewarganegaraan }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-warning" href="{{ url('/pegawai/edit/'.$item->nip) }}">
                                        <i class="bi bi-pen"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $item->nip }}"><i class="bi bi-trash3"></i>
                                    </button>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $item->nip }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                {{ $item->nip }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <form action="{{ url('/pegawai/delete/'. $item->nip) }}" method="post">
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
    @endsection