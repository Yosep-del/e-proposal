@extends('v_lte')

@section('content')
<body style="font-family:roboto;">
  

<h1>Admin E-Proposal Paroki Maria Assumpta Klaten</h1>
<section class="content-header">
      <h1>Menu Utama</h1>
    </section>
<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h2>Tambah User</h2>
              <p>Setup User</p>
            </div>
            <div class="icon">
            <i class="icon ion-bookmark"></i>
            </div>
            <a href="/v_home_setupuser" class="small-box-footer">Klik Disini <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h2>Sumber Dana</h2>
              <p>Setup Dana</p>
            </div>
            <div class="icon">
            <i class="icon ion-bookmark"></i>
            </div>
            <a href="/listsumberdana" class="small-box-footer">Klik Disini<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h2>Bidang Gereja</h2>
              <p>Setup Bidang</p>
            </div>
            <div class="icon">
            <i class="ion-ios-checkmark"></i>
            </div>
            <a href="/listbidang" class="small-box-footer">Klik disini<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h2>Tim Pelayanan</h2>
              <p>Setup Timpel</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="/listtimpel" class="small-box-footer">Klik disini<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- a -->
      </div>
      </body>
@endsection