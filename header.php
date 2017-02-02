<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv=”Content-Type” content=”<?php bloginfo(‘html_type’); ?>; charset=<?php bloginfo(‘charset’); ?>” />
	<title><?php wp_title(""); ?><?php if(wp_title("", false)) { echo ' |'; } ?> La tele según Caamaño</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>">
	<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/responsive.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/superslides.css">
	<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i|Poppins:300,400,500,600,700|Roboto+Slab:100,300,400,700|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<body>
	<header>
		<div class="container-fluid">
			<div class="logo">
				<a href="<?php echo get_option('home'); ?>"/><img src="http://i.imgur.com/lSayLOg.png" alt=""></a>
			</div>
			<input type="checkbox" id="btn-menu"><label for="btn-menu"><span class="glyphicon glyphicon-align-justify"></span></label>
			<nav class="menu">
				<?php wp_nav_menu(
				array(
					'container' => false,
					'items_wrap' => '<ul class="nav">%3$s</ul>',
					'theme_location' => 'menu'
				)); ?>
			</nav>
	</header>