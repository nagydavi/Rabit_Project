<?php
// Autoload classes
spl_autoload_register(function ($class) {
   if (file_exists('Model/' . $class . '.php')) {
       require 'Model/' . $class . '.php';
   }
   if (file_exists('Controller/' . $class . '.php')) {
       require 'Controller/' . $class . '.php';
   }
   if (file_exists('View/' . $class . '.php')) {
       require 'View/' . $class . '.php';
   }

});