<?php

class ContactController extends Controller {
	public function __construct() {}
	
	public function index (){
		$this->page->title = "Contact Us - " . APP_NAME;
		$this->page->loadPage("pages/contact");
		$this->page->loadPage("widgets/footer");
		$this->page->render();
	}
}
