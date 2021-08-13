@extends('v_lte')
@section('content')
<head>
<link rel="stylesheet" type="text/css" href="{{ asset('css/global.css')}}">
    <title>e-Proposal</title>
    <style>
    .tea{
         
    }
    .daftarproposal{
        margin-bottom: 50px;
        margin-right:60px;
        width:200px;
    }
    .tombollist{
        float:left;
    }
    </style>
  <!--   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"> -->
</head>

<body>
<div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-2 shadow rounded">
                        <div class="card-body">
                            <center>
                                <h2><strong>Daftar Proposal</strong></h2>
                                <p>Kegiatan Gereja Paroki Santa Maria Assumpta</p>
                            </center>
                            <table class="table table-bordered" style="background-color: white;">
                            <thead style="background-color: #D3D3D3;">
                                <th scope="col">No.</th>
                                <th scope="col" colspan="2">Nama Kegiatan</th>
                                <th scope="col"></th>
                                
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            @foreach($nameapproval as $key)
                            <tr>
                                        <td class="text-center">
                                        {{ $loop->iteration }}
                                        </td>
                                        <td colspan="2">
                                        {{$key}}
                                        </td>
                                        <td style="float:right">
                                            <a href="/formlpj/{{$key}}/{{$username}}" class="btn btn-xs btn-primary " style="background-color: green;">Buat LPJ</a> 
                                             </td>
                            </tr>
                            @endforeach
                            </tbody>
                            
                            </table>
                        </div>
                    </div>
                </div>
            </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<br>
<br>
<br>
<!-- @foreach($nameapproval as $key) 
<div class="list">
              <span style="font-size: 16pt;">{{$key}}</span>
            <a href="/formlpj/{{$key}}/{{$username}}" style="float:right"><i class="fa fa-arrow-right"></i>lihat</a>
        </div>
@endforeach -->


</body>



</ol>
</div>

</body>
@endsection
