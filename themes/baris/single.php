<?php get_header(); ?>

<div id="content">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<article>
		<!-- note: this used to be <h2> but I increased it to <h1> -->
		<h1><?php the_title(); ?></h1>
		<p class="meta"><span><?php the_time('d F Y') ?> <?php /* _e( 'by', 'baris' );*/  ?> <?php /* the_author() */ /* note: removing "by [author]" */ ?></span><br/>				
		<?php the_content(); ?></p>
		<div class="clear"></div>
		
		<?php wp_link_pages(array('before' => '<div class="link-page">' .__('Pages:', 'baris'), 'after' => '</div>')); ?>
		
		<div class="clear"></div>
		
		<?php if(is_attachment()): ?>
		<p class="previous"><?php previous_image_link( false ,  __('&larr;  Previous Image', 'baris')); ?></p>
		<p class="next"><?php next_image_link( false ,  __('Next Image &rarr;', 'baris')); ?></p>
		<?php endif; ?>
		<div class="clear"></div>
		
		<?php // If a user has filled the description ?>
		<?php if (get_the_author_meta('description')): ?>
			<div id="author-info" class="clearfix">
						<div id="author-avatar">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'baris_author_bio_avatar_size', 50 ) ); ?>
						</div>
						<div id="author-description">
							<h1><?php the_author_posts_link(); ?></h1>
							<p><?php the_author_meta( 'description' ); ?></p>
						</div>
					</div>
		<?php endif; ?>
		
	<p class="meta-date">
	<?php comments_popup_link( __( 'Leave a comment', 'baris' ), __( '1 comment', 'baris' ), __( '% comments', 'baris' ) ); ?>
	<span class="separator">|</span>
	<?php if ( count( get_the_category() ) ) : ?>
					<?php printf( __( 'Categories: %2$s', 'baris' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>
					
				<?php endif; ?>
				
				<?php
					$tags_list = get_the_tag_list( '', ', ' );
					if ( $tags_list ):
				?>
				<span class="separator">|</span>
					<?php printf( __( 'Tags: %2$s', 'baris' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
					
				<?php endif; ?>
	
	
				<?php edit_post_link( __( 'Edit &rarr;', 'baris' ), '<span class="separator">|</span>', '' ); ?>
	</p>
	<?php comments_template( '', true ); ?>
	</article>
	</div>
	
	<?php endwhile; ?>
	
	<p class="previous"><?php previous_post_link( '%link',  __( '&larr;  Previous Post', 'Previous post link', 'baris' ) ); ?></p>
	<p class="next"><?php next_post_link( '%link', __( 'Next Post &rarr;', 'Next post link', 'baris' ) ); ?></p>
	 
	
</div>

<?php get_footer(); ?>