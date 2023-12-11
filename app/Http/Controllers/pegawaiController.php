<?php

namespace App\Http\Controllers;

use App\Models\pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
// library Export excel
use PhpOffice\PhpSpreadsheet;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\writer\Xlsx;
// lib pdf tcpdf
use Elibyy\TCPDF\Facades\TCPDF;
class pegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datapegawai = pegawai::all();
        // ddd($datapegawai);
        return view('pegawai.datapegawai', compact('datapegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'image'
        ]);

        
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');

            if ($foto->isValid()) {
                // Use Carbon to format the current date and time
                $fotoDate = Carbon::now()->format('Y-m-d');
                $fotoExtension = $foto->getClientOriginalExtension(); // Get the file extension

                // Generate a unique name for the file using timestamp + extension
                $fotoName = 'foto_' .$fotoDate .'_'. $request->nip.'.' . $fotoExtension;

                // Store the file in the specified directory (in this case, 'Foto-Pegawai')
                $fotoPath = $foto->storeAs('Foto-Pegawai', $fotoName);
            } else {
                return redirect()->back()->with('error', 'File foto tidak valid.');
            }
        }

        if ($request->file('scan_kk')) {
            $scan_kk = $request->file('scan_kk')->store('Scan-KK');
        }
        if ($request->file('scan_ktp')) {
            $scan_ktp = $request->file('scan_ktp')->store('Scan-KTP');
        }
        $data = [
            'nip' => $request->nip,
            'nama' => $request->nama,
            'foto' => $fotoPath,
            'nik' => $request->nik,
            'scan_kk' => $scan_kk,
            'scan_ktp' => $scan_ktp,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'golongan_darah' => $request->golongan_darah,
            'alamat' => $request->alamat,
            'agama' => $request->agama,
            'status_perkawinan' => $request->status_perkawinan,
            'pekerjaan' => $request->pekerjaan,
            'no_hp' => $request->no_hp,
            'kewarganegaraan' => $request->kewarganegaraan
        ];
        pegawai::create($data);
        return redirect('pegawai');
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
        $edit = pegawai::where('nip', $id)->first();
        $edit->get();
        return view('pegawai.edit', compact('edit'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        //dd($request);
        $foto = '';
        $scan_kk = '';
        $scan_ktp = '';
        $Pegawai = pegawai::where('nip', $id)->first();
        if ($request->file('foto') != null) {
            Storage::delete($Pegawai->foto);
            // Perbarui data Pegawai
            $fotoDate = Carbon::now()->format('Y-m-d');
            $fotoExtension = $request->file('foto')->getClientOriginalExtension(); // Get the file extension

            // Generate a unique name for the file using timestamp + extension
            $fotoName = 'foto_' . $fotoDate . '_'. $request->nip.'.' . $fotoExtension;

            // Store the file in the specified directory (in this case, 'Foto-Pegawai')
            $fotoPath = $request->file('foto')->storeAs('Foto-Pegawai', $fotoName);

            $foto = $fotoPath;
        } else {
            $foto = $request->foto_lama;
        }

        if ($request->file('scan_kk') != null) {
            Storage::delete($Pegawai->scan_kk);
            $scan_kk = $request->file('scan_kk')->store('Scan-KK');
        } else {
            $scan_kk = $request->scan_kk_lama;
        }

        if ($request->file('scan_ktp') != null) {
            Storage::delete($Pegawai->scan_ktp);
            $scan_ktp = $request->file('scan_ktp')->store('Scan-KK');
        } else {
            $scan_ktp = $request->scan_ktp_lama;
        }
        $data = [
            'foto' => $foto,
            'nip' => $request->nip,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'scan_kk' => $scan_kk,
            'scan_ktp' => $scan_ktp,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'golongan_darah' => $request->golongan_darah,
            'alamat' => $request->alamat,
            'agama' => $request->agama,
            'status_perkawinan' => $request->status_perkawinan,
            'pekerjaan' => $request->pekerjaan,
            'kewarganegaraan' => $request->kewarganegaraan,
        ];
        $data = pegawai::where('nip', $id)->update($data);
        return redirect('pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Ambil data pegawai berdasarkan nip
        $pegawai = pegawai::where('nip', $id)->first();
        // dd($pegawai);
        $pegawai->where('nip', $id)->delete();
        return redirect('pegawai')->with('success', 'Data telah dihapus');
    }

    public function export() {
        $spreadsheet = new Spreadsheet();
        $pegawai = pegawai::all();

        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'NIP')
                    ->setCellValue('B1', 'NIK')
                    ->setCellValue('C1', 'NAMA')
                    ->setCellValue('D1', 'TEMPAT LAHIR')
                    ->setCellValue('E1', 'TANGGAL LAHIR');

        $column = 2;
        
        foreach ($pegawai as $rowpegawai) {
            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $column, $rowpegawai['nip'] )
                        ->setCellValue('B' . $column, $rowpegawai['nik'] )
                        ->setCellValue('C' . $column, $rowpegawai['nama'] )
                        ->setCellValue('D' . $column, $rowpegawai['tempat_lahir'] )
                        ->setCellValue('E' . $column, $rowpegawai['tgl_lahir'] );
            $column++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'data_pegawai';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheethtml.sheet');
        header('Content-Disposition: attachment;filename='.$filename.'.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function cetak_pdf() 
    {
    	$filename = 'data_pegawai.pdf';

    	$data = [
    		'title' => 'Hello world!',
            'datapegawai' => pegawai::all(),
    	];

    	$view = \View::make('pegawai.cetak_pdf', $data);
        $html = $view->render();
        $datapegawai = pegawai::all();
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
