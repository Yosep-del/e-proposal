
@extends('v_lte')
 
 @section('form')
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link href="{{ asset('adminlte/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="{{ asset('css/global.css')}}">
 <div class="box box-primary">
             <div class="box-header with-border">
               <h3 class="box-title">Form LPJ</h3>
             </div>
             @csrf
             <!-- /.box-header -->
             <!-- form start -->
               <div class="box-body">
                 <div class="form-group">
                   <label for="Bidang">BIDANG</label>
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
                   <input type="text" name="nik" class="form-control" id="nikpj" readonly placeholder="(diisi NIK yang tercatat di data umat)" required>
                   <input type="text" name="no_rekening" class="form-control" id="norek" readonly placeholder="@foreach($rekening as $rekenings){{$rekenings}} @endforeach" required>
                   <input type="tel" pattern="\(\+\6\2\)-\d\d\d\d\d\d\d\d\d"  name="no_wa" readonly class="form-control" id="nowa" placeholder="@foreach($no_hp as $no_hps){{$no_hps}} @endforeach" required>
                 </div>
                 <div>
                 <label for="sasaran">Sasaran Strategis</label> 
                 <input class="form-control" type="text" readonly placeholder="@foreach($sasaran as $sasarans){{$sasarans}} @endforeach" name="sasaran" required>
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
                     <tbody class="">
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
                        <tr>
                            <td><input type="text" name="Keperluan[]" placeholder="{{$anggs->anggaranDeskripsi}}" readonly class="form-control"   ></td>
                            <td><input type="text" name="Jumlah[]" placeholder="{{$anggs->kuantitas}}" readonly class="form-control"   ></td>   
                        <td><input type="number" name="Satuan[]" placeholder="satuan"  readonly class="form-control Satuan"   ></td>
                            <td><input type="text" name="Harga[]" placeholder="{{$anggs->hargaSatuan}}" readonly class="form-control Harga"   ></td>
                            <td><input type="text" name="Subtotal[]" placeholder="{{$anggs->kuantitas * $anggs->hargaSatuan}}" readonly class="form-control Subtotal" ></td> 
                        </tr>
                        @endforeach
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
         
         <form class="" method="POST" action="{{url('insertdatalpj')}}" enctype="multipart/form-data">
         @csrf    
         <label for="">Rincian Kegiatan LPJ : </label>

         <input type="hidden" name="proposalID" value="{{$id[0]}}">
     
     <section>
         <div class="panel panel-footer" >
             <table class="table table-bordered">
                 <thead>
                     <tr>
                         <th>Kegiatan</th>
                         <th>Tempat</th>
                         <th>Waktu Mulai</th>
                         <th>Waktu Selesai</th>
                         <th><a href="javascript:void(0)" class="addRowRKlpj"><i class="btn btn-info add">Add</i></a></th>
                     </tr>
                 </thead>
                 <tbody class="RKlpjs">
                    <tr>
                        <td><input type="text" name="KegiatanLPJ[]" class="form-control" ></td>
                        <td><input type="text" name="TempatLPJ[]" class="form-control" ></td>   
                        <td><input type="datetime-local"  name="Waktu_mulaiLPJ[]" class="form-control" ></td>
                        <td><input type="datetime-local" name="Waktu_selesaiLPJ[]" class="form-control" ></td>
                        <td><a href="javascript:void(0)" class="btn btn-danger removeRKlpj"><i class="fas fa-danger">Remove</i></a></td>
                    </tr>
                     </tr>
                 </tbody>
                 
             </table>
         </div>
     </section>

         <label for="pengeluaran">Pengeluaran</label>
     
          <section>
              <div class="panel panel-footer" >
                  <table class="table table-bordered table-condensed">
                      <thead>
                          <tr >
                              <th>Pengeluaran</th>
                              <th>satuan</th>
                              <th>jumlah Satuan</th>
                              <th>Harga Satuan</th>
                              <th>Subtotal</th>
                              <th>Sumber Dana</th>
                              <th><a href="javascript:void(0)" class="addRowPeng"><i class="btn btn-info add">add</i></a></th>
                          </tr>
                      </thead>
                      <tbody class="Peng">
                         <tr>
                             <td><input type="text" name="Pengeluaran[]" class="form-control"   ></td>
                             <td><input type="text" name="Jumlahlpj[]" class="form-control"   ></td>   
                             <td><input type="number" name="Satuanlpj[]" class="form-control Satuan"   ></td>
                             <td><input type="text" name="Hargalpj[]" class="form-control Harga"   ></td>
                             <td><input type="text" name="Subtotallpj[]" class="form-control Subtotal" ></td>
                             <td><select class="form-control" style="width:100%; float:right" name="sumberdana"  >
                    @foreach($listsumberdana as $listsumberdanas)
                    <option value="{{$listsumberdanas -> sumberID}}">{{$listsumberdanas -> sumberDeskripsi}}</option>
                    @endforeach
                  </select></td>
                             <td><a href="#" class="btn btn-danger removePeng"><i class="fas fa-danger">Remove</i></a></td>
                         </tr>
                         
                          </tr>
                          
                      </tbody>
                      
                      
                      <tfoot>
                          <tr>
                              <td style="border: none"></td>
                              <td style="border: none"></td>
                              <td style="border: none"></td>
                              <td style="font-size:120%">Saldo Saat Ini</td>
                              <td><b class="saldo"></b> </td>
                              <td style="border: none"></td>
                          </tr>
                      </tfoot>
                      <tfoot>
                          <tr>
                              <td style="border: none"></td>
                              <td style="border: none"></td>
                              <td style="border: none"></td>
                              <td style="font-size:120%">Total Pengeluaran</td>
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
               <div class="row">
                  <label for="input1">Link File Foto 1</label>
                  <input type="text" name="linkFoto1" class="form-control">
                  <label for="input2">Link File Foto 2</label>
                  <input type="text" name="linkFoto2" class="form-control">
                  <label for="input3">Link File Foto 3</label>
                  <input type="text" name="linkFoto3" class="form-control">
                  <label for="input4">Link google drive</label>
                  <input type="text" id="InputText" name="link_Survey">
                </div>
               <div class="container">
                   <br>
                   <br>
                   <button class="submit" style="color: white; background-color:success; font-size: 16px; padding: 10px 24px;">kirim</button>
                  
</form> 


     </div>
    
     <!-- <td><a href="#" class="btn btn-danger removeAng"><i class="fas fa-danger">Kirim</i></a></td> -->
     
     </div>
     <br>
     <br>
     <br>
 <script>
     function addRowRKlpj()
    {
        var tr='<tr>'+
        '<td><input type="text" name="KegiatanLPJ[]" class="form-control" required></td>'+
        '<td><input type="text" name="TempatLPJ[]" class="form-control"></td>'+
        '<td><input type="date" name="Waktu_mulaiLPJ[]" class="form-control Satuan" required=""></td>'+
        '<td><input type="date" name="Waktu_selesaiLPJ[]" class="form-control Harga"></td>'+
        '<td><a href="#" class="btn btn-danger removeRKlpj"><i class="fas fa-danger">Remove</i></a></td>'+
        '</tr>';
        $('tbody.RKlpj').append(tr);
    };

     function addRowPeng()
    {
        var tr='<tr>'+
        '<td><input type="text" name="Keperluan[]" class="form-control" required=""></td>'+
        '<td><input type="text" name="Jumlah[]" class="form-control"></td>'+
        '<td><input type="number" name="Satuan[]" class="form-control Satuan" required=""></td>'+
        '<td><input type="text" name="Harga[]" class="form-control Harga"></td>'+
        ' <td><input type="text" name="Subtotal[]" class="form-control Subtotal"></td>'+
        '<td><select class="form-control" style="width:100%; float:right" name="sumberdana">@foreach($listsumberdana as $listsumberdanas)<option value="{{$listsumberdanas->sumberID}}">{{$listsumberdanas->sumberDeskripsi}}</option>@endforeach</select></td>'+
        '<td><a href="#" class="btn btn-danger removePeng"><i class="fas fa-danger">Remove</i></a></td>'+
        '</tr>';
        $('tbody.Peng').append(tr);
    };

    function saldo(){
        var saldo=0;
        $('.Subtotal').each(function(i,e){
            var Subtotal=$(this).val()-0;
        saldo +=Subtotal;
    });
    $('.saldo').html("Rp"+saldo+",00");   
    }

 </script>

               
 @endsection

