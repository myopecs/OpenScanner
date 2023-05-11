<?php
//Place you database setup here

DB::prep()->table("items", function(Table $table){
	$table->varchar("name")->length(255);
	$table->varchar("description")->length(500);
	$table->text("htmlcontent");
	$table->email("labels")->length(255);
	$table->varchar("uniq")->length(100);
	$table->varchar("ukey")->length(100);
	$table->time("upadateTime");
});

DB::prep()->table("reports", function(Table $t){
	$t->varchar("hostname")->length(100);
	$t->varchar("records")->length(255);
	$t->time("updatedTime")->length(255);
});