<?php get_header(); ?>

<section id="main" class="container">
	<section id="articles-single">
	<?php if (have_posts()) : while ( have_posts()) : the_post(); ?>
		<article>
			<div class="thumb">
				<?php if(has_post_thumbnail()) { the_post_thumbnail('single-thumbs'); } ?>
			</div>
			<hgroup>
				<h2><?php the_title(); ?></h2>
				<div class="extract"><?php the_content(); ?></div>
			</hgroup>
		</article>
		<?php endwhile; else: ?>
	<h1>No se encontraron articulos</h1>
	<?php endif; ?>
	<?php comments_template(); ?>
	</section>


<?php get_sidebar(); ?>
</section>

<?php get_footer(); ?>