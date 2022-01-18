<?php get_header(); ?>

<div id="content">
	
<h1 class="archive">
	<?php // Call the author
	$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
	?>

			<?php if(is_day()): ?>
							<?php printf(__('Daily Archives: %s', 'baris'), get_the_date()); ?>
						<?php elseif (is_month()) : ?>
							<?php printf(__('Monthly Archives: %s', 'baris'), get_the_date('F Y')); ?>
						<?php elseif (is_year()) : ?>
							<?php printf(__('Yearly Archives: %s', 'baris'), get_the_date('Y')); ?>
						<?php elseif (is_category()) : ?>
							<?php echo single_tag_title('Category Archives for: '); ?>
						<?php elseif (is_tag()) : ?>
							<?php echo single_tag_title('Tag Archives for: '); ?>
						<?php elseif (is_author()) : ?>
							<?php _e('All posts by', 'baris'); ?> <?php echo $curauth->display_name; ?>
						<?php else : ?>
							<?php _e('Blog Archives', 'baris'); ?>
						<?php endif; ?>

			</h1>
			
<?php get_template_part('content'); ?>		
</div>

<?php get_footer(); ?>