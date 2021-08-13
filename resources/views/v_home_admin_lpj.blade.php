@extends('v_lte_admin_lpj')

@section('content')

<?php
//get data
//ambil data total
  $conn= mysqli_connect("localhost","root","","e-proposal");


  $get1 = mysqli_query($conn, "select * from proposal");
  $get2 = mysqli_query($conn, "select * from lpj");
  $get3 = mysqli_query($conn, "select * from userproposal");
  $get4 = mysqli_query($conn, "select * from bidang");
  
  $count1 = mysqli_num_rows($get1);  
  $count2 = mysqli_num_rows($get2);
  $count3 = mysqli_num_rows($get3);
  $count4 = mysqli_num_rows($get4);

  $propoApproved = mysqli_query($conn, "SELECT COUNT(jenisProposal) FROM Proposal WHERE proposal.approvedbyRomo = '1' AND proposal.approvedbyKabid = '1'");
  
?>


<section class="content-header">
  <h1>Dashboard</h1>
  <small>Admin</small>
  <ol class="breadcrumb">
    <li>
      <a href="/dashboard"><i class="fa fa-dashboard"></i></a>
    </li>
    <li class="active">Dashboard</li>
  </ol>

  <script src="https://ajax.googleapis/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 

</section>

<section class="content"> 
    <!-- Small boxes (Stat box) -->
    <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3><?= $count1; ?></h3>

                <p>Total Proposal</p>
              </div>
              <div class="icon">
                <i class="fa fa-file-pdf-o"></i>
              </div>
              <a href="/listLPJ" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <!-- <div class="small-box bg-success"> -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3><?= $count2; ?></h3>
                <!-- <sup style="font-size: 20px">%</sup> -->
                <p>Total LPJ</p>
              </div>
              <div class="icon">
                <i class="fa fa-file-pdf-o"></i>
              </div>
              <a href="/listLPJ" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <!-- <div class="small-box bg-warning"> -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3><?= $count3; ?></h3>

                <p>Total Anggota Pengurus</p>
              </div>
              <div class="icon">
                <!-- <i class="ion ion-person-add"></i> -->
                <i class="fa fa-group"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3><?= $count4; ?></h3>

                <p>Total Bidang</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->


        

    <!-- This is for pie chart header-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Nama Bidang', 'Jumlah File'],
          // {!!json_encode($data)!! }
          
          // @php
          // foreach($pieChart_3d as $data){
          //   echo "['".$data->namaBidang."',".$data->count."],";
          // }
          // @endphp

          ['Satgas Liturgi dan Peribadatan',     7],
          ['Pewartaan dan Evangelisasi',      5],
          ['Pelayanan Kemasyarakatan',  2],
          ['Paguyuban dan Persaudaraan', 3],
          ['Rumah Tangga', 2],
          ['Penelitian dan Pengembangan', 4],

          
          
          // ['Sleep',    7]
        ]);
        
        var options = {
          title: 'Data Jumlah LPJ per Bidang',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script> 

    <!-- End of pie chart header -->
  
    
       
        <div class="panel">
          <div id="chartProposal"></div>
        </div>
              
        <!-- <div class="panel">
          <div id="pieProposalTimpel"></div>
        </div> -->
        
        

        <div class="row">
          <section class="col-lg-7 connectedSortable">
              <!-- This is for pie chart style-->
              <div id="piechart_3d" style="width: 700px; height: 400px;"></div>
              <!-- End of pie chart style -->
          </section> 
          <section class="col-lg-5 connectedSortable">
              <div class="panel">
                <div id="chartLineBaru"></div>
              </div>
          </section> 
        </div>
        <!-- This is for pie chart style-->
        <div id="piechart_3d" style="width: 700px; height: 400px;"></div>
        <!-- End of pie chart style -->

<!-- endsectioncontent -->
</section> 
@endsection 

  

@section('chartBidang')
<section>
  
  <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
          Highcharts.chart('chartProposal', {
          chart: {
              type: 'column'
          },
          title: {
              text: 'Proposal Data per Bidang'
          },
          subtitle: {
              text: 'Approved atau Belum Approved'
          },
          xAxis: {
              categories: 
              // {!!json_encode($categories)!! }
              [
                'Satgas Liturgi dan Peribadatan',
                'Pewartaan dan Evangelisasi',
                'Pelayanan Kemasyarakatan',
                'Paguyuban dan Persaudaraan',
                'Rumah Tangga',
                'Penelitian dan Pengembangan'
                  // 'March',
                  // 'April',
                  // 'May',
                  // 'June',
                  // 'July',
                  // 'August',
                  // 'September',
                  // 'October',
                  // 'November',
                  // 'December'
                  
              ],
              crosshair: true
          },
          yAxis: {
              min: 0,
              title: {
                  text: 'Jumlah Data'
              }
          },
          tooltip: {
              headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
              pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                  '<td style="padding:0"><b>{point.y:.1f} files</b></td></tr>',
              footerFormat: '</table>',
              shared: true,
              useHTML: true 
          },
          plotOptions: {
              column: {
                  pointPadding: 0.2,
                  borderWidth: 0,
                  colorByPoint: true
              }
          },
          series: [{
              name: 'Approved',
              //data: [22, 33]
              data: [48, 38, 12, 34, 76, 34]
              // data: [48, 38, 12, 34, 76, 34, 23, 45, 65, 10, 38, 19]

          }, {
              name: 'Belum Approved',
              //data: [21, 43]
              data: [33, 44, 54, 44, 32, 35]
              //data: [42, 33, 34, 31, 65, 45, 24, 56, 57, 53, 21, 13]

          }
          //,
          // {
          //     name: 'Pelayanan Kemasyarakatan',
          //     //data: [32, 34]
          //     data: [48, 38, 12, 34, 76, 34]
          //     //data: [42, 33, 12, 23, 64, 78, 16, 24, 17, 26, 22, 10]

          // },
          // {
          //     name: 'Paguyuban dan Persaudaraan',
          //     //data: [21, 43]
          //     data: [48, 38, 12, 34, 76, 34]
          //     //data: [42, 33, 34, 45, 46, 47, 24, 23, 25, 24, 12, 16]

          // },
          // {
          //     name: 'Rumah Tangga',
          //     // data: [23, 45]
          //     data: [48, 38, 12, 34, 76, 34]
          //     //data: [42, 33,  78, 79, 70, 90, 45, 43, 42, 41, 14, 15]

          // },
          // {
          //     name: 'Penelitian dan Pengembangan',
          //     // data: [12, 13]
          //     data: [48, 38, 12, 34, 76, 34]
          //     //data: [42, 33, 26, 37, 49, 80, 24, 25, 26, 31, 22, 24]

          //}
          ]
      });
              
    </script>
  </section>
@endsection

<!-- @section('pieTimpel')
<section>
  <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
      Highcharts.chart('pieProposalTimpel', {
        chart: {
          type: 'variablepie'
        },
        title: {
          text: 'Countries compared by population density and total area.'
        },
        tooltip: {
          headerFormat: '',
            pointFormat: '<span style="color:{point.color}">\u25CF</span> <b> {point.name}</b><br/>' +
              'Area (square km): <b>{point.y}</b><br/>' +
                'Population density (people per square km): <b>{point.z}</b><br/>'
        },
        series: [{
          minPointSize: 10,
          innerSize: '20%',
          zMin: 0,
          name: 'countries',
                data: [{
                    name: 'Spain',
                    y: 505370,
                    z: 92.9
                }, {
                    name: 'France',
                    y: 551500,
                    z: 118.7
                }, {
                    name: 'Poland',
                    y: 312685,
                    z: 124.6
                }, {
                    name: 'Czech Republic',
                    y: 78867,
                    z: 137.5
                }, {
                    name: 'Italy',
                    y: 301340,
                    z: 201.8
                }, {
                    name: 'Switzerland',
                    y: 41277,
                    z: 214.5
                }, {
                    name: 'Germany',
                    y: 357022,
                    z: 235.6
                }]
            }]
        });
    </script>
</section>
@endsection
 -->

@section('chartLine')
<section>
  <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous">
  </script>
  <script type="text/javascript">
      //var $propoApproved = 
      //php echo json_encode($propoApproved)?>
      // var $propoNotApproved = php echo json_encode($propoNotApproved)?>

      Highcharts.chart('chartLineBaru', {

      title: {
          text: 'Proposal Approved atau Belum Approved'
      },

      subtitle: {
          text: 'Periode Satu Tahun'
      },

      yAxis: {
          title: {
              text: 'Jumlah Files'
          }
      },

      xAxis: {
        categories: ['January','February','March','April','May','June','July', 'August','September','October','November','December']
          // accessibility: {
          //     rangeDescription: 'Range: January to December'
          // }
      },

      // xAxis: {
      //     accessibility: {
      //         rangeDescription: 'Range: January to December'
      //     }
      // },

      legend: {
          layout: 'vertical',
          align: 'right',
          verticalAlign: 'middle'
      },

      // plotOptions: {
      //     series: {
      //         label: {
      //             connectorAllowed: false
      //         },
      //         pointStart: 2010
      //     }
      // },

       series: [
         //{
      //     name: 'Installation',
      //     data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
      // }, 
        // {
        //     name: 'Manufacturing',
        //     data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
        // }, 
      {
          name: 'Approved',
          // data: $propoApproved
          data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
        },//  {
      //     name: 'Project Development',
      //     data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
    //  },
      {   
          name: 'Belum Approved',
          // data: propoNotApproved
          data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
      }],

      responsive: {
          rules: [{
              condition: {
                  maxWidth: 500
              },
              chartOptions: {
                  legend: {
                      layout: 'horizontal',
                      align: 'center',
                      verticalAlign: 'bottom'
                  }
              }
          }]
      }

      });

  </script>


<!-- YANG TIDAK DIPAKAI -->
<!-- YANG TIDAK DIPAKAI -->
<!-- YANG TIDAK DIPAKAI -->
<!-- YANG TIDAK DIPAKAI -->
<!-- YANG TIDAK DIPAKAI -->
<!-- YANG TIDAK DIPAKAI -->
<!-- YANG TIDAK DIPAKAI -->
<!-- YANG TIDAK DIPAKAI -->

<!-- <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-file-pdf-o"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Proposal</span>
                <span class="info-box-number">
                  10 -->
                    <!-- // $this->infoBox->count_proposal(); -->
                    
                <!-- </span>
              </div> -->
              <!-- /.info-box-content -->
            <!-- </div> -->
            <!-- /.info-box -->
          <!-- </div> -->
          <!-- /.col -->

          <!-- <div class="col-12 col-sm-6 col-md-3"> -->
            <!-- <div class="info-box mb-3"> -->
            <!-- <div class="info-box">
              <span class="info-box-icon bg-green"><i class="fa fa-file-pdf-o"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah LPJ</span>
                <span class="info-box-number">41</span>
              </div> -->
              <!-- /.info-box-content -->
            <!-- </div> -->
            <!-- /.info-box -->
          <!-- </div> -->
          <!-- /.col -->

          <!-- fix for small devices only -->
          <!-- <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-blue"><i class="fa fa-handshake-o"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Bidang</span>
                <span class="info-box-number">760</span>
              </div> -->
              <!-- /.info-box-content -->
            <!-- </div> -->
            <!-- /.info-box -->
          <!-- </div> -->
          <!-- /.col -->

          <!-- <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-yellow"><i class="fa fa-group"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Anggota Pengurus</span>
                <span class="info-box-number">2,000</span>
              </div> -->
              <!-- /.info-box-content -->
            <!-- </div> -->
            <!-- /.info-box -->
          <!-- </div> -->
          <!-- /.col -->

          <!-- <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-orange"><i class="fa fa-heart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Tim Pelayanan</span>
                <span class="info-box-number">2,000</span>
              </div> -->
              <!-- /.info-box-content -->
            <!-- </div> -->
            <!-- /.info-box -->
          <!-- </div> -->
          <!-- /.col -->
          
        <!-- </div> -->

        <!-- /.row -->    




</section>
@endsection