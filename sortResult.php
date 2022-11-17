<?php
include 'vlasnik.php';
include 'tip_nekretnine.php';
include 'nekretnina.php';
include 'konekcija.php';

$sort = $_GET['sort'];
$upit = "SELECT n.Nekretnina_ID, n.Adresa, n.Grad, n.Povrsina, n.Cena, t.Naziv FROM nekretnina n join tip_nekretnine t on n.Tip_ID = t.Tip_ID order by n.Cena $sort";


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
        <td><?php echo $r['Naziv'] ?></td>
      </tr>
      <?php
    }
     ?>

  </tbody>
</table>
