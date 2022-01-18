<?php if ( post_password_required() ) : ?>
	<p><?php _e( 'Please enter the password to view any comments.', 'baris' ); ?></p>
	
<?php /* return; is to stop the comments.php */	
	return;
	endif;
?>

<div id="comments-content" class="clearfix">

<?php if ( have_comments() ) : ?>

			<h3 id="comments"><?php
			printf( _n( 'One Comment', 'Comments (%1$s)', get_comments_number(), 'baris' ),
			number_format_i18n( get_comments_number() ), '' . get_the_title() . '' );
			?></h3>

			<ol class="commentlist">
				<?php wp_list_comments( array( 'callback' => 'baris_comment' ) ); ?>
			</ol>
			
<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
				<p class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'baris') ); ?></p>
				<p class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'baris') ); ?></p>
<?php endif; // check for comment navigation ?>

<?php endif; // end have_comments() ?>

<?php comment_form(
array(
	'title_reply' => __( 'Leave a Reply', 'baris' ),
	'comment_notes_before' =>__( '<p class="comment-notes">Required fields are marked <span class="required">*</span></p>', 'baris'),
	'comment_notes_after' => '',
	'comment_field'  => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun', 'baris' ) . '</label><br/><textarea id="comment" name="comment" rows="8" 	aria-required="true"></textarea></p>',
)
); ?>

</div>
