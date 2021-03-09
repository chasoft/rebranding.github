<?php if (!defined('APP')) die(); ?>
<style type="text/css">
	html,
	body {
		height: 100%;
		margin: 0;
	}

	h1 {
		font-size: 2em;
		text-align: center;
	}

	section {
		display: flex;
		align-items: center;
		justify-content: center;
		min-height: 100% !important;
		padding-left: 15px;
		padding-right: 15px;
		word-wrap: break-word;
	}

	.mylogo {
		height: 45px;
		margin-bottom: 30px;
		margin-top: 30px;
	}

	.mypic {
		width: 100%;
		max-width: 800px;
		margin-bottom: 20px;
	}
	.mypic-outer {
		text-align: center;
	}
	.myfooter {
		margin-top: 60px;
		margin-bottom: 50px;
		text-align:center;
	}
	.align-items {
		align-items: center;
	}
	.c-countdown {
		margin-left: 10px;
		white-space: nowrap;
	}

	@media (max-width: 768px) {
		h1 {
			font-size: 1.5em;
		}

		.mylogo {
			height: 35px;
		}
	}
</style>
<section>
	<div class="mycontainer">
		<div class="mycontent d-flex flex-column">
			<a class="img-outer" href="<?php echo $data->product ?>">
				<img class="mylogo" src="<?php echo $data->avatar ?>" alt="Rebranding Today - Your Own URL Shortener">
			</a>
			<h1><?php echo $data->title ?></h1>
			<p class="description">
				<?php echo $data->message ?></p>
			<br>
			<a class="mypic-outer" href="<?php echo $data->product ?>">
				<img class="mypic" src="<?php echo $data->banner ?>" alt="Rebranding Today - Your Own URL Shortener">
			</a>
			<div class="row d-flex justify-content-center">
				<div class="align-items col-sm-4 col-xs-8 d-flex flex-row">
					<a href="<?php echo $data->product ?>" class="btn btn-secondary btn-block redirect" rel="nofollow"><?php echo $data->btn_text ?></a>
					<div class="c-countdown"><span><?php echo $data->timer ?></span><?php echo " ".e("seconds") ?></div>
				</div>
			</div>
			<p class="myfooter"><?php echo $data->footer ?></p>
		</div>
	</div>
	</div>
</section>