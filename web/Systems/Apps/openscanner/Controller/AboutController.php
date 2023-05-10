<?php

class AboutController extends Controller {
	public function __construct() {}
	
	public function index(){
		$this->page->title = "About - " . APP_NAME;
		$this->page->loadPage("pages/about");
		$this->page->loadPage("widgets/footer");
		$this->page->render();
	}
	
	public function site() {
		$this->page->title = "This Site - " . APP_NAME;
		$this->page->loadPage("pages/about-site");
		$this->page->loadPage("widgets/footer");
		$this->page->render();
	}
	
	public function contest() {
		$this->page->title = "Contest - " . APP_NAME;
		$this->page->loadPage("pages/contest");
		$this->page->loadPage("widgets/footer");
		$this->page->render();
	}
}
