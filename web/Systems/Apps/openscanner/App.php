<?php
//A journey start with a step

$this->page->addTopTag('
<link rel="icon" type="image/x-icon" href="'. PORTAL .'assets/images/ico.png" />
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<link rel="stylesheet" href="'. PORTAL .'assets/vendor/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="'. PORTAL .'assets/vendor/font-awesome/font-awesome.min.css" />
<link rel="stylesheet" href="'. PORTAL .'assets/vendor/iconmoon/iconmoon.css" />

<style>
body, html {
	height: 100%;
}

.my-h-100 {
	height: 100%;
}

.my-pt-100 {
	padding-top: 100px;
}
</style>
');

$this->page->addBottomTag('
<script src="'. PORTAL .'assets/vendor/jquery.min.js"></script>
<script src="'. PORTAL .'assets/vendor/popper.min.js"></script>
<script src="'. PORTAL .'assets/vendor/bootstrap/js/bootstrap.min.js"></script>
');

Route::set("|home|index")->to("IndexController::index");
Route::set("/search")->to("SearchController::index");
Route::set("/item")->to("ItemController::index");
Route::set("/about-us")->to("AboutController::index");
Route::set("/about-site")->to("AboutController::site");
Route::set("/contest")->to("AboutController::contest");
Route::set("/contact-us")->to("ContactController::index");
Route::set("/join-us")->to("JoinController::index");
Route::set("/support-us")->to("SupportController::index");