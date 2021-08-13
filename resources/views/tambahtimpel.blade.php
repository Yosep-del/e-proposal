@extends('v_lte')
@section('form')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css%22%3E
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Setup Timpel Baru</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="registimpel" >
            @csrf
            <div class="form-group">
                <div class="form-group">
                  <label for="timpelnama">Nama Timpel</label>
                  <input type="text" name="timpelnew" class="form-control" id="timpelnama" placeholder="(Masukkan Nama Tim Pelayanan)">
                </div>
                <div class="form-group">
                  <label for="ktpnama">Nama KTP</label>
                  <input type="text" name="ktpnew" class="form-control" id="ktpnama" placeholder="(masukkan Nama Ketua Tim Pelayanan)">
                </div>
                <label for="Bidang">BIDANG :</label>
                  <select class="form-control" id="listbidang" style="width:80%; float:right" name="bidangs" onchange="filter()">
                  @foreach($listbidang as $listbidangs)
                  <option value="{{$listbidangs->bidangID}}">{{$listbidangs->namaBidang}} </option>
                    @endforeach
                  </select>
                  <br><button method="POST" action="" type="submit" class="btn btn-primary">Tambah</button>

                <div class="box-footer">
              </div>
            </form>
          </div>
@endsection