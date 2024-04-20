<?php
class Librat {
 
  private $cmimi;
  protected $titulli;
  protected $autori;
  private $prop1;

  function __construct($param)
  {
      $this->prop1 = $param;
  }
  function setcmimi($param){
      $this->cmimi = $param;
  }
  function settitulli($param){
      $this->titulli = $param;
  }
  function setautori($param){
    $this->autori = $param;
}

  function getcmimi(){
      return $this->cmimi;
  }

  function gettitulli(){
      echo $this->titulli . "<br>";
  }
  function getautori(){
    echo $this->autori . "<br>";
}
}
?>

