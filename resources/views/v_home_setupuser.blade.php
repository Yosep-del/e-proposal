@extends('v_lte')

@section('content')
<h1>Admin E-Proposal Paroki Maria Assumpta Klaten</h1>
<section class="content-header">
      <h1>Menu Utama</h1>
    </section>
<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
      
        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h2>Admin</h2>
              <p>Setup User Admin</p>
            </div>
            <div class="icon">
            <i class="icon ion-bookmark"></i>
            </div>
            <a href="/list/Admin" class="small-box-footer">Klik Disini<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h2>Romo</h2>
              <p>Setup User Romo</p>
            </div>
            <div class="icon">
            <i class="ion-ios-checkmark"></i>
            </div>
            <a href="/list/Romo" class="small-box-footer">Klik disini<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h2 style="font-size:20px">Kepala Tim Pelayanan</h2>
              <p>Setup User Katimpel</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="/list/Katimpel" class="small-box-footer">Klik disini<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-xs-6">
          <!-- small box --> 
          <div class="small-box bg-maroon">
            <div class="inner">
              <h2 style="font-size:25px">Kepala Bidang</h2>
              <p>Setup User Kabid</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="/list/Kabid" class="small-box-footer">Klik disini<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- a -->
      </div>
@endsection