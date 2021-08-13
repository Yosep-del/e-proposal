@extends('v_lte')

@section('content')
<h1>E-lPJ Paroki Maria Assumpta Klaten</h1>
<section class="content-header">
<h1>Hello, {!! $username !!}</h1>
      <h1>Dashboard</h1>
    </section>
<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-6 col-xs-5">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h2>Daftar LPJ </h2>
              <p>yang Belum Approve</p>
            </div>
            <div class="icon">
            <i class="icon ion-document"></i>
            </div>
            <a href="{{url('shownotapprovedRomo/'.$username)}}" class="small-box-footer">Klik disini<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-5">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h2>Daftar lPJ</h2>
              <p>Yang Sudah Approve</p>
            </div>
            <div class="icon">
            <i class="icon ion-ios-checkmark"></i>
            </div>
            <a href="#" class="small-box-footer">Klik Disini<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
        <!-- ./col -->
        
        <!-- ./col -->
      </div>
@endsection