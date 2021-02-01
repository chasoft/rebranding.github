<?php defined("APP") or die() ?>
<section class="dark">
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="<?php echo Main::href("") ?>"><?php echo e("Home") ?></a></li>
			<li><a href="<?php echo Main::href("pricing") ?>"><?php echo e("Pricing") ?></a></li>
			<li class="active"><?php echo e("Checkout") ?></li>
		</ol>
	</div>
</section>
<section id="checkout">
	<div class="container">
		<?php echo Main::message() ?>
		<div class="row">
			<div class="col-sm-12 d-none">
				<div class="panel">
					<div class="panel-heading"><strong><?php echo e("Payment Guide") ?></strong></div>
					<div class="panel-body">
						Guide to process the payment.........
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<!-- Selected Plan -->
				<div class="panel" style="min-width:260px;">
					<div class="panel-heading" style="background: #7265f0;color: white;"><strong><?php echo e("Selected Package") ?></strong></div>
					<div class="panel-body">
						<ul>
							<li>
								<strong><?php echo e($plan->name) ?></strong><br>
								<i><?php echo e($plan->description) ?></i><br>
								<?php
									if (($this->do) !== "lifetime")
										echo (e('Payment method') . ': ' . e(ucfirst($this->do)));
									else
										echo (e('Payment method') . ': ' . e('Only once'));
								?>
								<br>
								<?php echo (e('Expired date: ').'<strong>'.$new_expired_date);  ?></strong>
							</li>
							<li><?php echo e('Amount to pay') ?> <span class="pull-right"><?php echo Main::currency($this->config["currency"], number_format($price, 0)) ?></span></li>
							<li><?php echo e('Deduct') ?> <span class="pull-right"><?php echo Main::currency($this->config["currency"], number_format($remaining_amt, 0)) ?></span></li>
							<li class="total"><strong><?php echo e("Total") ?> <span class="pull-right"><strong><?php echo Main::currency($this->config["currency"], number_format($request_amt, 0)) ?></strong></span></strong></li>
						</ul>
						<?php if (($this->do) !== "lifetime") : ?>
							<p class="info">
								<?php echo e("Next payment will be automatically charged at the beginning of each period. You can cancel the service anytime you want."); ?>
							</p>
						<?php endif; ?>
					</div>
				</div>
				<!-- Current Plan -->
				<div class="panel" style="min-width:260px;">
					<div class="panel-heading" style="background: #f1f1f1;color: #4a6c83;"><strong><?php echo e("Current Package") ?></strong></div>
					<div class="panel-body">
						<ul>
							<li>
								<strong><?php echo e($currentPlan->name); ?></strong><br>
								<i><?php echo e($currentPlan->description); ?></i><br>
								<?php
									if (!$currentSub) {
										$acc_style = 'warning';
										$acc_type = 'Lifetime';
									} else {
										$acc_style = 'primary';
										$acc_type = $currentSub->plan;
									}
									echo (e('Current Account'). ': <span class="badge badge-'.$acc_style.'">'. e(ucfirst($acc_type)).'</span>');
								?>
							</li>
							<li><?php echo e('Paid amount') ?><span class="pull-right"><?php echo number_format($paid_amt,0) ?></span></li>
							<li><?php echo e('Used time') ?><span class="pull-right"><?php echo ($used_days.'/'.number_format($total_days,0).' '.e('days')) ?></span></li>
							<li class="total"><strong><?php echo e('Remaining amount') ?><span class="pull-right"><?php echo number_format($remaining_amt,0) ?></span></strong></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-9">
				<div class="panel">
					<div class="panel-body">
						<h3><?php echo e("Checkout") ?></h3>
						<form action="<?php echo Main::href("upgrade/{$this->do}/{$plan->id}") ?>" method="post" id="payment-form">
							<div class="form-group">
								<label for="name"><?php echo e("Full Name") ?></label>
								<input type="text" class="form-control" id="name" name="name" value="<?php echo $this->user->name ?>" required />
							</div>
							<div class="form-group">
								<label for="address"><?php echo e("Address") ?></label>
								<input type="text" class="form-control" id="address" name="address" value="<?php echo (isset($address["address"]) ? $address["address"] : "") ?>" required />
							</div>
							<div class="row">
								<div class="col-xs-6">
									<div class="form-group">
										<label for="city"><?php echo e("Email") ?></label>
										<input type="text" class="form-control" id="email" name="email" placeholder="e.g. mail@yourdomain.com" value="<?php echo $this->user->email; ?>" required />
									</div>
								</div>
								<div class="col-xs-6">
									<div class="form-group">
										<label for="city"><?php echo e("Mobile") ?></label>
										<input type="text" class="form-control" id="mobile" name="mobile" placeholder="e.g. 0984554895" value="<?php echo (isset($address["mobile"]) ? $address["mobile"] : "") ?>" required />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3 col-xs-6">
									<div class="form-group">
										<label for="city"><?php echo e("City") ?></label>
										<input type="text" class="form-control" id="city" name="city" placeholder="e.g. Hồ Chí Minh" value="<?php echo (isset($address["city"]) ? $address["city"] : "") ?>" required />
									</div>
								</div>
								<div class="col-md-3 col-xs-6">
									<div class="form-group">
										<label for="state"><?php echo e("State/Province") ?></label>
										<input type="text" class="form-control" id="state" name="state" placeholder="e.g. HCM" value="<?php echo (isset($address->state) ? $address->state : "NA") ?>" required />
									</div>
								</div>
								<div class="col-md-3 col-xs-6">
									<div class="form-group">
										<label for="country"><?php echo e("Country") ?></label>
										<select name="country" id="country" required>
											<?php echo Main::countries(/*$this->country()*/) ?>
										</select>
									</div>
								</div>
								<div class="col-md-3 col-xs-6">
									<div class="form-group">
										<label for="zip"><?php echo e("Zip/Postal code") ?></label>
										<input type="text" class="form-control" id="zip" name="zip" placeholder="e.g. 700900" value="<?php echo (isset($address->zip) ? $address->zip : "700000") ?>" required />
									</div>
								</div>
							</div>

							<input type="hidden" id="encryptdata" name="encryptdata" value="<?php echo $encryptdata ?>">


							<?php echo Main::csrf_token(TRUE) ?>
							<!-- </php if (isset($this->config["pt"]) && $this->config["pt"] == "stripe") : ?>
								<hr>
								<script src="https://js.stripe.com/v3/"></script>
								<input type="hidden" id="stripeToken">
								<div class="form-row">
									<label for="card-element">
										</php echo e("Credit or debit card") ?>
									</label>
									<div id="card-element"></div>
									<div id="card-errors" role="alert"></div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-6 col-xs-6">
										<div class="form-group">
											<label for="coupon"></php echo e("Coupon Code") ?></label>
											<input type="text" class="form-control" id="coupon" name="coupon" placeholder="">
										</div>
									</div>
								</div>
								<hr>
								<div class="row text-center">
									<div class="col-xs-12">
										<button class="stripe-button btn btn-primary" style="margin-top:10px; margin-right:15px;" type="submit"></php echo e("Pay with Card") ?></button>
									</php else : ?> -->
							<hr>
							<div class="">
								<div class="">
									<!-- row for buttons -->
									<?php if (($this->do) == "lifetime") : ?>
										<button class="btn btn-secondary btn-round" style="margin-top:10px; margin-right:15px;" type="submit" id="btn_alepay" name="btn_alepay"><?php echo e("Pay with Alepay") ?></button>
										<button class="btn btn-primary btn-round" style="margin-top:10px; margin-right:15px;" type="submit" id="btn_paypal" name="btn_paypal"><?php echo e("Pay with PayPal") ?></button>
									<?php else : ?>
										<button class="btn btn-secondary btn-round" style="margin-top:10px; margin-right:15px;" type="submit" id="btn_alepay" name="btn_alepay"><?php echo e("Process Payment") ?></button>
									<?php endif; ?>
								</div>
							</div> <!-- end of row for buttons -->
						</form>
					</div>
				</div>
				<!-- 				</php if (isset($this->config["pt"]) && $this->config["pt"] == "stripe") : ?>
					<p><img src="</php echo Main::fstatic("img/powered_by_stripe.png") ?>" alt="Stripe" class="pull-right"></p>
				</php endif; ?> -->
			</div>
		</div>
	</div>
</section>