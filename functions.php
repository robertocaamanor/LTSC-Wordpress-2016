<?php 

register_nav_menus(array(
	'menu' => 'Menu superior',
	));

add_theme_support('post-thumbnails');
add_image_size('list-articles-thumbs', 450, 370, true);
add_image_size('single-thumbs', 900, 420, true);

add_theme_support( 'post-formats', array( 'aside', 'video' ) );

register_sidebar(array(
	'name' => 'Sidebar',
	'before_widget' => '<section class="widget">',
	'after_widget' => '</section>',
	'before_title' => '<h3>',
	'after_title' => '</h3>'
	));

register_sidebar(array(
	'name' => 'Footer',
	'before_widget' => '<section class="widget">',
	'after_widget' => '</section>',
	'before_title' => '<h3>',
	'after_title' => '</h3>'
	));

/* Imagenes Responsive */

function bootstrap_responsive_images( $html ){
    $classes = 'img-responsive'; // separated by spaces, e.g. 'img image-link'
    // check if there are already classes assigned to the anchor
    if ( preg_match('/<img.*? class="/', $html) ) {
        $html = preg_replace('/(<img.*? class=".*?)(".*?\/>)/', '$1 ' . $classes . ' $2', $html);
    } else {
        $html = preg_replace('/(<img.*?)(\/>)/', '$1 class="' . $classes . '" $2', $html);
    }
    // remove dimensions from images,, does not need it!
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}
add_filter( 'the_content','bootstrap_responsive_images',10 );
add_filter( 'post_thumbnail_html', 'bootstrap_responsive_images', 10 ); 

//Paginacion
function my_enqueue_assets() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
    wp_enqueue_script( 'ajax-pagination',  get_stylesheet_directory_uri() . '/js/ajax-pagination.js', array( 'jquery' ), '1.0', true );
}

global $wp_query;
wp_localize_script( 'ajax-pagination', 'ajaxpagination', array(
    'ajaxurl' => admin_url( 'admin-ajax.php' ),
    'query_vars' => json_encode( $wp_query->query )
));

add_action( 'wp_ajax_nopriv_ajax_pagination', 'my_ajax_pagination' );
add_action( 'wp_ajax_ajax_pagination', 'my_ajax_pagination' );

function my_ajax_pagination() {
    $query_vars = json_decode( stripslashes( $_POST['query_vars'] ), true );

    $query_vars['paged'] = $_POST['page'];


    $posts = new WP_Query( $query_vars );
    $GLOBALS['wp_query'] = $posts;

    add_filter( 'editor_max_image_size', 'my_image_size_override' );

    if( ! $posts->have_posts() ) { 
        get_template_part( 'content', 'none' );
    }
    else {
        while ( $posts->have_posts() ) { 
            $posts->the_post();
            get_template_part( 'content', get_post_format() );
        }
    }
    remove_filter( 'editor_max_image_size', 'my_image_size_override' );

    the_posts_pagination( array(
        'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
        'next_text'          => __( 'Next page', 'twentyfifteen' ),
        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
    ) );

    die();
}

function my_image_size_override() {
    return array( 825, 510 );
}

function add_image_responsive_class($content) {
   global $post;
   $pattern ="/<img(.*?)class=\"(.*?)\"(.*?)>/i";
   $replacement = '<img$1class="$2 img-responsive"$3>';
   $content = preg_replace($pattern, $replacement, $content);
   return $content;
}
add_filter('the_content', 'add_image_responsive_class');

//Video responsive
function bootstrap_wrap_oembed( $html ){
  $html = preg_replace( '/(width|height)="\d*"\s/', "", $html ); // Strip width and height #1
  return'<div class="embed-responsive embed-responsive-16by9">'.$html.'</div>'; // Wrap in div element and return #3 and #4
}
add_filter( 'embed_oembed_html','bootstrap_wrap_oembed',10,1);
 ?>