<?php

class IndexController extends Controller {
	public function __construct() {}
	
	public function index(){
		$this->page->title = "Home - " . APP_NAME;
		$this->page->loadPage("pages/home");
		$this->page->loadPage("widgets/footer");
		$this->page->render();
	}
}
