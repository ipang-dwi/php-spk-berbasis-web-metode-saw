<?php
	session_start();
	if (!isset($_SESSION['login']))
		header('Location: index.php');
	include('configdb.php');
?>

<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title><?php echo $_SESSION['judul']." - ".$_SESSION['welcome']." - oleh ".$_SESSION['by'];?></title>
	
    <!-- Bootstrap core CSS -->
    <!--link href="ui/css/bootstrap.css" rel="stylesheet"-->
	<link href="ui/css/united.min.css" rel="stylesheet">
	
	<!-- Datatables -->
	<link rel="stylesheet" type="text/css" href="ui/css/datatables/dataTables.bootstrap.css">
	<link rel="stylesheet" type="text/css" href="ui/css/buttons.bootstrap.min.css">
	
	<script type="text/javascript" language="javascript" src="ui/js/jquery-1.11.3.min.js"></script>
	
	<!-- DataTables -->
	<script src="ui/js/jquery.dataTables.min.js"></script>
	<script src="ui/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="ui/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" language="javascript" src="ui/js/buttons.bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="ui/js/jszip.min.js"></script>
	<script type="text/javascript" language="javascript" src="ui/js/pdfmake.min.js"></script>
	<script type="text/javascript" language="javascript" src="ui/js/vfs_fonts.js"></script>
	<script type="text/javascript" language="javascript" src="ui/js/buttons.html5.min.js"></script>
	<script type="text/javascript" language="javascript" src="ui/js/buttons.print.min.js"></script>
	<script type="text/javascript" language="javascript" src="ui/js/buttons.colVis.min.js"></script>
	
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--script src="./index_files/ie-emulation-modes-warning.js"></script-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body>
	<div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?php echo $_SESSION['judul'];?></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="index.php">Home</a></li>
              <li><a href="kriteria.php">Data Kriteria</a></li>
              <li class="active"><a href="#">Data Alternatif</a></li>
			  <li><a href="analisa.php">Analisa</a></li>
              <li><a href="perhitungan.php">Perhitungan</a></li>
			  <li><a href="profile.php">Profile</a></li>
			  <li><a href="logout.php">Logout</a></li>
			</ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
	  <br><br><br>
		<ol class="breadcrumb">
		  <li><a href="index.php">Home</a></li>
		  <li class="active">Data Alternatif</li>
		</ol>
      <!-- Main component for a primary marketing message or call to action -->
      <div class="panel panel-primary">
		  <!-- Default panel contents -->
		  <div class="panel-heading">Data Alternatif Calon Karyawan</div>
						<?php
							//include 'config.php';
							$kriteria = $mysqli->query("select * from alternatif");
							if(!$kriteria){
								echo $mysqli->connect_errno." - ".$mysqli->connect_error;
								exit();
							}
							$i=0;
						?>
		  <div class="panel-body table-responsive">
			<a class='btn btn-primary' href='add-alternatif.php'> Tambah Data Alternatif Calon Karyawan</a><br /><br />
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama Calon Karyawan</th>
					<th>K1</th>
					<th>K2</th>
					<th>K3</th>
					<th>K4</th>
					<th>Opsi</th>
				</tr>
			</thead>
		 
			<tbody>
										<?php
												$i = 1;
												while ($row = $kriteria->fetch_assoc()) {
													echo '<tr>';
													echo '<td>'.$i++.'.</td>';
													echo '<td>'.ucwords($row["alternatif"]).'</td>';
													echo '<td>'.$row["k1"].'</td>';
													echo '<td>'.$row["k2"].'</td>';
													echo '<td>'.$row["k3"].'</td>';
													echo '<td>'.$row["k4"].'</td>';
													echo '<td><!--a href="#"><i class="fa fa-search"></i></a-->';
													?>
														  <a href="edit-alternatif.php?id=<?php echo $row['id_alternatif'];?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
														  <a href="del.php?id=<?php echo $row['id_alternatif'];?>" onClick="return confirm('Menghapus data ke-<?php echo $i-1;?> Alternatif <?php echo ucwords($row['alternatif']);?> ?');" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</a></td>
													<?php
													echo '</tr>';
												}
										?>
			</tbody>
			</table>
		  </div>
		  <div class="panel-footer"><b class="text-primary">By <?php echo $_SESSION['by'];?></b><b class="pull-right text-primary">&copy 2018</b></div>
		</div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="ui/js/bootstrap.min.js"></script>
	<script src="ui/js/bootswatch.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="ui/js/ie10-viewport-bug-workaround.js"></script>
	
	<!-- page script -->
	<script>
	$(document).ready(function() {
		$('#example').DataTable( {
			"ordering": false,
			"language": {
					"url": "ui/css/datatables/Indonesian.json"
				},
			dom: 'Bfrtip',
			buttons: [
				'copy', 'excel', 'pdf', 'print'
			]
		} );
	} );
	</script>
</body></html>