<?php

namespace Controller;

class Controller{
  var $controllerName;
  var $controIIerMethod;

  public function getControllerAttribute(){
    return [
      "ControllerName" => $this -> controllerName,
      "Method" => $this -> controllerMethod
    ];
  } 
}