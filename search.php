<?php get_header(); ?>

<section id="main" class="container">
<h3><?php printf( __( 'Resultados de: %s', 'shape' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
	<section id="list-articles">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
     
			<article>
				<div class="thumb">
					<a href="<?php the_permalink(); ?>">
						<?php if(has_post_thumbnail()) { the_post_thumbnail('list-articles-thumbs'); } ?>
					</a>
				</div>
				<hgroup>
					<div class="category"><?php the_category(); ?></div>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="date"><?php the_date(); ?></div>
					<div class="extract"><?php the_excerpt(); ?></div>
				</hgroup>
			</article>
		
	
	
	    <?php endwhile; ?>
		<?php else : ?>
	    <h3><?php printf( __( 'No se encontraron resultados buscando: %s', 'shape' ), '<span>' . get_search_query() . '</span>' ); ?></h3>

	   <?php endif; ?>
	   
	</section>


<?php get_sidebar(); ?>
</section>

<?php get_footer(); ?>