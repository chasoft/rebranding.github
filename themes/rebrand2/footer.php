<?php defined("APP") or die() // Footer ?>
  <?php if ($this->isUser): // Show user page footer ?>
              <footer class="main">
                <div class="row">
                  <div class="col-md-3">
                    <?php echo date("Y") ?> &copy; <?php echo $this->config["title"] ?>.
                  </div>
                  <div class="col-md-9 text-right">                                      
                    <?php foreach ($pages as $page):?>        
                      <a href='<?php echo $this->config["url"]?>/page/<?php echo $page->seo ?>' title='<?php echo e($page->name)?>'><?php echo e($page->name)?></a> -
                    <?php endforeach; ?>
                    <?php if ($this->config["blog"]): ?>
                      <a href="<?php echo $this->config["url"]?>/blog" title='<?php echo e("Blog")?>'><?php echo e("Blog")?></a> -
                    <?php endif ?>
                    <?php if ($this->config["report"]): ?>
                      <a href='<?php echo Main::href("report") ?>' title='<?php echo e("Report Link")?>'><?php echo e("Report Link")?></a> -
                    <?php endif ?>
                    <?php if ($this->config["contact"]): ?>
                      <a href='<?php echo $this->config["url"]?>/contact' title='<?php echo e("Contact")?>'><?php echo e("Contact")?></a>
                    <?php endif ?>
                    <div class="languages">
                      <a href="#lang" class="active" id="show-language"><i class="glyphicon glyphicon-globe"></i> <?php echo e("Choose Language") ?></a>
                      <div class="langs">
                        <?php echo $this->lang(0) ?>
                      </div>          
                    </div>                      
                  </div>
                </div>
            </footer>  
          </div><!--/.content-->
        </div><!--/.row-->
      </div><!--/.container-->      
    </section>
  <?php else: // Show general footer ?>
    <?php if ($this->footerShow): ?>
<footer class="new_footer_area bg_color">
            <div class="new_footer_top">
                <div class="container">
                    <div class="row">
                        <div class="col col-sm-3">
                            <div class="f_widget social-widget pl_70 wow fadeInLeft" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInLeft;">
                                <h3 class="f-title"><img alt="<?php echo $this->config["title"] ?>" style="width:100%; max-width: 215px;" src="<?php echo $this->config["url"] ?>/content/<?php echo $this->config["logo"] ?>"></h3>								
								<div style="margin-bottom: 20px;"><?php echo e("A Service of BizChain Labs")?>.<br><em>Email</em>: <a href='<?php echo $this->config["url"]?>/contact' title='<?php echo e("Contact")?>'>support@rebranding.today</a></div>
                                <div class="f_social_icon">
                                    <a href="https://www.facebook.com/bizchain.vn" class="fab fa-facebook"></a>
                                    <a href="https://twitter.com/vbizchain" class="fab fa-twitter"></a>
                                </div>
                            </div>
                        </div>	
                        <div class="col col-sm-3">
                            <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
                                <h3 class="f-title f_600 t_color f_size_18">&nbsp;</h3>
                                <ul class="list-unstyled f_list">
							  <?php if ($this->config["blog"]): ?>
								<li><a href="<?php echo $this->config["url"]?>/blog" title='<?php echo e("Blog")?>'><?php echo e("Blog")?></a><li>
							  <?php endif ?>
							  <?php if ($this->config["contact"]): ?>
								<li><a href='<?php echo $this->config["url"]?>/contact' title='<?php echo e("Contact")?>'><?php echo e("Contact")?></a><li>
							  <?php endif ?>
							  <?php if ($this->config["report"]): ?>
								<li><a href='<?php echo Main::href("report") ?>' title='<?php echo e("Report Link")?>'><?php echo e("Report Link")?></a><li>
							  <?php endif ?>
							  <?php foreach ($pages as $page):?>        
								<li><a href='<?php echo $this->config["url"]?>/page/<?php echo $page->seo ?>' title='<?php echo e($page->name)?>'><?php echo e($page->name)?></a><li>
							  <?php endforeach; ?>
							  
                    <div class="languages">
                      <a href="#lang" class="active" id="show-language" alt="<?php echo e("Choose Language") ?>"><i class="glyphicon glyphicon-globe"></i> <?php echo e("Choose Language") ?></a>
                      <div class="langs">
                        <?php echo $this->lang(0) ?>
                      </div>          
                    </div>							  
							  
                                </ul>
                            </div>
                        </div>						
                        <div class="col col-sm-3">
                            <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
                                <h3 class="f-title f_600 t_color f_size_18"><?php echo e("Solutions")?></h3>
                                <ul class="list-unstyled f_list">
                                    <li><a href="#">Menu Item</a></li>
                                    <li><a href="#">Menu Item</a></li>
                                    <li><a href="#">Menu Item</a></li>
                                    <li><a href="#">Menu Item</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col col-sm-3">
                            <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInLeft;">
                                <h3 class="f-title f_600 t_color f_size_18"><?php echo e("Resources")?></h3>
                                <ul class="list-unstyled f_list">
                                    <li><a href="#">Menu Item</a></li>
                                    <li><a href="#">Menu Item</a></li>
                                    <li><a href="#">Menu Item</a></li>
                                    <li><a href="#">Menu Item</a></li>
                                    <li><a href="#">Menu Item</a></li>
                                    <li><a href="#">Menu Item</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer_bg">
                    <div class="footer_bg_one"></div>
                    <div class="footer_bg_two"></div>
                </div>
            </div>
            <div class="footer_bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-sm-7">
                            <p class="mb-0 f_400"><?php echo date("Y") ?> &copy; <?php echo $this->config["title"] ?>.</p>
                        </div>
                        <div class="col-lg-6 col-sm-5 text-right">
                            <p>Made with <i style="color: darkred;" class="glyphicon glyphicon-heart"></i> in <a href="https://bizchain.vn">BizChain Labs</a> <a href="//www.dmca.com/Protection/Status.aspx?ID=5c45d4e6-5444-413d-8aa3-661e273639c9" title="DMCA.com Protection Status" class="dmca-badge"> <img src ="https://images.dmca.com/Badges/dmca_protected_sml_120n.png?ID=5c45d4e6-5444-413d-8aa3-661e273639c9"  alt="DMCA.com Protection Status" /></a>  <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
		<script src="https://unpkg.com/typer-js"></script>
		<script src="<?php echo $this->config["url"] ?>/themes/<?php echo $this->config["theme"] ?>/assets/js/typing.js"></script>
		
    <?php endif ?>
  <?php endif ?>   
  <script type="text/javascript">
    <?php 
      $js_lang = array(
        "del" => e("Delete"),
        "url" => e("URL"),
        "count" => e("Country"),
        "copied"  =>  e("Copied"),
        "geo" => e("Geotargeting data for"),
        "error" => e('Please enter a valid URL.'),
        "success" => e('URL has been successfully shortened. Click Copy or CRTL+C to Copy it.'),
        "stats" => e('You can access the statistic page via this link'),
        "copy" => e('Copied to clipboard.'),
        "from" => e('Redirect from'),
        "to" => e('Redirect to'),
        "share" => e('Share this on'),
        "congrats"  => e('Congratulation! Your URL has been successfully shortened. You can share it on Facebook or Twitter by clicking the links below.'),
        "qr" => e('Save QR Code'),
        "continue"  =>  e("Continue"),
        "cookie" => e("This website uses cookies to ensure you get the best experience on our website."),
        "cookieok" => e("Got it!"),
        "cookiemore" => e("Learn more"),
        "couponinvalid" => e("The coupon enter is not valid"),
        "minurl" => e("You must select at least 1 url."),
        "minsearch" => e("Keyword must be more than 3 characters!"),
        "modal" => [
          "title" => e("Are you sure you want to proceed?"),
          "proceed" => e("Proceed"),
          "cancel" => e("Cancel"),
          "close" => e("Close"),
          "content" => e("Note that this action is permanent. Once you click proceed, you <strong>may not undo</strong> this. Click anywhere outside this modal or click <a href='#close' class='close-modal'>close</a> to close this.")
        ]
      );
    ?>
    var lang = <?php echo json_encode($js_lang) ?>;
  </script>  
	<?php Main::enqueue('footer') ?>
  <script type="text/javascript" src="<?php echo $this->theme("assets/js/main.js") ?>"></script>
	</body>
</html>