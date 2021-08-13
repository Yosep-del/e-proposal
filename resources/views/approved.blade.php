
<head>

<style>
.container{
  padding:3%;
  font-family:roboto;
}
.tombolapprove{
  background-color:green;
  color:black;
  float:right;
  font-size:50px;
  text-decoration:none;
  border-style:solid;
  border-width:1px;
  padding:2px;
  border-color:black;
}
table, td, th{
  text-align:left;
  border:2px solid black;
  font-family:roboto;
  border-collapse:collapse;
}
td, th{
  padding:10px;
  font-family:roboto;
}
tr{
  height:500px;
  font-family:roboto;
}
.approvedtable{
  font-size:90%;
  line-height:11px;
  font-family:roboto;
}
.ttd{
  text-align:center;
}
.tandatangan{
  width:100%;
  border-collapse:collapse;
}

</style>
</head>
<body style="font-family:arial;">
  
<table width="100%" class="approvedtable">
<tr>
<th colspan="4" style="background-color:fed8b1">PROPOSAL KEGIATAN</th>
<th colspan="2" style="text-align:center0;background-color:fed8b1">SUMBER DANA KAS</th>

</tr>
<tr>
  <td colspan="4" rowspan="4" style="vertical-align:top;background-color:fed8b1">PAROKI SANTA MARIA ASSUMPTA KLATEN</td>
  <td style="text-align:center;">CBPKB</td>
  <td style="text-align:center;">CBTD</td>
</tr>
<tr>
   
  <td style="text-align:center;">CBPPDP</td>
  <td style="text-align:center;">CBKGMK</td>
</tr>
<tr>
  
  <td style="text-align:center;">CPBOKP</td>
  <td style="text-align:center;">CBSAPK</td>
</tr>
<tr>
   
  <td style="text-align:center;">CPBORPK</td>
  <td style="text-align:center;">....</td>
</tr>
<tr>
  <td style="font-weight:bold;background-color:fed8b1"">Bidang</td>
  <td colspan="5">@foreach($databidang as $databidangs) <span>{{$databidangs->namaBidang}}</span>  @endforeach</td>
</tr>
<tr>
  <td style="font-weight:bold;background-color:fed8b1"">Tim Pelayanan/Kelompok</td>
  <td colspan="5">@foreach($datatimpel as $datatimpels)<span>{{$datatimpels->namaTimpel}}</span>@endforeach</td>
</tr>
<tr>
  <td style="font-weight:bold;background-color:fed8b1"">Nama Kegiatan</td>
  <td colspan="5">@foreach($dataproposal as $dataproposals) {{$dataproposals->namaKegiatan}} @endforeach</td>
</tr>
<tr >
  <td style="font-weight:bold;background-color:fed8b1">Nomor RAPB/RAI</td>
  <td colspan="5">@foreach($dataproposal as $dataproposals)<span>{{$dataproposals->nomorRAPB}} </span>@endforeach</td>
</tr>
<tr><th style="font-weight:bold;text-align:center;background-color:fed8b1" colspan="6">Indikator Target</th></tr>
<tr style="background-color:fed8b1">
  
  <td style="font-weight:bold" colspan="2">Indikator</td>
  <td style="font-weight:bold" colspan="4">Target</td>
</tr>
@foreach($indikator as $indikators) 
<tr>
<td colspan="2">{{$indikators->indikatorDeskripsi}}</td>
<td colspan="4"> {{$indikators->target}}</td>
</tr>
@endforeach
<tr style="background-color:fed8b1">
  <td style="font-weight:bold" rowspan="2">Penanggung Jawab</td>
  <td style="font-weight:bold">Nama</td>
  <td style="font-weight:bold">NIK</td>
  <td style="font-weight:bold" colspan="2">NO Rekening dan Bank</td>
  <td style="font-weight:bold">No WA</td>
</tr>
@foreach($dataproposal as $dataproposals)
<tr>
  <td>{{$dataproposals->namaPJ}}</td>
  <td>{{$dataproposals->NIKPJ}}</td>
  <td colspan="2">{{$dataproposals->rekening}}</td>
  <td>{{$dataproposals->no_hp}}</td>
</tr>
@endforeach
<tr>
  <td style="font-weight:bold;background-color:fed8b1">Sasaran Strategis</td>
  <td colspan="5">@foreach($dataproposal as $dataproposals)<span>{{$dataproposals->sasaranStrategis}} </span>@endforeach</td>
</tr>

<tr style="background-color:fed8b1">
  <td style="font-weight:bold" colspan="2">Rincian Kegiatan</td>
  <td style="font-weight:bold" colspan="2">Tempat</td>
  <td style="font-weight:bold">Waktu Mulai</td>
  <td style="font-weight:bold">Waktu Selesai</td>
</tr>

@foreach($kegiatan as $kegiatans)
<tr>
<td colspan="2" style="text-align:center">{{$kegiatans->rincianDeskripsi}} </td>
<td colspan="2" style="text-align:center">{{$kegiatans->tempat}} </td>
<td style="text-align:center">{{$kegiatans->waktuMulai}} </td>
<td style="text-align:center">{{$kegiatans->waktuSelesai}} </td>
</tr>
@endforeach

<tr style="background-color:fed8b1">
  <td style="font-weight:bold">Anggaran Pembiayaan</td>
  <td style="font-weight:bold">Jumlah</td>
  <td style="font-weight:bold">Satuan</td>
  <td style="font-weight:bold">Harga Satuan</td>
  <td style="font-weight:bold">Sub Total</td>
  <td style="font-weight:bold" >Sumber Dana</td>
</tr>


@foreach($angg as $anggs)
<tr>
<td style="text-align:center">{{$anggs->anggaranDeskripsi}} </td>
<td style="text-align:center">{{$anggs->kuantitas}} </td>
<td style="text-align:center">{{$anggs->satuan}} </td>
<td style="text-align:center">{{$anggs->hargaSatuan}} </td>
<td style="text-align:center">{{$anggs->subtotal}} </td>
<td style="text-align:center">@foreach($datasumberdana as $datasumberdanas) {{$datasumberdanas->sumberDeskripsi}} @endforeach</td>
</tr>
@endforeach
<tr>
  <td colspan="6"> Jumlah Total = {{$jumlahtotal}}</td>
</tr>


</table>
<table style="border:none" class="tandatangan">
  <tr style="border:none">
    <td style="border:none" class="ttd"><p style="margin-left:30px;margin-top:5px">Mengetahui, </p>
              @foreach($datakabid as $datakabids)
              <img style="width:150px;height:50px;" src="upload/{{$datakabids->signature}}" alt="gambar tidak muncul">
              <p >{{$datakabids->Nama}} </p>
              <p >Kabid <span>@foreach($databidang as $databidangs){{$databidangs->namaBidang}}  @endforeach</span></p>
              @endforeach</td>
    <td style="border:none" class="ttd"></td>
    <td style="border:none" class="ttd"><p>Klaten, @foreach($dataproposal as $dataproposals) {{$dataproposals->tanggalUpdate}} @endforeach</p>
              @foreach($datakatimpel as $datakatimpels)
              <p></p>
              <img style="width:150px;height:50px;" src="upload/{{$datakatimpels->signature}}" alt="gambar tidak muncul">
              <p>{{$datakatimpels->Nama}}</p>
              <p>Katimpel <span>@foreach($datatimpel as $datatimpels){{$datatimpels->namaTimpel}}  @endforeach</span> </p>
              @endforeach</td>
  </tr>
  <tr>
<td colspan="3" class="ttd" style="border:none"><p>Menyetujui, </p>
              @foreach($dataromo as $dataromos)
              <img style="width:150px;height:50px;" src="upload/{{$dataromos->signature}}" alt="gambar tidak muncul">
              <p>{{$dataromos->Nama}}</p>
              <p>Pastor Paroki</p>
              @endforeach</td>
  </tr>

</table>


</body>

