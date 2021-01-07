<?php defined("APP") or die() ?>
<section id="plan">
  <div class="container">
    <?php echo Main::message() ?>
    <div class="text-center">
      <h1><?php echo e("Simple Pricing") ?></h1>
      <p><?php echo e("Transparent pricing for everyone. Always know what you will pay.") ?></p>
      <br>
      <div class="toggle-container cf">
        <div class="switch-toggles">
          <div class="monthly"><?php echo e("Monthly") ?></div>
          <div class="yearly"><?php echo e("Yearly") ?></div>
        </div>
      </div>      
    </div>    
    <div id="price_tables">
	  <!-- MONTHLY -->
      <div class="monthly cf">
		  <div class="container plan-fix">
			<div class="row2 g-gs">
			
				<?php foreach ($free as $plan): ?>
				<div class="col-md-4">
					<div class="price-plan card card-bordered text-center">
						<div class="card-inner">
							<div class="price-plan-media">
								<img src="https://rebranding.today/themes/rebrand2/assets/images/plan-s1.svg" alt="">
							</div>
							<div class="price-plan-info">
								<h5 class="title"><?php echo e($plan["name"]) ?></h5>
								<span><?php echo e($plan["description"]) ?></span>
							</div>
							<div class="price-plan-amount">
								<div class="amount"><?php echo e("Free") ?></div>
								<span class="bill"></span>
							</div>
							<div class="price-plan-action">						
								  <?php if($this->logged()): ?>
									<?php if(!$this->pro()): ?>
									  <a class="btn btn-default btn-round"><?php echo e("Current Plan") ?></a> 
									<?php else: ?>
									  <a class="btn btn-default btn-round"><?php echo e("Free Forever") ?></a> 
									<?php endif ?>
								  <?php else: ?>
									<a href="<?php echo Main::href("user/register") ?>" class="btn btn-outline-primary btn-round"><?php echo e("Get Started") ?></a> 
								  <?php endif ?>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach ?>
				
				<?php foreach ($monthly as $plan): ?>
				<div class="col-md-4">
					<div class="price-item card card-bordered text-center">
						<div class="card-inner">
							<div class="price-plan-media">
								<img src="https://rebranding.today/themes/rebrand2/assets/images/plan-s2.svg" alt="">
							</div>
							<div class="price-plan-info">
								<h5 class="title"><?php echo e($plan["name"]) ?></h5>
								<span><?php echo e($plan["description"]) ?></span>
							</div>
							<div class="price-plan-amount">
								<div class="amount"><?php echo Main::currency($this->config["currency"], number_format($plan["price"], 2)) ?> 
									<span>/<?php echo e("mo") ?></span>
								</div>
								<span class="bill"></span>
							</div>
							<div class="price-plan-action">
							  <?php if ($this->logged() && $this->pro() && $this->user->planid == $plan["id"]): ?>
								  <?php if ($this->user->trial): ?>
									<a href="<?php echo Main::href("upgrade/monthly/{$plan["id"]}") ?>" class="btn btn-primary btn-round"><?php echo e("Subscribe") ?></a>   
								  <?php else: ?>
									<a class="btn btn-default btn-round"><?php echo e("Current Plan") ?></a> 
								  <?php endif ?>
							  <?php else: ?>
								<?php if($plan["trial"] && (!$this->logged() || ($this->logged() && !$this->db->get("payment", "trial_days IS NOT NULL AND userid = '{$this->user->id}'", ["limit" => 1])))): ?>
									<a href="<?php echo Main::href("upgrade/monthly/{$plan["id"]}?trial=1") ?>" class="btn btn-primary btn-round"><?php echo $plan["trial"] ?>-<?php echo e("Day") ?> <?php echo e("Free Trial") ?></a>  
								<?php else: ?>
								  <a href="<?php echo Main::href("upgrade/monthly/{$plan["id"]}") ?>" class="btn btn-primary btn-round"><?php echo e("Subscribe") ?></a>  
								<?php endif ?>
							  <?php endif ?>
							</div>
						</div>
					</div>	
					<!-- .price-item -->
				</div>
				<?php endforeach ?>

			</div><!-- .row -->
		  </div><!-- .container -->
      </div><!-- end of Monthly -->

	  <!-- YEARLY -->
      <div class="yearly cf">
	  
		  <div class="container plan-fix">
			<div class="row2 g-gs">
			
				<?php foreach ($free as $plan): ?>
				<div class="col-md-4">
					<div class="price-plan card card-bordered text-center">
						<div class="card-inner">
							<div class="price-plan-media">
								<img src="https://rebranding.today/themes/rebrand2/assets/images/plan-s1.svg" alt="">
							</div>
							<div class="price-plan-info">
								<h5 class="title"><?php echo e($plan["name"]) ?></h5>
								<span><?php echo e($plan["description"]) ?></span>
							</div>
							<div class="price-plan-amount">
								<div class="amount"><?php echo e("Free") ?></div>
								<span class="bill"><?php echo e("Forever") ?></span>
							</div>
							<div class="price-plan-action">		
							  <?php if($this->logged()): ?>
								<?php if(!$this->pro()): ?>
								  <a class="btn btn-default btn-round"><?php echo e("Current Plan") ?></a> 
								<?php else: ?>
								  <a class="btn btn-default btn-round"><?php echo e("Free Forever") ?></a> 
								<?php endif ?>
							  <?php else: ?>
								<a href="<?php echo Main::href("user/register") ?>" class="btn btn-outline-primary btn-round"><?php echo e("Get Started") ?></a> 
							  <?php endif ?>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach ?>
				
				<?php foreach ($yearly as $plan): ?>
				<div class="col-md-4">
					<div class="price-item card card-bordered text-center">
						<div class="card-inner">
							<div class="price-plan-media">
								<img src="https://rebranding.today/themes/rebrand2/assets/images/plan-s2.svg" alt="">
							</div>
							<div class="price-plan-info">
								<h5 class="title"><?php echo e($plan["name"]) ?></h5>
								<span><?php echo e($plan["description"]) ?></span>
							</div>
							<div class="price-plan-amount">
								<div class="amount"><?php echo Main::currency($this->config["currency"],$plan["price"]) ?>
									<span>/<?php echo e("yr") ?></span>
								</div>
								<span class="bill"><?php echo Main::currency($this->config["currency"], number_format($plan["price"]/12, 2)) ?>/<?php echo e("mo") ?> (<?php echo e("Save.")." {$plan["discount"]}" ?>%)</span>
							</div>
							<div class="price-plan-action">
							  <?php if ($this->logged() && $this->pro() && $this->user->planid == $plan["id"]): ?>
								  <?php if ($this->user->trial): ?>
									<a href="<?php echo Main::href("upgrade/yearly/{$plan["id"]}") ?>" class="btn btn-primary btn-round"><?php echo e("Subscribe") ?></a>   
								  <?php else: ?>
									<a class="btn btn-default btn-round"><?php echo e("Current Plan") ?></a> 
								  <?php endif ?>
							  <?php else: ?>
								<?php if($plan["trial"] && (!$this->logged() || ($this->logged() && !$this->db->get("payment", "trial_days IS NOT NULL AND userid = '{$this->user->id}'", ["limit" => 1])))): ?>                  
									<a href="<?php echo Main::href("upgrade/yearly/{$plan["id"]}?trial=1") ?>" class="btn btn-primary btn-round"><?php echo $plan["trial"] ?>-<?php echo e("Day") ?> <?php echo e("Free Trial") ?></a>                      
								<?php else: ?>
								  <a href="<?php echo Main::href("upgrade/yearly/{$plan["id"]}") ?>" class="btn btn-primary btn-round"><?php echo e("Subscribe") ?></a>  
								<?php endif ?>
							  <?php endif ?>
							</div>
						</div>
					</div>	
					<!-- .price-item -->
				</div>
				<?php endforeach ?>

			</div><!-- .row -->
		  </div><!-- .container -->	  
      </div><!-- end of YEARLY -->
    </div><!-- end of PRICE-TABLE -->
	
	<hr>
	<div class="container">
	<div class="card card-bordered">
		<table class="table table-features">
			<thead class="tb-ftr-head thead-light">
				<tr class="tb-ftr-item">
					<th class="tb-ftr-info"><?php echo e("Features")?></th>
					<th class="tb-ftr-plan"><?php echo e($free[0]["name"])?></th>
					<th class="tb-ftr-plan"><?php echo e($monthly[0]["name"])?></th>
					<th class="tb-ftr-plan"><?php echo e($monthly[1]["name"])?></th>
				</tr>
				<!-- .tb-ftr-item -->
			</thead>
			<tbody class="tb-ftr-body">
			<tr class="tb-ftr-item">
				<td class="tb-ftr-info"><?php echo e("Premium Features") ?></td>
				<td class="tb-ftr-plan"><span class="features no"></span></td>
				<td class="tb-ftr-plan"><span class="features yes"></span></td>
				<td class="tb-ftr-plan"><span class="features yes"></span></td>
			</tr>
			<tr class="tb-ftr-item">
				<td class="tb-ftr-info"><?php echo e("URLs allowed") ?></td>
				<td class="tb-ftr-plan"><?php echo $free[0]["urls"]== "0" ? e("Unlimited") : $free[0]["urls"] ?></td>
				<td class="tb-ftr-plan"><?php echo $monthly[0]["urls"]== "0" ? e("Unlimited") : $monthly[0]["urls"] ?></td>
				<td class="tb-ftr-plan"><?php echo $monthly[1]["urls"]== "0" ? e("Unlimited") : $monthly[1]["urls"] ?></td>
			</tr>
			<!-- .tb-ftr-item -->
			<tr class="tb-ftr-item">
				<td class="tb-ftr-info"><?php echo e("Clicks per month") ?></td>
				<td class="tb-ftr-plan"><?php echo $free[0]["clicks"]== "0" ? e("Unlimited") : $free[0]["clicks"] ?></td>
				<td class="tb-ftr-plan"><?php echo $monthly[0]["clicks"]== "0" ? e("Unlimited") : $monthly[0]["clicks"] ?></td>
				<td class="tb-ftr-plan"><?php echo $monthly[1]["clicks"]== "0" ? e("Unlimited") : $monthly[1]["clicks"] ?></td>
			</td>
			<tr class="tb-ftr-item">
				<td class="tb-ftr-info"><?php echo e("Team Member") ?></td>
				<td class="tb-ftr-plan">
					<?php if ($free[0]["permission"]->team->enabled): ?>
						<?php echo $free[0]["permission"]->team->count == "0" ? e("Unlimited") : $free[0]["permission"]->team->count ?>
					<?php else: ?>						
						-
					<?php endif ?>
				</td>
				<td class="tb-ftr-plan">
					<?php if ($monthly[0]["permission"]->splash->enabled): ?>
						<?php echo $monthly[0]["permission"]->team->count == "0" ? e("Unlimited") : $monthly[0]["permission"]->team->count ?>
					<?php else: ?>						
						<span class="features no"></span>
					<?php endif ?>
				</td>
				<td class="tb-ftr-plan">
					<?php if ($monthly[1]["permission"]->splash->enabled): ?>
						<?php echo $monthly[1]["permission"]->team->count == "0" ? e("Unlimited") : $monthly[1]["permission"]->team->count ?>
					<?php else: ?>						
						<span class="features no"></span>
					<?php endif ?>
				</td>
			</td>
			<tr class="tb-ftr-item">
				<td class="tb-ftr-info"><?php echo e("Custom Domains") ?></td>
				<td class="tb-ftr-plan">
					<?php if ($free[0]["permission"]->domain->enabled): ?>
						<?php echo $free[0]["permission"]->domain->count == "0" ? e("Unlimited") : $free[0]["permission"]->domain->count ?>
					<?php else: ?>						
						<span class="features no"></span>
					<?php endif ?>
				</td>
				<td class="tb-ftr-plan">
				<?php echo $monthly[0]["permission"]->domain->count == "0" ? e("Unlimited") : $monthly[0]["permission"]->domain->count ?>
				</td>
				<td class="tb-ftr-plan">
				<?php echo $monthly[1]["permission"]->domain->count == "0" ? e("Unlimited") : $monthly[1]["permission"]->domain->count ?>
				</td>
			</td>
			<tr class="tb-ftr-item">
				<td class="tb-ftr-info"><?php echo e("Custom Splash Pages") ?></td>
				<td class="tb-ftr-plan">
					<?php if ($free[0]["permission"]->splash->enabled): ?>
						<?php echo $free[0]["permission"]->splash->count == "0" ? e("Unlimited") : $free[0]["permission"]->splash->count ?>
					<?php else: ?>						
						<span class="features no"></span>
					<?php endif ?>
				</td>
				<td class="tb-ftr-plan">
					<?php if ($monthly[0]["permission"]->splash->enabled): ?>
						<?php echo $monthly[0]["permission"]->splash->count == "0" ? e("Unlimited") : $monthly[0]["permission"]->splash->count ?>
					<?php else: ?>						
						<span class="features no"></span>
					<?php endif ?>
				</td>
				<td class="tb-ftr-plan">
					<?php if ($monthly[1]["permission"]->splash->enabled): ?>
						<?php echo $monthly[1]["permission"]->splash->count == "0" ? e("Unlimited") : $monthly[1]["permission"]->splash->count ?>
					<?php else: ?>						
						<span class="features no"></span>
					<?php endif ?>
				</td>
			</td>
			<tr class="tb-ftr-item">
				<td class="tb-ftr-info"><?php echo e("Custom Overlay Pages") ?></td>
				<td class="tb-ftr-plan">
					<?php if ($free[0]["permission"]->overlay->enabled): ?>
						<?php echo $free[0]["permission"]->overlay->count == "0" ? e("Unlimited") : $free[0]["permission"]->overlay->count ?>
					<?php else: ?>						
						<span class="features no"></span>
					<?php endif ?>
				</td>
				<td class="tb-ftr-plan">
					<?php if ($monthly[0]["permission"]->splash->enabled): ?>
						<?php echo $monthly[0]["permission"]->overlay->count == "0" ? e("Unlimited") : $monthly[0]["permission"]->overlay->count ?>
					<?php else: ?>						
						<span class="features no"></span>
					<?php endif ?>
				</td>
				<td class="tb-ftr-plan">
					<?php if ($monthly[1]["permission"]->splash->enabled): ?>
						<?php echo $monthly[1]["permission"]->overlay->count == "0" ? e("Unlimited") : $monthly[1]["permission"]->overlay->count ?>
					<?php else: ?>						
						<span class="features no"></span>
					<?php endif ?>
				</td>
			</td>
			<tr class="tb-ftr-item">
				<td class="tb-ftr-info"><?php echo e("Event Tracking") ?></td>
				<td class="tb-ftr-plan">
					<?php if ($free[0]["permission"]->pixels->enabled): ?>
						<?php echo $free[0]["permission"]->pixels->count == "0" ? e("Unlimited") : $free[0]["permission"]->pixels->count ?>
					<?php else: ?>						
						<span class="features no"></span>
					<?php endif ?>
				</td>
				<td class="tb-ftr-plan">
					<?php if ($monthly[0]["permission"]->splash->enabled): ?>
						<?php echo $monthly[0]["permission"]->pixels->count == "0" ? e("Unlimited") : $monthly[0]["permission"]->pixels->count ?>
					<?php else: ?>						
						<span class="features no"></span>
					<?php endif ?>
				</td>
				<td class="tb-ftr-plan">
					<?php if ($monthly[1]["permission"]->splash->enabled): ?>
						<?php echo $monthly[1]["permission"]->pixels->count == "0" ? e("Unlimited") : $monthly[1]["permission"]->pixels->count ?>
					<?php else: ?>						
						<span class="features no"></span>
					<?php endif ?>
				</td>
			</td>
			<tr class="tb-ftr-item">
				<td class="tb-ftr-info"><?php echo e("Geotargeting") ?></td>
				<td class="tb-ftr-plan">
				  <span class="features <?php echo $free[0]["permission"]->geo->enabled == true?"yes":"no"?>"></span>
				</td>
				<td class="tb-ftr-plan">
				  <span class="features <?php echo $monthly[0]["permission"]->geo->enabled == true?"yes":"no"?>"></span>
				</td>
				<td class="tb-ftr-plan">
				  <span class="features <?php echo $monthly[1]["permission"]->geo->enabled == true?"yes":"no"?>"></span>
				</td>					
			</td>
			<tr class="tb-ftr-item">
				<td class="tb-ftr-info"><?php echo e("Device Targeting") ?></td>
				<td class="tb-ftr-plan">
				  <span class="features <?php echo $free[0]["permission"]->device->enabled == true?"yes":"no"?>"></span>
				</td>
				<td class="tb-ftr-plan">
				  <span class="features <?php echo $monthly[0]["permission"]->device->enabled == true?"yes":"no"?>"></span>
				</td>
				<td class="tb-ftr-plan">
				  <span class="features <?php echo $monthly[1]["permission"]->device->enabled == true?"yes":"no"?>"></span>
				</td>					
			</td>
			<tr class="tb-ftr-item">
				<td class="tb-ftr-info"><?php echo e("Bundles & Link Rotator") ?></td>
				<td class="tb-ftr-plan">
				  <span class="features <?php echo $free[0]["permission"]->bundle->enabled == true?"yes":"no"?>"></span>
				</td>
				<td class="tb-ftr-plan">
				  <span class="features <?php echo $monthly[0]["permission"]->bundle->enabled == true?"yes":"no"?>"></span>
				</td>
				<td class="tb-ftr-plan">
				  <span class="features <?php echo $monthly[1]["permission"]->bundle->enabled == true?"yes":"no"?>"></span>
				</td>					
			</td>
			<tr class="tb-ftr-item">
				<td class="tb-ftr-info"><?php echo e("Custom Aliases") ?></td>
				<td class="tb-ftr-plan">
				  <span class="features <?php echo $free[0]["permission"]->alias->enabled == true?"yes":"no"?>"></span>
				</td>
				<td class="tb-ftr-plan">
				  <span class="features <?php echo $monthly[0]["permission"]->alias->enabled == true?"yes":"no"?>"></span>
				</td>
				<td class="tb-ftr-plan">
				  <span class="features <?php echo $monthly[1]["permission"]->alias->enabled == true?"yes":"no"?>"></span>
				</td>					
			</td>
			<tr class="tb-ftr-item">
				<td class="tb-ftr-info"><?php echo e("Export Data") ?></td>
				<td class="tb-ftr-plan">
				  <span class="features <?php echo $free[0]["permission"]->export->enabled == true?"yes":"no"?>"></span>
				</td>
				<td class="tb-ftr-plan">
				  <span class="features <?php echo $monthly[0]["permission"]->export->enabled == true?"yes":"no"?>"></span>
				</td>
				<td class="tb-ftr-plan">
				  <span class="features <?php echo $monthly[1]["permission"]->export->enabled == true?"yes":"no"?>"></span>
				</td>					
			</td>
			<tr class="tb-ftr-item">
				<td class="tb-ftr-info"><?php echo e("Developer API") ?></td>
				<td class="tb-ftr-plan">
				  <span class="features <?php echo $free[0]["permission"]->api->enabled == true?"yes":"no"?>"></span>
				</td>
				<td class="tb-ftr-plan">
				  <span class="features <?php echo $monthly[0]["permission"]->api->enabled == true?"yes":"no"?>"></span>
				</td>
				<td class="tb-ftr-plan">
				  <span class="features <?php echo $monthly[1]["permission"]->api->enabled == true?"yes":"no"?>"></span>
				</td>					
			</td>
			<tr class="tb-ftr-item"><!-- URL Customization -->
				<td class="tb-ftr-info"><?php echo e("URL Customization") ?></td>
				<td class="tb-ftr-plan"><span class="features no"></span></td>
				<td class="tb-ftr-plan"><span class="features yes"></span></td>
				<td class="tb-ftr-plan"><span class="features yes"></span></td>
			</td>
			<tr class="tb-ftr-item"><!-- Advertisements -->
				<td class="tb-ftr-info"><?php echo e("Advertisements") ?></td>
				<td class="tb-ftr-plan"><span class="features yes"></span></td>
				<td class="tb-ftr-plan"><span class="features no"></span></td>
				<td class="tb-ftr-plan"><span class="features no"></span></td>
			</td>
			</tbody>
		</table>
	</div>
	</div>
  </div><!-- end of container -->
</section>

<section id="faq">
  <div class="container">
    <div class="panel panel-body">
      <div class="text-center">
        <h1><?php echo e("Frequently Asked Questions") ?></h1>    
      </div>
      <div class="row">
        <div class="col-md-6">
          <?php if ($discountMax): ?>
            <div class="faq-list clearfix">
              <h2><i class="glyphicon glyphicon-gift"></i> <?php echo e("If I pay yearly, do I get a discount?") ?></h2>
              <p class="info"><?php echo e("Definitely! If you choose to pay yearly, not only will you make great use of premium features but also you will get a discount of up to ").$discountMax."%." ?></p>
            </div>                  
          <?php endif ?>            
        </div>
        <div class="col-md-6">
          <div class="faq-list clearfix">
            <h2><i class="glyphicon glyphicon-flash"></i> <?php echo e("Can I upgrade my account at any time?") ?></h2>
            <p class="info"><?php echo e("Yes! You can start with our free package and upgrade anytime to enjoy premium features.") ?></p>
          </div>        
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <?php if (isset($this->config["pt"]) && $this->config["pt"] == "stripe"): ?>
            <div class="faq-list clearfix">
              <h2><i class="glyphicon glyphicon-credit-card"></i> <?php echo e("How will I be charged?") ?></h2>
              <p class="info"><?php echo e("You will be charged at the beginning of each period automatically until canceled.") ?></p>
            </div>           
          <?php else: ?>
            <div class="faq-list clearfix">
              <h2><i class="glyphicon glyphicon-credit-card"></i> <?php echo e("How will I be charged?") ?></h2>
              <p class="info"><?php echo e("You will be reminded to renew your membership 7 days before your expiration.") ?></p>
            </div>          
          <?php endif ?>        
        </div>
        <div class="col-md-6">
          <?php if (isset($this->config["pt"]) && $this->config["pt"] == "stripe"): ?>
            <div class="faq-list clearfix">
              <h2><i class="glyphicon glyphicon-log-in"></i> <?php echo e("How do refunds work?") ?></h2>
              <p class="info">
                <?php echo e("Upon request, we will issue a refund at the moment of the request for all <strong>upcoming</strong> periods. If you are on a monthly plan, we will stop charging you at the end of your current billing period. If you are on a yearly plan, we will refund amounts for the remaining months.") ?>            
              </p>
            </div>          
          <?php else: ?>
          <div class="faq-list clearfix">
            <h2><i class="glyphicon glyphicon-log-in"></i> <?php echo e("How do refunds work?") ?></h2>
            <p class="info">
              <?php echo e("Upon request, we will issue a refund at the moment of the request for all <strong>upcoming</strong> periods. You will just need to contact us and we will take care of everything.") ?>            
            </p>
          </div>       
          <?php endif ?>        
        </div>
      </div>       
    </div>  
  </div>
</section>

<section>
  <div class="container">
    <div class="featurette">
      <h3 class="text-center featureH"><?php echo e("Premium Features. All Yours.") ?></h3>
      <div class="row">
        <div class="col-sm-4">
          <i class="glyphicon glyphicon-globe"></i>
          <h3><?php echo e("Target Customers") ?></h3>
          <p><?php echo e("Target your users based on their location and device and redirect them to specialized pages to increase your conversion.") ?></p>
        </div>    
        <div class="col-sm-4">
          <i class="glyphicon glyphicon-star"></i>
          <h3><?php echo e("Custom Landing Page") ?></h3>
          <p><?php echo e("Create a custom landing page to promote your product or service on forefront and engage the user in your marketing campaign.") ?></p>
        </div>      
        <div class="col-sm-4">
          <i class="glyphicon glyphicon-asterisk"></i>
          <h3><?php echo e("Overlays") ?></h3>
          <p><?php echo e("Use our overlay tool to display unobtrusive notifications on the target website. A perfect way to send a message to your customers or run a promotion campaign.") ?></p>
        </div>
      </div>    
      <br> 
      <div class="row">
        <div class="col-sm-4">
          <i class="glyphicon glyphicon-th"></i>
          <h3><?php echo e("Event Tracking") ?></h3>
          <p><?php echo e("Add your custom pixel from providers such as Facebook and track events right when they are happening.") ?></p>
        </div>        
        <div class="col-sm-4">
          <i class="glyphicon glyphicon-glass"></i>
          <h3><?php echo e("Premium Aliases") ?></h3>
          <p><?php echo e("As a premium membership, you will be able to choose a premium alias for your links from our list of reserved aliases.") ?></p>
        </div>     
        <div class="col-sm-4">
          <i class="glyphicon glyphicon-cloud"></i>
          <h3><?php echo e("Robust API") ?></h3>
          <p><?php echo e("Use our powerful API to build custom applications or extend your own application with our powerful tools.") ?></p>
        </div>         
      </div>
    </div>    
  </div>       
</section>