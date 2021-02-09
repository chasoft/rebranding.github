<?php defined("APP") or die() // This file is looped in each instances to show the URL. Please don't edit this file if you don't know what you are doing! 
?>
<div class="return-ajax-message"></div>
<div class="url-list" id="url-container-<?php echo $url->id ?>" data-id="<?php echo $url->id ?>" <?php echo ((isset($this_is_bundle) && $this_is_bundle && $url->archived) ? 'style="background: #f7f8fa;margin-left: -15px;margin-right: -15px;padding-right: 15px;padding-left: 15px;"' : "") ?>>
	<div class="row">
		<div class="col-xs-10 url-info">
			<h3 class="title fs-sm-1em">
				<img src="<?php echo Main::href("{$url->alias}{$url->custom}/ico") ?>" alt="Favicon">
				<a href="<?php echo $url->url ?>" target="_blank"><?php echo Main::truncate(empty($url->meta_title) ? $url->url : fixTitle($url->meta_title), 50) ?></a>
				<?php if (!$url->status) : ?>
					<span class="badge"><?php echo e("Pending Approval") ?></span>
				<?php endif ?>
			</h3>
			<div class="short-url">
				<a href="<?php echo ($url->domain ? $url->domain : $this->config["url"]) ?>/<?php echo $url->alias . $url->custom ?>" target="_blank"><?php echo ($url->domain ? $url->domain : $this->config["url"]) ?>/<?php echo $url->alias . $url->custom ?></a>
				<a href="#copy" class="copy inline-copy" data-clipboard-text="<?php echo ($url->domain ? $url->domain : $this->config["url"]) ?>/<?php echo $url->alias . $url->custom ?>"><?php echo e("Copy") ?></a>
				<?php if ($url->bundle) : ?>
					<?php
					if (isset($_POST["name"]))
						$bundle_name = $_POST["name"];
					else {
						$bundle = $this->db->get("bundle", array("id" => $url->bundle), array("limit" => 1));
						$bundle_name = $bundle->name;
					}
					?>
					&nbsp;&bullet;&nbsp;
					<span class="text-primary"><i class="fas fa-folder-open"></i> &nbsp;<?php echo $bundle_name ?></span>
				<?php endif ?>
				<?php if (!empty($url->location)) : ?>
					&nbsp;&bullet;&nbsp;
					<span style="color: green;" data-toggle="tooltip" title="<?php echo e('Geotargeted') ?>"><i class='fas fa-globe-americas'></i></span>
				<?php endif ?>
				<?php if (!empty($url->devices)) : ?>
					&nbsp;&bullet;&nbsp;
					<span style="color: #008aff;" data-toggle="tooltip" title="<?php echo e('Device Targeted') ?>"><i class='fas fa-tablet-alt'></i></span>
				<?php endif ?>
				<?php if (!empty($url->pass)) : ?>
					&nbsp;&bullet;&nbsp;
					<span style="color: #e85347;" data-toggle="tooltip" title="<?php echo e('Protected') ?>"><i class='fas fa-lock'></i></span>
				<?php endif ?>
				<?php if (!empty($url->expiry)) : ?>
					&nbsp;&bullet;&nbsp;
					<a style="color: green;" href="#" data-toggle="tooltip" title="<?php echo e("Expiry on") ?> <?php echo date("d M, Y", strtotime($url->expiry)) ?>"><i class="far fa-calendar-alt"></i></a>
				<?php endif ?>
				<?php if (!empty($url->pixels)) : ?>
					&nbsp;&bullet;&nbsp;
					<a href="#" data-toggle="tooltip" title="<?php echo $this->urlPixel($url->pixels) ?>"><span><i class='glyphicon glyphicon-filter'></i> <?php echo e('Pixels') ?></span></a>
				<?php endif ?>
				<?php if (!empty($url->description)) : ?>
					&nbsp;&bullet;&nbsp;
					<a style="color: #d46a1f;" href="#" data-toggle="tooltip" title="<?php echo $url->description ?>"><i class="far fa-sticky-note"></i></a>
				<?php endif ?>
				<?php if ($parameters = json_decode($url->parameters, TRUE)) : ?>
					&nbsp;&bullet;&nbsp;
					<span><i class='glyphicon glyphicon-list-alt'></i> <?php echo e("Parameters") ?></span>
				<?php endif ?>
			</div>
			<p>
			<ul class="toggle">
				<?php if (!$this->isTeam() || ($this->isTeam() && $this->teamPermission("links.delete"))) : ?>
					<li><input type="checkbox" name="delete-id[]" data-id="<?php echo $url->id ?>" value="<?php echo $url->alias . $url->custom ?>"></li>
				<?php endif ?>
				<li class="lock-url-<?php echo $url->id ?>">
					<?php if ($url->public) : ?>
						<a href="#private" class="ajax_call" data-id="<?php echo $url->id ?>" data-action="lock" data-class="lock-url-<?php echo $url->id ?>"><i class='glyphicon glyphicon-eye-open'></i> <?php echo e('Public') ?></a>
					<?php else : ?>
						<a href="#public" class="ajax_call" data-id="<?php echo $url->id ?>" data-action="unlock" data-class="lock-url-<?php echo $url->id ?>"><i class='glyphicon glyphicon-eye-close'></i> <?php echo e('Private') ?></a>
					<?php endif ?>
				</li>
				<?php if (!$this->isTeam() || ($this->isTeam() && $this->teamPermission("links.edit"))) : ?>
					<li><a href='<?php echo Main::href("user/edit/{$url->id}") ?>'><?php echo e("Edit") ?></a></li>
				<?php endif ?>
				<?php if (!$this->isTeam() || ($this->isTeam() && $this->teamPermission("links.delete"))) : ?>
					<li><a href="<?php echo Main::href("user/delete/{$url->id}") . Main::nonce("delete_url-{$url->id}") ?>" class="delete"><?php echo e("Delete") ?></a></li>
				<?php endif ?>
				<li><a href="#url-container-<?php echo $url->id ?>" class="drop scroll"><?php echo e("Options") ?></a>
					<div class="dropdown">
						<a href="<?php echo ($url->domain ? $url->domain : $this->config["url"]) ?>/<?php echo $url->alias . $url->custom ?>+"><?php echo e("View Stats") ?></a>
						<a href="<?php echo ($url->domain ? $url->domain : $this->config["url"]) ?>/<?php echo $url->alias . $url->custom ?>/qr" target="_blank"><?php echo e("View QR") ?></a>
						<?php if ($this->permission("bundle") !== FALSE) : ?>
							<?php if (!empty($bundle_name)) : ?>
								<a href="#" class="ajax_call small" data-content="<?php echo e("Click to change bundle") ?>" data-action="url_bundle_add" data-id="<?php echo $url->id ?>" data-title="<?php echo e("Change Bundle") ?>"><?php echo e("Bundle") ?>: <?php echo $bundle_name ?></a>
							<?php else : ?>
								<a href="#" class="ajax_call small" data-content="<?php echo e("Click to add to a bundle") ?>" data-action="url_bundle_add" data-id="<?php echo $url->id ?>" data-title="<?php echo e("Add to bundle") ?>"><?php echo e("Add to bundle") ?></a>
							<?php endif ?>
						<?php endif ?>
						<?php if ($url->archived) : ?>
							<a href='#unarchive' class='ajax_call' data-action='unarchive' data-id='<?php echo $url->id ?>' data-class='return-ajax'><?php echo e("Unarchive") ?></a>
						<?php else : ?>
							<a href='#archive' class='ajax_call' data-action='archive' data-id='<?php echo $url->id ?>' data-class='return-ajax'><?php echo e("Archive") ?></a>
						<?php endif ?>
						<?php if ($this->config["sharing"]) : ?>
							<a href="https://www.facebook.com/sharer.php?u=<?php echo ($url->domain ? $url->domain : $this->config["url"]) ?>/<?php echo $url->alias . $url->custom ?>" class="u_share"><?php echo e("Share on") ?><span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
										<path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
									</svg></span></a>
							<a href="https://twitter.com/share?url=<?php echo ($url->domain ? $url->domain : $this->config["url"]) ?>/<?php echo $url->alias . $url->custom ?>&amp;text=Check+out+this+url" class="u_share"><?php echo e("Share on") ?><span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
										<path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
									</svg></span></a>
							<a href="https://wa.me/?text=<?php echo ($url->domain ? $url->domain : $this->config["url"]) ?>/<?php echo $url->alias . $url->custom ?>" class="u_share"><?php echo e("Share on") ?><span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
										<path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
									</svg></span></a>
						<?php endif ?>
					</div>
				<li><span><i class='glyphicon glyphicon-time'></i> <?php echo Main::timeago($url->date) ?></span></li>
				</li>
			</ul>
			</p>
		</div>
		<div class="col-xs-2 url-stats">
			<strong><?php echo number_format($url->click, 0) ?></strong>
			<a href="<?php echo ($url->domain ? $url->domain : $this->config["url"]) ?>/<?php echo $url->alias . $url->custom ?>+" target="_blank" class="stats-count"><?php echo e("Clicks") ?></a>
		</div>
	</div>
</div><!-- /.url-list -->