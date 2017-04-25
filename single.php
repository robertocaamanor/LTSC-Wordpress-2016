<?php get_header(); ?>

<section id="main" class="container">		
		<section id="articles-single">
		<?php if (have_posts()) : while ( have_posts()) : the_post(); ?>
			<article>
				<div class="encabezado">
					<div class="category"><?php the_category(); ?></div>
					<h2><?php the_title(); ?></h2>
					<div class="date"><?php the_date(); ?> | <?php the_author_posts_link(); ?>  </div>
				</div>
				<div class="thumb">
					<?php if(has_post_thumbnail()) { the_post_thumbnail('single-thumbs', array(
    'alt' => 'Responsive image',
    'class' => 'img-responsive'
)); } ?>
				</div>
				<hgroup>
					<iframe src="http://www.facebook.com/plugins/like.php?href=<?php the_permalink(); ?>&amp;layout=standard&amp;show_faces=false&amp;width=450&amp;action=like&amp;colorscheme=light&amp;height=35&amp;locale=es_ES" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:35px;" allowTransparency="true"></iframe>
					<div class="extract"><?php the_content(); ?></div>
					<div class="tags"><?php the_tags( '<ul><li> ', '</li><li>', '</li></ul>' ); ?> </div>
				</hgroup>
			</article>
		<?php endwhile; else: ?>
	<h1>No se encontraron articulos</h1>
	<?php endif; ?>
	<div id="navegacion">
		<?php if (strlen(get_previous_post()->post_title) > 0) { ?>
		 <div class="alignleft"><h4>Post anterior</h4><?php previous_post_link('%link') ?></div>
		 <?php }?>
		 <?php if (strlen(get_next_post()->post_title) > 0) { ?>
		 <div class="alignright"><h4>Post siguiente</h4><?php next_post_link('%link') ?></div>
		 <?php }?>
	</div>
	<div id="comentarios">
			<?php comments_template(); ?>
		</div>
		</section>
		
<?php get_sidebar(); ?>
</section>

<?php get_footer(); ?>