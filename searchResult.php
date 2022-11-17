<?php
include 'tip_nekretnine.php';
include 'vlasnik.php';
include 'nekretnina.php';
include 'konekcija.php';

$grad = $_GET['grad'];

$upit = "SELECT * FROM nekretnina n join vlasnik v on n.Vlasnik_ID = v.Vlasnik_ID join tip_nekretnine t on n.Tip_ID = t.Tip_ID where n.Grad = '$grad'";
$rez = $konekcija->query($upit);
?>

<table class="table">
  <thead>
    <tr>

   <th>Real Estate ID</th>
   <th>Adress</th>
   <th>City</th>
   <th>Size(m2)</th>
   <th>Price</th>
   <th>Owner</th> 
   <th>Type</th>

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
        <td><?php echo $r['Ime'].(" ").$r['Prezime'] ?></td>
        <td><?php echo $r['Naziv'] ?></td>

      </tr>
      
      <?php
    }
     ?>

  </tbody>
</table>