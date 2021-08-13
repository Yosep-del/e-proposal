
<head>

</head>

<div >
      <label for="">Rincian Kegiatan</label>
     
         <section>
             <div class="panel panel-footer" >
                 <table class="table table-bordered">
                     <thead>
                         <tr>
                             <th>Kegiatan</th>
                             <th>Tempat</th>
                             <th>Waktu Mulai</th>
                             <th>Waktu Selesai</th>
                             <th><a href="#" class="addRowRK"><i class="fas fa-plus"></i></a></th>
                         </tr>
                     </thead>
                     <tbody class="RK">
                        <tr>
                            <td><input type="text" name="Kegiatan[]" class="form-control" ></td>
                            <td><input type="text" name="Tempat[]" class="form-control" ></td>   
                            <td><input type="date" name="Waktu_mulai[]" class="form-control" ></td>
                            <td><input type="date" name="Waktu_selesai[]" class="form-control" ></td>
                            <td><a href="#" class="btn btn-danger removeRK"><i class="fas fa-times"></i></a></td>
                        </tr>
                         </tr>
                     </tbody>
                     
                 </table>
             </div>
         </section>
      
    </div>

    <div >
      <label for="">Anggaran</label>
    
         <section>
             <div class="panel panel-footer" >
                 <table class="table table-bordered table-condensed">
                     <thead>
                         <tr >
                             <th>Keperluan</th>
                             <th>satuan</th>
                             <th>jumlah Satuan</th>
                             <th>Harga Satuan</th>
                             <th>Subtotal</th>
                             <th><a href="#" class="addRowAng"><i class="fas fa-plus"></i></a></th>
                         </tr>
                     </thead>
                     <tbody class="Ang">
                        <tr>
                            <td><input type="text" name="Keperluan[]" class="form-control"   ></td>
                            <td><input type="text" name="Jumlah[]" class="form-control"   ></td>   
                            <td><input type="number" name="Satuan[]" class="form-control Satuan"   ></td>
                            <td><input type="text" name="Harga[]" class="form-control Harga"   ></td>
                            <td><input type="text" name="Subtotal[]" class="form-control Subtotal" ></td>
                            <td><a href="#" class="btn btn-danger removeAng"><i class="fas fa-times" ></i></a></td>
                        </tr>
                         </tr>
                     </tbody>
                     <tfoot>
                         <tr>
                             <td style="border: none"></td>
                             <td style="border: none"></td>
                             <td style="border: none"></td>
                             <td style="font-size:120%">Total</td>
                             <td><b class="total"></b> </td>
                             <td style="border: none"></td>
                         </tr>
                     </tfoot>
                 </table>
             </div>
         </section>
      
    </div> @endsection