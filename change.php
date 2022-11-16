<?php
include 'vlasnik.php';
include 'tip_nekretnine.php';
include 'nekretnina.php';
include 'konekcija.php';

$uspesnoPoruka ='';
$nizNekretnina = Nekretnina::vratiSve($konekcija);

if(isset($_POST['izmena'])){
	
	$nekretnina_ID = trim($_POST['Nekretnina_ID']);
	$adresa = trim($_POST['adress']);
	$grad = trim($_POST['city']);
	$povrsina = trim($_POST['sizeInM']);
	$cena = trim($_POST['price']);	
	$vlasnik = trim($_POST['owner']);
	
	$nekretnina = new Nekretnina($nekretnina_ID,$adresa,$grad,$povrsina,$cena,$vlasnik,null);
	
	if($nekretnina->izmeni($konekcija)){
		$uspesnoPoruka = 'Sucessfully changed!';
	}else{
		$uspesnoPoruka = 'Real Estate could not be changed!';
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
						<h2>Change Owner of Real Estate</h2>
                        <form action="" method ="POST">
						
						<label for="Nekretnina_ID">Real Estate ID</label>
							<select id="Nekretnina_ID" name="Nekretnina_ID" class="form-control" onchange="pretrazi(this.value)">

								<?php
										foreach($nizNekretnina as $nekretnina){
											?>
											<option value="<?php echo $nekretnina->Nekretnina_ID ?>"><?php echo $nekretnina->Nekretnina_ID?></option>										
											<?php
										}

								 ?>
							</select>
							
						<div id="rezultat">

						</div>
						<hr>
						<input type="submit" value="Change" name="izmena" class="btn-dark form-control">
                        </form>

						<div id="uspesno">
								<?php echo $uspesnoPoruka;?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<br><br><br>

<!-- Footer Section -->
<div id="footer">
  <div class="container text-center">
    <p>&copy; Somiiika</p>
  </div>
</div>
<script type="text/javascript" src="js/jquery.1.11.1.js"></script> 
<script type="text/javascript" src="js/bootstrap.js"></script> 
<script type="text/javascript" src="js/SmoothScroll.js"></script> 
<script type="text/javascript" src="js/nivo-lightbox.js"></script> 
<script type="text/javascript" src="js/jqBootstrapValidation.js"></script> 
<script type="text/javascript" src="js/contact_me.js"></script> 
<script type="text/javascript" src="js/main.js"></script>
<script>
			function pretrazi(Nekretnina_ID){
					$.ajax({
						url: 'changeResult.php',
						data: {Nekretnina_ID : Nekretnina_ID},
						success: function(data){
							$("#rezultat").html(data);
						}
					})
			}
						
			pretrazi(<?php echo $nizNekretnina[0]->Nekretnina_ID ?>);
			
</script>
</body>
</html>
