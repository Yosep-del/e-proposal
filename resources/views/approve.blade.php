
@extends('v_lte')
 
 @section('form')
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 <link href="{{ asset('adminlte/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"/>
 <link rel="stylesheet" type="text/css" href="{{ asset('css/global.css')}}">
 <body style="font-family:arial">
   
 
 <div class="box box-primary">
             <div class="box-header with-border">
               <h3 class="box-title">yang belum ter-approve</h3>
             </div>
             @csrf
             <!-- /.box-header -->
             <!-- form start -->
               <div class="box-body">
                 <div class="form-group">
                   <label for="Bidang">BIDANG </label>
                   <select class="form-control" readonly name="bidang" required>
                     <option value="1"> @foreach($namaBidang as $bidangs)<span>{{$bidangs}}</span>@endforeach</option>
                   </select>
                 </div>
                 <div class="form-group">
                   <label for="Timpelayanan">Tim pelayanan/Kelompok</label>
                   <select class="form-control" id="Timpelayanan" readonly name="kelompok" required>
                     <option value="1">@foreach($namaTimpel as $kelompoks) {!! $kelompoks !!} @endforeach</option>
                   </select>
                 </div>
                 <div class="form-group">
                   <label for="namakegiatan">Nama Kegiatan Utama</label> 
                   <input type="text" class="form-control" id="namakegiatan" readonly  placeholder="{{$nama}}" name="nama_kegiatan" required>
                 </div>
                 <div class="form-group">
                   <label for="nomorRAPB">Nomor RAPB/RAI</label>
                   <input type="text" class="form-control" id="nomorRAPB" readonly placeholder="@foreach($no_rapb_rai as $no_rapb_rais) {{$no_rapb_rais}} @endforeach" name="no_rapb_rai" required>
                 </div>
                 <div class="form-group">
                   <label for="penanggungjawab">Penanggung Jawab</label>
                   <input type="text" name="nama" class="form-control" id="namapj" readonly placeholder="@foreach($penanggung as $penanggungs){{$penanggungs}} @endforeach" required>
                   <input type="text" name="nik" class="form-control" id="nikpj" readonly placeholder="@foreach($dataapprove as $dataapproves){{$dataapproves->NIKPJ}} @endforeach" required>
                   <input type="text" name="no_rekening" class="form-control" id="norek" readonly placeholder="@foreach($rekening as $rekenings){{$rekenings}} @endforeach" required>
                   <input type="tel" pattern="\(\+\6\2\)-\d\d\d\d\d\d\d\d\d"  name="no_wa" readonly class="form-control" id="nowa" placeholder="@foreach($no_hp as $no_hps){{$no_hps}} @endforeach" required>
                 </div>
                 <div>
                 <label for="sasaran">Sasaran Strategis</label> 
                 <input class="form-control" type="text" readonly placeholder="@foreach($sasaran as $sasarans){{$sasarans}} @endforeach" name="sasaran" required>
                 </div>
                 <br>
                 <label for="indikator[]">Indikator dan Target</label>
                 <div class="panel panel-footer" >
                 <table class="table table-bordered">
                     <thead>
                         <tr>
                             <th>Indikator Deskripsi</th>
                             <th>Target</th>
                         </tr>
                     </thead>
                     
                     <tbody class="IT">
                     @foreach($indikator as $indikators) 
                        <tr>
                            <td><input type="text" readonly name="Indikator[]" placeholder="{{$indikators->indikatorDeskripsi}}" class="form-control" ></td>
                            <td><input type="text" readonly name="Target[]" placeholder="{{$indikators->target}}" class="form-control" ></td>   
                        </tr>
                        @endforeach
                         </tr>
                     </tbody>
                 </table>
             </div>
             
                 <label for="">Rincian Kegiatan</label>
     
         <section>
             <div class="panel panel-footer" >
                 <table class="table table-bordered">
                     <thead>
                         <tr>
                             <th>Kegiatan</th>
                             <th>Tempat</th>
                             <th>Waktu Mulai</th>
                             <th>Waktu Selesai</th>
                         </tr>
                     </thead>
                     <tbody class="RK">
                       @foreach($kegiatan as $kegiatans)
                        <tr>
                            <td><input type="text" name="Kegiatan[]" readonly placeholder="{{$kegiatans->rincianDeskripsi}}" class="form-control" ></td>
                            <td><input type="text" name="Tempat[]" readonly placeholder="{{$kegiatans->tempat}}" class="form-control" ></td>   
                            <td><input   name="Waktu_mulai[]" readonly placeholder="{{$kegiatans->waktuMulai}}" class="form-control" ></td>
                            <td><input   name="Waktu_selesai[]" readonly placeholder="{{$kegiatans->waktuSelesai}}" class="form-control" ></td>
                        </tr>
                        @endforeach
                         </tr>
                     </tbody>
                     
                 </table>
             </div>
         </section>
      
    </div>

    <div >
      <label for="">Anggaran</label>
    
         <section>
             <div class="panel panel-footer" >
                 <table class="table table-bordered table-condensed">
                     <thead>
                         <tr >
                             <th>Keperluan</th>
                             <th>satuan</th>
                             <th>jumlah Satuan</th>
                             <th>Harga Satuan</th>
                             <th>Subtotal</th> 
                         </tr>
                     </thead>
                     <tbody class="Ang">
                       @foreach($angg as $anggs)
                        <tr class="anggaranrow">
                            <td><input type="text" name="Keperluan[]" placeholder="{{$anggs->anggaranDeskripsi}}" readonly class="form-control"   ></td>
                            <td><input type="text" name="Jumlah[]" placeholder="{{$anggs->satuan}}" readonly class="form-control"   ></td>   
                            <td><input type="number" name="Satuan[]" placeholder="{{$anggs->kuantitas}}" readonly class="form-control Satuan"   ></td>
                            <td><input type="text" name="Harga[]" placeholder="{{$anggs->hargaSatuan}}" readonly class="form-control Harga"   ></td>
                            <td><input type="text" name="Subtotal[]" value="{{$anggs->kuantitas * $anggs->hargaSatuan}}" placeholder="{{$anggs->kuantitas * $anggs->hargaSatuan}}" readonly class="form-control Subtotal" ></td>
                            
                        </tr>
                        
                        @endforeach
                         
                        <tr>
                          <td id="totalsemua">jumlah = Rp{{$jumlahtotal}},00</td>
                        </tr>
                        
                         </tr>
                     </tbody>
                     <tfoot>
                     
                         <tr>
                             <td style="border: none"></td>
                             <td style="border: none"></td>
                             <td style="border: none"></td>
                             <td style="font-size:120%"></td>
                             <td><b class="total"></b> </td>
                             <td style="border: none"></td>
                         </tr>
                        
                     </tfoot>
                 </table>
             </div>
         </section>
         
           </div>
               </div>
               <div class="container">
       <span>Last update: <span>@foreach($dataapprove as $dataapproves) {!! $dataapproves->tanggalUpdate !!} @endforeach</span></span>
     </div>
               <div class="container">
       <button type="button"><a style="color:white" onclick="return confirm('Yakin ingin approve?')" href="/goapprove/{{$nama}}/{{$username}}">Approve</a></button>

       @foreach($datauser as $datausers)
       @if($datausers->role=="Romo") 
         <p></p>
       
       @else 
        @foreach($dataapprove as $dataapproves)
       <button type="button"><a style="color:white" href="/editproposal/{{$dataapproves->proposalID}}/{{$username}}">Edit</a></button>
       @endforeach
       
       @endif
       @endforeach
     </div>
     <br>
     <br>
     <br>
     </body>
 
               
 @endsection

