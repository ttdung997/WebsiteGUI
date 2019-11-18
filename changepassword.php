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
                    <a class="brand-link">
                        <img src="admin_asset_web/dist/img/bkcs-logo.png" alt="BKCS" class="brand-image img-circle elevation-3" style="opacity: .8; margin-left: 6px;">
                        <span class="brand-text font-weight-light"><strong class="css-color-blue"><b>BANK DASHBOARD</b></strong></span>
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
           <p><i class="fa fa-globe" aria-hidden="true"></i> &nbsp;Đổi mật khẩu</p>
          </a>
        </li>
                                <li class="nav-item has-treeview">
                                    <a href="php/logout.php" class="nav-link">
                                        <p><i class="fa fa-sign-out" aria-hidden="true"></i> &nbsp;Đăng xuất </i>
                                        </p>
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
                    <div class="container-fluid-header">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Thay đổi mật khẩu</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="/"><i class="fa fa-home" aria-hidden="true"></i> Trang chủ</a></li>
                                    <li class="breadcrumb-item active">Thay đổi mật khẩu</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <?php
              if(isset($_SESSION['notification'])){
             ?>
                                        <center>
                                            <div class="alert alert-success">
                                                <?=$_SESSION['notification']?>
                                                    <br>
                                            </div>
                                        </center>
                                        <?php
                }
                session_destroy();
                session_start();

              ?>
              <?php
              if(isset($_SESSION['error'])){
                       ?>
                                    <center><div style="background-color: #f8d7da!important;" class="alert alert-danger">
                                       <?=$_SESSION['error']?> <br>
                                    </div></center>
              <?php
                }
    
              ?>

                               <!-- /.card -->
             <form action="php/changepass.php" method="POST">
            <input type="hidden" name="form" value="1">
            <div class="form-group">

                <table>
                    <tbody>
                   
                        <tr>
                            <td><label style="width: 200px" for="input_IP1"> Mật khẩu cũ</label></td>
                            <td><input  type="password"  class="form-control" name="oldpass"></td>
                        </tr>
                        <tr>
                            <td><label style="width: 200px" for="input_IP1">Mật khẩu mới</label></td>
                            <td><input type="password"  class="form-control" id="newpass" name="newpass"></td>
                        </tr>


            </tbody>
            </table>
            </div>
            <button type="submit" class="btn btn-add Disable"><i class="fa fa-plus" aria-hidden="true"></i> Thay mật khẩu</button>
        </form>             
                    </div>
                    <!-- /.card-body -->
            </div>
           
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
        </section>
        <!-- /.content -->
        </div>

        <footer class="main-footer">
            <strong>Copyright &copy; BKCS</a>.</strong> All rights reserved.
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
        <script type="text/javascript">
$(document).ready(function() {
        $.ajax({
            type: "GET",
            url: 'php/info.php',
            success: function(response)
            {
                alert(response);
                alert(jsonData[0]);
 
               
           }
       });
     });
</script>
    </body>

    </html>