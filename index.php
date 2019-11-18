<?php

include 'php/config.php';

$myFile = "php/pass.txt";
$myFileLink = fopen($myFile, 'r');
$myFileContents = fread($myFileLink, filesize($myFile));
fclose($myFileLink);

if($_COOKIE["token"] != $myFileContents) {
  $newURL = HOST."/login.php";
  header('Location: '.$newURL);
} 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sami</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin_asset_web/dist/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="admin_asset_web/dist/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="admin_asset_web/plugins/datatables/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin_asset_web/dist/css/adminlte1.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="admin_asset_web/plugins/iCheck/flat/blue.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="admin_asset_web/dist/css/google_font.css">
  <!-- passtrength -->
  <link rel="stylesheet" type="text/css" href="admin_asset_web/dist/css/passtrength.css">
  <!-- anomay css -->
  <link rel="stylesheet" href="admin_asset_web/dist/css/anomaly.css">
  </head>
<body class="hold-transition sidebar-mini" id="main-body">
<div class="wrapper" id="main">
        <!-- Navbar -->
<nav class="main-header navbar navbar-expand bg-white navbar-light header-custom page-topbar">
  <!-- Left navbar links -->


  


  <!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4">
  <!-- Brand Logo -->
  <a  class="brand-link">
    <img src="admin_asset_web/dist/img/bkcs-logo.png"
         alt="BKCS"
         class="brand-image img-circle elevation-3"
         style="opacity: .8; margin-left: 6px;">
    <span class="brand-text font-weight-light"><strong class="css-color-blue"><b>IPS DASHBOARD</b></strong></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

        <li class="menusection">Main</li>
         <li class="nav-item has-treeview">
          <a href="<?=HOST?>" class="nav-link">
           <p><i class="fa fa-home" aria-hidden="true"></i> &nbsp;Trang chủ</p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="show.php" class="nav-link">
           <p><i class="fa fa-globe" aria-hidden="true"></i> &nbsp;Phân tích dữ liệu</p>
          </a>
        </li> 
         <li class="nav-item has-treeview">
          <a href="changepassword.php" class="nav-link">
           <p><i class="fa fa-globe" aria-hidden="true"></i> &nbsp;Đổi mật khẩu</p>  <li class="nav-item has-treeview">
                                    <a href="php/logout.php" class="nav-link">
                                        <p><i class="fa fa-sign-out" aria-hidden="true"></i> &nbsp;Đăng xuất </i>
                                        </p>
                                    </a>
                                </li>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

</nav>
<!-- /.navbar -->
<!-- jQuery -->
<script src="admin_asset_web/plugins/jquery/jquery.min.js"></script>
<!-- -->
      <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div>
            <!-- /.card-header -->
            <div>
                                <div class="session">
                                    
                                                                    </div>
                                <div class="row">
                                        
                                <div class="col-md-5">
                                               
                                      <div class="card card-custom">

                                      <div class="card-header card-header-cus">
                                        <h3 class="card-title">Thông tin thiết bị</h3>

                                      </div>
                                      <div class="card-body">
                                           <?php
                                              $output = shell_exec('bash script/infomation.sh');
                                               
                                                $output = explode( '|||', $output);
                                                // print_r($output[3]);
                                                $data['time'] = explode( 'up', $output['0'])[0];
                                                $data['uptime'] = explode( 'up', $output['0'])[1];
                                                $data['uptime'] = explode( ',', $data['uptime'])[0];

                                                $data['process'] = $output[4];
                                                $data['cpuPercent'] = round((float)$output[3],2);
                                               
                                                $data['ramTotal'] = explode( '||', explode( ':', $output[1])[0])[0];
                                                
                                                $data['ramUsed'] =  explode('||', explode( ':', $output[1])[0])[1];
                                              
                                                $data['swapTotal'] = explode( '||', explode( ':', $output[2])[0])[0];
                                                $data['swapUsed'] = explode( '||', explode( ':', $output[2])[0])[1];
                                               $status = $data;
                                                // print_r($data);
                                           ?>

                                           <ul id="server-list" class="list-group">

                                          <li class="list-group-item">
                                          <a >
                                          <b class="color-b">Time:</b>
                                          </a>  <i id="timeInfo"></i> 
                                          </a>

                                          <b class="color-b" style="margin-left: 20px">Uptime:</b><i id="uptimeInfo"></i> 
                                          </li>
                                          <li class="list-group-item">
                                          <a>
                                          <b class="color-b">SWAP:</b>
                                          </a>  <i id ="swapInfo"> </i> 
                                          </a>
                                          </li>
                                          <li class="list-group-item">
                                          <a>
                                          <b class="color-b">Processes:</b>
                                          </a>  <i id = "processInfo"></i> 
                                          </a>
                                          </li>
                                          </ul>

                                      <?php
                                      $NetworkArray = shell_exec("ip link show | cut -d: -f2,2"."| awk -F".'" "'." '{ printf(".'"%-5s|||"'.", $0); }'");
                                      $NetworkArray = (explode( '|||', $NetworkArray));
                                        
                                        $data = [];
                                        $row =0;
                                        $i = 0;
                                        foreach ($NetworkArray as $nw) {
                                          $i =$i +1;
                                          if($i%2 ==0){
                                            continue;
                                          } 
                                          $nw = str_replace(' ', '', $nw);
                                          $data[] = $nw;
                                        }


                                    ?>
                                    <br>

                                   
                                         <table id="processTable" class="table table-hover table-striped">
              <thead class="header-table">
                  <tr>      
                      <th>Tên card mạng</th>
                      <th>Trạng thái</th>
                      <th>Địa chỉ IP</th>

                  </tr>

              </thead>
              <tbody>
              <?php
                foreach ($data as $nw) {
                  if($nw !=""){
                    $cmd =shell_exec("ip a|grep ".$nw."|grep inet");
                    if(isset(explode( 'inet', $cmd)[1])){
                      $sta = "<span style='color:#00d600'>Up</span>";
                      $ip = explode(" ",explode( 'inet', $cmd)[1])[1];
                    }else{
                      $ip ="";
                      $sta = "<span style='color:red'>Down</span>";
                    }
                    echo "<tr>";
                    echo "<td>".$nw."</td>";
                    echo "<td>".$sta."</td>";
                    echo "<td>".$ip."</td>";
                    echo "</tr>";
                }
              }
              ?>
              </tbody>
       </table>
                                        </div>
                                    </div>                         
                                </div>
                                    <div class="col-md-7">
                                      <div class="card card-custom">
                                      <div class="card-header">
                                        <h3 class="card-title">Biểu đồ thống kê</h3>
                                      </div>
                                      <div class="card-body"> 
                                        <div class="row">
                                          <div class="chart col-md-6">
                                          <center><h5>RAM Usage</h5></center>
                                            <canvas id="RamChart" height="auto" width="auto"></canvas>
                                          </div>
                                            <div class="chart col-md-6">
                                            <center><h5>CPU Usage<h5></center>
                                              <canvas id="CpuChart" height="auto" width="auto"></canvas>
                                              <br>
                                              <br>
                                              <br>
                                            </div>
                                          <div class="chart col-md-12">
                                          <center><h5>Network Usage<h5></center>
                                            <canvas id="line-chart" class="responsive"></canvas>
                                          </div>
                                        </div>
                                     </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                      <div class="card card-custom">
                                                         
                                      <div class="card-header">
                                      <form action="php/hardware.php" method="post" style="float: right;">
                 <input value="1" type="hidden" name="tab" id="tabSelect">
                 <button type="submit" class="btn btn-add Disable" style="margin-top: 10px;"><i class="fa fa-refresh" aria-hidden="true"></i> Làm mới</button>
              </form>
                                        <h3 class="card-title"> Cấu hình phần cứng </h3>
            
                                       
                                      </div>
                                      <div class="card-body">
                                      <?php
                                          $string = file_get_contents("data/hardware.json");
                                          $data = json_decode($string, true);
                                          // print_r($data);
                                      ?>
                                      <table id="processTable" class="table table-hover table-striped">
                                    <thead class="header-table">
                                        <tr>      
                                            <th>H/W path</th>
                                            <th>Thiết bị</th>
                                            <th>Phân lớp</th>
                                            <th>Mô tả</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $i = 0;
                                        foreach($data as $key=>$line){
                                          if($i == 15) break;
                                          $i = $i+1;
                                        echo "<tr>";
                                        foreach($line as $col){
                                            echo "<td>".$col."</td>";
                                        
                                         }
                                        echo "</tr>";
                                        }
                                     ?>
                                    </tbody>
                                   </table>
                                    </div>
                                                </div>
                                            </div>
                                <div class="col-md-6">
                                      <div class="card card-custom">
                                                         
                                      <div class="card-header">
                                        <h3 class="card-title"> Danh sách tiến trình</h3>

                                        <div class="card-tools">
                                         <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                          </button>
                                          <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                        </div>
                                      </div>
                                      <div class="card-body"> 
                                     <?php
                                        $output = shell_exec('sudo bash script/process.sh');
                                    // print_r($output);
                                        $begin_row = 1;
                                     $output = (explode( '|||', $output));
                                    
                                    $data = [];
                                    $row =0;
                                    foreach ($output as $line) {
                                        if ($row > $begin_row){
                                            while(strpos($line,'  ') > 0){
                                                $line = str_replace('  ', ' ', $line);
                                            }

                                        $word_list = explode("||",$line);
                                        if($os_flag == 1 && isset($word_list[3])){
                                            $time = $this->secondsToTime((int)$word_list[3]);
                                            $word_list[3] = $time['h'].":".$time['m'].":".$time['s'];
                                        }
                                        $data[] = $word_list;
                                        }
                                        $row = $row +1;
                                    }

                                     ?>
                                   <table class="table table-hover table-striped" id="Tabla">
                                            <thead class="header-table">
                                                <tr>
                                                    <th>Tên tiến trình</th>
                                                    <th>Dung lượng CPU (%)</th>
                                                    <th>Dung Lượng RAM (%)</th>
                                                    <th>Thời gian</th>
                                                </tr>
                                            </thead>
                                            <tbody id="TableBody">
                                            <?php
                                              foreach($data as $key=>$line){
                                            
                                       
                                                echo "<tr>";
                                                  foreach($line as $col){
                                                    echo "<td>".$col."</td>";
                                                  }
                                                  echo "</tr>";
                                              }
                                    ?>
                                     
                                        </tbody>
                                    </table>  

                                </div>

                                        </div>


                            </div>
                            <!--
                            <!-- /.card-body -->
                        </div>
                          </div>
                        </div>
                           
                            <a id="background-loading">
                              <img id="gif_load" hidden="" style="position: fixed; top: 50%;" src="admin_asset_web/dist/img/loading1.gif">
                            </a>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  
     <?php
                                      $networkMoniter = shell_exec("cat /tmp/network.txt | awk -F".'" "'." '{ printf(".'"%-5s|||"'.", $0); }'");
                                      
                                      $networkMoniter = (explode( '|||', $networkMoniter));
                                      $networkMoniter[0]= preg_replace('/\s\s+/', ' ', $networkMoniter[0]);
                                      $networkMoniter[0] = trim($networkMoniter[0]);
                                      $netList =explode( ' ', $networkMoniter[0]);


                                      $array =[];
                                      for($i=0;$i<count($netList);$i++){
                                        $array[$i] = [];
                                        $array[$i] = [];
                                      }

                                      for($i=3;$i<count($networkMoniter);$i++){
                                          $networkMoniter[$i]= preg_replace('/\s\s+/', ' ', $networkMoniter[$i]);
                                          $networkMoniter[$i] = trim($networkMoniter[$i]);
                                          $data =explode( ' ', $networkMoniter[$i]);
                                          for($j = 0;$j < count($netList);$j++){
                                                 $array[$j][0][] = $data[$j*2];
                                                 $array[$j][1][] = $data[$j*2+1];

                                          }


                                      }
                                      $netColor = [];
                                      $netColor[] = "#3e95cd";
                                      $netColor[] = "#8e5ea2";
                                      $netColor[] = "#3cba9f";
                                      $netColor[] = "#e8c3b9";
                                      $netColor[] = "#c45850";

                                    ?>
  <footer class="main-footer">
    <strong>Copyright &copy; BKCS</a>.</strong> All rights
    reserved.
  </footer>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="admin_asset_web/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="admin_asset_web/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="admin_asset_web/plugins/datatables/jquery.dataTables.js"></script>
<script src="admin_asset_web/plugins/datatables/dataTables.bootstrap4.js"></script>
<!-- SlimScroll -->
<script src="admin_asset_web/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="admin_asset_web/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="admin_asset_web/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="admin_asset_web/dist/js/demo.js"></script>
<!-- page script -->
<script src="admin_asset_web/dist/js/Form.js"></script>
<!-- iCheck -->
<script src="admin_asset_web/plugins/iCheck/icheck.min.js"></script>
<!-- pusher -->
<!-- <script src="https://js.pusher.com/4.1/pusher.min.js"></script> -->
<!-- datatable -->
<script type="text/javascript" src="admin_asset_web/dist/js/jquery.passtrength.min.js"></script>
<script type="text/javascript" src="admin_asset_web/dist/js/jquery.confirm.js"></script>



<!-- AdminLTE for demo purposes -->
<script src="admin_asset_web/dist/js/demo.js"></script>

<script src="admin_asset_web/plugins/js/Chart.js"></script>

<script>
function getNetwork(){
    $(document).ready(function() {
        $.ajax({
            type: "GET",
            url: 'php/network.php',
            success: function(response)
            {
                var jsonData = JSON.parse(response);

                new Chart(document.getElementById("line-chart"), {
                  type: 'line',
                  data: {
                    labels: [1,2,3,4,5,6,7,8,9,10],
                    datasets: [
                     <?php 
                  for($i=0;$i<count($netList);$i++){
                    ?>{ 
                        data: [
                          <?php
                            for($j=0;$j<10;$j++){
                             ?>
                              jsonData[<?=$i?>][1][<?=$j?>]
                             <?php
                                echo ",";
                            }
                          ?>
                        ],
                        label: "<?=$netList[$i]?>",
                        borderColor: "<?=$netColor[$i]?>",
                        fill: false
                      },
                  <?php
                    }
                  ?>

                    ]
                  },
                  options: {
                    title: {
                      display: true,
                      text: 'Lưu lượng cổng mạng của máy chủ (KBs)'
                    },
                    responsive: false,
                  }
                });
            }
       });
     });
   
}
getNetwork();

window.setInterval(function () {
  getNetwork();
}, 10000);  

</script>


<script type="text/javascript">
function getInfo(){
$(document).ready(function() {
    $.ajax({
        type: "GET",
        url: 'php/info.php',
        success: function(response)
        {

            var Data = JSON.parse(response);
            console.log(Data);

            var colors = ['#81BEF7','#28a745','#333333','#F5D0A9','#D0A9F5','#6c757d'];
            /* 3 donut charts */
            var donutOptions = {
              cutoutPercentage: 85, 
              legend: {
                position:'bottom', padding:5, labels: {
                  pointStyle:'circle', usePointStyle:true
                }
              },
              responsive: false
            };

            var ramTotal = Data.ramTotal;
            var ramUsed = Data.ramUsed;
            var ramFree = ramTotal - ramUsed;
            // donut 3
            var chDonutDataRAM = {
              labels: ['Used: '+ramUsed+'GiB', 'Free: '+ramFree+'GiB'],
              // labels: ['Used: 12GiB', 'Free: 38iB'],
              datasets: [
                {
                  backgroundColor: colors.slice(4,5),
                  borderWidth: 0,
                  data: [Data.ramUsed, ramFree]
                  // data: [12, 38]
                }
              ]
            };
            var chDonutRAM = document.getElementById("RamChart");
            if (chDonutRAM) {
            new Chart(chDonutRAM, {
                type: 'pie',
                data: chDonutDataRAM,
                options: donutOptions
            });
            Chart.defaults.global.defaultFontColor = '#dcf3ff';
            }
            cpuPercent = Data.cpuPercent;
            var CpuFree = 100 - cpuPercent
            // donut 3
            var chDonutDataCPU = {
              labels: ['Used: '+cpuPercent+'%', 'Free: '+CpuFree+'%'],
              datasets: [
                {
                  backgroundColor: colors.slice(3,4),
                  borderWidth: 0,
                  data: [cpuPercent, CpuFree]
                  // data: [1, 99]
                }
              ]
            };
            var chDonutCPU = document.getElementById("CpuChart");
            if (chDonutCPU) {
            new Chart(chDonutCPU, {
                type: 'pie',
                data: chDonutDataCPU,
                options: donutOptions
            });
            }
            swapTotal = Data.swapTotal;
            swapUsed = Data.swapUsed;

            var swapFree = swapTotal-swapUsed;

            var chDonutDataRAM = {
              labels: ['Used: '+swapUsed+'MiB', 'Free: '+swapFree+' MiB'],
              datasets: [
                {
                  backgroundColor: colors.slice(0,1),
                  borderWidth: 0,
                  data: [swapUsed, swapFree]
                  // data: [5, 95]
                }
              ]
            };
            var chDonutRAM = document.getElementById("SwapChart");
            if (chDonutRAM) {
            new Chart(chDonutRAM, {
                type: 'pie',
                data: chDonutDataRAM,
                options: donutOptions,
            });
            };
            document.getElementById("timeInfo").innerHTML = Data.time;
            document.getElementById("uptimeInfo").innerHTML = Data.uptime;
            document.getElementById("swapInfo").innerHTML = Data.swapUsed+"/"+Data.swapTotal;
            document.getElementById("processInfo").innerHTML = Data.process;

        }
       });
     });
   
}

getInfo();

window.setInterval(function () {
  getInfo();
}, 5000)

</script>
</body>
</html>

