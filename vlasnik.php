<?php

class Vlasnik{
  public $Vlasnik_ID;
  public $Ime;
  public $Prezime;

  public function __construct ( $Vlasnik_ID, $Ime,$Prezime ) {
    $this->Vlasnik_ID = $Vlasnik_ID;
    $this->Ime = $Ime;
    $this->Prezime = $Prezime;
  }

  public static function vratiSve($konekcija){

    $upit = "SELECT * FROM vlasnik";
    $rez = $konekcija->query($upit);
    $nizVlasnika = [];

    while($r = $rez->fetch_assoc()){
	$vlasnik = new Vlasnik($r['Vlasnik_ID'],$r['Ime'],$r['Prezime']);
        array_push($nizVlasnika,$vlasnik);
    }

    return $nizVlasnika;

  }
}

?>
