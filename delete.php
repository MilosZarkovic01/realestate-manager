<?php
include 'vlasnik.php';
include 'tip_nekretnine.php';
include 'nekretnina.php';
include 'konekcija.php';

$uspesnoPoruka ='';


if(isset($_POST['brisanje'])){

	$nekretnina_ID = trim($_POST['nekretnina']);

	$nekretnina = new Nekretnina($nekretnina_ID,null,null,null,null,null,null);
	
	if($nekretnina->obrisi($konekcija)){
		$uspesnoPoruka = "Sucessfully deleted! {$nekretnina_ID}";
	}else{		
		$uspesnoPoruka = 'Real Estate could not be deleted!';
	}
}

$upit = "SELECT n.Nekretnina_ID, n.Adresa, n.Grad, n.Povrsina, n.Cena, t.Naziv FROM nekretnina n join tip_nekretnine t on n.Tip_ID = t.Tip_ID";


$rez = $konekcija->query($upit);

$nizVlasnika = Vlasnik::vratiSve($konekcija);
$nizTipova = Tip::vratiSve($konekcija);
$nizNekretnina = Nekretnina::vratiSve($konekcija);

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
						<h2>Delete Real Estate</h2>
                        <form action="" method="POST">
                        

						<table class="table">
  <thead>
    <tr>
      <th>Real Estate ID</th>
      <th>Adress</th>
      <th>City</th>
      <th>Size(m2)</th>
      <th>Price</th>
      <th>Type</th>
      <th>Delete</th>

    </tr>
  </thead>
  <tbody>


    <?php
    
    while($r = $rez->fetch_assoc()){
      ?>
      <tr>
        <td><?php echo $r['Nekretnina_ID'] ?></td>
        <td><?php echo $r['Adresa'] ?></td>
        <td><?php echo $r['Grad'] ?></td>
	      <td><?php echo $r['Povrsina'] ?></td>
        <td><?php echo $r['Cena'] ?></td>
        <td><?php echo $r['Naziv'] ?></td>
		<td>	
    <input type="hidden" name="nekretnina" value = "<?php echo $r['Nekretnina_ID']?>" class="form-control">  	
    <input type="submit" value="Delete" name="brisanje" class="btn-dark form-control">    
		</td>
      </tr>
      <?php
        
      }
     ?>
  </tbody>
</table>
<hr>
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
<script type="text/javascript" src="js/SmoothScroll.js"></script> 
<script type="text/javascript" src="js/nivo-lightbox.js"></script> 
<script type="text/javascript" src="js/jqBootstrapValidation.js"></script> 
<script type="text/javascript" src="js/contact_me.js"></script> 
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
