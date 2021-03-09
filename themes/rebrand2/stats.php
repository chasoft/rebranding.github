<?php defined("APP") or die() // Stats Page 
?>
<section>
	<div class="container stats-page">
		<div class="panel panel-body panel-default">
			<div class="row info">
				<div class="col-md-3 thumb">
					<img src="<?php echo $url->short ?>/i" alt="">
				</div>
				<hr class="visible-sm visible-xs">
				<div class="col-md-9 url-info">
					<h2>
						<a href="<?php echo $url->url ?>" rel="nofollow"><?php echo Main::truncate(fixTitle($url->meta_title), 70) ?></a>
						<small class="pull-right"><?php echo Main::timeago($url->date) ?></small>
						<span style="font-family: Roboto, sans-serif,sans-serif;font-weight: 400;font-size: 14px;"><?php echo html_entity_decode($url->meta_description) ?></span>
					</h2>
					<hr class="visible-sm visible-xs">
					<div class="d-flex justify-content-around flex-sm-wrap">
						<div class="url-stats">
							<?php echo number_format($url->click, 0) ?>
							<span><?php echo e("Clicks") ?></span>
							<br>
						</div>
						<div class="url-stats">
							<?php echo number_format($url->unique, 0) ?>
							<span><?php echo e("Unique Clicks") ?></span>
						</div>
						<div class="url-data">
							<p>
								<i class="glyphicon glyphicon-link"></i> <?php echo (strlen($url->fullurl) > 25 ? Main::truncate($url->fullurl, 25) : $url->fullurl) ?> <a href="#copy" class="copy inline-copy" data-clipboard-text="<?php echo $url->fullurl ?>"><?php echo e("Copy") ?></a>
							</p>
							<p>
								<i class="glyphicon glyphicon-qrcode"></i> <?php echo (strlen($url->fullurl) > 25 ? Main::truncate($url->fullurl, 25) : $url->fullurl) ?>/qr <a href="#copy" class="copy inline-copy" data-clipboard-text="<?php echo $url->fullurl ?>/qr"><?php echo e("Copy") ?></a>
							</p>
							<div class="social-share">
								<?php echo Main::share($url->fullurl, "", ["facebook", "twitter"]) ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php echo $this->ads(728) ?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<div class="panel">
					<div class="panel-body">
						<input type="text" name="customreport" data-action="customreport" class="form-control" placeholder="<?php echo e("Choose a date range to update stats") ?>">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="analytics">
	<div class="container">
		<div class="panel">
			<div class="panel-heading">
				<div class="btn-group btn-group-sm pull-right">
					<a href="#" class="btn btn-outline-primary chart_data active" data-value='d'><?php echo e("Daily") ?></a>
					<a href="#" class="btn btn-outline-primary chart_data" data-value='<?php echo json_encode(array("m", $url->alias . $url->custom, $url->click)) ?>'><?php echo e("Monthly") ?></a>
					<a href="#" class="btn btn-outline-primary chart_data" data-value='<?php echo json_encode(array("y", $url->alias . $url->custom, $url->click)) ?>'><?php echo e("Yearly") ?></a>
				</div>
			</div>
			<div class="panel-body">
				<div id="url-chart" class="chart"></div>
			</div>
		</div>
	</div>
</section>
<section class="analytics">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="panel panel-body">
					<div id="country" style="width:100%; height: 300px; margin: 20px 0"></div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-body">
					<h3><?php echo e("Top Countries") ?></h3>
					<ol id="country-list"></ol>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="analytics">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default panel-body panel-alt">
					<h3><span><?php echo e("Operating Systems") ?></span></h3>
					<div id="os-c">
						<canvas style="width:99%;height:300px;" id="os"></canvas>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-default panel-body panel-alt">
					<h3><span><?php echo e("Browsers") ?></span></h3>
					<div id="browser-c">
						<canvas style="width:99%;height:300px;" id="browsers"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="analytics">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default panel-body">
					<h3><?php echo e("Referrers") ?></h3>
					<ul id="referrer">
					</ul>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-default panel-body">
					<h3><?php echo e("Social Shares") ?></h3>
					<div style="width:99%;height:300px;" id="social-shares"></div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--
<section class="analytics" style="margin: 50px 0;">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">

				<table id="table_id" class="display">
					<thead>
						<tr>
							<th>Column 1</th>
							<th>Column 2</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Row 1 Data 1</td>
							<td>Row 1 Data 2</td>
						</tr>
						<tr>
							<td>Row 2 Data 1</td>
							<td>Row 2 Data 2</td>
						</tr>
					</tbody>
				</table>

			</div>
		</div>
	</div>
</section>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#table_id').DataTable();
	});
</script> -->