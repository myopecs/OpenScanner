<?php
/***********************************************
;"Hery PHP Framework (HPF) v4";
;"Designed and Developed at Min September 2018";
;"Hery Intelligent Technolgy";
;"Mr Hery (hery@herytechnology.com)";
************************************************/

define("HFA", true);
require_once(dirname(__DIR__) . "/Systems/init.php");
define("ASSET", __DIR__ . "/assets/");

(new App(
	"MyOPECS - Open Scanner",
	"openscanner"
))->run([
	"reload" => true
]);

