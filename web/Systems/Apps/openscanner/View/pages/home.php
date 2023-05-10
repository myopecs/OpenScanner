
<div class="container-fluid my-pt-100 my-h-100">
	<div class="row my-h-100">
		<div class="col-md-4 mx-auto text-center">
			<img src="<?= PORTAL ?>assets/images/myopecs.png" style="width: 300px;" /><br /><br />
			
			<div class="input-group mb-3">
				
				<input type="text" class="form-control" placeholder="<?= T::x("Search here") ?>" autofocus="on" />
				
				<div class="input-group-append">
					<button class="btn btn-light" data-toggle="modal" data-target="#add-data">
						<i class="fa fa-plus-circle"></i>
					</button>
				</div>
			</div>

			
			<button class="btn btn-light">
				<i class="fa fa-search"></i> <?= T::x("Search") ?>
			</button>
			
			<button class="btn btn-light">
				<i class="fa fa-newspaper-o"></i> <?= T::x("Latest") ?>
			</button>
		</div>
	</div>
</div>

<div class="modal fade" id="add-data">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Data Submission</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			
			<div class="modal-body">
			<?php
				new Alert("info", "As informant, your identity are protected by the laws.");
			?>
				
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link active" id="nav-case" data-toggle="tab" href="#case">Case Details</a>
					</li>
					
					<li class="nav-item">
						<a class="nav-link" id="nav-suspects" data-toggle="tab" href="#suspects">Suspects Info</a>
					</li>
					
					<li class="nav-item">
						<a class="nav-link" id="nav-victims" data-toggle="tab" href="#victims">Victims Info</a>
					</li>
					
					<li class="nav-item">
						<a class="nav-link" id="nav-declaration" data-toggle="tab" href="#declaration">Declaration</a>
					</li>
				</ul>
				
				<div class="tab-content pt-2">
					<div class="tab-pane active" id="case">
						Case Category:
						<select class="form-control" id="case-category">
							<option>select one</option>
						<?php
							$cats = [
								"Scams"		=> [
									"Sex Scam",
									"Love Scam",
									"Social Media Seller Scam",
									"Business Partner Scam",
									"Multi Level Marketing Scam",
									"Investment Scam",
									"Forex Scam"
								],
								"Crimes"	=> [
									"Drug Dealer",
									"Hit and Run",
									"Theft",
									"Pick / Push Pocket",
									"Human Abuse",
									"Cyber Abuse"
								],
								"Porns"		=> [
									"Sex Videos Viral",
									"Hidden Camera",
									"Child Porn",
									"Cyber Sexual Harrassment"
								],
								"Games"		=> [
									"Gambling",
									"Account Hacked"
								],
								"Social Media"	=> [
									"Social Media Hijacked",
									"Social Media Fakery",
									"Social Media Impersonate",
									"Fake Account",
									"Cybertroopers"
								]
							];
							
							foreach($cats as $k => $v){
							?>
								<optgroup label="<?= $k ?>">
								<?php
									foreach($v as $c){
									?>
									<option value=""><?= $c ?></option>
									<?php
									}
								?>
								</optgroup>
							<?php
							}
						?>
						</select><br />
						
						Tell us about your case:
						<textarea class="form-control" id="case-detail" placeholder="The story begins..."></textarea><br />
						
						Do you have Police Report? (attach if yes)<br />
						<input class="form-control" type="file" id="case-reports" multiple /><br />
						
						Share any proof documents or images you have here:<br />
						<input class="form-control" type="file" id="case-attachments" multiple /><br />
						
						If your file too big, you can share your Cloud Drive URL here:
						<textarea class="form-control" type="text" id="case-cloud" placeholder="https://..."></textarea><br />
						
						<div class="float-right">
							<button class="btn btn-primary" id="case-next">
								Next <span class="fa fa-arrow-right"></span>
							</button>
						</div>
					</div>
					
					<div class="tab-pane" id="suspects">
						<button class="btn btn-sm btn-info" id="add-suspect">
							<span class="fa fa-plus"></span> Add Suspect Info
						</button>
						
						<div id="suspects-list" class="mt-2 mb-2">
							<div id="suspect-1" class="card mb-2">
								<div class="card-body">
									Name:
									<input type="text" placeholder="Name" class="form-control" data-id="name" /><br />
									
									Phone:
									<input type="text" placeholder="Phone" class="form-control" data-id="phone" /><br />
									
									Email:
									<input type="text" placeholder="Email" class="form-control" data-id="email" /><br />
									
									Addtional Info:
									<textarea class="form-control" placeholder="Other info: FB, Website, Insta etc." data-id="additional"></textarea><br />
								</div>
							</div>
						</div>
						
						<br /><br />
						<div class="float-right">
							<button class="btn btn-primary" id="suspects-next">
								Next <span class="fa fa-arrow-right"></span>
							</button>
						</div>
					</div>
					
					<div class="tab-pane" id="victims">
						<button class="btn btn-sm btn-info" id="add-victim">
							<span class="fa fa-plus"></span> Add Victim Info
						</button>
						
						<div id="victims-list" class="mt-2 mb-2">
							<div id="victim-1" class="card mb-2">
								<div class="card-body">
									Name:
									<input type="text" placeholder="Name" class="form-control" data-id="name" /><br />
									
									Phone:
									<input type="text" placeholder="Phone" class="form-control" data-id="phone" /><br />
									
									Email:
									<input type="text" placeholder="Email" class="form-control" data-id="email" /><br />
									
									Addtional Info:
									<textarea class="form-control" placeholder="Other info: FB, Website, Insta etc." data-id="additional"></textarea><br />
								</div>
							</div>
						</div>
						
						<div class="float-right">
							<button class="btn btn-primary" id="victims-next">
								Next <span class="fa fa-arrow-right"></span>
							</button>
						</div>
					</div>
					
					<div class="tab-pane" id="declaration">
						I hereby confirms that the information submitted is correct and all victims related are aware and allow their information to be submitted to MyOPECS.info for further Digital Investigation.
						
						<div class="text-center">
							<button class="btn btn-success" id="victims-next">
								Submit <span class="fa fa-submit"></span>
							</button>
						</div>
					</div>
				</div>
				
			</div>
			
			<!--
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
			-->
		</div>
	</div>
</div>
<?php

Page::append(<<<S
<script>
$("#case-next").on("click", function(){
	$("#case").removeClass("active");
	$("#nav-case").removeClass("active");
	$("#nav-suspects").addClass("active");
	$("#suspects").addClass("active");
});

$("#suspects-next").on("click", function(){
	$("#suspects").removeClass("active");
	$("#nav-suspects").removeClass("active");
	$("#nav-victims").addClass("active");
	$("#victims").addClass("active");
});

$("#victims-next").on("click", function(){
	$("#victims").removeClass("active");
	$("#nav-victims").removeClass("active");
	$("#nav-declaration").addClass("active");
	$("#declaration").addClass("active");
});

$("#add-suspect").on("click", function(){
	var nos = $("#suspects-list").children(".card").length;
	
	$("#suspects-list").append(`
		<div id="suspect-`+ (nos + 1) +`" class="card mb-2">
			<div class="card-body">
				Name:
				<input type="text" placeholder="Name" class="form-control" data-id="name" /><br />
				
				Phone:
				<input type="text" placeholder="Phone" class="form-control" data-id="phone" /><br />
				
				Email:
				<input type="text" placeholder="Email" class="form-control" data-id="email" /><br />
				
				Addtional Info:
				<textarea class="form-control" placeholder="Other info: FB, Website, Insta etc." data-id="additional"></textarea><br />
			</div>
		</div>
	`);
});

$("#add-victim").on("click", function(){
	var nos = $("#victims-list").children(".card").length;
	
	$("#victims-list").append(`
		<div id="victim-`+ (nos + 1) +`" class="card mb-2">
			<div class="card-body">
				Name:
				<input type="text" placeholder="Name" class="form-control" data-id="name" /><br />
				
				Phone:
				<input type="text" placeholder="Phone" class="form-control" data-id="phone" /><br />
				
				Email:
				<input type="text" placeholder="Email" class="form-control" data-id="email" /><br />
				
				Addtional Info:
				<textarea class="form-control" placeholder="Other info: FB, Website, Insta etc." data-id="additional"></textarea><br />
			</div>
		</div>
	`);
});
</script>
S);