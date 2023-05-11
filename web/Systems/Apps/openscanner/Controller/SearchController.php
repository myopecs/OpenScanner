<?php

class SearchController extends Controller {
	public function __construct() {}
	
	public function index (){
		$this->page->title = "Search - " . APP_NAME;
		
		$q = input::get("q");
		$valid = $this->valid_domain($q);
		
		$record = reports::getBy(["hostname" => $q]);
		
		$this->page->loadPage("pages/search", ["valid" => $valid, "record" => $record, "q" => $q]);
		$this->page->loadPage("widgets/footer");
		$this->page->render();
	}
	
	private function valid_domain($domain_name){
		return (preg_match("/^([a-z\d](-*[a-z\d])*)(\.([a-z\d](-*[a-z\d])*))*$/i", $domain_name) //valid chars check
				&& preg_match("/^.{1,253}$/", $domain_name) //overall length check
				&& preg_match("/^[^\.]{1,63}(\.[^\.]{1,63})*$/", $domain_name)   ); //length of each label
	}
}
