<?php defined("APP") or die() // Footer 
?>
<?php if ($this->isUser) : // Show user page footer 
?>
  <footer class="main">
    <div class="row">
      <div class="col-md-3">
        <?php echo date("Y") ?> &copy; BizChain Vietnam Ltd.
      </div>
      <div class="col-md-9 text-right">
        <?php foreach ($pages as $page) : ?>
          <a href='<?php echo $this->config["url"] ?>/page/<?php echo $page->seo ?>' title='<?php echo e($page->name) ?>'><?php echo e($page->name) ?></a> -
        <?php endforeach; ?>
        <?php if ($this->config["blog"]) : ?>
          <a href="<?php echo $this->config["url"] ?>/blog" title='<?php echo e("Blog") ?>'><?php echo e("Blog") ?></a> -
        <?php endif ?>
        <?php if ($this->config["report"]) : ?>
          <a href='<?php echo Main::href("report") ?>' title='<?php echo e("Report Link") ?>'><?php echo e("Report Link") ?></a> -
        <?php endif ?>
        <?php if ($this->config["contact"]) : ?>
          <a href='<?php echo $this->config["url"] ?>/contact' title='<?php echo e("Contact") ?>'><?php echo e("Contact") ?></a>
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
  </div>
  <!--/.content-->
  </div>
  <!--/.row-->
  </div>
  <!--/.container-->
  </section>
<?php else : // Show general footer 
?>
  <?php if ($this->footerShow) : ?>
    <footer class="new_footer_area bg_color">
      <div class="new_footer_top">
        <div class="container">
          <div class="row">
            <div class="col col-sm-4">
              <div class="f_widget social-widget pl_70 wow fadeInLeft" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInLeft;">

                <h3 class="f-title light-mode-logo"><img alt="<?php echo $this->config["title"] ?>" style="width:100%; max-width: 215px;" src="<?php echo $this->config["url"] ?>/content/re-logo-dark.png"></h3>

                <h3 class="f-title dark-mode-logo"><img alt="<?php echo $this->config["title"] ?>" style="width:100%; max-width: 215px;" src="<?php echo $this->config["url"] ?>/content/re-logo-light.png"></h3>

                <div style="margin-bottom: 20px;"><?php echo e("BizChain Vietnam Company Limited<br>27 St.08, Binh Trung Tay, Dist 2, HCMC<br><b>Tax</b>: 0314867890") ?>.<br><em>Email</em>: <a href='<?php echo $this->config["url"] ?>/contact' title='<?php echo e("Contact") ?>'>support@rebranding.today</a></div>
                <div class="f_social_icon">
                  <a href="https://www.facebook.com/bizchain.vn"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                      <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                    </svg></a>
                  <a href="https://twitter.com/vbizchain"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                      <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                    </svg></a>
                </div>
              </div>
            </div>
            <div class="col col-sm-8">
              <div class="col col-sm-4">
                <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
                  <h3 class="f-title f_600 t_color f_size_18">&nbsp;</h3>
                  <ul class="list-unstyled f_list">
                    <?php if ($this->config["blog"]) : ?>
                      <li><a href="<?php echo $this->config["url"] ?>/blog" title='<?php echo e("Blog") ?>'><?php echo e("Blog") ?></a>
                      <li>
                      <?php endif ?>
                      <?php if ($this->config["contact"]) : ?>
                      <li><a href='<?php echo $this->config["url"] ?>/contact' title='<?php echo e("Contact") ?>'><?php echo e("Contact") ?></a>
                      <li>
                      <?php endif ?>
                      <?php if ($this->config["report"]) : ?>
                      <li><a href='<?php echo Main::href("report") ?>' title='<?php echo e("Report Link") ?>'><?php echo e("Report Link") ?></a>
                      <li>
                      <?php endif ?>
                      <?php foreach ($pages as $page) : ?>
                      <li><a href='<?php echo $this->config["url"] ?>/page/<?php echo $page->seo ?>' title='<?php echo e($page->name) ?>'><?php echo e($page->name) ?></a>
                      <li>
                      <?php endforeach; ?>

                      <div class="languages">
                        <a href="#lang" class="active" id="show-language" alt="<?php echo e("Choose Language") ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-globe" viewBox="0 0 16 16">
                            <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z" />
                          </svg> <?php echo e("Choose Language") ?></a>
                        <div class="langs">
                          <?php echo $this->lang(0) ?>
                        </div>
                      </div>
                  </ul>
                </div>
              </div>
              <div class="col col-sm-4">
                <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
                  <h3 class="f-title f_600 t_color f_size_18"><?php echo e("Solutions") ?></h3>
                  <ul class="list-unstyled f_list">
                    <li><a href="https://rebranding.today/page/social-media"><?php echo e("Social Media") ?></a></li>
                    <li><a href="https://rebranding.today/page/digital-marketing"><?php echo e("Digital Marketing") ?></a></li>
                    <li><a href="https://rebranding.today/page/customer-service"><?php echo e("Customer Service") ?></a></li>
                    <li><a href="#" class="not-active"><?php echo e("For Developers") ?></a></li>
                  </ul>
                </div>
              </div>
              <div class="col col-sm-4">
                <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInLeft;">
                  <h3 class="f-title f_600 t_color f_size_18"><?php echo e("Resources") ?></h3>
                  <ul class="list-unstyled f_list">
                    <li><a target="_blank" href="https://help.rebranding.today/benefits#khuyen-nghi-so-huu-toi-thieu-1-ten-mien"><?php echo e("Register domain names") ?></a></li>
                    <li><a href="https://rebranding.today/blog"><?php echo e("Branded links blog") ?></a></li>
                    <li><a target="_blank" href="https://help.rebranding.today/faqs/frequently-asked-questions"><?php echo e("Knowledge base (FAQ)") ?></a></li>
                    <li><a target="_blank" href="https://help.rebranding.today/user-guide/profile-builder"><?php echo e("Profile") ?></a></li>
                    <li><a href="#" class="not-active"><?php echo e("Browser extension") ?></a></li>
                    <li><a href="#" class="not-active"><?php echo e("Apps and Integrations") ?></a></li>
                  </ul>
                </div>
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
              <p>Made with <i style="color: red;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                    <path d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                  </svg></i> in <a href="https://bizchain.vn">BizChain Labs</a> <a href="//www.dmca.com/Protection/Status.aspx?ID=5c45d4e6-5444-413d-8aa3-661e273639c9" title="DMCA.com Protection Status" class="dmca-badge"> <img src="https://images.dmca.com/Badges/dmca_protected_sml_120n.png?ID=5c45d4e6-5444-413d-8aa3-661e273639c9" alt="DMCA.com Protection Status" /></a>
                <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <script src="https://unpkg.com/typer-js"></script>

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
    "success" => e('URL has been successfully shortened. Click <kbd>Copy</kbd> or <kbd>CRTL</kbd>+<kbd>C</kbd> to Copy it.'),
    "stats" => e('You can access the statistic page via this link'),
    "copy" => e('Copied to clipboard.'),
    "from" => e('Redirect from'),
    "to" => e('Redirect to'),
    "share" => e('Share this on'),
    "congrats"  => e('<b>Congratulation</b>! Your URL has been successfully shortened. You can share it on <b>Facebook</b> or <b>Twitter</b> by clicking the links below.'),
    "qr" => e('Save QR Code'),
    "continue"  =>  e("Continue"),
    "cookie" => e("This website uses cookies to ensure you get the best experience on our website."),
    "cookieok" => e("Got it!"),
    "cookiemore" => e("Learn more"),
    "couponinvalid" => e("The coupon enter is not valid"),
    "minurl" => e("You must select at least 1 url."),
    "minsearch" => e("Keyword must be more than 3 characters!"),
    "typed" => [e("Individuals "), e("Affiliaters "), e("Artists "), e("Youtubers "), e("Corporate "), e("Everyone ")],
    "modal" => [
      "title" => e("Are you sure you want to proceed?"),
      "proceed" => e("Proceed"),
      "cancel" => e("Cancel"),
      "close" => e("Close"),
      "content" => e("Note that this action is permanent. Once you click proceed, you <strong>may not undo</strong> this. Click anywhere outside this modal or click <a href='#close' class='close-modal'><kbd>close</kbd></a> to close this.")
    ]
  );
  ?>
  var lang = <?php echo json_encode($js_lang) ?>;
</script>
<?php Main::enqueue('footer') ?>
<script type="text/javascript" src="<?php echo $this->theme("assets/js/main.js") ?>"></script>
</body>

</html>