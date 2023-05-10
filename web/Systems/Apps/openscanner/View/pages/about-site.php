<div class="container-fluid my-pt-100 my-h-100">
	<div class="row my-h-100">
		<div class="col-md-4 mx-auto text-center">
			<img src="<?= PORTAL ?>assets/images/myopecs.png" style="width: 300px;" /><br /><br />
			
			<div class="input-group mb-3">
				
				<input type="text" class="form-control" placeholder="<?= T::x("Search here") ?>" autofocus="on" />
				
				<div class="input-group-append">
					<button class="btn btn-light">
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
