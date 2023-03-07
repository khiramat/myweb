<?php
if (!@$year) {
	$year = date("Y");
}

?>
<div class="form-group row">
	<label class="col-sm-2 col-form-label">表示月</label>
	<div class="col-sm-2">
	<select name="year_st" id="year_st" class="form-control form-control-sm">
		<option value="<?= $year - 1 ?>"><?= $year - 1 ?></option>
		<option value="<?= $year ?>" selected="selected"><?= $year ?></option>
		<option value="<?= $year + 1 ?>"><?= $year + 1 ?></option>
		<option value="<?= $year + 2 ?>"><?= $year + 2 ?></option>
	</select>
	</div>
	<div class="col-sm-2">
	<select name="month_st" id="month_st" class="form-control form-control-sm">
		<option value="<?= date("m") ?>" selected="selected">
			<?= date("m") ?>
		</option>
		<option value="01">1</option>
		<option value="02">2</option>
		<option value="03">3</option>
		<option value="04">4</option>
		<option value="05">5</option>
		<option value="06">6</option>
		<option value="07">7</option>
		<option value="08">8</option>
		<option value="09">9</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
	</select>
	</div>
	<div class="col-sm-2">
		<button type="submit" id="data_edit_btn" class="btn btn-default btn-sm">表示</button>
	</div>
</div>