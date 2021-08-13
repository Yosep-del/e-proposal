<?php

namespace App\Http\Controllers;

use App\Models\Lpj;
use App\Models\pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\proposal;
use App\Models\rincianKegiatan;

use Illuminate\Support\Facades\Storage;

use DB;
use PDF;
use Alert;

class lpjController extends Controller{
    
    public function insertdatalpj(Request $request)
    {
        //dd(request()->all());
        
        $proposal_id = request('proposalID');

        //$lpj_id = request('lpjID');
        $link_Survey = request('link_Survey');
        $foto1= request('linkFoto1');
        $foto2= request('linkFoto2');
        $foto3= request('linkFoto3');
        //$foto1 = Storage::putFile('public',request()->file('linkFoto1')->path());
        //$foto2 = Storage::putFile('public',request()->file('linkFoto2')->path());
        //$foto3 = Storage::putFile('public',request()->file('linkFoto3')->path());
        $subtotal = 0;
        $data = $request->input();
        
        $peng = $data['Pengeluaran'];
        $harg = $data['Hargalpj'];
        $satu = $data['Satuanlpj'];
        $sumber = request('sumberdana');
        
        $templpj = $data['TempatLPJ'];
        $wmlpj = $data['Waktu_mulaiLPJ'];
        $wslpj = $data['Waktu_selesaiLPJ'];
        $keglpj = $data['KegiatanLPJ'];
        $id = DB::table('lpj')->where('proposalID', $proposal_id)->pluck('lpjID');
        //$nama_kegiatan_p = request('namaKegiatan');
        // DB::insert('insert into lpj(proposalID,linkSurvey,linkFoto1,linkFoto2,linkFoto3,saldo,approvedbyRomo,approvedbyKabid) values (?,?,?,?,?,?,?,?)'
        // ,[$proposal_id,$link_Survey,$foto1,$foto2,$foto3,$subtotal,0,0]); 
    
        // $et;
        // foreach($id as $aidi){
        //     $et = $aidi;
        // }
       

        // foreach($data['KegiatanLPJ'] as $kegi => $value){
        
        //     DB::insert('insert into rinciankegiatanlpj(lpjID,rincianDeskripsiLPJ,tempatLPJ,waktuMulaiLPJ,waktuSelesaiLPJ) values (?,?,?,?,?)'
        //  ,[$et,$keglpj[$kegi],$templpj[$kegi],$wmlpj[$kegi],$wslpj[$kegi]]);
        
        // }
       
        // foreach($data['Pengeluaran'] as $sats => $value){
        //     DB::insert('insert into pengeluaranlpj (lpjID,pengeluaranDeskripsi,hargaSatuan,kuantitas,sumberID) values (?,?,?,?,?)'
        //  ,[$et,$peng[$sats],$harg[$sats],$satu[$sats],$sumber]);
         
        // }

        foreach(request('Subtotallpj') as $row)
        {
            $subtotal = $subtotal + $row;
        }


        $data = [
            'proposalID' => $proposal_id, 
            'linkSurvey' => $link_Survey, 
            'linkFoto1' => $foto1, 
            'linkFoto2' => $foto2, 
            'linkFoto3' => $foto3, 
            'saldo' => $subtotal,

            'approvedbyRomo' => 0, 
            'approvedbyKabid' => 0,
             
        ];
        $lpj = Lpj::create($data);
        
        $data = [
            'lpjID' => $lpj->id,
            'rincianDeskripsiLPJ' => $keglpj,
            'tempatLPJ' => $templpj,
            'waktuMulaiLPJ' => $wmlpj,
            'waktuSelesaiLPJ' => $wslpj,             
        ];
        foreach($keglpj as $index => $row)
        {
            $data['rincianDeskripsiLPJ'] = $row;
            $data['tempatLPJ'] = $templpj[$index];
            $data['waktuMulaiLPJ'] = $wmlpj[$index];
            $data['waktuSelesaiLPJ'] = $wslpj[$index];

            $rincian = rincianKegiatan::create($data);
        }
        
        $data = [
            'lpjID' => $lpj->id,
            'pengeluaranDeskripsi' => $peng,
            'hargaSatuan' => $harg,
            'kuantitas' => $satu,
            'sumberID' => $sumber, 
        ];  
        foreach($peng as $index => $row)
        {
            $data['pengeluaranDeskripsi'] = $row;
            $data['hargaSatuan'] = $harg[$index];
            $data['kuantitas'] = $satu[$index];
            $data['sumberID'] = $sumber[$index];

            pengeluaran::create($data);
        }
            
            

        return redirect()->back()->with('success','Data Sudah Masuk');
        
    }
    public function index(){
        // $username = $user;
        // echo $user;

        //ambil data dari table proposal
        $data = DB::table('proposal')->get();
        //kirim data ke view
        return view('LPJ.listLPJ',['data'=>$data]);

        // @foreach ($username as $user)
        //     {{ $user->username }}
        // @endforeach
    }
    public function showallproposal(){
        $nameapproval = DB::table('proposal')->where('approvedbyRomo', 1)->pluck('namaKegiatan');
        $proposal = "Proposal yang belum di Approved";
        // $nameapproved = DB::table('proposal')->pluck('nama_kegiatan');        
        return view('listproposal',compact('nameapproval','proposal')); 
    }
    
    function pdf(){
        $pdf = PDF::loadView('approved');
        return $pdf->stream();
    }

    // TAMBAHAN DARI RAYMOND
    // TAMBAHAN DARI RAYMOND
    // TAMBAHAN DARI RAYMOND
    
    public function create(){
        return view('LPJ.createLPJ');
    }

    public function store(Request $request){
        // untuk validasi form
        $this -> validate($request, [
            'jenisProposal' => 'required',
            'namaKegiatan' => 'required',
            'nomorRAPB' => 'required',
            'namaPJ' => 'required',
            'rekening' => 'required',
            'bank' => 'required',
            'no_hp' => 'required',
            'sasaranStrategis' => 'required',
            'tanggalUpdate' => 'required'
        ]);
        // insert data ke table books
        DB::table('proposal') -> insert([
            'jenisProposal' => $request -> jenis,
            'namaKegiatan' => $request -> name,
            'nomorRAPB' => $request -> nomor,
            'namaPJ' => $request -> namaPJ,
            'rekening' => $request -> rekening,
            'bank' => $request -> bank,
            'no_hp' => $request -> nomorHP,
            'sasaranStrategis' => $request -> sasaran,
            'tanggalUpdate' => $request -> date
        ]);
    // alihkan halaman tambah buku ke halaman books
    return redirect('/listLPJ') -> with('status', 'Data LPJ Berhasil Ditambahkan');

    }//end func store


    public function edit($id){
        // mengambil data books berdasarkan id yang dipilih
        $dataData = DB::table('proposal')->where('proposalID',$id)->first();
        // passing data books yang didapat ke view edit.blade.php
        return view('LPJ.editlpj', compact('dataData'));
    }

    public function update(Request $request){
        $this -> validate($request, [
            'jenisProposal' => 'required',
            'namaKegiatan' => 'required',
            'nomorRAPB' => 'required',
            'namaPJ' => 'required',
            'rekening' => 'required',
            'bank' => 'required',
            'no_hp' => 'required',
            'sasaranStrategis' => 'required',
            'tanggalUpdate' => 'required'
        ]);

        DB::table('proposal') -> where('proposalID, $request -> id')->update    ([
            'jenisProposal' => $request -> jenis,
            'namaKegiatan' => $request -> name,
            'nomorRAPB' => $request -> nomor,
            'namaPJ' => $request -> namaPJ,
            'rekening' => $request -> rekening,
            'bank' => $request -> bank,
            'no_hp' => $request -> nomorHP,
            'sasaranStrategis' => $request -> sasaran,
            'tanggalUpdate' => $request -> date
        ]);

        return redirect('/listLPJ') -> with('status', 'Data Buku Berhasil DiUbah');

    }

    public function destroy($id){
        DB::table('proposal') -> where('proposalID', $id) -> delete();
        return redirect('/listLPJ') -> with('status', 'Data Buku Berhasil DiHapus');
    }

    public function lpjpdf(){
        $lpj = LPJpdf::all();
        return view('LPJPrintpdf.lpjpdf',['lpj'=>$lpj]);
    }

    public function cetak_pdf(){
        $lpj = LPJpdf::all(); //ini funcion untuk manggil model

        $pdf = PDF::loadview('LPJPrintPDF.lpj_pdf',['lpj'=>$lpj]);
        return $pdf->download('LaporanLPJ');
    }

    public function approved(){
        $lpj = LPJpdf::all();
        return view('LPJPrintpdf.listLPJapproved',['lpj'=>$lpj]);
    }
} // end lpjController 

