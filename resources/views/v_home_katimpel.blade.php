@extends('v_lte')

@section('content')
<body style="font-family:roboto">
  

<h1>E-Proposal Paroki Maria Assumpta Klaten</h1>

<section class="content-header">
  @if(session('message'))
  <div class="alert alert-success">{{session('message')}}</div>
  @endif
  @foreach($namausername as $namausernames)
  <h1>Berkah Dalem, {!! $namausernames !!}</h1>
      @endforeach
    </section>
<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h2>Ajukan e-Proposal</h2>
              <p>Form e-Proposal</p>
            </div>
            <div class="icon">
            <i class="icon ion-bookmark"></i>
            </div>
            <a href="/formlpj/{!! $username !!}" class="small-box-footer">Klik Disini <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
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
        @include('sweetalert::alert')
      </div>
      </body>
@endsection