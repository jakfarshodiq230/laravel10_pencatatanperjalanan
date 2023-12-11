<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\pegawai;
use App\Models\passport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class passportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datapassports = Passport::with('pegawai')->orderBy('no_passport', 'asc')->get();

        foreach ($datapassports as $passport) {
            $passport->status = $this->getStatus($passport->no_passport);
        }

        return view('passport.datapassport', compact('datapassports'));
    }

    public function getStatus($noPassport)
    {
        $statuspassport = Passport::where('no_passport', $noPassport)->first();

        if ($statuspassport) {
            $tglBerlaku = Carbon::createFromFormat('Y-m-d', $statuspassport->tgl_berlaku);
            $today = Carbon::today();

            $expiredDate = $tglBerlaku->subMonths(7);

            if ($today->gt($expiredDate)) {
                return 'Expired';
            } else {
                return 'Aktif';
            }
        }

        return 'Passport tidak ditemukan';
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datapegawai = pegawai::get();
        // $datapegawai = Pegawai::where('status', 'Not Used')->get();
        $usedNIPs = Passport::pluck('pegawai_nip')->all();
        $datapegawai = $datapegawai->reject(function ($pegawai) use ($usedNIPs) {
            return in_array($pegawai->nip, $usedNIPs);
        });
        return view('passport.tambah', compact('datapegawai'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = [
            'scan_passport' => $request->scan_passport,
            'no_passport' => $request->no_passport,
            'pegawai_nip' => $request->pegawai_nip,
            'tgl_pembuatan' => $request->tgl_pembuatan,
            'tgl_berlaku' => $request->tgl_berlaku,
        ];
        if ($request->file('scan_passport')) {
            $data['scan_passport'] = $request->file('scan_passport')->store('Scan-Passport');
        }
        passport::create($data);
        return redirect('passport');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        // dd($id);
        $Passport = passport::where('no_passport', $id)->first();    
        $passport ='';
        if($request->file('scan_passport_baru') != null){
            Storage::delete($Passport->scan_passport);
            $passport = $request->file('scan_passport_baru')->store('Scan-Passport');
        }else{
            $passport = $request->lama_scan_passport;
        }

        $data =[
            'tgl_pembuatan' => $request->tgl_pembuatan,
            'tgl_berlaku' => $request->tgl_berlaku,
            'scan_passport' => $passport,
        ];
        passport::where('no_passport', $id)->update($data);
        return redirect('passport');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = passport::where('no_passport', $id)->first();
        $edit->get();
        return view('passport.edit', compact('edit'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $post = passport::where('no_passport', $id)->delete();
        return redirect('passport')->with('success', 'Data telah dihapus');
    }
}
