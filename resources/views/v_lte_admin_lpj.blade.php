<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('lte')}}/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('lte')}}/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('lte')}}/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('lte')}}/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('lte')}}/dist/css/skins/skin-red.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

  <style>
.logog{
  width:100%;
  height:100%;
  background-color:white;
}
</style>
</head>
<body class="hold-transition skin-red sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>E</b>LPJ</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-mini"><b>ELPJ</b></span>
      <span class=""><img class="logog" src="/img/logo lpj.jpg" alt="logo lpj">
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span> 
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
    @include('v_nav_admin_lpj')
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
    @yield('content')
    @yield('form')
    @yield('editprofil')
    @yield('cariproposal')
    @yield('chartBidang')
    @yield('pieTimpel')
    @yield('chartLine')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer" style="background-color: #dd4b39;">
    <strong style="color: white;">Copyright &copy; 2021 E-Lpj Maria Assumpta Klaten</a>.</strong>
  </footer>

  <!-- Control Sidebar -->
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('lte')}}/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('lte')}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="{{asset('lte')}}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="{{asset('lte')}}/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('lte')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('lte')}}/dist/js/demo.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })

</script>
<script type="text/javascript">
    $(document).ready(function() {
      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });

      // saat tombol remove dklik control group akan dihapus 
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
    });
   
	 $(document).ready(function () {
	     $('.sidebar-menu').tree()
	 })
	 $('div.alert').not('.alert-important').delay(3000).fadeOut(800);


	 $('tbody').delegate('.Satuan,.Harga','keyup',function(){
        var tr=$(this).parent().parent();
        var Satuan=tr.find('.Satuan').val();
        var Harga=tr.find('.Harga').val();
        var Subtotal=(Satuan*Harga);
        tr.find('.Subtotal').val(Subtotal);
        total();
    });
    function total(){
        var total=0;
        $('.Subtotal').each(function(i,e){
            var Subtotal=$(this).val()-0;
        total +=Subtotal;
    });
    $('.total').html("Rp"+total);   
    }
    $('.addRowIT').on('click',function(){
        addRowIT();
    });
    $('.addRowRK').on('click',function(){
        addRowRK();
    });
    $('.addRowAng').on('click',function(){
        addRowAng();
    });
    $('.daftar').on('click',function(){
        daftar();
    });
    function addRowIT()
    {
        var tr='<tr>'+
        '<td><input type="text" name="Indikator[]" class="form-control" required=""></td>'+
        '<td><input type="text" name="Target[]" class="form-control"></td>'+
        '<td><a href="#" class="btn btn-danger removeIT"><i class="fas fa-times"></i></a></td>'+
        '</tr>';
        $('tbody.IT').append(tr);
    };
    function addRowRK()
    {
        var tr='<tr>'+
        '<td><input type="text" name="Kegiatan[]" class="form-control" required></td>'+
        '<td><input type="text" name="Tempat[]" class="form-control"></td>'+
        '<td><input type="date" name="Waktu_mulai[]" class="form-control Satuan" required=""></td>'+
        '<td><input type="date" name="Waktu_selesai[]" class="form-control Harga"></td>'+
        '<td><a href="#" class="btn btn-danger removeRK"><i class="fas fa-danger">Remove</i></a></td>'+
        '</tr>';
        $('tbody.RK').append(tr);
    };
    function test(){
      alert("you can not remove last row");

}
    function addRowAng()
    {
        var tr='<tr>'+
        '<td><input type="text" name="Keperluan[]" class="form-control" required=""></td>'+
        '<td><input type="text" name="Jumlah[]" class="form-control"></td>'+
        '<td><input type="number" name="Satuan[]" class="form-control Satuan" required=""></td>'+
        '<td><input type="text" name="Harga[]" class="form-control Harga"></td>'+
        ' <td><input type="text" name="Subtotal[]" class="form-control Subtotal"></td>'+
        '<td><a href="#" class="btn btn-danger removeAng"><i class="fas fa-danger">Remove</i></a></td>'+
        '</tr>';
        $('tbody.Ang').append(tr);
    };
    function daftar()
    {
      var number = this.Key;
      document.getElementById("daft").innerHTML = number;
    };
    

    $('.removeIT').live('click',function(){
        var last=$('tbody.IT tr').length;
        if(last==1){
            alert("you can not remove last row");
        }
        else{
             $(this).parent().parent().remove();
        }
    
    });
    $('.removeRK').live('click',function(){
        var last=$('tbody.RK tr').length;
        if(last==1){
            alert("you can not remove last row");
        }
        else{
             $(this).parent().parent().remove();
        }
    
    });
    $('.removeAng').live('click',function(){
        var last=$('tbody.Ang tr').length;
        if(last==1){
            alert("you can not remove last row");
        }
        else{
             $(this).parent().parent().remove();
        }
    
    });



    function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
document.getElementById("approved").onclick=function(){
  var element = document.getElementById("asy");
  element.parentNode.removeChild(element);
}


	
</script>
</body>
</html>

