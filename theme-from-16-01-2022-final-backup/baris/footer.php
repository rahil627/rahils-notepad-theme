<footer class="clearfix">

	<?php get_sidebar('footleft'); ?>
	<?php get_sidebar('footright'); ?>
	
	<div class="clear"></div>
	
	<?php wp_nav_menu(array('container_class' => 'footer-nav', 'theme_location' => 'bottom',  'menu_class' => 'botnav')); ?>

<p class="aligncenter">&copy; <?php echo date ('Y'); ?> <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>. <?php printf( __( 'Theme: %1$s by %2$s.', 'baris' ), 'Baris', '<a href="http://www.malvouz.com/omega/">Malvouz</a>' ); ?> Proudly powered by <a href="http://wordpress.org/">WordPress</a>.</p>

<br>

<!-- captain falcon footer image -->
<!-- todo: need to get automatically from logo -->
<img src="http://www.rahilpatel.com/blog/wp-content/uploads/falcon-footer-160x235.png"
style="position: absolute;
width:235px; 
height:160px; 
margin-bottom: -80px; /* Half the height */
margin-left: -117px; /* Half the width */
/* bottom:-15px; */
z-index: -1;
"
>

</footer>

</div>

<!-- End Container -->

<?php wp_footer(); ?>
</body>
</html>