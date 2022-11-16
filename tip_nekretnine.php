<?php

class Tip{
  public $Tip_ID;
  public $Naziv;

  public function __construct ( $Tip_ID, $Naziv ) {
    $this->Tip_ID = $Tip_ID;
    $this->Naziv = $Naziv;
  }

  public static function vratiSve($konekcija){

    $upit = "SELECT * FROM tip_nekretnine";
    $rez = $konekcija->query($upit);
    $nizTipova = [];

    while($r = $rez->fetch_assoc()){
        $tip = new Tip($r['Tip_ID'],$r['Naziv']);
        array_push($nizTipova,$tip);
    }

    return $nizTipova;

  }
}

?>
