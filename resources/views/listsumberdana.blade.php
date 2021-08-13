@extends('v_lte')
@section('content')
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        </head>
    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow rounded">
                        <div class="card-body">
                            <center>
                                <h1>Daftar Sumber Dana</h1>
                                <p>Paroki Santa Maria Assumpta</p>
                            </center>
                            <a class="btn btn-primary float-right mt-2" href="/tambahsumberdana" role="button">Tambah Data</a>
                        <table class="table table-bordered">
                            <thead>
                                <th scope="col">No.</th>
                                <th scope="col" colspan="2">Sumber Dana</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                               @foreach($list as $key)
                                    <tr>
                                        <td class="text-center">
                                        {{ $loop->iteration }}
                                        </td>
                                        <td colspan="2">
                                        {{$key->sumberDeskripsi}}
                                        </td>
                                       
                                        <td style="float:right">
                                            <a href="/hapussumberdana/{{$key->sumberID}}" onclick="return confirm('Yakin ingin hapus sumber dana ini?')" class="btn btn-danger btn-primary">Hapus</a> 
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