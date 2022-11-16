<?php
include 'tip_nekretnine.php';
include 'vlasnik.php';
include 'nekretnina.php';
include 'konekcija.php';

$Nekretnina_ID = $_GET['Nekretnina_ID'];

$upit = "SELECT * FROM nekretnina n where n.Nekretnina_ID = $Nekretnina_ID;";
$rezNek = $konekcija->query($upit);

$niz = [];
    while($r = $rezNek->fetch_assoc()){
$nekretnina = new Nekretnina($r['Nekretnina_ID'],$r['Adresa'],$r['Grad'],$r['Povrsina'],$r['Cena'],null,null);
        array_push($niz,$nekretnina);
	}


$nizVlasnika = Vlasnik::vratiSve($konekcija);
?>

<form action="" method="POST">
  <tbody>
							<label for="adress">Adress </label>
							<input type="text" name="adress" class="form-control" value="<?php echo array_values($niz)[0]->Adresa?>" readonly>
							<label for="city">City</label>
							<input type="text" name="city" class="form-control" value="<?php echo array_values($niz)[0]->Grad?>" readonly>
							<label for="sizeInM">Size(m2)</label>
							<input type="text" name="sizeInM" class="form-control" value="<?php echo array_values($niz)[0]->Povrsina?>" readonly>
							<label for="price">Price</label>
							<input type="text" name="price" class="form-control" value="<?php echo array_values($niz)[0]->Cena?>" readonly>
							<br>

		<select id="owner" name="owner" class="form-control" >

								<?php
									foreach($nizVlasnika as $vlasnik){
								?>
									<option value="<?php echo $vlasnik->Vlasnik_ID ?>"><?php echo $vlasnik->Ime.(" ").$vlasnik->Prezime ?></option>
								<?php
									}

								?>

		</select>

  </tbody>
</form>