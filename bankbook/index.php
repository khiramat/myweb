<script src="/dist/js/date_picker.js"></script>

<div class="card card-default">
	<div class="card-header">
		<h6 class="card-title">家計簿</h6>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse">
				<i class="fas fa-minus"></i>
			</button>
			<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i>
			</button>
		</div>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-6">
				<?php include("/var/www/html/bankbook/entry.php"); ?>
				<?php include("/var/www/html/bankbook/edit_search.php"); ?>
			</div>
			<div class="col-sm-6">
				<div id="smbc">
				<?php include("/var/www/html/bankbook/bankbook_list.php"); ?>
				</div>
			</div>
		</div>
	</div>
</div>