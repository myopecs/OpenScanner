<?php

$v = Input::get("v");

if(!in_array($v, ["basic-dns", "services", "dmitry", "dnsenum", "nikto", "nmap"])){
	$v = "";
}

if(empty($v)){
	$v = "basic-dns";
}

?>
<style>
.menu-item {
	text-decoration: none;
	color: #343a40;
}

.menu-item:hover {
	text-decoration: none;
}

.menu-item.active {
	font-weight: 700;
	color: black;
	border-bottom: 2px solid black;
}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-12 text-center py-2">
			<div style="xmax-width: 600px; margin: auto;">
				<img src="<?= PORTAL ?>assets/images/myopecs.png" class="mb-3" style="width: 100px;" /><br />
			
				<form action="<?= PORTAL ?>search" method="GET">
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="Search" name="q" value="<?= Input::get("q") ?>" />
						<div class="input-group-append">
							<button class="btn" type="submit">
								<span class="fa fa-search"></span> Search
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
<?php
	if($valid){
?>
		<div class="col-md-12 mb-5">
			<div class="text-center">
				<a href="<?= PORTAL ?>search?q=<?= Input::get("q") ?>&v=basic-dns" class="menu-item <?= $v == "basic-dns" ? "active" : "" ?> mr-3">
					Basic DNS
				</a>
				
				<a href="<?= PORTAL ?>search?q=<?= Input::get("q") ?>&v=services" class="menu-item <?= $v == "services" ? "active" : "" ?> mr-3">
					Services
				</a>
				
				<a href="<?= PORTAL ?>search?q=<?= Input::get("q") ?>&v=dmitry" class="menu-item <?= $v == "dmitry" ? "active" : "" ?> mr-3">
					DMitry
				</a>
				
				<a href="<?= PORTAL ?>search?q=<?= Input::get("q") ?>&v=dnsenum" class="menu-item <?= $v == "dnsenum" ? "active" : "" ?> mr-3">
					DNSEnum
				</a>
				
				<a href="<?= PORTAL ?>search?q=<?= Input::get("q") ?>&v=nikto" class="menu-item <?= $v == "nikto" ? "active" : "" ?> mr-3">
					Nikto
				</a>
				
				<a href="<?= PORTAL ?>search?q=<?= Input::get("q") ?>&v=nmap" class="menu-item <?= $v == "nmap" ? "active" : "" ?>">
					nmap
				</a>
			</div>
		</div>
		
		<div class="col-md-12">
		<?php
			switch($v){
				case "basic-dns":
					$b = dns_get_record($q);
					
					// echo "<pre>";
					// print_r($b);
					// echo "</pre>";
				?>
				
				<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<th class="text-center">No</th>
							<th class="text-center">Type</th>
							<th>Details</th>
						</tr>
					</thead>
					
					<tbody>
					<?php
						$no = 1;
						
						foreach($b as $c){
							if($c["type"] == "A"){
							?>
							<tr>
								<td class="text-center"><?= $no++ ?></td>
								<td class="text-center">A</td>
								<td>
									<?= $c["host"] ?> [<?= $c["ip"] ?>] [TTL=<?= $c["ttl"] ?>] [<?= $c["class"] ?>]
								</td>
							</tr>
							<?php
							}
						}
						
						foreach($b as $c){
							if($c["type"] == "AAAA"){
							?>
							<tr>
								<td class="text-center"><?= $no++ ?></td>
								<td class="text-center">AAAA</td>
								<td>
									<?= $c["host"] ?> [<?= $c["ipv6"] ?>] [TTL=<?= $c["ttl"] ?>] [<?= $c["class"] ?>]
								</td>
							</tr>
							<?php
							}
						}
						
						foreach($b as $c){
							if($c["type"] == "MX"){
							?>
							<tr>
								<td class="text-center"><?= $no++ ?></td>
								<td class="text-center">MX</td>
								<td>
									<?= $c["target"] ?>[pri=<?= $c["pri"] ?>] - <?= $c["host"] ?> [TTL=<?= $c["ttl"] ?>] [<?= $c["class"] ?>]
								</td>
							</tr>
							<?php
							}
						}
						
						foreach($b as $c){
							if($c["type"] == "NS"){
							?>
							<tr>
								<td class="text-center"><?= $no++ ?></td>
								<td class="text-center">NS</td>
								<td>
									<?= $c["target"] ?> - <?= $c["host"] ?> [TTL=<?= $c["ttl"] ?>] [<?= $c["class"] ?>]
								</td>
							</tr>
							<?php
							}
						}
						
						foreach($b as $c){
							if($c["type"] == "SOA"){
							?>
							<tr>
								<td class="text-center"><?= $no++ ?></td>
								<td class="text-center">SOA</td>
								<td>
									<?= $c["host"] ?> [TTL=<?= $c["ttl"] ?>] [<?= $c["class"] ?>]<br />
									
									<?= $c["mname"] ?> -> <?= $c["rname"] ?> <br />
									[min-TTL=<?= $c["minimum-ttl"] ?>] [expire=<?= $c["expire"] ?>] [refresh=<?= $c["refresh"] ?>] [retry=<?= $c["retry"] ?>]
									[serial=<?= $c["serial"] ?>]
								</td>
							</tr>
							<?php
							}
						}
						
						foreach($b as $c){
							if($c["type"] == "TXT"){
							?>
							<tr>
								<td class="text-center"><?= $no++ ?></td>
								<td class="text-center">TXT</td>
								<td>
									<?= $c["host"] ?> [TTL=<?= $c["ttl"] ?>] [<?= $c["class"] ?>]<br />
									<pre><?= $c["txt"] ?></pre>
								</td>
							</tr>
							<?php
							}
						}
					?>
					</tbody>
				</table>
				
				<?php
				break;
				
				case "services":
					$ports = [
						"http"		=> ["80", "443"],
						"ssh"		=> ["22"],
						"smtp"		=> ["25", "465", "587", "2525"],
						"pop"		=> ["110", "995"],
						"imap"		=> ["143", "993"],
						"smb"		=> ["139", "443"],
						"dns"		=> ["53"],
						"rdp"		=> ["3389"],
						"tightvnc"	=> ["5901"],
						"telnet"	=> ["23"]
					];
				?>
				
				<?php
				break;

				case "nmap":

				$fp = fsockopen("www.example.com", 80, $errno, $errstr, 30);

				?>
				<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<th class="text-center">No</th>
							<th class="text-center">Type</th>
							<th>Details</th>
						</tr>
					</thead>
					
					<tbody>
						<tr>
							<td>DNS page</td>
							<td>hello</td>
							<td>details sini</td>
						</tr>
					</tbody>
				</table>
				<?php
			}
			if(count($record) > 0){
				
			}else{
				Page::Load("pages/search/no-record");
			}
		?>
		</div>
<?php
	}else{
		Page::Load("pages/search/not-valid");
	}
?>
	</div>
</div>