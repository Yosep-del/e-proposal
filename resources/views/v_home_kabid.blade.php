@extends('v_lte')

@section('content')
<body style="font-family:arial">
  

<h1>E-Proposal Paroki Maria Assumpta Klaten</h1>

<section class="content-header">
@foreach($namausername as $namausernames)
<h1>Berkah Dalem, {!! $namausernames !!}</h1>
      @endforeach
    </section>
<section class="content">   
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h2>Daftar e-Proposal</h2>
              <p>Yang Belum Approve</p>
            </div>
            <div class="icon">
            <i class="icon ion-document"></i>
            </div>
            <a href="{{url('shownotapproved/'.$username)}}" class="small-box-footer">Klik disini<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h2>Daftar e-Proposal</h2>
              <p>Yang Sudah Approve</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{url('showapproved/'.$username)}}" class="small-box-footer">Klik disini<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        @include('sweetalert::alert')
      </div>
      </body>
@endsection