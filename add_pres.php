<?php
// Create database connection using config file
include_once("config.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT *, prestasi.gelar, prestasi.penyelenggara, prestasi.tingkatan, prestasi.tahun FROM anggota inner join prestasi on anggota.nia = prestasi.nia");
?>
 
 <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Sistem Informasi UKMP</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">UKM Penelitian</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="#">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="anggota.php">
              <span data-feather="users" class="align-text-bottom"></span>
              Anggota UKMP
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="prestasi.php">
              <span data-feather="award" class="align-text-bottom"></span>
              Prestasi UKMP
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file" class="align-text-bottom"></span>
              Publikasi UKMP
            </a>
          </li>
        </ul>

      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Menambah Prestasi</h1>
      </div>

	  <div class="container">
	  <div class="col-3"></div>
      <div class="col-6"><form action="add_pres.php" method="post" name="form1">
		<div class="row mb-3">
			<div class="col"><label for="exampleInputEmail1" class="form-label">NIA</label>
			<input type="number" class="form-control" name="nia">
			<div id="emailHelp" class="form-text">Pastikan NIA terdiri dari 6 angka</div></div>
		</div>
        <div class="mb-3">
			<label for="exampleInputPassword1" class="form-label">Gelar</label>
			<input type="text" class="form-control" name="gelar">
		</div>
        <div class="mb-3">
			<label  class="form-label">Penyelenggara</label>
			<input type="text" class="form-control" name="penyelenggara">
		</div>
        <div class="mb-3">
			<label  class="form-label">Tingkatan</label>
			<input type="text" class="form-control" name="tingkatan">
		</div>
		<div class="mb-3">
			<label for="exampleInputPassword1" class="form-label">Tahun</label>
			<input type="number" class="form-control" name="tahun">
		</div>
		<button type="submit" name="Submit" class="btn btn-primary">Tambah Prestasi</button>
		</form>
	</div>
      <div class="col-3"></div>
	  </div>
      

	

	<?php
 
	// Check If form submitted, insert form data into users table.
	if(isset($_POST['Submit'])) {
		$nia = $_POST['nia'];
		$gelar = $_POST['gelar'];
		$penyelenggara = $_POST['penyelenggara'];
		$tingkatan = $_POST['tingkatan'];
		$tahun = $_POST['tahun'];
		
		// include database connection file
		include_once("config.php");
				
		// Insert user data into table
		// $result = mysqli_query($mysqli, "INSERT INTO anggota(nia,nim,nama,bidangid,prodi), prestasi(nia,gelar, penyelenggara, tingkatan, tahun) VALUES($nia,$nim,'$nama','$bidang','$prodi'), ($nia,'$gelar','$penyelenggara','$tingkatan',$tahun)");
        $result = mysqli_query($mysqli, " INSERT INTO prestasi(nia, gelar,penyelenggara,tingkatan,tahun) VALUES($nia, '$gelar','$penyelenggara','$tingkatan',$tahun)");
		
		// Show message when user added
		echo "User added successfully. <a href='prestasi.php'>View Users</a>";
	}
	?>
    </main>
  </div>
</div>



    
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
