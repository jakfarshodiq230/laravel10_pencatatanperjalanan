<?php

namespace App\Http\Controllers;

use App\Models\kegiatan;
use App\Models\maingroup;
use App\Models\passport;
use App\Models\personil;
use App\Models\visa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use RealRashid\SweetAlert\Facades\Alert;
// lib pdf tcpdf
use Elibyy\TCPDF\Facades\TCPDF;

class maingroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($idKegiatan, $idNegara, $type)
    {

        // $datamaingroup = maingroup::where('kegiatan_id', $idKegiatan)->where('negara_id', $idNegara)->where('tim_kegiatan', $type)->get();
        $datamaingroup = DB::table('passport')
            ->join('pegawai', 'pegawai.nip', '=', 'passport.pegawai_nip')
            ->join('maingroup', 'maingroup.passport_id', '=', 'passport.no_passport')
            ->where('kegiatan_id', $idKegiatan)->where('negara_id', $idNegara)->where('tim_kegiatan', $type)
            ->get();
        $datapassport = passport::get();
        // dd($datapassport[0]['no_passport']);
        $datakegiatan = kegiatan::where('id', $idKegiatan)->first();
        $dataVisa = visa::where('id_kegiatan', $idKegiatan)->where('negara_id', $idNegara)->where('tim_kegiatan_visa', $type)->get();
        // data maingroup visa
        $dataLengkap = array();
        foreach ($datamaingroup as $key => $maingroupData) {
            $visa_id = '';
            $scan_visa = "null";
            $scan_exitpermit = "null";
            $scan_vaksin = "null";
            $status_data = "tidak";
            foreach ($dataVisa as $visaData) {
                if ($datamaingroup[$key]->passport_id == $visaData['passport_id'] && $datamaingroup[$key]->negara_id == $visaData['negara_id'] && $datamaingroup[$key]->kegiatan_id == $visaData['id_kegiatan']) {
                    $visa_id = $visaData['id'];
                    $scan_visa = $visaData['scan_visa'];
                    $scan_exitpermit = $visaData['scan_exitpermit'];
                    $scan_vaksin = $visaData['scan_vaksin'];
                    $status_data = "ada";
                }
            }
            $dataLengkap[] = [
                'kegiatan_id' => $idKegiatan,
                'negara_id' => $idNegara,
                'passport_id' => $datamaingroup[$key]->passport_id,
                'visa_id' => $visa_id,
                'tim_kegiatan' => $datamaingroup[$key]->tim_kegiatan,
                'nama_pegawai' => $datamaingroup[$key]->nama,
                'foto_pegawai' => $datamaingroup[$key]->foto,
                'nomor_passport' => $datamaingroup[$key]->no_passport,
                'scan_passport' => $datamaingroup[$key]->scan_passport,
                'tgl_berlaku' => $datamaingroup[$key]->tgl_berlaku,
                'scan_visa' => $scan_visa,
                'scan_exitpermit' => $scan_exitpermit,
                'scan_vaksin' => $scan_vaksin,
                'status_data' => $status_data,
            ];
        }
        //dd($dataLengkap);
        $dataLengkap = $dataLengkap;
        //kode untuk menyeleksi data yang sudah di input agar tidak ada dalam pilihan input lagi
        $usedNoPassport = maingroup::where('kegiatan_id', $idKegiatan)->where('negara_id', $idNegara)->pluck('passport_id')->all();
        $datapassport = $datapassport->reject(function ($passport) use ($usedNoPassport) {
            return in_array($passport->no_passport, $usedNoPassport);
        });

        // Menambahkan status ke setiap data paspor
        foreach ($datamaingroup as $maingroup) {
            $maingroup->status = $this->getStatus($maingroup->passport_id);
        }

        $kegiatan = Kegiatan::findOrFail($idKegiatan);
        $personils = $kegiatan->personils;
        return view('list_of_passport.maingroup', compact('datapassport', 'datakegiatan', 'datamaingroup', 'kegiatan', 'personils', 'dataLengkap'));
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, Request $request)
    {
        $data = [
            'passport_id' => $request->passport_id,
            'kegiatan_id' => $id,
            'negara_id' => $request->negara_id,
            'tim_kegiatan' => $request->tim_kegiatan,
        ];
        maingroup::create($data);
        Alert::success('Success', 'Data Personil Berhasil Diinput');
        return redirect('/listpassport/maingroup/' . $id . '/' . $request->negara_id.'/'.$request->tim_kegiatan);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function export($id, Request $request)
    {

        $datapersonil = maingroup::where('kegiatan_id', $id)->where('negara_id', $request->idNegara)->get();
        $datavisa = visa::where('id_kegiatan', $id)->where('negara_id', $request->idNegara)->where('tim_kegiatan_visa', $request->jenis_kegiatan)->get();
        $timadvance_ada = [];
        $timadvance_tidak_ada = [];
        foreach ($datapersonil as $dp) {
            $found = false;
            foreach ($datavisa as $dv) {
                if (str_replace(' ', '', $dp->passport_id) === str_replace(' ', '', $dv->passport_id)) {
                    $passport = $dp->passport->scan_passport;
                    $scan_visa = $dp->passport->visa->scan_visa;
                    $scan_exitpermit = $dp->passport->visa->scan_exitpermit;
                    $scan_vaksin = $dp->passport->visa->scan_vaksin;
                    
                    $timadvance_ada[] = [
                        'nama' => $dp->passport->pegawai->nama,
                        'nip' => $dp->passport->pegawai->nip,
                        'nik' => $dp->passport->pegawai->nik,
                        'jenis_kelamin' => $dp->passport->pegawai->jenis_kelamin,
                        'no_hp' => $dp->passport->pegawai->no_hp,
                        'nomor_passport' => str_replace(' ', '', $dp->passport->no_passport),
                        'nama_perjalanan' => $dp->kegiatan->nama_perjalanan,
                        'foto' => $dp->passport->pegawai->foto,
                        'scan_passport' => $passport,
                        'scan_visa' => $scan_visa,
                        'scan_exitpermit' => $scan_exitpermit,
                        'scan_vaksin' => $scan_vaksin,
                    ];
                    
                    $found = true;
                    break; // Once a match is found, exit the inner loop
                }
            }
            
            if (!$found) {
                // Handle the case where no match is found for $dp
                $timadvance_tidak_ada[] = [
                    'nama' => $dp->passport->pegawai->nama,
                    'nip' => $dp->passport->pegawai->nip,
                    'nik' => $dp->passport->pegawai->nik,
                    'jenis_kelamin' => $dp->passport->pegawai->jenis_kelamin,
                    'no_hp' => $dp->passport->pegawai->no_hp,
                    'nomor_passport' => str_replace(' ', '', $dp->passport->no_passport),
                    'nama_perjalanan' => $dp->kegiatan->nama_perjalanan,
                    'foto' => $dp->passport->pegawai->foto,
                    'scan_passport' => null,
                    'scan_visa' => null,
                    'scan_exitpermit' => null,
                    'scan_vaksin' => null,
                ];
            }
        }

        if($request->excel == 'excel'){
            $spreadsheet = new Spreadsheet();
            $status = $request->status_visa;
            if ($status == 'ada-visa') {
                $maingroup = $timadvance_ada;
                $filename = 'data_perjalanan_ada_visa_MAINGROUP';
            } else {
                $maingroup = $timadvance_tidak_ada;
                $filename = 'data_perjalanan_tidak_ada_MAINGROUP';
            }
            // dd($maingroup);
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A1', 'NAMA')
                ->setCellValue('B1', 'NIP')
                ->setCellValue('C1', 'NIK')
                ->setCellValue('D1', 'JENIS KELAMIN')
                ->setCellValue('E1', 'NOMOR HP')
                ->setCellValue('F1', 'NO PASSPORT')
                ->setCellValue('G1', 'NAMA KEGIATAN');

            $column = 2;

            foreach ($maingroup as $row) {
                // print_r($row->nama);
                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A' . $column, $row['nama'])
                    ->setCellValue('B' . $column, $row['nip'])
                    ->setCellValue('C' . $column, $row['nik'])
                    ->setCellValue('D' . $column, $row['jenis_kelamin'])
                    ->setCellValue('E' . $column, $row['no_hp'])
                    ->setCellValue('F' . $column, $row['nomor_passport'])
                    ->setCellValue('G' . $column, $row['nama_perjalanan']);
                $column++;
            }

            $writer = new Xlsx($spreadsheet);
            
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheethtml.sheet');
            header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        }else{
            $status = $request->status_visa;          
            $judul ='';

            if ($status == 'ada-visa') {
                $judul ='TIM MAIN GROUP ADA VISA';
                $filename = 'data_maingroup_ada_visa.pdf';
                $data = [
                    'judul' => $judul,
                    'timadvance' => $timadvance_ada,
                ];
            } else {
                $judul ='TIM MAIN GROUP TIDAK ADA VISA';
                $filename = 'data_maingroup_tidak_ada_visa.pdf';
                $data = [
                    'judul' => $judul,
                    'timadvance' => $timadvance_tidak_ada,
                ];
            }

            
            $view = \View::make('list_of_passport.cetak_pdf_maingroup', $data);
            $html = $view->render();
            $pdf = new TCPDF;
            //$pdf::changeFormat('A4');
            $pdf::SetTitle('Data Pegawai');
            // PDF::AddPage($orientation,[$width,$height]);
            $pdf::AddPage('L',[210,330]);
            $pdf::writeHTML($html, true, false, true, false, '');

            $pdf::Output(public_path($filename), 'F');

            return response()->download(public_path($filename));
        }
    }
}
