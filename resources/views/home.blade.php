@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
<div class="container px-4 mt-5">
    <!-- DataTales Example -->
    <div class="row card-container">
        <div class="col-md-4">
            <!-- Dashboard example card 1-->
            <a class="card lift">
                <div class="information-card card-body d-flex justify-content-center flex-column p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <img class="img-info" src="{{ asset('img/passportavailable.png') }}" alt="">
                        </div>
                        <div class="col-md-6">
                            <p class="">Total data Passport</p>
                            <h1>{{ $totalDatapassport }}</h1>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a class="card lift">
                <div class="information-card card-body d-flex justify-content-center flex-column p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <img class="img-info" src="{{ asset('img/passportexpire.png') }}" alt="">
                        </div>
                        <div class="col-md-6">
                            <p class="">Total Passport Expired</p>
                            <h1>
                                <?php
                                $expiredCount = 0;
                                ?>
                                @foreach ($datapasport as $passport)
                                <?php
                                    if ($passport->status === 'Expired') {
                                        $expiredCount++;
                                    }
                                    ?>
                                @endforeach
                                {{ $expiredCount }}
                            </h1>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a class="card lift">
                <div class="information-card card-body d-flex justify-content-center flex-column p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <img class="img-info" src="{{ asset('img/travelaround.png') }}" alt="">
                        </div>
                        <div class="col-md-6">
                            <p class="">Total Kegiatan</p>
                            <h1>{{ $totalDatakegiatan }}</h1>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="card mb-4" style="margin-top: -5px;">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">Tabel Passport Expired</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-responsive w-100">
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
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $nomor = 0;
                        ?>
                        @foreach ($datapasport as $dp)
                        <?php $nomor++;
                        ?>
                        @if ($dp->status == 'Expired')

                        <tr>
                            <td>{{ $nomor }}</td>
                            <td>{{ $dp->pegawai->nama }}</td>
                            <td>
                                <img class="object-fit-cover mb-2" src="{{ asset('storage/'. $dp->pegawai->foto) }}" alt="foto"
                                    height="118px" width="88px">
                            </td>
                            <td>{{ $dp->no_passport }}</td>
                            <td>
                                <img class="mb-2" src="{{ asset('storage/' . $dp->scan_passport) }}" alt="foto"
                                height="100px" width="200px">
                            </td>
                            <td>{{ $dp->tgl_pembuatan }}</td>
                            <td>{{ $dp->tgl_berlaku }}</td>
                            <td>{{ $dp->status }}</td>
                        </tr>
                        @endif

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection