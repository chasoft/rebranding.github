<?php defined("APP") or die() ?>
<div id="user-content">
	<?php echo Main::message() ?>
	<div class="row">
		<div class="main-content col-md-5">
			<div class="panel panel-default panel-body panel-body-np">
				<h3><?php echo e("Manage your bundles") ?>
					<?php if (!$this->isTeam() || ($this->isTeam() && $this->teamPermission("bundle.create"))) : ?>
						<a href="" class="btn btn-sm btn-primary ajax_call pull-right" data-action="bundle_create" data-title="<?php echo e("Create Bundle") ?>"><?php echo e("Create Bundle") ?></a>
					<?php endif ?>
				</h3>
				<ul class="list-group bundles">
					<?php foreach ($bundles as $bundle) : ?>
						<li class="list-group-item">
							<a href="#" class="ajax_call" data-class="return-ajax" data-id="<?php echo $bundle->id ?>" data-active="active" data-action="bundle_urls" bundle-name="<?php echo $bundle->name ?>">
								<h4 class="list-group-item-heading text-success">
									<i class="fas fa-folder bundle-folder-close" style="margin-right: 5px;"></i>
									<i class="fas fa-folder-open bundle-folder-open" style="margin-right: 5px;"></i>
									<?php echo $bundle->name ?>
								</h4>
							</a>
							<p><strong><?php echo e("Bundle Page") ?></strong>: <?php echo $this->config["url"] . "/u/{$this->user->username}/" . Main::slug($bundle->name) . "-{$bundle->id}"; ?> <a href="#" class="copy inline-copy" data-clipboard-text="<?php echo $this->config["url"] . "/u/{$this->user->username}/" . Main::slug($bundle->name) . "-{$bundle->id}"; ?>"><?php echo e("Copy") ?></a></p>
							<?php if (!empty($bundle->slug)) : ?>
								<p><strong><?php echo e("Rotator Link") ?></strong>: <?php echo Main::href("r/{$bundle->slug}") ?> <a href="#" class="copy inline-copy" data-clipboard-text="<?php echo Main::href("r/{$bundle->slug}") ?>"><?php echo e("Copy") ?></a></p>
							<?php endif ?>
							<p class="list-group-item-text">
								<?php if (!$this->isTeam() || ($this->isTeam() && $this->teamPermission("bundle.edit"))) : ?>
									<a href='#edit' class='ajax_call' data-title="<?php echo e("Edit Bundle") ?>" data-action='bundle_edit' data-id='<?php echo $bundle->id ?>'><?php echo e("Edit") ?></a>
									&nbsp;&nbsp;&bullet;&nbsp;&nbsp;
								<?php endif ?>
								<?php if (!$this->isTeam() || ($this->isTeam() && $this->teamPermission("bundle.delete"))) : ?>
									<a href="<?php echo Main::href("user/delete/{$bundle->id}") . Main::nonce("delete_bundle-{$bundle->id}") ?>" class="delete"><?php echo e("Delete") ?></a>
									&nbsp;&nbsp;&bullet;&nbsp;&nbsp;
								<?php endif ?>
								<?php echo $bundle->view ?> <?php echo e("Views") ?> &nbsp;&nbsp;&bullet;&nbsp;&nbsp;
								<?php echo $this->count("user_bundle_urls", $bundle->id) ?> <?php echo e("URLs") ?> &nbsp;&nbsp;&bullet;&nbsp;&nbsp;
								<?php echo e(ucfirst($bundle->access)) ?>
								&nbsp;&nbsp;&bullet;&nbsp;&nbsp;
								<?php echo Main::timeago($bundle->date) ?>
							</p>
						</li>
					<?php endforeach ?>
				</ul>
				<?php echo $pagination ?>
			</div>
		</div>
		<div class="main-content col-md-7">
			<!--		
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">???</li>
  </ol>
</nav>
-->
			<div class="panel panel-default panel-body">
				<div id="data-container">
					<div class="btn-group btn-group-sm">
						<a href="#" class="btn btn-default" data-toggle="tooltip" title="<?php echo e("Select all") ?>" id="selectall"><i class="fa fa-check-square"></i></a>
						<!--
					<php if ($this->permission("bundle") !== FALSE): ?>	
						<a href="#" class="btn btn-default" data-toggle="tooltip" title="<?php echo e("Add to bundle") ?>" id="addtobundle"><i class="fa fa-folder-open"></i></a>
					<php endif ?>
					-->
						<a href="#" class="btn btn-default" data-toggle="tooltip" title="<?php echo e("Delete all") ?>" id="deleteall"><i class="fa fa-trash"></i></a>
					</div>
					<form action="<?php echo Main::href("user/delete") ?>" method="post" id="delete-all-urls">
						<div class="url-container">
							<div class="return-ajax">
								<p class="center"><?php echo e("Please select a bundle from the left.") ?></p>
							</div><!-- /.return-ajax -->
						</div>
						<?php echo Main::csrf_token(TRUE) ?>
					</form>
				</div><!-- /#data-container -->
			</div>
		</div>
	</div>
</div>