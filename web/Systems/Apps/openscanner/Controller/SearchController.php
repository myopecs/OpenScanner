<?php

class SearchController extends Controller {
	public function __construct() {}
	
	public function index (){
		$this->page->title = "Search - " . APP_NAME;
		$this->page->loadPage("pages/search");
		$this->page->loadPage("widgets/footer");
		$this->page->render();
	}
}
