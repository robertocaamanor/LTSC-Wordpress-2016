<?php get_header(); ?>

<section id="categoria">
		<div class="container">
			<h2><?php single_cat_title( $prefix = '', $display = true); ?></h2>
		</div>
	</section>	

<section id="main" class="container">
	<section id="list-articles">
	<?php if (have_posts()) : while ( have_posts()) : the_post(); ?>
		<article>
			<div class="thumb">
				<a href="<?php the_permalink(); ?>">
					<?php if(has_post_thumbnail()) { the_post_thumbnail('list-articles-thumbs'); } ?>
				</a>
			</div>
			<hgroup>
				<div class="category"><?php the_category(); ?></div>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="date"><?php the_date(); ?></span></div>
				<div class="extract"><?php the_excerpt(); ?></div>
			</hgroup>
		</article>
		<?php endwhile; else: ?>
	<h1>No se encontraron articulos</h1>
	<?php endif; ?>
<div class="paginacion">
		<?php


			// obtenemos el total de páginas
			global $wp_query;
			$total = $wp_query->max_num_pages;
			// solo seguimos con el resto si tenemos más de una página
			if ( $total > 1 )  {
			     // obtenemos la página actual
			     if ( !$current_page = get_query_var('paged') )
			          $current_page = 1;
			     // la estructura de “format” depende de si usamos enlaces permanentes "humanos"
			     $format = empty( get_option('permalink_structure') ) ? '&page=%#%' : 'page/%#%/';
			     echo paginate_links(array(
			          'base' => get_pagenum_link(1) . '%_%',
			          'format' => $format,
			          'current' => $current_page,
			          'prev_next' => True,
			          'prev_text' => __('&laquo; Anterior'),
			          'next_text' => __('Siguiente &raquo;'),
			          'total' => $total,
			          'mid_size' => 4,
			          'type' => 'list'
			     ));
			}

			?>
	</div>
	</section>


<?php get_sidebar(); ?>
</section>

<?php get_footer(); ?>