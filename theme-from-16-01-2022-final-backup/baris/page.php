<?php get_header(); ?>

<div id="content">

<?php /* Start the Loop. */ ?>
<?php if(have_posts()) while ( have_posts() ) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<article>
	
	<h1 class="page"><?php the_title(); ?></h1>
	<?php the_content(); ?>
	<div class="clear"></div>
	
	<?php wp_link_pages(array('before' => '<div class="link-page">' .__('Pages:', 'baris'), 'after' => '</div>')); ?>
	
	<p class="meta-date">
	<?php comments_popup_link( __( 'Leave a comment', 'baris' ), __( '1 comment', 'baris' ), __( '% comments', 'baris' ) ); ?>
	<?php edit_post_link( __( 'Edit &rarr;', 'baris' ), '<span class="separator">|</span>', '' ); ?>
	</p>
	<?php comments_template( '', true ); ?>
</article>
</div>
<?php endwhile; ?>	
</div>

<?php get_footer(); ?>