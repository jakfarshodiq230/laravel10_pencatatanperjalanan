<?php

namespace App\Http\Controllers;

use App\Models\kegiatan;
use Illuminate\Http\Request;
use App\Models\pegawai;
use App\Models\passport;
use Carbon\Carbon;

class dashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $datapasport = Passport::orderBy('tgl_pembuatan', 'asc')->paginate(10);
        $datapegawai = Pegawai::orderBy('nama', 'asc')->paginate(10);
        $totalDatapassport = Passport::count();
        $totalDatakegiatan = kegiatan::count();

        // Menambahkan status ke setiap data paspor
        foreach ($datapasport as $passport) {
            $passport->status = $this->getStatus($passport->no_passport);
        }

        return view('home', compact('datapasport', 'datapegawai', 'totalDatapassport', 'totalDatakegiatan'));
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
}
