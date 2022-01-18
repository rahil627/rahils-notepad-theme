<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>
		<?php wp_title(''); // for Yoast plugin ?>

		<?php
		// note: this is the original title code from the Baris theme
		// 	 commenting out to use Yoast plugin
		/* global $page, $paged;
		wp_title('|', true, 'right');
		
		bloginfo('name');
		$site_description = get_bloginfo('description', 'display');
		if( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";
		if( $paged >=2 || $page >= 2 )
			echo ' | ' . sprintf( __('Page %s', 'baris'), max($paged, $page));
		*/
		?>
	</title>
	<link rel="profile" href="http://gmpg.org/xfn/11"/>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/superfish.css" type="text/css" media="all">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" media="all"/>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>
	<?php if( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<script type="text/javascript">
		jQuery(function(){
			jQuery('ul.sf-menu').superfish();
		});
		
		// note: I added this for show/hiding headers. This is awesome!
		jQuery(document).ready(function($){
			$('h2').addClass("plus"); // for now, just using this functionality for h2
			
			/*
			// blah! tried to use HTML5 details for show/hide content, but failed. :(
			$( "<p>Test</p>" ).insertAfter( ".inner" );
			$("<details>").insertAfter('h2, h3, h4, h5, h6');
			$("</details>").insertBefore('h2, h3, h4, h5, h6');
			*/
			/*
			$('.content h2, h3, h4, h5, h6').each(function(i) {
    				var current = $(this);
    				$("</details>").insertBefore(current);
    				$("<details>").insertAfter(current);
    				
    				//$("<details>").insertAfter(current);
    				//$("</details>").insertBefore($(this).nextUntil($(this).prop("tagName")));
			});
			*/
		});
		
		jQuery(function($){
			//$('h2, h3, h4, h5, h6') todo: in order for this to work, I would have to stop at this header OR a higher numbered higher
			//for that reason, I think it's easier to simply use <details> of html5
			
			$('h2').click(function() { 
				var thisHeader = $(this);
				// .toggle, .show, .hide, all work and are part of native jQuery
	   			$(this).nextUntil($(this).prop("tagName")).slideToggle("fast", //or "nodeName"
					function(){
						if (thisHeader.hasClass("plus")) {
							thisHeader.addClass("minus");
							thisHeader.removeClass("plus");
						}
						else if (thisHeader.hasClass("minus"))  {
							thisHeader.addClass("plus");
							thisHeader.removeClass("minus");
						}
						else if (!thisHeader.hasClass("plus") && !thisHeader.hasClass("minus")) {
							thisHeader.addClass("minus"); // for non-h2 headers, add the icon
						}
					}			  
	      			);
	      		})
		});
</script>
  
<div id="container" class="clearfix">
	<header>

<!-- captain falcon image -->
<!-- todo: need to get automatically from logo -->
<img src="<?php echo esc_url( get_site_icon_url( 192 )) ?>"
style="position:absolute;
margin-left: auto;
margin-right: auto;
left: 0;
right: 0;
top: -10px; /* was -25px */
width:155px;
height:155px;
z-index:-1;
"
>
<br>
<!-- blog title -->
		<h1><a href="<?php echo home_url(); ?>"><?php echo get_bloginfo('name'); ?></a></h1>

<!-- blog subtitle -->
		<p><?php echo get_bloginfo('description', 'display'); ?></p>

		<?php get_sidebar('left'); ?>
		<?php get_sidebar('right'); ?>
		<div class="clear"></div>
	</header>
	
	<?php wp_nav_menu(array('container_class' => 'header-nav', 'theme_location' => 'top',  'menu_class' => 'sf-menu', 'depth' => 3)); ?>
        <div class="clear"></div>