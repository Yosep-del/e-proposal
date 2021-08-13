@extends('v_lte')
@section('form')
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Sumber Dana</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="regisdana" >
            @csrf
            <div class="form-group">
                <div class="form-group">
                  <label for="username">Deskripsi Sumber</label>
                  <input type="text" name="sumbernew" class="form-control" id="sumberdana" placeholder="(Deskripsi Sumber Dana)">
                </div>
                  <br><button method="POST" action="" type="submit" class="btn btn-primary">Tambah</button>

                <div class="box-footer">
              </div>
            </form>
          </div>
@endsection