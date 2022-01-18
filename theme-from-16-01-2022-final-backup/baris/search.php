<?php get_header(); ?>

<div id="content">

<?php if ( have_posts() ) : ?>
	<h1 class="archive"><?php echo $wp_query->found_posts; ?> <?php printf( __( 'Search Results for %s', 'baris' ), '' . get_search_query() . '' ); ?></h1>
	
	<?php get_template_part( 'content' ); ?>
	
	<?php else : ?>
	<h1 class="archive"><?php _e( 'No Search Result Found', 'baris' ); ?></h1>
		<article>
			<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'baris' ); ?></p>
		</article>
	<?php endif; ?>

</div>

<?php get_footer(); ?>