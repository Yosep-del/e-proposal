<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\proposal;


use DB;
use PDF;
use Alert;

class ProposalController extends Controller
{
 
    public function insertdata(Request $request){
        $bidang_p = $request->bidangs;
        $kelompok_p = $request->kelompok;
        $username = $request->input('username');
        $nama_kegiatan_p = $request->input('nama_kegiatan');
        $no_rapb_rai_p = $request->input('no_rapb_rai');
        $sasaran_p = $request->input('sasaran');
        $judul= $request->input('judulproposal');
        $bank_p = "bri";
        $nama = $request->input('nama');
        $nik = $request->input('nik');
        $no_rekening= $request->input('no_rekening');
        $no_wa = $request->input('no_wa');
        $approvedbyKabid = 0;
        $approvedbyRomo = 0;
        $idpengaju = DB::table('userproposal')->where('username', $username)->get();
        $date = date('Y-m-d');
        $role =  DB::table('userproposal')->where('username', $username)->pluck('role');
        $namausername= DB::table('userproposal')->where('username', $username)->pluck('Nama');
        foreach($idpengaju as $idpengajus)
        $idpengaju_p =  $idpengajus->userID;
         DB::insert('insert into proposal(bidangID,timpelID,jenisProposal, namaKegiatan,nomorRAPB,namaPJ,NIKPJ, rekening, bank, no_hp,sasaranStrategis,katimpelApprover,approvedbyKabid,approvedbyRomo, tanggalUpdate) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)'
         ,[$bidang_p, $kelompok_p, $judul, $nama_kegiatan_p, $no_rapb_rai_p,$nama,$nik ,$no_rekening, $bank_p, $no_wa, $sasaran_p,$idpengaju_p, 0, 0,$date]);
         
         $id = DB::table('proposal')->where('namaKegiatan', $nama_kegiatan_p)->pluck('proposalID');
         
        
         $data = $request->input();
         $keps = $data['Keperluan'];
         $hargs = $data['Harga'];
         $sats = $data['Satuan'];
         $jums = $data['Jumlah'];
         $sub = $data['Subtotal'];
         $sumber = $request->sumberdana;
         
         $temps = $data['Tempat'];
         $wm = $data['Waktu_mulai'];
         $ws = $data['Waktu_selesai'];
         $kegs = $data['Kegiatan'];

         $ind = $data['Indikator'];
         $tar = $data['Target'];

         

         $et;
         foreach($id as $aidi){
             $et = $aidi;
         }
         foreach($data['Keperluan'] as $sat => $value){
            DB::insert('insert into anggaran(proposalID,anggaranDeskripsi,hargaSatuan,kuantitas,satuan,subtotal,sumberID) values (?,?,?,?,?,?,?)'
         ,[$et,$keps[$sat],$hargs[$sat],$sats[$sat],$jums[$sat],$sub[$sat],$sumber[$sat]]);
         
        }

         foreach($data['Kegiatan'] as $keg => $value){
        
            DB::insert('insert into rinciankegiatanproposal(proposalID,rincianDeskripsi,tempat,waktuMulai,waktuSelesai) values (?,?,?,?,?)'
         ,[$et,$kegs[$keg],$temps[$keg],$wm[$keg],$ws[$keg]]);
        
        }

        foreach($data['Indikator'] as $inds => $value){
            DB::insert('insert into indikatortarget(proposalID,indikatorDeskripsi,target) values (?,?,?)'
         ,[$et,$ind[$inds],$tar[$inds]]);
         
        }
        

        
        if($role=='["Romo"]'){ 
            Alert::success('Sukses','Proposal berhasil Diajukan !!');
            return view('v_home_romo',compact('username','namausername'));
        }
        else if($role=='["Kabid"]'){ 
            Alert::success('Sukses','Proposal berhasil Diajukan !!');
            return view('v_home_kabid',compact('username','namausername'));
        }
        else if($role=='["Katimpel"]'){ 
            Alert::success('Sukses','Proposal berhasil Diajukan !!');
            return view('v_home_katimpel',compact('username','namausername'));
        }
        
    }
    public function editproposal(Request $request){
        $id = $request->input('proposalID');
        $bidang_p = $request->bidangs;
        $kelompok_p = $request->kelompok;
        $username = $request->input('usernames');
        $nama_kegiatan_p = $request->input('nama_kegiatan');
        $no_rapb_rai_p = $request->input('no_rapb_rai');
        $sasaran_p = $request->input('sasaran');
        $judul= $request->input('judulproposal');
        $bank_p = "bri";
        $nama = $request->input('nama');
        $nik = $request->input('nik');
        $no_rekening= $request->input('no_rekening');
        $no_wa = $request->input('no_wa');
        $approvedbyKabid = 0;
        $approvedbyRomo = 0;
        $idpengaju = DB::table('userproposal')->where('username', $username)->get();
        $date = date('Y-m-d');
        $role =  DB::table('userproposal')->where('username', $username)->pluck('role');
        $namausername = DB::table('userproposal')->where('username', $username)->pluck('Nama');
        foreach($idpengaju as $idpengajus)
        $idpengaju_p =  $idpengajus->userID;
        DB::update('update proposal set namaKegiatan = ? , namaPJ = ? , NIKPJ = ? , rekening=?, bank= ?, no_hp= ?, sasaranStrategis= ?, tanggalUpdate= ? where proposalID = ?',[$nama_kegiatan_p,$nama,$nik,$no_rekening,$bank_p,$no_wa,$sasaran_p, $date, $id]);
        DB::table('anggaran')->where('proposalID', '=', $id)->delete();
        DB::table('indikatortarget')->where('proposalID', '=', $id)->delete();
        DB::table('rinciankegiatanproposal')->where('proposalID', '=', $id)->delete();
         $data = $request->input();
         $keps = $data['Keperluan'];
         $hargs = $data['Harga'];
         $sats = $data['Satuan'];
         $jums = $data['Jumlah'];
         $sub = $data['Subtotal'];
         $sumber = $request->sumberdana;
         
         $temps = $data['Tempat'];
         $wm = $data['Waktu_mulai'];
         $ws = $data['Waktu_selesai'];
         $kegs = $data['Kegiatan'];

         $ind = $data['Indikator'];
         $tar = $data['Target'];

         

         $et=$id;

         foreach($data['Keperluan'] as $sat => $value){
            DB::insert('insert into anggaran(proposalID,anggaranDeskripsi,hargaSatuan,kuantitas,satuan,subtotal,sumberID) values (?,?,?,?,?,?,?)'
         ,[$et,$keps[$sat],$hargs[$sat],$sats[$sat],$jums[$sat],$sub[$sat],$sumber[$sat]]);
         
        }

         foreach($data['Kegiatan'] as $keg => $value){
        
            DB::insert('insert into rinciankegiatanproposal(proposalID,rincianDeskripsi,tempat,waktuMulai,waktuSelesai) values (?,?,?,?,?)'
         ,[$et,$kegs[$keg],$temps[$keg],$wm[$keg],$ws[$keg]]);
        
        }

        foreach($data['Indikator'] as $inds => $value){
            DB::insert('insert into indikatortarget(proposalID,indikatorDeskripsi,target) values (?,?,?)'
         ,[$et,$ind[$inds],$tar[$inds]]);
         
        }
        

        if($role=='["Romo"]'){ 
            Alert::success('Sukses','Proposal berhasil Di Edit !!');
            return view('v_home_romo',compact('username'));
        }
        else if($role=='["Kabid"]'){ 
            Alert::success('Sukses','Proposal berhasil Di Edit !!');
            return view('v_home_kabid',compact('username'));
        }
        else if($role=='["Katimpel"]'){ 
            Alert::success('Sukses','Proposal berhasil Di Edit !!');
            return view('v_home_katimpel',compact('username'));
        };
    }

    public function regisuser(Request $request){
        $namabaru = $request->input('namanew');
        $usernamebaru = $request->input('usernew');
        $passwordbaru= $request->input('passnew');
        $roles= $request->input('role');
        $bidang_p = $request->bidangs;
        $kelompok_p = $request->kelompok;
        $imagename="";
        $folderPath = public_path('upload/');
     
       $image_parts = explode(";base64,", $request->signed);
           
       $image_type_aux = explode("image/", $image_parts[0]);
       $image_type = $image_type_aux[1];
         
       $image_base64 = base64_decode($image_parts[1]);
         
       $file = $folderPath . uniqid() . '.'.$image_type;
       file_put_contents($file, $image_base64);
       $imagename = uniqid() . '.'.$image_type;

       $folderPath = public_path('upload/');
     
       $image_parts = explode(";base64,", $request->signed);
           
       $image_type_aux = explode("image/", $image_parts[0]);
       $image_type = $image_type_aux[1];
         
       $image_base64 = base64_decode($image_parts[1]);
         
       $file = $folderPath . uniqid() . '.'.$image_type;
       file_put_contents($file, $image_base64);
       $imagename = uniqid() . '.'.$image_type;

      
        DB::insert('insert into userproposal(Nama,username,password,role,signature,bidangID,timpelID) values (?,?,?,?,?,?,?)'
         ,[$namabaru, $usernamebaru, $passwordbaru,$roles, $imagename,$bidang_p, $kelompok_p]);

         return view('v_home_setupuser');
        
    }

    public function index(){
        $user =$username;
        echo $user;
    }


    public function shownotapprovedromo(){
        $nameapproval = DB::table('proposal')->where('approvedbyRomo', 0)->pluck('namaKegiatan');
        $proposal = "Proposal yang belum di Approved";
        // $nameapproved = DB::table('proposal')->pluck('nama_kegiatan');        
        return view('listnotapproved',compact('nameapproval','proposal')); 
    }
    public function showapprovedromo(){
         $nameapproval = DB::table('proposal')->where('approvedbyRomo', 1)->pluck('namaKegiatan');
         // $nameapproved = DB::table('proposal')->pluck('nama_kegiatan'); 
         $proposal = "Proposal yang sudah di Approved";       
         return view('listapproved',compact('nameapproval','proposal')); 
        
    }
    public function shownotapprovedkabid(){
        $nameapproval = DB::table('proposal')->where('approvedbyKabid', 0)->pluck('namaKegiatan');
        $proposal = "Proposal yang belum di Approved";
        // $nameapproved = DB::table('proposal')->pluck('nama_kegiatan');        
        return view('listnotapproved',compact('nameapproval','proposal')); 
    }
    public function showapprovedkabid(){
         $nameapproval = DB::table('proposal')->where('approvedbyKabid', 1)->pluck('namaKegiatan');
         // $nameapproved = DB::table('proposal')->pluck('nama_kegiatan'); 
         $proposal = "Proposal yang sudah di Approved";       
         return view('listapproved',compact('nameapproval','proposal')); 
        
    }
    
    
   function pdf(){
       $pdf = PDF::loadView('approved');
       return $pdf->stream();
   }
   public function upload(Request $request)
   {
       $folderPath = public_path('upload/');
     
       $image_parts = explode(";base64,", $request->signed);
           
       $image_type_aux = explode("image/", $image_parts[0]);
       $image_type = $image_type_aux[1];
         
       $image_base64 = base64_decode($image_parts[1]);
         
       $file = $folderPath . uniqid() . '.'.$image_type;
       file_put_contents($file, $image_base64);
       $imagename = uniqid() . '.'.$image_type;

       DB::insert('insert into ttd(gambar) values (?)'
       ,[$imagename]);

    return back()->withInput();
   }
   public function regisdana(Request $request){
    $danabaru = $request->input('sumbernew');

    DB::insert('insert into sumberdana(sumberDeskripsi) values (?)',[$danabaru]);

    return view('tambahsumberdana');
}
    public function regisbidang(Request $request){
        $bidangbaru = $request->input('bidangnew');
        $kabidbaru = $request->input('kabidnew');

        DB::insert('insert into bidang(namaBidang, namaKabid) values (?,?)',[$bidangbaru, $kabidbaru]);

        return view('tambahbidang');
    }
    public function registimpel(Request $request){
        $bidangbaru = $request->input('timpelnew');
        $kabidbaru = $request->input('ktpnew');
        $bidang_p = $request->bidangs;
        DB::insert('insert into timpel(namaTimpel, namaKTP, bidangID) values (?,?,?)',[$bidangbaru, $kabidbaru, $bidang_p]);

        return back();
    }

  
    public function gologin(Request $req){
        $username = $req->input('username');
        $password = $req->input('password');

        $role =  DB::table('userproposal')->where('username', $username)->pluck('role');
        $checklogin = DB::table('userproposal')->where(['username'=>$username, 'password'=>$password])->get();
        $bidang =  DB::table('bidang')->pluck('namaBidang');
        $namausername = DB::table('userproposal')->where('username', $username)->pluck('Nama');

        if(count($checklogin) > 0){         
            if($role=='["Romo"]'){
                return view('layanan',compact('username','namausername'));
            }
            else if($role=='["Kabid"]'){
                return view('layanan',compact('username','namausername'));
            }
            else if($role=='["Katimpel"]'){
                return view('layanan',compact('username','namausername'));
            }
            else if($role=='["Admin"]'){
                Alert::success('Sukses','Berhasil Login!!');
                return view('v_home_admin',compact('username','namausername'));
            }
            else{
                echo $role;
            }
             
        }
        else{
            Alert::error('Gagal','Password atau Username Salah!!');
            return redirect()->back();
        }
    }

    


}
