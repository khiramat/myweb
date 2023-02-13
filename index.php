<?php
require_once('/var/www/kh/inc/inc_init.php');
?>
<!DOCTYPE html>
<html>
<?php
require_once('/var/www/kh/inc/inc_head.php');
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
	<?php
	require_once('/var/www/kh/inc/inc_top_nav.php');
	require_once('/var/www/kh/inc/inc_side_menu.php');
	?>
	
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
		</div>
		<!-- /.content-header -->
		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<div id="pageDisplay"></div>
			</div>
			<!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	<?php
	require_once('/var/www/kh/inc/inc_footer.php');
	?>
</div>
<?php
include('/var/www/kh/inc/inc_script.php');
?>

</body>
</html>
