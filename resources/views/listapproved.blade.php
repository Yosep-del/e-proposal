@extends('v_lte')
@section('content')
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        </head>
    <body style="font-family:roboto">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow rounded">
                        <div class="card-body">
                            <center>
                                <h1>Daftar Proposal yang Sudah di Approve</h1>
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
                               @foreach($nameapproval as $key)
                                    <tr>
                                        <td class="text-center">
                                        {{ $loop->iteration }}
                                        </td>
                                        <td colspan="2">
                                        {{$key->namaKegiatan}}
                                        </td>
                                        <td>
                                        {{$key->nomorRAPB}}
                                        </td>
                                        <td>
                                        {{$key->namaPJ}}
                                        </td>
                                        <td style="float:right">
                                            <a href="/approved/{{$key->namaKegiatan}}/{{$username}}" class="btn btn-xs btn-primary">Lihat</a> 
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