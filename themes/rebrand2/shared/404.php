<?php defined("APP") or die() ?>
<style type="text/css">
.nk-error-head{font-size:160px;font-weight:700;background:-webkit-linear-gradient(#6576ff,#2c3782);-webkit-background-clip:text;-webkit-text-fill-color:transparent;opacity:.9}.nk-error-title{padding-bottom:1rem;font-size:2em}.nk-error-text{font-size:1.2em;margin-bottom:20px}.nk-error-ld{padding:2rem 1rem}
</style>

<section<?php echo Main::body_class() ?>>
  <div class="container">
    <div class="centered form text-center">
        <h1 class="nk-error-head">404</h1>
        <h3 class="nk-error-title"><?php echo e("Oops! Why you’re here?") ?></h3>
        <p class="nk-error-text"><?php echo e("We are very sorry for inconvenience. It looks like you’re try to access a page that either has been deleted or never existed.") ?></p>
        <a href="https://rebranding.today" class="btn btn-secondary"><?php echo e("Back To Home") ?></a>
    </div>
  </div>
</section>