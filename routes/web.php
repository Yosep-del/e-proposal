<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProposalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function(){
return view('landing');
    });
Route::get('/tambahbidang', function(){
return view('tambahbidang');
});
Route::get('/tambahtimpel', function(){
    $listbidang = DB::table('bidang')->get();
    return view('tambahtimpel',compact('listbidang'));
    });
Route::get('/tambahsumberdana', function(){
    return view('tambahsumberdana');
    });
Route::get('/dashboard', function(){
    return view('v_home');
    });
Route::get('/v_home_admin', function(){
    return view('v_home_admin');
    });
Route::get('/v_home_setupuser', function(){
    return view('v_home_setupuser');
    });
Route::get('/regis_user/{role}', function($role){
    $tambahrole = $role;
    $listbidang = DB::table('bidang')->get();
    $listtimpel = DB::table('timpel')->get();
    return view('regis_user',compact('listbidang','listtimpel','tambahrole'));
    });
    
Route::get('/formlpj/{username}', function($username){
    $listbidang = DB::table('bidang')->get();
    $listsumberdana = DB::table('sumberdana')->get();
    $role =  DB::table('userproposal')->where('username', $username)->pluck('role');
    $listtimpel = DB::table('timpel')->get();
    return view('v_form', compact('listbidang','role','username','listsumberdana','listtimpel'));
}); 

Route::get('/layanan', function(){
        return view('layanan');
        });
Route::get('/login', function(){
    return view('login');
    });
Route::get('/loginlpj', function(){
    return view('loginlpj');
    });
Route::get("/register",[UserController::class,"register"]);
Route::post("/register",[UserController::class,"register_handle"]);
Route::get("/success",[UserController::class,"success"]);
Route::get("/landing-page",[UserController::class,"landing"]);
route::get("/lpjpage", [UserController::class,"lpjpage"]);
Route::get('/daftar', function () {
    return view('daftar');
});

Route::post('regisuser','App\Http\Controllers\ProposalController@regisuser');
Route::post('insertdata','App\Http\Controllers\ProposalController@insertdata');
Route::get('gologin', 'App\Http\Controllers\ProposalController@gologin');
Route::get('gologinlpj', 'App\Http\Controllers\ProposalController@gologinlpj');
Route::get('index', 'App\Http\Controllers\ProposalController@index');
Route::get('/approve/{nama}/{username}', function($nama, $username){
    $bidang =  DB::table('proposal')->where('namaKegiatan', $nama)->pluck('bidangID');
    $namaBidang =  DB::table('bidang')->where('bidangID', $bidang)->pluck('namaBidang');
    $kelompok =  DB::table('proposal')->where('namaKegiatan', $nama)->pluck('timpelID');
    $namaTimpel=  DB::table('timpel')->where('timpelID', $kelompok)->pluck('namaTimpel');
    $no_rapb_rai =  DB::table('proposal')->where('namaKegiatan', $nama)->pluck('nomorRAPB');
    $sasaran =  DB::table('proposal')->where('namaKegiatan', $nama)->pluck('sasaranStrategis');
    $penanggung =  DB::table('proposal')->where('namaKegiatan', $nama)->pluck('namaPJ');
    $signature =  DB::table('userproposal')->where('username', $nama)->pluck('signature');
    $id = DB::table('proposal')->where('namaKegiatan', $nama)->pluck('proposalID');
    $no_hp = DB::table('proposal')->where('namaKegiatan', $nama)->pluck('no_hp');
    $rekening = DB::table('proposal')->where('namaKegiatan', $nama)->pluck('rekening');
    $dataapprove = DB::table('proposal')->where('namaKegiatan', $nama)->get();
    $tanggal = DB::table('proposal')->where('namaKegiatan', $nama)->pluck('tanggalUpdate');
    $datauser = DB::table('userproposal')->where('username', $username)->get();
    $angg = DB::table('anggaran')->where('proposalID', $id)->get();
    $indikator = DB::table('indikatortarget')->where('proposalID', $id)->get();
    $kegiatan = DB::table('rinciankegiatanproposal')->where('proposalID', $id)->get();
    $jumlahtotal = DB::table('anggaran')->where('proposalID', $id)->sum('subtotal');
    $pdf = view('approve',compact('jumlahtotal','indikator','datauser','dataapprove','nama','bidang','kelompok','no_rapb_rai','sasaran','penanggung','namaBidang','namaTimpel','signature','username','rekening','no_hp','tanggal','angg','kegiatan'));
    return $pdf;
});
Route::get('/approved/{nama}/{username}', function($nama, $username){
    $dataproposal = DB::table('proposal')->where('namaKegiatan', $nama)->get();
    foreach($dataproposal as $dataproposals)
    $databidang = DB::table('bidang')->where('bidangID', $dataproposals->bidangID)->get();
    $datatimpel = DB::table('timpel')->where('timpelID', $dataproposals->timpelID)->get();
    $indikator = DB::table('indikatortarget')->where('proposalID', $dataproposals->proposalID)->get();
    $kegiatan = DB::table('rinciankegiatanproposal')->where('proposalID', $dataproposals->proposalID)->get();
    $angg = DB::table('anggaran')->where('proposalID', $dataproposals->proposalID)->get();
    foreach($angg as $anggs)
    $datakabid = DB::table('userproposal')->where('userID', $dataproposals->kabidApprover)->get();
    $datakatimpel = DB::table('userproposal')->where('userID', $dataproposals->katimpelApprover)->get();
    $dataromo = DB::table('userproposal')->where('userID', $dataproposals->romoApprover)->get();
    $datasumberdana = DB::table('sumberdana')->where('sumberID', $anggs->sumberID)->get();
    $jumlahtotal = DB::table('anggaran')->where('proposalID', $dataproposals->proposalID)->sum('subtotal');
    $pdf = PDF::loadView('approved',compact('datasumberdana','jumlahtotal','indikator','dataproposal','databidang','datatimpel','kegiatan','angg','datakabid','datakatimpel','dataromo'))->setPaper('a4', 'potrait');
    return $pdf->stream();
});
Route::get('showapproved/{username}', function($username){
    $role =  DB::table('userproposal')->where('username', $username)->pluck('role');
    $bidangID =  DB::table('userproposal')->where('username', $username)->pluck('bidangID');
    $as;
    if($role=='["Kabid"]'){
        $as = "approvedbyKabid";
        $nameapproval = DB::table('proposal')->where($as, 1)->where('approvedbyKabid', 1)->where('bidangID', $bidangID)->get();
    } 
    if($role =='["Romo"]' ){
        $as = "approvedbyRomo";
        $nameapproval = DB::table('proposal')->where($as, 1)->where('approvedbyKabid', 1)->get();
    }
    
    $timpelID =  DB::table('userproposal')->where('username', $username)->pluck('timpelID');
    $proposal = "Proposal yang sudah di Approved";
    $pdf = view('listapproved',compact('role','bidangID','timpelID','nameapproval','proposal','username'));  
    return $pdf;
});
Route::get('shownotapproved/{username}', function($username){
    $role =  DB::table('userproposal')->where('username', $username)->pluck('role');
    $bidangID =  DB::table('userproposal')->where('username', $username)->pluck('bidangID');
    $idusername = DB::table('userproposal')->where('username', $username)->pluck('userID');
    $as;
    $nameapproval;
    if($role=='["Kabid"]'){
        $as = "approvedbyKabid";
        $nameapproval = DB::table('proposal')->where($as, 0)->where('bidangID', $bidangID)->get();
    }  
    if($role=='["Katimpel"]'){
        $as = "approvedbyKabid";
        $nameapproval = DB::table('proposal')->where($as, 0)->where('katimpelApprover', $idusername)->get();
    } 
    if($role =='["Romo"]' ){
        $as = "approvedbyRomo";
        $nameapproval = DB::table('proposal')->where($as, 0)->where('approvedbyKabid',1)->get();
    }
    
    $timpelID =  DB::table('userproposal')->where('username', $username)->pluck('timpelID');
    $proposal = "Proposal yang sudah di Approved";
    $pdf = view('listnotapproved',compact('role','bidangID','timpelID','nameapproval','proposal','username'));  
    return $pdf;
});
 
Route::get('/list/Admin', function(){
    $users = DB::table('userproposal')->where('role', "Admin")->get();
    $role = "admin";
    $pdf = view('list_user',compact('users','role'));  
    return $pdf; 
});
Route::get('/listsumberdana', function(){
    $list = DB::table('sumberdana')->get();
    $pdf = view('listsumberdana',compact('list'));  
    return $pdf; 
});
Route::get('/listbidang', function(){
    $list = DB::table('bidang')->get();
    $pdf = view('listbidang',compact('list'));  
    return $pdf; 
});
Route::get('/listtimpel', function(){
    $list = DB::table('timpel')->get();
    $pdf = view('listtimpel',compact('list'));  
    return $pdf; 
});
Route::get('/list/Romo', function(){
    $users = DB::table('userproposal')->where('role', "Romo")->get();
    $role = "romo";
    $pdf = view('list_user',compact('users','role'));  
    return $pdf; 
});
Route::get('/list/Katimpel', function(){
    $users = DB::table('userproposal')->where('role', "Katimpel")->get();
    $role = "katimpel";
    $pdf = view('list_user',compact('users','role'));  
    return $pdf; 
});
Route::get('/list/kabid', function(){
    $users = DB::table('userproposal')->where('role', "Kabid")->get();
    $role = "Kabid";
    $pdf = view('list_user',compact('users','role'));  
    return $pdf; 
});
Route::get('goapprove/{nama}/{username}', function($nama, $username ){
    $role =  DB::table('userproposal')->where('username', $username)->pluck('role');
    $userapprover = DB::table('userproposal')->where('username', $username)->get();
    foreach($userapprover as $userapprovers)
    $idapprover = $userapprovers->userID;
    $as="approve";
    $namausername = DB::table('userproposal')->where('username', $username)->pluck('Nama');
    $date = date('Y-m-d');
    $tanggal = "tanggalUpdate";
    if($role=='["Kabid"]'){
        $as = "approvedbyKabid";
        DB::table('proposal')->where('namaKegiatan',$nama)->update([
            $as => 1,
            $tanggal => $date,
            'kabidApprover' =>$idapprover
        ]);
    } else if($role =='["Romo"]' ){
        $as = "approvedbyRomo";
        DB::table('proposal')->where('namaKegiatan',$nama)->update([
            $as => 1,
            $tanggal => $date,
            'romoApprover' =>$idapprover
        ]);
    } 
    
    if($role=='["Romo"]'){
        Alert::success('Sukses','Proposal berhasil disetujui !!');
        return view('v_home_romo',compact('username','namausername'));
    }
    else if($role=='["Kabid"]'){
        Alert::success('Sukses','Proposal berhasil disetujui !!');
        return view('v_home_kabid',compact('username','namausername'));
    }
    else if($role=='["Katimpel"]'){
        Alert::success('Sukses','Proposal berhasil disetujui !!');
        return view('v_home_katimpel',compact('username','namausername'));
    }
});
Route::get('/editproposal/{proposalID}/{username}', function($proposalID, $username){
    $username = $username;
    $dataapprove = DB::table('proposal')->where('proposalID',$proposalID)->get();
    $bidangID= DB::table('proposal')->where('proposalID',$proposalID)->pluck('bidangID');
    $timpelID= DB::table('proposal')->where('proposalID',$proposalID)->pluck('timpelID');
    $databidang = DB::table('bidang')->where('bidangID',$bidangID)->get();
    $datatimpel = DB::table('timpel')->where('timpelID',$timpelID)->get();
    $listsumberdana = DB::table('sumberdana')->get();
    $dataanggaran = DB::table('anggaran')->where('proposalID',$proposalID)->get();
    $dataindikator = DB::table('indikatortarget')->where('proposalID',$proposalID)->get();
    $datakegiatan = DB::table('rinciankegiatanproposal')->where('proposalID',$proposalID)->get();
    $pdf = view('editproposal',compact('username','listsumberdana','dataapprove','databidang','datatimpel','dataanggaran','dataindikator','datakegiatan'));  
    return $pdf; 
});
Route::get('/hapususer/{userID}', function($userID){
    DB::table('userproposal')->where('userID', '=', $userID)->delete();
    return back(); 
});
Route::get('/hapussumberdana/{sumberID}', function($sumberID){
    DB::table('sumberdana')->where('sumberID', '=', $sumberID)->delete();
    return back(); 
});
Route::get('/hapusbidang/{bidangID}', function($bidangID){
    DB::table('bidang')->where('bidangID', '=', $bidangID)->delete();
    return back(); 
});
Route::get('/hapustimpel/{timpelID}', function($timpelID){
    DB::table('timpel')->where('timpelID', '=', $timpelID)->delete();
    return back(); 
});
Route::get('/view_home/{username}', function($username){
    $role = DB::table('userproposal')->where('username', $username)->pluck('role');
    $namausername = DB::table('userproposal')->where('username', $username)->pluck('Nama');
    if($role=='["Romo"]'){
        return view('v_home_romo',compact('username','namausername'));
    }
    else if($role=='["Kabid"]'){
        return view('v_home_kabid',compact('username','namausername'));
    }
    else if($role=='["Katimpel"]'){
        return view('v_home_katimpel',compact('username','namausername'));
    }
});
Route::get('/view_home_lpj/{username}', function($username){
    $role = DB::table('userproposal')->where('username', $username)->pluck('role');
    $namausername = DB::table('userproposal')->where('username', $username)->pluck('Nama');
    if($role=='["Romo"]'){
        return view('v_home_romo',compact('username','namausername'));
    }
    else if($role=='["Kabid"]'){
        return view('v_home_kabid',compact('username','namausername'));
    }
    else if($role=='["Katimpel"]'){
        return view('v_home_katimpel',compact('username','namausername'));
    }
});
    
Route::post('regisbidang','App\Http\Controllers\ProposalController@regisbidang');
Route::post('editproposal','App\Http\Controllers\ProposalController@editproposal');
Route::post('registimpel', 'App\Http\Controllers\ProposalController@registimpel');
Route::post('regisdana', 'App\Http\Controllers\ProposalController@regisdana');
Route::get('shownotapprovedromo', 'App\Http\Controllers\ProposalController@shownotapprovedromo');
 
Route::get('shownotapprovedkabid', 'App\Http\Controllers\ProposalController@shownotapprovedkabid');
Route::get('convert', 'App\Http\Controllers\ProposalController@pdf');
Route::post('/','App\Http\Controllers\ProposalController@upload')->name('signature');



//LPJ

Route::get('showproposal/{username}', function($username){
    $role =  DB::table('userproposal')->where('username', $username)->pluck('role');
    $timpelID =  DB::table('userproposal')->where('username', $username)->pluck('timpelID');
    $as;
    $nameapproval;  
    if($role=='["Katimpel"]'){
        $as = "approvedbyRomo";
    }
   //if($role=='["Katimpel"]'){
    //$as = "approvedbyRomo";
    //$nameapproval = DB::table('proposal')->where($as, 1)->where('timpelID', $timpelID)->get();
//}    

    $bidangID =  DB::table('userproposal')->where('username', $username)->pluck('bidangID');
    $nameapproval = DB::table('proposal')->where($as, 1)->where('timpelID', $timpelID)->pluck('namaKegiatan');
    $proposal = "Proposal yang sudah di Approved";
    $pdf = view('listproposal',compact('role','bidangID','timpelID','nameapproval','proposal','username'));  
    return $pdf;
});

Route::get('shownotapproved_lpj/{username}', function($username){
    $role =  DB::table('userproposal')->where('username', $username)->pluck('role');
    $bidangID =  DB::table('userproposal')->where('username', $username)->pluck('bidangID');
    $timpelID =  DB::table('userproposal')->where('username', $username)->pluck('timpelID');
    $datanotapprove =  DB::table('lpj')->where('approvedbyRomo', 0)->get();
    $as;
    $nameapproval;
    $proposal = DB::table('proposal')->where('bidangID',$bidangID)->get();
    
    //$lpj = Lpj::where('approvedbyKabid', $as)->get();

    $pdf = view('listnotapproved_lpj',compact('datanotapprove','role','bidangID','timpelID','proposal','username'));  
    return $pdf;
});

Route::get('showapprovedkabid_lpj/{username}', function($username){
    $role =  DB::table('userproposal')->where('username', $username)->pluck('role');
    $bidangID =  DB::table('userproposal')->where('username', $username)->pluck('bidangID');
    $timpelID =  DB::table('userproposal')->where('username', $username)->pluck('timpelID');
      
    $as;
    $nameapproval;
    $proposal =  DB::table('proposal')->where('bidangID', $bidangID)->get();
    

    $pdf = view('listapprove_kabid_lpj',compact('role','bidangID','timpelID','proposal','username'));  
    return $pdf;
});

Route::get('shownotapprovedRomo/{username}', function($username){
    $role =  DB::table('userproposal')->where('username', $username)->pluck('role');
    $bidangID =  DB::table('userproposal')->where('username', $username)->pluck('bidangID');
    $timpelID =  DB::table('userproposal')->where('username', $username)->pluck('timpelID');
    
    
    $nameapproval;
    $proposal = DB::table('proposal')->where('bidangID', $bidangID)->get();

    $pdf = view('listnotapproved_romo_lpj',compact('role','bidangID','timpelID','proposal','username'));  
    return $pdf;
});

Route::get('showapproved_admin/{username}', function($username){
    $role =  DB::table('userproposal')->where('username', $username)->pluck('role');
    $bidangID =  DB::table('userproposal')->where('username', $username)->pluck('bidangID');
    $as;
    $nameapproval = DB::table('proposal')->where('approvedbyRomo', 1)->get();
    $timpelID =  DB::table('userproposal')->where('username', $username)->pluck('timpelID');
    $proposal = "Proposal yang sudah di Approved";
    $pdf = view('listapproved',compact('role','bidangID','timpelID','nameapproval','proposal','username'));  
    return $pdf;
});


Route::get('shownotapproved_admin/{username}', function($username){
    $role =  DB::table('userproposal')->where('username', $username)->pluck('role');
    $bidangID =  DB::table('userproposal')->where('username', $username)->pluck('bidangID');
    $as;
    $nameapproval;
        $nameapproval = DB::table('proposal')->where('approvedbyRomo',0)->get();
    
    $timpelID =  DB::table('userproposal')->where('username', $username)->pluck('timpelID');
    $proposal = "Proposal yang sudah di Approved";
    $pdf = view('listnotapproved',compact('role','bidangID','timpelID','nameapproval','proposal','username'));  
    return $pdf;
});

Route::get('/formlpj/{nama}/{username}', function($nama, $username){
    $id =  DB::table('proposal')->where('namaKegiatan', $nama)->pluck('proposalID');
    $bidang =  DB::table('proposal')->where('namaKegiatan', $nama)->pluck('bidangID');
    $namaBidang =  DB::table('bidang')->where('bidangID', $bidang)->pluck('namaBidang');
    $kelompok =  DB::table('proposal')->where('namaKegiatan', $nama)->pluck('timpelID');
    $namaTimpel=  DB::table('timpel')->where('timpelID', $kelompok)->pluck('namaTimpel');
    $no_rapb_rai =  DB::table('proposal')->where('namaKegiatan', $nama)->pluck('nomorRAPB');
    $sasaran =  DB::table('proposal')->where('namaKegiatan', $nama)->pluck('sasaranStrategis');
    $penanggung =  DB::table('proposal')->where('namaKegiatan', $nama)->pluck('namaPJ');
    $signature =  DB::table('userproposal')->where('username', $nama)->pluck('signature');
    $id = DB::table('proposal')->where('namaKegiatan', $nama)->pluck('proposalID');
    $no_hp = DB::table('proposal')->where('namaKegiatan', $nama)->pluck('no_hp');
    $rekening = DB::table('proposal')->where('namaKegiatan', $nama)->pluck('rekening');
    $tanggal = DB::table('proposal')->where('namaKegiatan', $nama)->pluck('tanggalUpdate');
    $datauser = DB::table('userproposal')->where('username', $username)->get();
    $angg = DB::table('anggaran')->where('proposalID', $id)->get();
    $kegiatan = DB::table('rinciankegiatanproposal')->where('proposalID', $id)->get();
    $listsumberdana = DB::table('sumberdana')->get();
    $pdf = view('formlpj',compact('id','nama','bidang','kelompok','no_rapb_rai','sasaran','penanggung','namaBidang','namaTimpel','signature','username','rekening','no_hp','tanggal','angg','kegiatan','listsumberdana'));
    return $pdf;
});

Route::post('insertdatalpj','App\Http\Controllers\lpjController@insertdatalpj');

