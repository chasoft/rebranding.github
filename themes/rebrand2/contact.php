<?php defined("APP") or die() ?>
<section class="dark">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo Main::href("") ?>"><?php echo e("Home") ?></a></li>
            <li class="active"><?php echo e("Contact us") ?></li>
        </ol>
    </div>
</section>
<section>
    <div class="container">
        <div class="centered form">
            <div class="card card-bordered mb-2">
                <div class="card-inner">
                    <div class="nk-help">
                        <div class="nk-help-img">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 120 118">
                                <path d="M8.916,94.745C-.318,79.153-2.164,58.569,2.382,40.578,7.155,21.69,19.045,9.451,35.162,4.32,46.609.676,58.716.331,70.456,1.845,84.683,3.68,99.57,8.694,108.892,21.408c10.03,13.679,12.071,34.71,10.747,52.054-1.173,15.359-7.441,27.489-19.231,34.494-10.689,6.351-22.92,8.733-34.715,10.331-16.181,2.192-34.195-.336-47.6-12.281A47.243,47.243,0,0,1,8.916,94.745Z" transform="translate(0 -1)" fill="#f6faff"></path>
                                <rect x="18" y="32" width="84" height="50" rx="4" ry="4" fill="#fff"></rect>
                                <rect x="26" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe"></rect>
                                <rect x="50" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe"></rect>
                                <rect x="74" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe"></rect>
                                <rect x="38" y="60" width="20" height="12" rx="1" ry="1" fill="#e5effe"></rect>
                                <rect x="62" y="60" width="20" height="12" rx="1" ry="1" fill="#e5effe"></rect>
                                <path d="M98,32H22a5.006,5.006,0,0,0-5,5V79a5.006,5.006,0,0,0,5,5H52v8H45a2,2,0,0,0-2,2v4a2,2,0,0,0,2,2H73a2,2,0,0,0,2-2V94a2,2,0,0,0-2-2H66V84H98a5.006,5.006,0,0,0,5-5V37A5.006,5.006,0,0,0,98,32ZM73,94v4H45V94Zm-9-2H54V84H64Zm37-13a3,3,0,0,1-3,3H22a3,3,0,0,1-3-3V37a3,3,0,0,1,3-3H98a3,3,0,0,1,3,3Z" transform="translate(0 -1)" fill="#798bff"></path>
                                <path d="M61.444,41H40.111L33,48.143V19.7A3.632,3.632,0,0,1,36.556,16H61.444A3.632,3.632,0,0,1,65,19.7V37.3A3.632,3.632,0,0,1,61.444,41Z" transform="translate(0 -1)" fill="#6576ff"></path>
                                <path d="M61.444,41H40.111L33,48.143V19.7A3.632,3.632,0,0,1,36.556,16H61.444A3.632,3.632,0,0,1,65,19.7V37.3A3.632,3.632,0,0,1,61.444,41Z" transform="translate(0 -1)" fill="none" stroke="#6576ff" stroke-miterlimit="10" stroke-width="2"></path>
                                <line x1="40" y1="22" x2="57" y2="22" fill="none" stroke="#fffffe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                                <line x1="40" y1="27" x2="57" y2="27" fill="none" stroke="#fffffe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                                <line x1="40" y1="32" x2="50" y2="32" fill="none" stroke="#fffffe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                                <line x1="30.5" y1="87.5" x2="30.5" y2="91.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round"></line>
                                <line x1="28.5" y1="89.5" x2="32.5" y2="89.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round"></line>
                                <line x1="79.5" y1="22.5" x2="79.5" y2="26.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round"></line>
                                <line x1="77.5" y1="24.5" x2="81.5" y2="24.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round"></line>
                                <circle cx="90.5" cy="97.5" r="3" fill="none" stroke="#9cabff" stroke-miterlimit="10"></circle>
                                <circle cx="24" cy="23" r="2.5" fill="none" stroke="#9cabff" stroke-miterlimit="10"></circle>
                            </svg>
                        </div>
                        <div class="nk-help-text">
                            <h5><?php echo e("We’re here to help you") ?>!</h5>
                            <p class="text-soft"><?php echo e("Ask a question or fire a support ticket or report an issues. Our team support team will get back to you by email.") ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo Main::message() ?>
            <form role="form" class="" method="post" action="<?php echo Main::href("contact") ?>" id="contactform" name="contactform" >
                <div class="form-group">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6">
                                <label><?php echo e("Your Name") ?></label>
                                <input type="text" class="form-control" name="name" value="<?php echo ($this->logged() ? $this->user->name : "") ?>" autofocus required />
                            </div>
                            <div class="col-xs-6">
                                <label><?php echo e("Your Email") ?></label>
                                <input type="email" class="form-control" name="email" value="<?php echo ($this->logged() ? $this->user->email : "") ?>" required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-6">
                            <label for='department' class='control-label'><?php echo e("Department") ?></label>
                            <select name='department'>
                                <option value='General' selected ><?php echo e('General') ?></option>
                                <option value='Billing'><?php echo e('Billing') ?></option>
                                <option value='Technical'><?php echo e('Technical') ?></option>
                            </select>
                        </div>
                        <div class="col-xs-6">
                            <label for='priority' class='control-label'><?php echo e("Priority") ?></label>
                            <select name='priority'>
                                <option value='Priority.Normal' selected ><?php echo e('Normal') ?></option>
                                <option value='Priority.Important'><?php echo e('Important') ?></option>
                                <option value='Priority.High'><?php echo e('High Priority') ?></option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label><?php echo e("Describe the problem you have") ?></label>
                    <input type="text" class="form-control" name="topic" value="" minlength="5" placeholder="White your problem..." required />
                </div>
                <div class="form-group">
                    <label><?php echo e("Give us the details") ?> <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="right" title="as detail as possible"></i></label>
                    <p class="text-soft text-justify"><i><?php echo e("Please do not forget to check our") ?> <a data-toggle="tooltip" title="Help Documents" class="link-in-text" href="https://help.rebranding.today" alt="Rebranding.today Support Documentation"><?php echo e("documentation") ?></a> <?php echo e("before sending your support request here.") ?></i></p>
                    <textarea name="message" class="form-control" rows="10" placeholder="Write your message" minlength="10" required></textarea>
                </div>
                <p><?php echo Main::captcha() ?></p>
                <?php echo Main::csrf_token(TRUE) ?>
                <button type="submit" class="btn btn-primary btn-block"><?php echo e("Send") ?></button>
            </form>
            <script>jQuery.validator.addMethod("validate_email",function(a,e){return!!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(a)},"Please enter a valid Email."),$("#contactform").validate({rules:{email:{validate_email:!0}}});</script>
        </div>
    </div>
</section>