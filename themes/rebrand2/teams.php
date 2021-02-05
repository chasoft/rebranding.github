<?php defined("APP") or die() // Settings Page 
?>
<div class="row">
	<div id="user-content" class="col-md-8">
		<?php echo $this->ads(728) ?>
		<?php echo Main::message() ?>
		<div class="main-content"></div>
		<?php if (!$this->isTeam()) : ?>
			<div class="panel panel-default panel-body">
				<h3><?php echo e("Invite Member") ?></h3>
				<form action="<?php echo Main::href("user/teams/add") ?>" method="post" id="teamform" name="teamform">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="email" class="label-control"><?php echo e("Email") ?></label>
								<input type="email" value="" name="email" id="email" class="form-control" placeholder="johndoe@email.tld" required autofocus />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="permissions" class="label-control"><?php echo e("Permissions") ?></label>
								<select name="permissions[]" class="form-control" data-placeholder="<?php echo e("Permissions") ?>" multiple>
									<optgroup label="<?php echo e("Links") ?>">
										<option value="links.create"><?php echo e("Create Links") ?></option>
										<option value="links.edit"><?php echo e("Edit Links") ?></option>
										<option value="links.delete"><?php echo e("Delete Links") ?></option>
									</optgroup>
									<?php if ($this->permission("splash") !== FALSE) : ?>
										<optgroup label="<?php echo e("Splash page") ?>">
											<option value="splash.create"><?php echo e("Create Splash") ?></option>
											<option value="splash.edit"><?php echo e("Edit Splash") ?></option>
											<option value="splash.delete"><?php echo e("Delete Splash") ?></option>
										</optgroup>
									<?php endif ?>
									<?php if ($this->permission("overlay") !== FALSE) : ?>
										<optgroup label="<?php echo e("Overlay Page") ?>">
											<option value="overlay.create"><?php echo e("Create Overlay") ?></option>
											<option value="overlay.edit"><?php echo e("Edit Overlay") ?></option>
											<option value="overlay.delete"><?php echo e("Delete Overlay") ?></option>
										</optgroup>
									<?php endif ?>
									<?php if ($this->permission("pixels") !== FALSE) : ?>
										<optgroup label="<?php echo e("Pixels") ?>">
											<option value="pixels.create"><?php echo e("Create Pixels") ?></option>
											<option value="pixels.edit"><?php echo e("Edit Pixels") ?></option>
											<option value="pixels.delete"><?php echo e("Delete Pixels") ?></option>
										</optgroup>
									<?php endif ?>
									<?php if ($this->permission("domain") !== FALSE) : ?>
										<optgroup label="<?php echo e("Domain") ?>">
											<option value="domain.create"><?php echo e("Add Custom Domain") ?></option>
											<option value="domain.delete"><?php echo e("Delete Custom Domain") ?></option>
										</optgroup>
									<?php endif ?>
									<?php if ($this->permission("bundle") !== FALSE) : ?>
										<optgroup label="<?php echo e("Bundles") ?>">
											<option value="bundle.create"><?php echo e("Create Bundles") ?></option>
											<option value="bundle.edit"><?php echo e("Edit Bundles") ?></option>
											<option value="bundle.delete"><?php echo e("Delete Bundles") ?></option>
										</optgroup>
									<?php endif ?>
									<?php if ($this->permission("api") !== FALSE) : ?>
										<option value="api.create"><?php echo e("Developer API") ?></option>
									<?php endif ?>
									<?php if ($this->permission("export") !== FALSE) : ?>
										<option value="export.create"><?php echo e("Export Data") ?></option>
									<?php endif ?>
								</select>
							</div>
						</div>
					</div>
					<?php echo Main::csrf_token(TRUE) ?>
					<button class="btn btn-primary" type="submit"><?php echo e("Invite") ?></button>
				</form>
				<script>
					jQuery.validator.addMethod("validate_email", function(a, e) {
						return !!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(a)
					}, "Please enter a valid Email."), $("#teamform").validate({
						rules: {
							email: {
								validate_email: !0
							}
						}
					});
				</script>
			</div>
		<?php endif ?>

		<div class="panel panel-default panel-body">
			<h3><?php echo e("Members") ?></h3>
			<div class="table-responsive">
				<table class="table" style="border: 1px solid #dfe2e6;">
					<thead class="thead-light">
						<tr>
							<th>&nbsp;</th>
							<th><?php echo e("Name") ?></th>
							<th><?php echo e("Email") ?></th>
							<th><?php echo e("Permissions") ?></th>
							<th><?php echo e("Actions") ?></th>
						</tr>
					</thead>
					<tbody>
						<!-- Main Account -->
						<tr>
							<td><img width="30" height="30" src="<?php echo $this->avatar($teamleader, 30) ?>" alt="" class="round" /></td>
							<td><?php echo $teamleader->name ? $teamleader->name : $teamleader->username ?><br><?php echo ($teamleader->active ? '<span class="label label-success">' . e("Active") . '</span>' : '<span class="label label-danger">' . e("Inactive") . '</span>') ?></td>
							<td><?php echo $teamleader->email ?></td>
							<td>
								<span class='badge badge-primary'><?php echo e("Master Account") ?></span>
							</td>
							<td></td>
						</tr>
						<!-- Sub Accounts -->
						<?php foreach ($team as $member) : ?>
							<tr>
								<td><img src="<?php echo $this->avatar($member, 30) ?>" alt="" class="round"></td>
								<td><?php echo $member->name ? $member->name : $member->username ?><br><?php echo ($member->active ? '<span class="label label-success">' . e("Active") . '</span>' : '<span class="label label-danger">' . e("Inactive") . '</span>') ?></td>
								<td><?php echo $member->email ?></td>
								<td>
									<?php if ($permissions = json_decode($member->teampermission)) : ?>
										<?php foreach ($permissions as $permission) : ?>
											<span class='badge badge-primary'><?php echo $toText[$permission] ?></span>
										<?php endforeach ?>
									<?php endif ?>
								</td>
								<td>
									<?php if (!$this->isTeam()) : ?>
										<a href="<?php echo Main::href("user/teams/edit?user={$member->id}") ?>" class="btn btn-xs btn-success"><?php echo e("Edit") ?></a>
										<a href="<?php echo Main::href("user/teams/remove" . Main::nonce("delete_team-{$member->id}") . "&user={$member->id}") ?>" class="btn btn-xs btn-danger delete"><?php echo e("Remove") ?></a>
									<?php else : ?>
										<a href="#" class="btn btn-xs btn-success" disabled><?php echo e("Edit") ?></a>
										<a href="#" class="btn btn-xs btn-danger delete" disabled><?php echo e("Remove") ?></a>
									<?php endif ?>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>

	</div>
	<!--/#user-content-->
	<div id="widgets" class="col-md-4">
		<?php echo $this->sidebar() ?>
		<div class="panel panel-default panel-body text-justify">
			<h3><?php echo e("Events Permission") ?></h3>
			<p><?php echo e("<b>Create</b>: A create event will allow your team member to shorten links, create splash pages & overlay and bundles.") ?></p>
			<p><?php echo e("<b>Edit</b>: An edit event will allow your team member to edit links, splash pages & overlay and bundles.") ?></p>
			<p><?php echo e("<b>Delete</b>: A delete event will allow your team member to delete links, splash pages & overlay and bundles.") ?></p>
		</div>
		<div class="panel panel-default panel-body">
			<h3><?php echo e("Plan Limits") ?></h3>
			<div class="member-stats">
				<p><span><?php echo e("Used") ?> <?php echo $this->count("user_urls") ?> <?php echo e("out of") ?> <?php echo ($this->user->plan->numurls > 0 ? number_format($this->user->plan->numurls, 0) : e("Unlimited")) ?></span> <?php echo e('URLs') ?></p>

				<?php echo ($this->user->plan->permission->splash->enabled ? '<p><span>' . e("Used") . ' ' . $this->count("user_splash") . ' ' . e("out of") . ' ' . ($this->user->plan->permission->splash->count > 0 ? $this->user->plan->permission->splash->count : e("Unlimited")) . '</span> ' . e('Splash Pages') . '</p>' : '') ?>

				<?php echo ($this->user->plan->permission->overlay->enabled ? '<p><span>' . e("Used") . ' ' . $this->count("user_overlay") . ' ' . e("out of") . '  ' . ($this->user->plan->permission->overlay->count > 0 ? $this->user->plan->permission->overlay->count : e("Unlimited")) . '</span> ' . e('Overlay Pages') . '</p>' : '') ?>

				<?php echo ($this->user->plan->permission->pixels->enabled ? '<p><span>' . e("Used") . ' ' . $this->count("user_pixels") . ' ' . e("out of") . ' ' . ($this->user->plan->permission->pixels->count > 0 ? $this->user->plan->permission->pixels->count : e("Unlimited")) . '</span> ' . e('Tracking Pixels') . '</p>' : '') ?>

				<?php echo ($this->user->plan->permission->team->enabled ? '<p><span>' . e("Used") . ' ' . $this->count("user_team") . ' ' . e("out of") . '  ' . ($this->user->plan->permission->team->count > 0 ? $this->user->plan->permission->team->count : e("Unlimited")) . '</span> ' . e('Team Members') . '</p>' : '') ?>

				<?php echo ($this->user->plan->permission->domain->enabled ? '<p><span>' . e("Used") . ' ' . $this->count("user_domain") . ' ' . e("out of") . ' ' . ($this->user->plan->permission->domain->count > 0 ? $this->user->plan->permission->domain->count : e("Unlimited")) . '</span> ' . e('Custom Domain') . '</p>' : '') ?>
			</div>
		</div>
	</div>
	<!--/#widgets-->
</div>
<!--/.row-->