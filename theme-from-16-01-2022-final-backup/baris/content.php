<?php /* Start the Loop. */ ?>
<?php if(have_posts()) while ( have_posts() ) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<article>
	<?php if(is_sticky()) echo __('<h3 class="sticky">Sticky Post</h3>', 'baris'); ?>
	
	<h1><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'baris' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
	<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'baris' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><p class="meta"><span><?php the_time('d F Y') ?></a> <? /* php _e( 'by', 'baris' );*/ ?> <?php /*the_author()*/ /* note: getting rid of "by author" */ ?></span><br/>				
	<?php the_content(__( 'Continue Reading &rarr;', 'baris')); ?></p>
	
	<div class="clear"></div>
	<?php wp_link_pages(array('before' => '<div class="link-page">' .__('Pages:', 'baris'), 'after' => '</div>')); ?>
	<div class="clear"></div>
	
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
</article>
</div>
<?php endwhile; ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<p class="previous"><?php next_posts_link( __( '&larr; Older posts', 'baris' ) ); ?></p>
				<p class="next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'baris' ) ); ?></p>
<?php endif; ?>