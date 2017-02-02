<?php if ( ((is_home()) && ($paged <= "1"))) { ?>

<div id="slides">

		<ul class="slides-container">
		<?php query_posts('category_name=Destacados&posts_per_page=5' ); if (have_posts()) : while ( have_posts()) : the_post(); ?>
			<li>
						<?php if(has_post_thumbnail()) { the_post_thumbnail('single-thumbs'); } ?>
					
			<div class="description">
			<h2 class="description__title"><?php the_title(); ?></h2>
			<p class="description__text">
				<?php the_excerpt(); ?>		
			</p>
			<a href="<?php the_permalink(); ?>" class="btn btn-danger btn-sm">Leer mas</a>
			<?php endwhile; else: ?>
		<h1>No se encontraron articulos</h1>
		<?php endif; ?>
		</ul>
		<nav class="slides-navigation">
		    <a href="#" class="next">&#62;</span></a>
		    <a href="#" class="prev">&#60;</span></a>
		</nav>
	
	</div>

<?php } ?>