<?php
include 'vlasnik.php';
include 'tip_nekretnine.php';
include 'nekretnina.php';
include 'konekcija.php';

$uspesnoPoruka ='';
$error = '';
$errorC = '';
$errorP = '';
$errorS = '';
$adresa='';
$grad='';
$cena='';
$povrsina='';

$nizTipova = Tip::vratiSve($konekcija);
$nizVlasnika = Vlasnik::vratiSve($konekcija);

if(isset($_POST['unesi'])){
	
	if(empty($_POST['adress'])){
		$uspesnoPoruka = 'Not saved!';
		$error = 'Adress can not be empty!';
	} else{
	$adresa = trim($_POST['adress']);
	}
	
	if(empty($_POST['city'])){
		$errorC = 'City can not be empty!';
	}else{
	$grad = trim($_POST['city']);
	}
	
	if(empty($_POST['sizeInM'])){
		$errorS = 'Size can not be empty!';
	}else{
	$povrsina = trim($_POST['sizeInM']);
	}
	
	if(empty($_POST['price'])){
		$errorP = 'Price can not be empty!';
	}else{
	$cena = trim($_POST['price']);
	}
	
	$tip = trim($_POST['typeOfRealestate']);
	$vlasnik = trim($_POST['owner']);
	
	
	$nekretnina = new Nekretnina(null,$adresa,$grad,$povrsina,$cena,$vlasnik,$tip);

	if(empty($adresa) || empty($grad) || empty($povrsina) || empty($cena)){
		$uspesnoPoruka = "Not saved!";
	}else if($nekretnina->sacuvaj($konekcija)){
		$uspesnoPoruka = 'Saved!';
	}else{
		$uspesnoPoruka = 'Not saved!';
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="img/imgIcon.png" rel="shortcut icon"/>
<title>REAL ESTATES agency</title>
<meta name="description" content="">
<meta name="author" content="">

<link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/nivo-lightbox/nivo-lightbox.css">
<link rel="stylesheet" type="text/css" href="css/nivo-lightbox/default.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<!-- Navigation
    ==========================================-->
<nav id="menu" class="navbar navbar-default navbar-fixed-top">
  <div class="container"> 
  
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
	  <a class="navbar-brand page-scroll" href="index.html">REAL ESTATES</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="search.php" class="page-scroll">Search</a></li>
        <li><a href="sort.php" class="page-scroll">Sort By Price</a></li>
        <li><a href="add.php" class="page-scroll">Add New</a></li>
        <li><a href="change.php" class="page-scroll">Change</a></li>
        <li><a href="delete.php" class="page-scroll">Delete</a></li>
		<li><a href="view.php" class="page-scroll">View</a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
</nav>

<br><br><br><br><br><br>
	<section class="intro-section spad ">
		<div class="container">
			<div class="row">
				<div class="col-lg-9">
					<div class="intro-content">
						<h2>Add New Real Estate</h2>

						<form action="" method="POST">

							<label for="adress">Adress </label>
							<input type="text" name="adress" class="form-control">
							<div id="greska"><?php echo $error?></div>
							<label for="city">City</label>
							<input type="text" name="city" class="form-control">
							<div id="greska"><?php echo $errorC?></div>
							<label for="sizeInM">Size(m2)</label>
							<input type="text" name="sizeInM" class="form-control">
							<div id="greska"><?php echo $errorS?></div>
							<label for="price">Price</label>
							<input type="text" name="price" class="form-control">
							<div id="greska"><?php echo $errorP?></div>

							<label for="typeOfRealestate">Type</label>
							<select id="typeOfRealestate" name="typeOfRealestate" class="form-control" >

								<?php
										foreach($nizTipova as $tip){
											?>
											<option value="<?php echo $tip->Tip_ID ?>"><?php echo $tip->Naziv ?></option>
											<?php
										}

								 ?>

							</select>

							<label for="owner">Owners Name</label>
							<select id="owner" name="owner" class="form-control" >

								<?php
										foreach($nizVlasnika as $vlasnik){
											?>
											<option value="<?php echo $vlasnik->Vlasnik_ID ?>"><?php echo $vlasnik->Ime.(" ").$vlasnik->Prezime ?></option>
											<?php
										}

								 ?>

							</select>

							<hr>
							<input type="submit" value="Add" name="unesi" class="btn-dark form-control">

						</form>


						<div id="rezultat">
								<?php echo $uspesnoPoruka; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<br><br><br><br>
	
<!-- Footer Section -->
<div id="footer">
  <div class="container text-center">
    <p>&copy; Somiiika</p>
  </div>
</div>
<script type="text/javascript" src="js/jquery.1.11.1.js"></script> 
<script type="text/javascript" src="js/bootstrap.js"></script> 
<script type="text/javascript" src="js/nivo-lightbox.js"></script> 
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>