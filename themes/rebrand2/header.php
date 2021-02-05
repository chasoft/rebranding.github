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
  <meta name="keywords" content="<?php echo $this->config["keywords"] ?>" />
  <!-- Open Graph Tags -->
  <?php echo Main::ogp(); ?>

  <title><?php echo Main::title() ?></title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo $this->config["url"] ?>/static/css/bootstrap.min.css" rel="stylesheet">
  <!-- Component CSS -->
  <link rel="stylesheet" type="text/css" href="<?php echo $this->config["url"] ?>/themes/<?php echo $this->config["theme"] ?>/style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $this->config["url"] ?>/static/css/components.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $this->config["url"] ?>/static/css/fa-all.min.css">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,700|Nunito:400,700' rel='stylesheet'>
  <!-- Required Javascript Files -->
  <script type="text/javascript" src="<?php echo $this->config["url"] ?>/static/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo $this->config["url"] ?>/static/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo $this->config["url"] ?>/static/application.fn.js"></script>
  <script type="text/javascript">
    var appurl = "<?php echo $this->config["url"] ?>";
    var token = "<?php echo $this->config["public_token"] ?>";
  </script>
  <?php Main::enqueue() // Add scripts when needed 
  ?>
  <script type="text/javascript" src="<?php echo $this->config["url"] ?>/static/application.js"></script>
  <script type="text/javascript" src="<?php echo $this->config["url"] ?>/static/server.js"></script>
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body<?php echo Main::body_class() ?> id="body">
  <a href="#body" id="back-to-top"><i class="glyphicon glyphicon-chevron-up"></i></a>
  <?php if ($this->isUser) : // Show header for logged user 
  ?>
    <?php if ($this->user->trial && $this->isexpired(7)) : ?>
      <div class="header-top alert alert-warning text-center">
        <?php echo e("Your trial expires in ") ?> <?php echo date("d", strtotime($this->user->expiration) - strtotime("tomorrow")) ?> <?php echo e("days") ?>
        <a href="<?php echo Main::href("pricing") ?>" class="btn btn-outline-warning btn-sm"><?php echo e("Upgrade now") ?></a>
      </div>
    <?php endif ?>
    <header class="app">
      <div class="navbar" role="navigation">
        <div class="container">
          <div class="row">
            <div class="col-md-2">
              <div class="navbar-header">
                <!-- LOGO -->
                <a class="navbar-brand light-mode-logo" href="<?php echo $this->config["url"] ?>">
                  <?php if (!empty($this->config["logo"])) : ?>
                    <img src="<?php echo $this->config["url"] ?>/content/re-logo-dark.png" alt="<?php echo $this->config["title"] ?>">
                  <?php else : ?>
                    <?php echo $this->config["title"] ?>
                  <?php endif ?>
                </a>
                <a class="navbar-brand dark-mode-logo" href="<?php echo $this->config["url"] ?>">
                  <?php if (!empty($this->config["logo"])) : ?>
                    <img src="<?php echo $this->config["url"] ?>/content/re-logo-light.png" alt="<?php echo $this->config["title"] ?>">
                  <?php else : ?>
                    <?php echo $this->config["title"] ?>
                  <?php endif ?>
                </a>
                <!-- End of LOGO -->

                <!-- Drop Down NavBar -->
                <div class='dropdown'>
                  <button class='navbar-toggle' type='button' id='dropMainMenu' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                    <i class="glyphicon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                      </svg></i>
                  </button>
                  <div class='dropdown-menu list-group list-group-special' aria-labelledby='dropMainMenu'>
                    <?php echo $this->all_menu(array(array("href" => "https://help.rebranding.today", "text" => e("Help"), "icon" => "fa fa-question-circle"))) ?>
                  </div>
                </div><!-- End of Drop Down NavBar -->

              </div> <!-- end of navbar-header -->
            </div>
            <div class="ml-auto">
              <?php echo $this->menu(array(array("href" => "https://help.rebranding.today", "text" => e("Help")))) ?>
            </div>
          </div>
        </div>
      </div>
    </header>
    <section>
      <div class="container">
        <div class="row">
          <div class="col-xs-2 col-sm-2 col-md-2 sidebar">
            <?php echo $this->user_menu() ?>
          </div>
          <div class="col-xs-12 col-sm-10 col-md-10 content">
          <?php else : ?>
            <?php if ($this->headerShow) : // Show header 
            ?>
              <header>
                <div class="navbar" role="navigation">
                  <div class="container">
                    <div class="navbar-header">
                      <a class="navbar-brand light-mode-logo" href="<?php echo $this->config["url"] ?>">
                        <?php if (!empty($this->config["logo"])) : ?>
                          <img src="<?php echo $this->config["url"] ?>/content/re-logo-dark.png" alt="<?php echo $this->config["title"] ?>">
                        <?php else : ?>
                          <?php echo $this->config["title"] ?>
                        <?php endif ?>
                      </a>
                      <a class="navbar-brand dark-mode-logo" href="<?php echo $this->config["url"] ?>">
                        <?php if (!empty($this->config["logo"])) : ?>
                          <img src="<?php echo $this->config["url"] ?>/content/re-logo-light.png" alt="<?php echo $this->config["title"] ?>">
                        <?php else : ?>
                          <?php echo $this->config["title"] ?>
                        <?php endif ?>
                      </a>
                      <!-- Drop Down NavBar -->
                      <div class='dropdown dropdown-2'>
                        <button class='navbar-toggle' type='button' id='dropMainMenu' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                          <i class="glyphicon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                            </svg></i>
                        </button>
                        <ul class='dropdown-menu list-group list-group-special' aria-labelledby='dropMainMenu'>
                          <?php echo $this->all_menu(array(array("href" => "https://help.rebranding.today", "text" => e("Help"), "icon" => "fa fa-question-circle"))) ?>
                        </ul>
                      </div><!-- End of Drop Down NavBar -->
                    </div>
                    <?php echo $this->menu() ?>
                  </div>
                </div>
              </header>
            <?php endif ?>
          <?php endif ?>