<?php defined("APP") or die() // This file is looped in each instances to show the URL. Please don't edit this file if you don't know what you are doing! ?>
<div class="url-list fix" id="url-container-<?php echo $url->id ?>" data-id="<?php echo $url->id ?>">
	<div class="d-flex justify-content-between">
		<div class="url-info">
			<h3 class="title">
				<img src="<?php echo Main::href("{$url->alias}{$url->custom}/ico") ?>" alt="Favicon">
				<a href="<?php echo ($url->domain ? $url->domain : $this->config["url"]) ?>/<?php echo $url->alias.$url->custom ?>" target="_blank"><?php echo Main::truncate(empty($url->meta_title)?$url->url:fixTitle($url->meta_title),50) ?></a>
			</h3>
			<p class="description"><?php echo $url->meta_description ?></p>
			<div class="short-url">
				<a href="<?php  echo ($url->domain ? $url->domain : $this->config["url"]) ?>/<?php echo $url->alias.$url->custom ?>" target="_blank"><?php echo ($url->domain ? $url->domain : $this->config["url"]) ?>/<?php echo $url->alias.$url->custom ?></a>
				<a href="#copy" class="copy inline-copy" data-clipboard-text="<?php echo ($url->domain ? $url->domain : $this->config["url"]) ?>/<?php echo $url->alias.$url->custom ?>"><?php echo e("Copy")?></a> <span style="white-space:nowrap;font-size:12px"><i class='glyphicon glyphicon-time'></i> <?php echo Main::timeago($url->date) ?></span>
			</div>
		</div>
		<div class="url-stats d-flex flex-column">
			<strong><?php echo number_format($url->click,0) ?></strong>

			<?php if ($this->logged()) :?>
				<a href="<?php echo ($url->domain ? $url->domain : $this->config["url"]) ?>/<?php echo $url->alias.$url->custom ?>+" target="_blank" class="btn btn-primary btn-xs"><?php echo e("Clicks") ?></a>
			<?php else: ?>
				<p class="btn btn-primary btn-xs"><?php echo e("Clicks") ?></p>
			<?php endif ?>
		</div>
	</div>
</div><!-- /.url-list -->