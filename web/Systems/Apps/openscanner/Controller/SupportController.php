<?php

class SupportController extends Controller {
	public function __construct() {}
	
	public function index (){
		$this->page->title = "Support Us - " . APP_NAME;
		$this->page->loadPage("pages/support");
		$this->page->loadPage("widgets/footer");
		$this->page->render();
	}
}
