<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$nia = $_POST['id'];
		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
		$bidang = $_POST['bidang'];
		$prodi = $_POST['prodi'];
		$angkatan = $_POST['angkatan'];
		
	// update user data
	$result = mysqli_query($mysqli, "UPDATE anggota SET nia=$nia, nim=$nim, nama='$nama',bidangid='$bidang',prodi='$prodi',angkatan=$angkatan  WHERE nia=$id ");
	
	// Redirect to homepage to display updated user in list
	header("Location: anggota.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM anggota WHERE nia=$id");
 
while($user_data = mysqli_fetch_array($result))
{
        $nia = $user_data['nia'];
		$nim = $user_data['nim'];
		$nama = $user_data['nama'];
		$bidang = $user_data['bidangid'];
		$prodi = $user_data['prodi'];
		$angkatan = $user_data['angkatan'];
}
?>
<html>
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
            <a class="nav-link active" href="anggota.php">
              <span data-feather="users" class="align-text-bottom"></span>
              Anggota UKMP
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="prestasi.php">
              <span data-feather="award" class="align-text-bottom"></span>
              Prestasi UKMP
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="publikasi.php">
              <span data-feather="file" class="align-text-bottom"></span>
              Publikasi UKMP
            </a>
          </li>
        </ul>
        
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h3">Mengedit data <?php echo $nama?></h2>
      </div>

	  <div class="container">
	  <div class="col-3"></div>
      <div class="col-6"><form name="update_user" method="post" action="edit.php">
		<div class="row mb-3">
			<div class="col"><label for="exampleInputEmail1" class="form-label" >NIA</label>
			<input type="number" class="form-control" name="nia" value=<?php echo $nia;?>>
			<div id="emailHelp" class="form-text">Pastikan NIA terdiri dari 6 angka</div></div>
			<div class="col"><label for="exampleInputPassword1" class="form-label" >NIM</label>
			<input type="number" class="form-control" name="nim" value=<?php echo $nim;?>></div>
		</div>
		
		<div class="mb-3">
			<label for="exampleInputEmail1" class="form-label" >Nama</label>
			<input type="text" class="form-control" name="nama" value=<?php echo $nama;?>>
		</div>
		<div class="mb-3">
			<label for="exampleInputPassword1" class="form-label">Bidang</label>
			<input type="text" class="form-control" name="bidang" value=<?php echo $bidang;?>>
		</div>
		<div class="mb-3">
			<label for="exampleInputPassword1" class="form-label ">Prodi</label>
			<input type="text" class="form-control" name="prodi" value=<?php echo $prodi;?>>
		</div>
		<div class="mb-3">
			<label for="exampleInputPassword1" class="form-label">Angkatan</label>
			<input type="number" class="form-control" name="angkatan" value=<?php echo $angkatan;?>>
		</div>
		<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
		<button type="submit" name="update" class="btn btn-primary">Update data <?php echo $nama ?></button>
		</form>
	</div>
      <div class="col-3"></div>
	  </div>
      

	

	<?php
 
	// Check If form submitted, insert form data into users table.
	if(isset($_POST['Submit'])) {
		$nia = $_POST['nia'];
		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
		$bidang = $_POST['bidang'];
		$prodi = $_POST['prodi'];
		$angkatan = $_POST['angkatan'];
		
		// include database connection file
		include_once("config.php");
				
		// Insert user data into table
		$result = mysqli_query($mysqli, "INSERT INTO anggota(nia,nim,nama,bidangid,prodi,angkatan) VALUES($nia,$nim,'$nama','$bidang','$prodi',$angkatan)");
		
		// Show message when user added
		echo "User added successfully. <a href='anggota.php'>View Users</a>";
	}
	?>
    </main>
  </div>
</div>



    
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</body>
</html>
