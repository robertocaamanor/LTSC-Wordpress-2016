<?php get_header(); ?>

<?php include(TEMPLATEPATH. '/slide.php'); ?>
<section class="tvchilena">
<div class="container">
		<h3>TV Chilena</h3>
		<div class="fila row">
			<?php query_posts('category_name=TV Chilena&posts_per_page=12' ); if (have_posts()) : while ( have_posts()) : the_post(); ?>
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
			    <div class="hovereffect">
			        <div class="img-responsive">
			        	<?php if(has_post_thumbnail()) { the_post_thumbnail('list-articles-thumbs'); } ?>
			        </div>
			            <div class="overlay">
			                <h2><?php the_title(); ?></h2>
							<p> 
								<a class="btn btn-sm btn-danger" href="<?php the_permalink(); ?>">Leer más</a>
							</p> 
			            </div>
			    </div>
			</div>
				<?php endwhile; else: ?>
			<h1>No se encontraron articulos</h1>
			<?php endif; ?>
		</div>		
	</div>
</section>

<section class="musica">
	<div class="container">	
		<h3>Musica</h3>	
        <div class="fila row">
			<?php query_posts('category_name=Musica&posts_per_page=12' ); if (have_posts()) : while ( have_posts()) : the_post(); ?>
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
			    <div class="hovereffect">
			        <div class="img-responsive">
			        	<?php if(has_post_thumbnail()) { the_post_thumbnail('list-articles-thumbs'); } ?>
			        </div>
			            <div class="overlay">
			                <h2><?php the_title(); ?></h2>
							<p> 
								<a class="btn btn-sm btn-danger" href="<?php the_permalink(); ?>">Leer más</a>
							</p> 
			            </div>
			    </div>
			</div>
				<?php endwhile; else: ?>
			<h1>No se encontraron articulos</h1>
			<?php endif; ?>
		</div>		
    </div>
</section>

<section id="main" class="container">
	<section id="list-articles">
		<?php query_posts("paged=$paged"); ?>
		<?php if (have_posts()) : while ( have_posts()) : the_post(); ?>
			<article>
				<div class="thumb image-card">
					<a href="<?php the_permalink(); ?>">
						<?php if(has_post_thumbnail()) { the_post_thumbnail('list-articles-thumbs'); } ?>
					</a>
				</div>
				<hgroup>
					<div class="category"><?php the_category(); ?></div>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="date"><?php echo get_the_date( get_option( 'date_format' ) ); ?></div>
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