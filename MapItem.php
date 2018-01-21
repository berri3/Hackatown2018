<?php
/*PLEASE DO NOT EDIT THIS CODE*/
/*This code was generated using the UMPLE 1.26.0-b05b57321 modeling language!*/

class MapItem
{

  //------------------------
  // MEMBER VARIABLES
  //------------------------

  //MapItem Attributes
  private $longitude;
  private $latitude;
  private $descriptionRPA;
  private $codeRPA;
  private $statusREP;
  private $type;
  private $arrondissement;

  //------------------------
  // CONSTRUCTOR
  //------------------------

  public function __construct($aLongitude, $aLatitude, $aDescriptionRPA, $aCodeRPA, $aStatusREP, $aType, $aArrondissement)
  {
    $this->longitude = $aLongitude;
    $this->latitude = $aLatitude;
    $this->descriptionRPA = $aDescriptionRPA;
    $this->codeRPA = $aCodeRPA;
    $this->statusREP = $aStatusREP;
    $this->type = $aType;
    $this->arrondissement = $aArrondissement;
  }

  //------------------------
  // INTERFACE
  //------------------------

  public function setLongitude($aLongitude)
  {
    $wasSet = false;
    $this->longitude = $aLongitude;
    $wasSet = true;
    return $wasSet;
  }

  public function setLatitude($aLatitude)
  {
    $wasSet = false;
    $this->latitude = $aLatitude;
    $wasSet = true;
    return $wasSet;
  }

  public function setDescriptionRPA($aDescriptionRPA)
  {
    $wasSet = false;
    $this->descriptionRPA = $aDescriptionRPA;
    $wasSet = true;
    return $wasSet;
  }

  public function setCodeRPA($aCodeRPA)
  {
    $wasSet = false;
    $this->codeRPA = $aCodeRPA;
    $wasSet = true;
    return $wasSet;
  }

  public function setStatusREP($aStatusREP)
  {
    $wasSet = false;
    $this->statusREP = $aStatusREP;
    $wasSet = true;
    return $wasSet;
  }

  public function setType($aType)
  {
    $wasSet = false;
    $this->type = $aType;
    $wasSet = true;
    return $wasSet;
  }

  public function setArrondissement($aArrondissement)
  {
    $wasSet = false;
    $this->arrondissement = $aArrondissement;
    $wasSet = true;
    return $wasSet;
  }

  public function getLongitude()
  {
    return $this->longitude;
  }

  public function getLatitude()
  {
    return $this->latitude;
  }

  public function getDescriptionRPA()
  {
    return $this->descriptionRPA;
  }

  public function getCodeRPA()
  {
    return $this->codeRPA;
  }

  public function getStatusREP()
  {
    return $this->statusREP;
  }

  public function getType()
  {
    return $this->type;
  }

  public function getArrondissement()
  {
    return $this->arrondissement;
  }

  public function equals($compareTo)
  {
    return $this == $compareTo;
  }

  public function delete()
  {}

}
?>