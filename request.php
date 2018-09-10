<?php

class request
{
  public $url;

  public function __construct(){
    $this -> url = $_SERVER['REQUEST_URI'];
  }
}
