@extends('layouts.app')

@section('content')
    <div class="wrapper mt-5 px-5">
        <form action="{{ url('listpassport/personil/simpan/' . $datakegiatan->id) }}" method="POST">
            @csrf
            @method('POST')
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li> {{ $error }} </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="d-flex justify-content-evenly jadwal-dinas">
                <div class="mt-3">
                    <label for="title">Personil</label>
                    <select id="select-state" class="form-select mb-3" aria-label="Default select example" name="passport_id"
                        id="passport_id" placeholder="Cari Personil">
                        @foreach ($datapassport as $passport)
                            <option value="{{ $passport->no_passport }}">{{ $passport->pegawai->nama }} -
                                {{ $passport->no_passport }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="tim_kegiatan" id="tim_kegiatan" value="advance" class="form-control"
                    placeholder="Isi NIP/NRP">
                <input type="hidden" name="negara_id" id="negara_id" value="{{ $datakegiatan->negara->id_negara }}"
                    class="form-control">
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-danger">Tambah</button>
            </div>
        </form>
        <div class="container" style="margin-top: -100px;">
            <div class="card shadow">
                <div class="table-responsive" style="padding: 20px;">
                    <h4 class="text-center text-danger">DATA TIM ADVANCE</h4>
                    <form action="{{ url('listpassport/personil/export/' . $datakegiatan->id) }}" method="GET"
                        class="d-flex">
                        <button type="button" class="btn btn-warning dropdown-toggle mb-3 mr-3" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Export
                        </button>
                        <div class="dropdown-menu">
                            <button type="submit" class="btn btn-primary mb-3 mr-3 ml-3" name="excel" value="excel"
                                role="button">
                                <i class="fa fa-plus" aria-hidden="true"></i> Export Excel</button>
                            <button type="submit" class="btn btn-success mb-3 mr-3" name="pdf" value="pdf"
                                role="button">
                                <i class="fa fa-plus" aria-hidden="true"></i>Export Pdf</button>
                        </div>
                        <select id="select-state" class="filter-visa form-select mb-3" aria-label="Default select example"
                            name="status_visa" id="status_visa">
                            <option value="ada-visa">Ada Visa</option>
                            <option value="tidak-ada-visa">Tidak Ada Visa</option>
                        </select>
                        <input type="hidden" name="jenis_kegiatan" id="jenis_kegiatan" value="advance">
                        <input type="hidden" name="idNegara" id="idNegara" value="{{$datakegiatan->negara_id}}">
                    </form>
                    <table id="example" class="table table-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">Nomor</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Nama Pegawai</th>
                                <th scope="col">No. Passport</th>
                                <th scope="col">Scan Passport</th>
                                <th scope="col">Scan Visa</th>
                                <th scope="col">Scan Exitpermit</th>
                                <th scope="col">Scan Vaksin</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $nomor = 0;
                            ?>
                            @foreach ($dataLengkap as $key => $dp)
                                <?php
                                $nomor++;
                                ?>
                                <tr>
                                    <td>{{ $nomor }}</td>
                                    <td>
                                        <img class="mb-2" src="{{ asset('storage/' . $dp['foto_pegawai']) }}"
                                            alt="foto" height="118px" width="88px">
                                    </td>
                                    <td>{{ $dp['nama_pegawai'] }}</td>
                                    <td>{{ $dp['nomor_passport'] }}</td>
                                    <td>
                                        <img class="mb-2" src="{{ asset('storage/' . $dp['scan_passport']) }}"
                                            alt="foto" height="120px" width="200px">
                                        <p>Tanggal Berlaku :{{ $dp['tgl_berlaku'] }}</p>
                                    </td>
                                    <td>
                                        @if ($dp['scan_visa'] == 'null')
                                            <label for="">-</label>
                                        @else
                                            <img class="mb-2" src="{{ asset('storage/' . $dp['scan_visa']) }}"
                                                alt="foto" height="120px" width="200px">
                                        @endif
                                    </td>
                                    <td>
                                        @if ($dp['scan_exitpermit'] != 'null')
                                            <img class="mb-2" src="{{ asset('storage/' . $dp['scan_exitpermit']) }}"
                                                alt="foto" height="120px" width="200px">
                                        @else
                                            <label for="">-</label>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($dp['scan_vaksin'] != 'null')
                                            <img class="mb-2" src="{{ asset('storage/' . $dp['scan_vaksin']) }}"
                                                alt="foto" height="120px" width="200px">
                                        @else
                                            <label for="">-</label>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($dp['status_data'] == 'tidak')
                                            <label for="">TIDAK ADA VISA</label>
                                        @else
                                            <label for="">ADA VISA</label>
                                        @endif

                                    </td>
                                    <td>

                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            @if ($dp['scan_visa'] != 'null')
                                                <a class="btn btn-warning"
                                                    href="{{ url('/listpassport/personil/edit/' . $dp['kegiatan_id'] . '/' . $dp['negara_id'] . '/' . $dp['visa_id'].'/'.$dp['tim_kegiatan']) }}">
                                                    <i class="bi bi-pen"></i>
                                                </a>
                                            @else
                                                <a class="btn btn-warning"
                                                    href="{{ url('/listpassport/personil/add-visa/' . $dp['kegiatan_id'] . '/' . $dp['negara_id'] . '/' . $dp['passport_id'] . '/' . $dp['tim_kegiatan']) }}">
                                                    <i class="bi bi-plus"></i>
                                                </a>
                                            @endif
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $nomor }}">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $nomor }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data?
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <span>Apakah anda yakin mau menghapus data
                                                            <b>{{ $dp['nama_pegawai'] }}</b></span>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <form
                                                            action="{{ url('listpassport/visa/delete/' .$dp['kegiatan_id'].'/'. $dp['negara_id']. '/'. $dp['nomor_passport'] . '/' . $dp['tim_kegiatan']) }}"
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
