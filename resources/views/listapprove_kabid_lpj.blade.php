@extends('v_lte')
@section('content')
<html lang="en">
    <head>
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"> -->
        </head>
    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow rounded">
                        <div class="card-body">
                            <center>
                                <h1>Daftar LPJ yang Sudah di Approve Kabid</h1>
                                <p>Kegiatan Gereja Paroki Santa Maria Assumpta</p>
                            </center>
                        <table class="table table-bordered">
                            <thead>
                                <th scope="col">No.</th>
                                <th scope="col" colspan="2">Nama Kegiatan</th>
                                <th scope="col">Nomor RAPB</th>
                                <th scope="col">Nama Penanggungjawab</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                               @foreach($proposal as $item)
                                    <tr>
                                    @if(isset($item->lpj->approvedbyKabid))
                                    @if($item->lpj->approvedbyKabid == 1)

                                        <td class="text-center">
                                        {{ $loop->iteration }}
                                        </td>
                                        <td colspan="2">
                                        {{$item->namaKegiatan ?? ''}}
                                        </td>
                                        <td>
                                        {{$item->nomorRAPB ?? ''}}
                                        </td>
                                        <td>
                                        {{$item->namaPJ ?? ''}}
                                        </td>
                                        <td>
                                            <a href="/approvelpj/{{$item->namaKegiatan}}/{{$username}}" class="btn btn-xs btn-primary">Cetak</a> 
                                             </td>
                                    </tr>
                                    @endif
                                    @endif
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
    </body>
</html> <!-- penutup html -->




<!-- ditulis setelah tag </div> penutup Daftar Buku -->
<div class="col-6">
    @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
</div>
<!-- ditulis sebelum tag <div> pembuka tabel -->


</body>
@endsection
<!-- @foreach($proposal as $item)
<div class="list">
@if(isset($item->lpj->approvedbyKabid))
@if($item->lpj->approvedbyKabid == 0) -->
    <!-- <h1>{{$item->lpj->lpjID ?? ''}}</h1> -->
<!--     <span>{{$item->namaKegiatan ?? ''}}</span>
    <a href="/approve/" style="float:right"><i class="fa fa-arrow-circle-right"></i>lihat</a>
    <h1></h1>
@endif
@endif
</div>
@endforeach -->