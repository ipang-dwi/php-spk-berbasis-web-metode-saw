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
    <link href="ui/css/bootstrap.css" rel="stylesheet">
	<link href="ui/css/united.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="ui/css/jumbotron.css" rel="stylesheet">

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
              <li><a href="alternatif.php">Data Alternatif</a></li>
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
		  <li><a href="alternatif.php">Data Alternatif</a></li>
		  <li class="active">Edit Data Alternatif</li>
		</ol>
      <!-- Main component for a primary marketing message or call to action -->
      <div class="panel panel-primary">
		  <!-- Default panel contents -->
		  <div class="panel-heading">Edit Data Alternatif Calon Karyawan</div>
						<?php
									$result = $mysqli->query("select * from alternatif where id_alternatif = ".$_GET['id']."");
									if(!$result){
										echo $mysqli->connect_errno." - ".$mysqli->connect_error;
										exit();
									}
									while($alt = $result->fetch_assoc()){
										$a[0] = $alt['alternatif'];
										$a[1] = $alt['k1'];
										$a[2] = $alt['k2'];
										$a[3] = $alt['k3'];
										$a[4] = $alt['k4'];
									}
						?>
		  <div class="panel-body">
							<form role="form" method="post" action="edit.php?id=<?php echo $_GET['id'];?>">
                                    <div class="box-body">
                                       <?php
														$kriteria = $mysqli->query("select * from kriteria");
														if(!$kriteria){
															echo $mysqli->connect_errno." - ".$mysqli->connect_error;
															exit();
														}
														$i=0;
														while ($row = $kriteria->fetch_assoc()) {
															$k[$i] = $row['kriteria'];
															$i++;
														}
										?>
										<div class="form-group">
                                            <label for="alternatif">Alternatif Nama Karyawan</label>
                                            <input type="text" class="form-control" name="alternatif" id="alternatif" placeholder="Alternatif Nama Karyawan" value="<?php echo $a[0];?>">
                                        </div>
										<div class="form-group">
                                            <label for="k1"><?php echo $k[0];?></label>
                                            <input type="number" min="1" step="1" class="form-control" name="k1" id="k1" placeholder="<?php echo $k[0];?>" value="<?php echo $a[1];?>" required >
                                        </div>
										<div class="form-group">
                                            <label for="k2"><?php echo $k[1];?></label>
                                            <input type="number" min="1" step="1" class="form-control" name="k2" id="k2" placeholder="<?php echo $k[1];?>" value="<?php echo $a[2];?>"  required >
                                        </div>
										<div class="form-group">
                                            <label for="k3"><?php echo $k[2];?></label>
                                            <input type="number" min="1" step="1" class="form-control" name="k3" id="k3" placeholder="<?php echo $k[2];?>" value="<?php echo $a[3];?>" required >
                                        </div>
										<div class="form-group">
                                            <label for="k4"><?php echo $k[3];?></label>
                                            <input type="number" min="1" step="1" class="form-control" name="k4" id="k4" placeholder="<?php echo $k[3];?>" value="<?php echo $a[4];?>" required >
                                        </div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
										<button type="reset" class="btn btn-info">Reset</button>
										<a href="alternatif.php" type="cancel" class="btn btn-warning">Batal</a>
                                        <button type="submit" class="btn btn-primary">Proses Edit</button>
                                    </div>
                            </form>
		  </div>
		  <div class="panel-footer"><b class="text-primary">By <?php echo $_SESSION['by'];?></b><b class="pull-right text-primary">&copy 2018</b></div>
		</div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="ui/js/jquery-1.10.2.min.js"></script>
	<script src="ui/js/bootstrap.min.js"></script>
	<script src="ui/js/bootswatch.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="ui/js/ie10-viewport-bug-workaround.js"></script>

</body></html>