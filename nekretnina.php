<?php

class Nekretnina{
  public $Nekretnina_ID;
  public $Adresa;
  public $Grad;
  public $Povrsina;
  public $Cena;
  public $Vlasnik;
  public $Tip;

  public function __construct ( $Nekretnina_ID, $Adresa, $Grad, $Povrsina, $Cena, $Vlasnik, $Tip ) {
$this->Nekretnina_ID = $Nekretnina_ID;
$this->Adresa = $Adresa;
$this->Grad = $Grad;
$this->Povrsina = $Povrsina;
$this->Cena = $Cena;
$this->Vlasnik = $Vlasnik;
$this->Tip = $Tip;

  }

  public static function vratiSve($konekcija){

    $upit = "SELECT * FROM nekretnina n join vlasnik v on n.Vlasnik_ID = v.Vlasnik_ID join tip_nekretnine t on n.Tip_ID = t.Tip_ID";
    $rez = $konekcija->query($upit);
    $niz = [];

    while($r = $rez->fetch_assoc()){
      $vlasnik = new Vlasnik($r['Vlasnik_ID'],$r['Ime'],$r['Prezime']);
      $tip = new Tip($r['Tip_ID'],$r['Naziv']);
      $nekretnina = new Nekretnina($r['Nekretnina_ID'],$r['Adresa'],$r['Grad'],$r['Povrsina'],$r['Cena'],$vlasnik,$tip);
      array_push($niz,$nekretnina);
    }

    return $niz;

  }

  public static function vratiSveGradove($konekcija){

    $upit = "SELECT Grad FROM nekretnina GROUP BY Grad";
    $rez = $konekcija->query($upit);
    $nizGradova = [];

    while($r = $rez->fetch_assoc()){
	  $grad = $r['Grad'];
        array_push($nizGradova, $grad);
    }

    return $nizGradova;
  }

  public function sacuvaj($konekcija){
    $upit ="INSERT INTO nekretnina (Nekretnina_ID, Adresa, Grad, Povrsina, Cena, Vlasnik_ID, Tip_ID) VALUES (null,'$this->Adresa','$this->Grad', '$this->Povrsina', '$this->Cena', '$this->Vlasnik', '$this->Tip')";

    return $konekcija->query($upit);
  }

  public function izmeni($konekcija){
    $upit ="UPDATE nekretnina SET Vlasnik_ID = $this->Vlasnik WHERE Nekretnina_ID = $this->Nekretnina_ID";

    return $konekcija->query($upit);
  }
  public function obrisi($konekcija){
  $upit ="DELETE FROM nekretnina WHERE Nekretnina_ID = '{$this->Nekretnina_ID}'"; 

    return $konekcija->query($upit);
  }

}

?>
