<?php

/* Set The Content Width */
if ( ! isset( $content_width ) )
	$content_width = 620;

/* Add Custom Background  */
$args = array(
	'default-color'          => '',
	'default-image'          => '',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
);

add_theme_support( 'custom-background', $args );		

/* Add Custom Menu */
register_nav_menu('top', 'Top Menu');
register_nav_menu('bottom', 'Bottom Menu');

add_action('wp_enqueue_scripts', 'custom_menu');

function custom_menu(){
	
	/* Register Javascript */
	wp_enqueue_script( 'hover', get_template_directory_uri().'/js/hoverIntent.js', array('jquery') );
	wp_enqueue_script( 'superfish', get_template_directory_uri().'/js/superfish.js', array('jquery') );

}

/* Add Left and Right Sidebar */
add_action( 'widgets_init', 'baris_widgets_init' );

function baris_widgets_init() {
	register_sidebar( array (
		'name' => __( 'Left Widget Area', 'baris' ),
		'id' => 'left-widget-area',
		'before_widget' => '<div id="%1s"><div class="widget-wrapper %2s">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3><div class="clear"></div>',
	));
	
	register_sidebar( array (
		'name' => __( 'Right Widget Area', 'baris' ),
		'id' => 'right-widget-area',
		'before_widget' => '<div id="%1s"><div class="widget-wrapper %2s">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3 class="widget-title clearfix">',
		'after_title' => '</h3><div class="clear"></div>',
	));
	
	register_sidebar( array (
		'name' => __( 'Left Footer Widget Area', 'baris' ),
		'id' => 'left-foot-widget-area',
		'before_widget' => '<div id="%1s"><div class="widget-wrapper %2s">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3 class="widget-title clearfix">',
		'after_title' => '</h3><div class="clear"></div>',
	));
	
	register_sidebar( array (
		'name' => __( 'Right Footer Widget Area', 'baris' ),
		'id' => 'right-foot-widget-area',
		'before_widget' => '<div id="%1s"><div class="widget-wrapper %2s">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3 class="widget-title clearfix">',
		'after_title' => '</h3><div class="clear"></div>',
	));
}
	
/* Tell Wordpress to run baris_setup() */
add_action( 'after_setup_theme', 'baris_setup' );

if( ! function_exists('baris_setup')):

function baris_setup() {

	/* Default Style Editor */
	add_editor_style();
	
	/* Add default posts and RSS links to head */
	add_theme_support( 'automatic-feed-links' );
}
endif;

/* Template Comments */
if ( ! function_exists( 'baris_comment' ) ) :

/* Search Form */
	
function baris_search_form( $form ) {

    $form = '<form role="search" method="get" id="searchform" action="'.get_bloginfo('url').'" >
    <input type="text" class="search-input" value="' . get_search_query() . '" name="s" id="s" />
    <input type="submit" id="searchsubmit" value="'. esc_attr__('Search', 'baris') .'" />
    </form>';

    return $form;
}
add_filter( 'get_search_form', 'baris_search_form' );

/* Template for comments and pingbacks. */
function baris_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>" class="<?php if (1 == $comment->user_id) $oddcomment = "authcomment"; echo $oddcomment; ?>">
		<div class="comment-gravatar"><?php echo get_avatar( $comment, 50 ); ?></div>
		
		<div class="comment-body">
		<div class="comment-meta commentmetadata"><?php printf( __( '%s <span class="says">says</span>', 'baris' ), sprintf( '<cite class="visitor-comment">%s</cite>', get_comment_author_link() ) ); ?> <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'baris' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( 'Edit &rarr;', 'baris' ), ' ' );
			?>
		</div>

		<?php comment_text(); ?>
		
		<?php if ( $comment->comment_approved == '0' ) : ?>
		<p class="moderation"><?php _e( 'Your comment is awaiting moderation.', 'baris' ); ?></p>
		<?php endif; ?>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
		
		</div>
		<!--comment Body-->
		
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'baris' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'baris'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;	

/* Removes the default styles that are packaged with the Recent Comments widget. */
function baris_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'baris_remove_recent_comments_style' );


if ( ! function_exists( 'baris_posted_on' ) ) :
/* Prints HTML with meta information for the current post?date/time and author. */
function baris_posted_on() {
	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'baris' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'baris' ), get_the_author() ),
			get_the_author()
		)
	);
}
endif;

/* Remove the default CSS style from the WP image gallery */
//add_filter('gallery_style', create_function('$a', 'return "<div class=\'gallery\'>";')); // deprecated by new PHP version, use anonymous function as below
//create_function( '$caps', "return '$caps';" ), 999 ); // example of create function
//add_filter('option_page_capability_' . ot_options_id(), function($caps) {return $caps;},999); // example of anonymous function
add_filter('gallery_style', function($a) {return "<div class=\'gallery\'>";});