<footer>
	<div class="container">
		<section id="ft_widgets">
			<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer')) : endif; ?>
		</section>
	</div>
</footer>
<div class="copyright">
	<div class="container">
		<p id="copyright">(CC) 2016 Algunos derechos reservados - Plantilla diseñada por Roberto Caamaño</p>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="<?php bloginfo('template_url') ?>/js/jquery.superslides.min.js"></script>
<script>
	$('#slides').superslides();
	(function($) {
	$(document).on( 'click', '.nav-links a', function( event ) {
		event.preventDefault();
		alert( 'Clicked Link' );
	})
})(jQuery);
$("iframe[src*='www.youtube.com']").wrap('<div class="embed-responsive embed-responsive-16by9"/>');
$("iframe[src*='www.youtube.com']").addClass('embed-responsive-item');
$("iframe[src*='www.facebook.com/plugins/video.php']").wrap('<div class="embed-responsive embed-responsive-16by9"/>');
$("iframe[src*='www.facebook.com/plugins/video.php']").addClass('embed-responsive-item');
$("iframe[src*='www.facebook.com/plugins/post.php']").wrap('<div class="embed-responsive embed-responsive-16by9"/>');
$("iframe[src*='www.facebook.com/plugins/post.php']").addClass('embed-responsive-item');
$("iframe[src*='embed.spotify.com']").wrap('<div class="embed-responsive embed-responsive-16by9"/>');
$("iframe[src*='embed.spotify.com']").addClass('embed-responsive-item');
$(".twitter-video").wrap('<div class="embed-responsive embed-responsive-16by9"/>');
$(".twitter-video").addClass('embed-responsive-item');
</script>
<script src="<?php bloginfo('template_url') ?>/js/menu.js"></script>
<?php wp_footer(); ?>
</body>
</html>