<?php 
include "../koneksi.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['admin'])){
	$email = $_SESSION['admin'];
	$sql = "select * from admin where email = '$email'";
	$query = mysqli_query($koneksi,$sql);
	$sel = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <link rel="shortcut icon" href="../assets/images/Goputsalgaji.png">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GO Futsal || Administration </title>

    <!-- Bootstrap -->
    <link href="assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="assets/build/css/custom.min.css" rel="stylesheet">
    <style>
    #side-custom{
		background-color:#03C;
	}
    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><img src="../assets/images/Goputsalgaji.png" style="width:30px; height:30px;"> <span>GO Futsal</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="images/<?php echo $sel['foto']; ?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Selamat Datang,</span>
                <h2><?php echo $sel['nama']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Admin</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-th-list"></i> Data Anggota <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?url=admin">Admin</a></li>
                      <li><a href="index.php?url=opt">Operator</a></li>
                      <li><a href="index.php?url=member">Member</a></li>
                      <li><a href="index.php?url=lap">Lapangan</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Konfirmasi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?url=opt_confirm">Konfirmasi Operator</a></li>
                      <li><a href="index.php?url=bayar_confirm">Konfirmasi Pembayaran</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Data Pemesanan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?url=pesanon">Pemesanan Online</a></li>
                      <li><a href="index.php?url=pesanoff">Pemesanan Offline</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-pie-chart"></i> Laporan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?url=grafp">Grafik Pemesanan</a></li>
                      <li><a href="index.php?url=grafm">Grafik Member</a></li>
                      <li><a href="index.php?url=grafo">Grafik Operator</a></li>
                    </ul>
                  </li>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
           
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/<?php echo $sel['foto']; ?>" alt=""><?php echo $sel['nama']; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                   
                    <li><a href="adm_logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/<?php echo $sel['foto']; ?>" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                   </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <?php 
		if(isset($_GET['url'])){
			if($_GET['url'] == 'admin'){
				include "adm_data_admin.php";
				}
			elseif($_GET['url'] == 'opt'){
				include "adm_data_opt.php";
				}
			elseif($_GET['url'] == 'member'){
				include "adm_data_member.php";
				}
			elseif($_GET['url'] == 'lap'){
				include "adm_data_lap.php";
				}
			elseif($_GET['url'] == 'opt_confirm'){
				include "adm_opt_konfirmasi.php";
				}
			elseif($_GET['url'] == 'bayar_confirm'){
				include "adm_bayar_konfirmasi.php";
				}
			elseif($_GET['url'] == 'pesanon'){
				include "adm_pesan_online.php";
				}
			elseif($_GET['url'] == 'pesanoff'){
				include "adm_pesan_offline.php";
				}
			elseif($_GET['url'] == 'grafp'){
				include "adm_graf_pem.php";
				}
			elseif($_GET['url'] == 'grafm'){
				include "adm_graf_member.php";
				}
			elseif($_GET['url'] == 'grafo'){
				include "adm_graf_opt.php";
				}
			}else{
				include "adm_bayar_konfirmasi.php";
			//include "adm_home.php";	
			}
		?>
        <?php ?>
        
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            GO Futsal - GO Team
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="assets/vendors/nprogress/nprogress.js"></script>
    <!-- Datatables -->
    <script src="assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="assets/vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="assets/build/js/custom.min.js"></script>
    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->
  </body>
</html>
<?php 
}else{
    echo "<script> alert(\"Silahkan Login Terlebih Dahulu\"); window.location = \"adm_login.php\"; </script>";
  }
?>