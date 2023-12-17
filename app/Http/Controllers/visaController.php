<?php

namespace App\Http\Controllers;

use App\Models\maingroup;
use App\Models\personil;
use App\Models\visa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Carbon;

class visaController extends Controller
{
    public function addVisa($idKegiatan, $idNegara, $idPassport, $type)
    {

        // Temukan data personil berdasarkan ID

        if ($type == 'group') {
            $personil = maingroup::where('negara_id', $idNegara)->where('kegiatan_id', $idKegiatan)->where('passport_id', $idPassport)->where('tim_kegiatan', $type)->first();
        } else {
            $personil = personil::where('negara_id', $idNegara)->where('kegiatan_id', $idKegiatan)->where('passport_id', $idPassport)->where('tim_kegiatan', $type)->first();
        }

        // Periksa apakah Visa sudah ada atau tidak
        $visa = Visa::where('negara_id', $idNegara)->where('id_kegiatan', $idKegiatan)->where('passport_id', $idPassport)->where('tim_kegiatan_visa', $type)->first();
        $Ktr = "add";
        return view('list_of_passport.edit-visa', compact('personil', 'visa', 'Ktr'));
    }

    public function storeVisa(Request $request)
    {

        //dd($request);
        //Simpan data Visa ke dalam database
        $scan_visa = '';
        $scan_exitpermit = '';
        $scan_vaksin = '';
        if ($request->file('scan_visa') != null) {
            // Perbarui data Visa
            $fotoDate = Carbon::now()->format('Y-m-d-H-i-s');
            $fotoExtension = $request->file('scan_visa')->getClientOriginalExtension(); // Get the file extension
            // Generate a unique name for the file using timestamp + extension
            $fotoName = 'visa_' .$fotoDate .'_'. $request->nip.'.' . $fotoExtension;
            // Store the file in the specified directory (in this case, 'Foto-Pegawai')
            $scan_visa = $request->file('scan_visa')->storeAs('Scan-Visa', $fotoName);
        }

        if ($request->file('scan_exitpermit') != null) {
            // Perbarui data Visa
            $fotoDate = Carbon::now()->format('Y-m-d-H-i-s');
            $fotoExtension = $request->file('scan_exitpermit')->getClientOriginalExtension(); // Get the file extension
            // Generate a unique name for the file using timestamp + extension
            $fotoName = 'exitPermit_' .$fotoDate .'_'. $request->nip.'.' . $fotoExtension;
            // Store the file in the specified directory (in this case, 'Foto-Pegawai')
            $scan_exitpermit = $request->file('scan_exitpermit')->storeAs('Scan-ExitPermit', $fotoName);
        }

        if ($request->file('scan_vaksin') != null) {
            $fotoDate = Carbon::now()->format('Y-m-d-H-i-s');
            $fotoExtension = $request->file('scan_vaksin')->getClientOriginalExtension(); // Get the file extension
            // Generate a unique name for the file using timestamp + extension
            $fotoName = 'vaksin_' .$fotoDate .'_'. $request->nip.'.' . $fotoExtension;
            // Store the file in the specified directory (in this case, 'Foto-Pegawai')
            $scan_vaksin = $request->file('scan_vaksin')->storeAs('Scan-Vaksin', $fotoName);
        }
        Visa::create([
            'passport_id' => $request->passportID,
            'negara_id' => $request->negara_id,
            'scan_visa' => $scan_visa,
            'scan_exitpermit' => $scan_exitpermit,
            'scan_vaksin' => $scan_vaksin,
            'id_kegiatan' => $request->kegiatanID,
            'tim_kegiatan_visa' => $request->tim_kegiatan_visa,
        ]);
        Alert::success('Success', 'Berhasil Tambah Data');
        if ($request->tim_kegiatan_visa == "group") {
            return redirect('/listpassport/maingroup/' . $request->kegiatanID . '/' . $request->negara_id . '/' . $request->tim_kegiatan_visa);
        } else {
            return redirect('/listpassport/personil/' . $request->kegiatanID . '/' . $request->negara_id . '/' . $request->tim_kegiatan_visa);
        }
    }

    public function updateVisa(Request $request)
    {
        // Temukan data Visa berdasarkan ID personil
        //dd($request->file('scan_visa'));
        $visa_cek = visa::where('id', $request->id_visa)->first();
        //dd($visa_cek);
        if ($visa_cek != null) {
            // delete file
            $visa_update = visa::find($visa_cek->id);
            if ($request->file('scan_visa') != null) {
                //dd('tidak null');
                Storage::delete($visa_cek->scan_visa);
                // Perbarui data Visa
                $fotoDate = Carbon::now()->format('Y-m-d-H-i-s');
                $fotoExtension = $request->file('scan_visa')->getClientOriginalExtension(); // Get the file extension
                // Generate a unique name for the file using timestamp + extension
                $fotoName = 'visa_' .$fotoDate .'_'. $request->nip.'.' . $fotoExtension;
                // Store the file in the specified directory (in this case, 'Foto-Pegawai')
                $fotoPath = $request->file('scan_visa')->storeAs('Scan-Visa', $fotoName);
                $visa_update->update([
                    'scan_visa' => $fotoPath,
                ]);
            }

            if ($request->file('scan_exitpermit') != null) {
                Storage::delete($visa_cek->scan_exitpermit);
                // Perbarui data Visa
                $fotoDate = Carbon::now()->format('Y-m-d-H-i-s');
                $fotoExtension = $request->file('scan_exitpermit')->getClientOriginalExtension(); // Get the file extension
                // Generate a unique name for the file using timestamp + extension
                $fotoName = 'exitPermit_' .$fotoDate .'_'. $request->nip.'.' . $fotoExtension;
                // Store the file in the specified directory (in this case, 'Foto-Pegawai')
                $fotoPath = $request->file('scan_exitpermit')->storeAs('Scan-ExitPermit', $fotoName);
                $visa_update->update([
                    'scan_exitpermit' => $fotoPath,
                ]);
            }

            if ($request->file('scan_vaksin_update') != null) {
                Storage::delete($visa_cek->scan_vaksin_update);
                $fotoDate = Carbon::now()->format('Y-m-d-H-i-s');
                $fotoExtension = $request->file('scan_vaksin_update')->getClientOriginalExtension(); // Get the file extension
                // Generate a unique name for the file using timestamp + extension
                $fotoName = 'vaksin_' .$fotoDate .'_'. $request->nip.'.' . $fotoExtension;
                // Store the file in the specified directory (in this case, 'Foto-Pegawai')
                $fotoPath = $request->file('scan_vaksin_update')->storeAs('Scan-Vaksin', $fotoName);
                $visa_update->update([
                    'scan_vaksin' => $fotoPath,
                ]);
            }

            if ($request->tim_kegiatan_visa === "group") {
                Alert::success('Success', 'Berhasil Edit Data');
                return redirect('listpassport/maingroup/' . $request->kegiatanID . '/' . $request->negara_id . '/group');
            } else {
                Alert::success('Success', 'Berhasil Edit Data');
                return redirect('listpassport/personil/' . $request->kegiatanID . '/' . $request->negara_id . '/advance')
                    ->with('success', 'Data Visa berhasil diperbarui');
            }
        }
    }

    public function edit($idKegiatan, $idNegara, $idVisa, $type)
    {
        $visa = visa::where('negara_id', $idNegara)->where('id_kegiatan', $idKegiatan)->where('id', $idVisa)->first();
        //$personil = $visa;
        //dd($visa);
        if ($type == 'group') {
            $personil = maingroup::where('passport_id', $visa->passport_id)->where('kegiatan_id', $visa->id_kegiatan)->where('tim_kegiatan', $type)->first();
        }else{
            $personil = personil::where('passport_id', $visa->passport_id)->where('kegiatan_id', $visa->id_kegiatan)->where('tim_kegiatan', $type)->first();
        }
        $Ktr = "edit";
        return view('list_of_passport.edit-visa', compact('visa', 'personil', 'Ktr'));
    }

    public function hapusVISA($id_kegiatan,$negara,$idPassport, $group)
    {
        //dd($id_kegiatan);
        if ($group != "group") {
            $personil = personil::where('passport_id', $idPassport)->where('kegiatan_id', $id_kegiatan)->where('negara_id', $negara)->first();
            $Kegiatan = $personil->kegiatan_id;
            if (!empty($personil)) {
                $hapusPersonil = personil::where('passport_id', $idPassport)->where('kegiatan_id', $id_kegiatan)->where('negara_id', $negara)->delete();
                $visa = Visa::where('passport_id', $idPassport)->where('id_kegiatan', $id_kegiatan)->where('negara_id', $negara)->first();
                if (!empty($visa)) {
                    $hapusVisa = Visa::find($visa->id);
                    $hapusVisa->delete();
                    Storage::delete($visa->scan_visa);
                    Storage::delete($visa->scan_exitpermit);
                    Storage::delete($visa->scan_vaksin);
                }
                Alert::success('Success', 'Berhasil Hapus Data');
                return redirect('listpassport/personil/' . $id_kegiatan.'/'.$negara.'/'.$group);
            } else {
                Alert::error('error', 'Gagal Hapus Data');
                return redirect('listpassport/personil/' . $id_kegiatan.'/'.$negara.'/'.$group);
            }
        } else {
            $maingroup = maingroup::where('passport_id', $idPassport)->where('kegiatan_id', $id_kegiatan)->where('negara_id', $negara)->first();
            $Kegiatan = $maingroup->kegiatan_id;
            if (!empty($maingroup)) {
                $hapusMaingroup = maingroup::where('passport_id', $idPassport)->where('kegiatan_id', $id_kegiatan)->where('negara_id', $negara)->delete();
                $visa = Visa::where('passport_id', $idPassport)->where('id_kegiatan', $id_kegiatan)->where('negara_id', $negara)->first();
                if (!empty($visa)) {
                    $hapusVisa = Visa::find($visa->id);
                    $hapusVisa->delete();
                    Storage::delete($visa->scan_visa);
                    Storage::delete($visa->scan_exitpermit);
                    Storage::delete($visa->scan_vaksin);
                }
                Alert::success('Success', 'Berhasil Hapus Data');
                return redirect('listpassport/maingroup/' . $id_kegiatan.'/'.$negara.'/'.$group);
            } else {
                Alert::error('error', 'Gagal Hapus Data');
                return redirect('listpassport/maingroup/' . $id_kegiatan.'/'.$negara.'/'.$group);
            }
        }
    }
}
