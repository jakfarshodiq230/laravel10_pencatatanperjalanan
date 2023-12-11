<?php

namespace App\Http\Controllers;

use App\Models\kegiatan;
use App\Models\passport;
use App\Models\negara;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class listPassportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $datapassport = passport::get();
        $datakegiatan = kegiatan::with('negara')->get();

        $datanegara = negara::get();
        // $datapegawai = Pegawai::where('status', 'Not Used')->get();
        
        return view('list_of_passport.listpassport', compact('datakegiatan', 'datapassport', 'datanegara'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'no_passport' => $request->no_passport,
            'nama_perjalanan' => $request->nama_perjalanan,
            'negara_id' => $request->negara_id,
            'kota_tujuan' => $request->kota_tujuan,
            'tgl_keberangkatan' => $request->tgl_keberangkatan,
            'tgl_pulang' => $request->tgl_pulang,
        ];
        kegiatan::create($data);
        return redirect('listpassport');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = kegiatan::find($id)->first();
        $edit->get();
        return view('list_of_passport.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'nama_perjalanan' => $request->nama_perjalanan,
            'tujuan' => $request->tujuan,
            'tgl_keberangkatan' => $request->tgl_keberangkatan,
            'tgl_pulang' => $request->tgl_pulang,
            'pegawai_nip' => $request->pegawai_nip
        ];
        $data = kegiatan::find($id)->update($data);
        return redirect('listpassport');
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
        $post = kegiatan::find($id);
        $post->delete();
        return redirect('listpassport')->with('success', 'Data telah dihapus');
    }
}
