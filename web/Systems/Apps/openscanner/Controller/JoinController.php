<?php

class JoinController extends Controller {
	public function __construct() {}
	
	public function index (){
		$this->page->title = "Join Us - " . APP_NAME;
		$this->page->loadPage("pages/join");
		$this->page->loadPage("widgets/footer");
		$this->page->render();
	}
}
