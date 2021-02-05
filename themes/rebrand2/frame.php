<?php defined("APP") or die() ?>
<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1.0" />
  <meta name="description" content="<?php echo Main::description() ?>" />
  <!-- Open Graph Tags -->
  <?php echo Main::ogp(); ?>

  <title><?php echo Main::title() ?></title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo $this->config["url"] ?>/static/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: transparent;
      position: relative;
    }

    .flex-row {
      -webkit-box-orient: horizontal !important;
      -webkit-box-direction: normal !important;
      -ms-flex-direction: row !important;
      flex-direction: row !important;
    }

    .d-flex {
      display: -webkit-box !important;
      display: -ms-flexbox !important;
      display: flex !important;
    }

    .ml-auto,
    .mx-auto {
      margin-left: auto !important;
    }

    .align-content-center {
      -ms-flex-line-pack: center !important;
      align-content: center !important;
    }

    .align-content-stretch {
      -ms-flex-line-pack: stretch !important;
      align-content: stretch !important;
    }

    #frame {
      background: #151720;
      background-image: url(https://rebranding.today/themes/rebrand2/assets/images/bg2-flip3.svg);
      background-size: cover;
      border: 0;
      color: #fff;
      min-height: 62px;
      position: absolute;
      width: 100%;
      box-shadow: 0 5px 5px rgba(0, 0, 0, 0.1);
      z-index: 9999;
    }

    .site-logo a {
      color: #fff;
      text-decoration: none;
      font-weight: 700;
    }

    .site-logo {
      font-size: 18px;
      padding-left: 10px;
    }

    @media (max-width: 550px) {
      .site-logo {
        font-size: 16px;
        padding-left: 10px;
      }
    }

    @media (max-width: 380px) {
      .site-logo {
        font-size: 14px;
        padding-left: 10px;
      }
    }

    .btn-group {
      margin: 15px 15px 0 0
    }

    #site {
      position: absolute;
      width: 100%;
      top: 62px;
      z-index: 1;
    }

    img {
      max-height: 40px;
    }

    h1 {
      margin-top: 10px;
      margin-bottom: 10px;
    }

    .btn-sm,
    .btn-group-sm>.btn {
      padding: 5px 10px 2px;
    }
  </style>
  <!-- Required Javascript Files -->
  <script type="text/javascript" src="<?php echo $this->config["url"] ?>/static/js/jquery.min.js?v=1.11.0"></script>
  <script type="text/javascript">
    var appurl = "<?php echo $this->config["url"] ?>";
    var token = "<?php echo $this->config["public_token"] ?>";
  </script>
  <?php Main::enqueue() // Add scripts when needed 
  ?>
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body<?php echo Main::body_class() ?> id="body" style="overflow:hidden">
  <section>
    <div id="frame">
      <div class="d-flex flex-row align-content-center align-content-stretch">
        <div>
          <h1 class="site-logo">
            <a href="<?php echo $this->config["url"] ?>"><img src="https://rebranding.today/content/re-logo-light.png" alt="<?php echo $this->config["title"] ?>"></a>
          </h1>
        </div>
        <div class="hidden-xs">
          <?php echo $this->ads("frame", FALSE) ?>
        </div>
        <div class="ml-auto d-flex flex-row">
          <div class="btn-group btn-group-sm" style="min-width: 115px;">
            <a href="https://www.facebook.com/sharer.php?u=<?php echo ($url->domain ? $url->domain : $this->config["url"]) ?>/<?php echo $url->alias . $url->custom ?>" class="btn btn-primary u_share" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
              </svg></a>
            <a href="https://twitter.com/share?url=<?php echo ($url->domain ? $url->domain : $this->config["url"]) ?>/<?php echo $url->alias . $url->custom ?>&amp;text=Check+out+this+url" class="btn btn-primary u_share" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"></path>
              </svg></a>
            <a href="<?php echo $url->url ?>" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />
                <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
              </svg></a>
          </div>
        </div>
      </div><!-- /.row -->
    </div><!-- /#frame -->
    <iframe id="site" src="<?php echo $url->url; ?>" frameborder="0" style="border: 0; width: 100%; height: 100%" scrolling="yes"></iframe>
  </section>
  <script type="text/javascript">
    $("iframe#site").height($(document).height() - $("#frame").height());
  </script>
  <?php Main::enqueue('footer') ?>
  </body>

</html>