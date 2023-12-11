<!-- edit-personil.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">


                    @if ($Ktr == 'edit')
                        <form id="update" action="{{ url('listpassport/personil/update-visa') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="passportID" value="{{ $personil->passport_id }}">
                            <input type="hidden" name="kegiatanID" value="{{ $personil->kegiatan_id }}">
                            <input type="hidden" name="tim_kegiatan_visa" value="{{ $personil->tim_kegiatan}}">

                            <div class="form-group">
                                <label for="scan_visa">ID VISA </label>
                                <input type="text" class="form-control" name="id_visa" id="id_visa" value="{{ $visa->id }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="scan_visa">Nama Pegawai </label>
                                <input type="text" class="form-control" value="{{ $personil->passport->pegawai->nama }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="scan_visa">Nama Kegiatan </label>
                                <input type="text" class="form-control" value="{{ $personil->kegiatan->nama_perjalanan }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="scan_visa">Negara Tujuan</label>
                                <input type="text" class="form-control" value="{{ $personil->kegiatan->negara->nama_negara }}" readonly>
                                <input type="hidden" class="form-control" id="negara_id" name="negara_id" value="{{ $personil->kegiatan->negara->id_negara }}">
                            </div>

                            <div class="form-group">
                                <label for="scan_visa">Scan Visa</label>
                                <input type="file" class="form-control" id="scan_visa" name="scan_visa" >
                                <input type="hidden" class="form-control" id="scan_visa_lama" name="scan_visa_lama" value="{{ $visa->scan_visa }}">
                            </div>
                            <div class="form-group">
                                <label for="scan_exitpermit">Scan Exit Permit</label>
                                <input type="file" class="form-control" id="scan_exitpermit" name="scan_exitpermit" >
                                <input type="hidden" class="form-control" id="scan_exitpermit_lama" name="scan_exitpermit_lama" value="{{ $visa->scan_exitpermit }}">
                            </div>
                            <div class="form-group">
                                <label for="scan_vaksin_update">Scan Vaksin</label>
                                <input type="file" class="form-control" id="scan_vaksin_update" name="scan_vaksin_update" >
                                <input type="hidden" class="form-control" id="scan_vaksin_lama_update" name="scan_vaksin_lama_update" value="{{ $visa->scan_vaksin }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Update Visa</button>
                        </form>
                    @else
                        <form id="update" action="{{ url('listpassport/personil/store-visa')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="passportID" value="{{ $personil->passport_id }}">
                            <input type="hidden" name="kegiatanID" value="{{ $personil->kegiatan_id }}">
                            <input type="hidden" name="tim_kegiatan_visa" value="{{ $personil->tim_kegiatan}}">

                            <div class="form-group">
                                <label for="scan_visa">Nama Kegiatan </label>
                                <input type="text" class="form-control" value="{{ $personil->kegiatan->nama_perjalanan }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="scan_visa">Negara Tujuan</label>
                                <input type="text" class="form-control" value="{{ $personil->kegiatan->negara->nama_negara }}" readonly>
                                <input type="hidden" class="form-control" id="negara_id" name="negara_id" value="{{ $personil->kegiatan->negara->id_negara }}">
                            </div>

                            <div class="form-group">
                                <label for="scan_visa">Scan Visa</label>
                                <input type="file" class="form-control" id="scan_visa" name="scan_visa" >
                            </div>
                            <div class="form-group">
                                <label for="scan_exitpermit">Scan Exit Permit</label>
                                <input type="file" class="form-control" id="scan_exitpermit" name="scan_exitpermit" >
                            </div>
                            <div class="form-group">
                                <label for="scan_vaksin">Scan Vaksin</label>
                                <input type="file" class="form-control" id="scan_vaksin" name="scan_vaksin" >
                            </div>
                            <button type="submit" class="btn btn-primary">Update Visa</button>
                        </form>
                    @endif
                  
            </div>
        </div>
    </div>
@endsection
