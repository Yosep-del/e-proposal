@extends('v_lte')
@section('form')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css%22%3E">
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Setup Bidang Baru</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="regisbidang" >
            @csrf
            <div class="form-group">
                <div class="form-group">
                  <label for="bidangnama">Nama Bidang</label>
                  <input type="text" name="bidangnew" class="form-control" id="bidangnama" placeholder="(Nama bidang Baru)">
                </div>
                <div class="form-group">
                  <label for="kabidnama">Nama Kabid</label>
                  <input type="text" name="kabidnew" class="form-control" id="kabidnama" placeholder="(Nama Kepala Bidang)">
                </div>
                  <br><button method="POST" action="" type="submit" class="btn btn-primary">Tambah</button>

                <div class="box-footer">
              </div>
            </form>
          </div>
@endsection
