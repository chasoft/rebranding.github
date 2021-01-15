<?php defined("APP") or die() // Settings Page 
?>
<div class="row">
	<div id="user-content" class="col-md-8">
		<?php echo $this->ads(728) ?>
		<?php echo Main::message() ?>
		<div class="main-content panel panel-default panel-body">
			<h3><?php echo e("Account Settings") ?></h3>

			<?php if (!empty($this->user->auth)) : ?>
				<div class="alert alert-warning"><?php echo e("You have used a social network to login. Please note that in this case you don't have a password set.") ?></div>
			<?php endif ?>

			<?php if (empty($this->user->username)) : ?>
				<div class="alert alert-warning"><?php echo e("You have used a social network to login. You will need to choose a username.") ?></div>
			<?php endif ?>
			<form action="<?php echo Main::href("user/settings") ?>" role="form" class="form-horizontal" method="post" enctype="multipart/form-data" autocomplete="off">
				<!-- Nav tabs -->
				<ul class='nav nav-tabs'>
					<li class='active'><a href='#mbasic' data-toggle='tab'><?php echo e("Basic") ?></a></li>
					<li><a href='#msettings' data-toggle='tab'><?php echo e("Settings") ?></a></li>
					<li><a href='#msecurity' data-toggle='tab'><?php echo e("Security") ?></a></li>
				</ul>
				<!-- Tab panes -->
				<div class='tab-content'>
					<div class='tab-pane active' id='mbasic'>
						<h4></h4>
						<div class="form-group">
							<div class="col-sm-3 d-flex flex-column" style="padding-right:0px;">
								<label class="control-label"><?php echo e("Avatar") ?></label>
								<div class="d-flex align-items-center justify-content-center">
									<img src="<?php echo $this->user->avatar ?>" alt="" style="width:60px;margin: 10px;">
								</div>
							</div>
							<div class="col-sm-9">
								<input type="file" name="avatar" class="form-control">
								<p class="help-block"><?php echo e("By default, we will use the Gravatar associated to your email. Uploaded avatars must be square with the width ranging from 200-500px with a maximum size of 500kb.") ?></p>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-6">
								<label class="control-label"><?php echo e("Username") ?></label>
								<input type="text" value="<?php echo $this->user->username ?>" name="username" class="form-control" <?php echo (empty($this->user->username) ? "" : " disabled") ?> />
								<p class="help-block"><?php echo e("A username is required for your public profile to be visible.") ?></p>
							</div>
							<div class="col-sm-6">
								<label class="control-label"><?php echo e("Fullname") ?></label>
								<input type="text" value="<?php echo $this->user->name ?>" name="name" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-6">
								<label class="control-label"><?php echo e("Address") ?></label>
								<input type="text" value="<?php echo $address["address"] ?>" name="address" class="form-control" autocomplete="off" />
							</div>
							<div class="col-sm-6">
								<label class="control-label"><?php echo e("City/ Province") ?></label>
								<input type="text" value="<?php echo $address["city"] ?>" name="city" class="form-control" autocomplete="off" />
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-6">
								<label class="control-label"><?php echo e("Email") ?></label>
								<div class="">
									<input type="text" value="<?php echo $this->user->email ?>" name="email" class="form-control" autocomplete="off" />
									<?php if ($this->config["user_activate"]) : ?>
										<p class="help-block"><?php echo e("Please note that if you change your email, you will need to activate your account again.") ?></p>
									<?php endif; ?>
								</div>
							</div>
							<div class="col-sm-6">
								<label class="control-label"><?php echo e("Mobile") ?></label>
								<div class="">
									<input type="text" value="<?php echo $address["mobile"] ?>" name="mobile" class="form-control" autocomplete="off" />
								</div>
							</div>
						</div>
					</div>
					<div class='tab-pane' id='msettings'>
						<h4></h4>
						<?php if ($this->pro()) : ?>
							<div class='form-group'>
								<label for='description' class='col-sm-3 control-label'><?php echo e("Default Redirection") ?></label>
								<div class='col-sm-9'>
									<select name='defaulttype'>
										<option value='direct' <?php echo ($this->user->defaulttype == "direct" || $this->user->defaulttype == "" ? " selected" : "") ?>> <?php echo e('Direct') ?></option>
										<option value='frame' <?php echo ($this->user->defaulttype == "frame" ? " selected" : "") ?>> <?php echo e('Frame') ?></option>
										<option value='splash' <?php echo ($this->user->defaulttype == "splash" ? " selected" : "") ?>> <?php echo e('Splash') ?></option>
										<option value='overlay' <?php echo ($this->user->defaulttype == "overlay" ? " selected" : "") ?>> <?php echo e("Overlay") ?></option>
									</select>
								</div>
							</div>
							<hr>
						<?php endif; ?>
						<ul class="form_opt" data-id="public">
							<li class="text-label"><?php echo e("Profile Access") ?>
								<small><?php echo e("Public profile will be activated only when this option is public. Username is required.") ?></small>
							</li>
							<li><a href="" class="last<?php echo (!$this->user->public ? " current" : "") ?>" data-value="0"><?php echo e("Private") ?></a></li>
							<li><a href="" class="first<?php echo ($this->user->public ? " current" : "") ?>" data-value="1"><?php echo e("Public") ?></a></li>
						</ul>
						<input type="hidden" name="public" id="public" value="<?php echo $this->user->public ?>">

						<ul class="form_opt" data-id="media">
							<li class="text-label"><?php echo e("Media Gateway") ?>
								<small><?php echo e("If enabled, special pages will be automatically created for your media URLs") ?> (e.g. youtube, vimeo, dailymotion...)</small>
							</li>
							<li><a href="" class="last<?php echo (!$this->user->media ? " current" : "") ?>" data-value="0"><?php echo e("Disabled") ?></a></li>
							<li><a href="" class="first<?php echo ($this->user->media ? " current" : "") ?>" data-value="1"><?php echo e("Enabled") ?></a></li>
						</ul>
						<input type="hidden" name="media" id="media" value="<?php echo $this->user->media ?>">
					</div>
					<div class='tab-pane' id='msecurity'>
						<h4></h4>
						<div class="form-group">
							<label class="col-sm-3 control-label"><?php echo e("Password") ?></label>
							<div class="col-sm-9">
								<input type="password" value="" name="password" class="form-control" autocomplete="new-password" />
								<p class="help-block"><?php echo ucfirst(e("leave blank to keep current one")) ?>.</p>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label"><?php echo e("Confirm Password") ?></label>
							<div class="col-sm-9">
								<input type="password" value="" name="cpassword" class="form-control" autocomplete="off" />
								<p class="help-block"><?php echo ucfirst(e("leave blank to keep current one")) ?>.</p>
							</div>
						</div>
						<hr>
						<?php echo $this->sidebar() ?>
						<hr>
						<?php if ($this->config["allowdelete"]) : ?>
							<h4><?php echo e("Delete your account") ?></h4>
							<p><?php echo e("We respect your privacy and as such you can delete your account permanently and remove all your data from our server. Please note that this action is permanent and cannot be reversed.") ?></p>
							<p class="d-flex justify-content-end"><a href="" class="btn btn-danger ajax_call" data-action="delete_account" data-title="<?php echo e("Delete your account") ?>"><?php echo e("Delete permanently") ?></a></p>
						<?php endif ?>
					</div>
				</div>
				<!--end of content tabs-->
				<?php echo Main::csrf_token(TRUE) ?>
				<hr>
				<button type="submit" class="btn btn-primary"><?php echo e("Update") ?></button>
			</form>
		</div>
	</div>
	<!--/#user-content-->
	<div id="widgets" class="col-md-4">
		<div class="panel panel-default panel-body">
			<h3><?php echo e("Activate Dark Mode") ?></h3>
			<p><?php echo e("Enable dark mode if you would like more contrast. This only applies to the dashboard.") ?></p>
			<?php if (isDark()) : ?>
				<p class="d-flex justify-content-end"><a href="?darkmode=off" class="btn btn-primary"><?php echo e("Disable Dark Mode") ?></a></p>
			<?php else : ?>
				<p class="d-flex justify-content-end"><a href="?darkmode=on" class="btn btn-primary"><?php echo e("Activate Dark Mode") ?></a></p>
			<?php endif ?>
		</div>
		<?php echo $this->widgets("export") ?>
	</div>
	<!--/#widgets-->
</div>
<!--/.row-->