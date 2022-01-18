<?php get_header(); ?>

<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
    
    // Apply link title to arrow overlay
    
    if($(".galleryNav_nextArrow")){
      $(".galleryNav_nextArrow").attr("title",$(".galleryNav_nextArrow").next().attr("title"));
    }
    if($(".galleryNav_prevArrow")){
      $(".galleryNav_prevArrow").attr("title",$(".galleryNav_prevArrow").next().attr("title"));
    }
    
    // Apply click and href to arrow overlay
    
    $(".galleryNav_prevArrow").click(function(){
      window.location = $(".galleryNav_prevArrow").next().attr("href");
    });
    $(".galleryNav_nextArrow").click(function(){
      window.location = $(".galleryNav_nextArrow").next().attr("href");
    });
    
    // Do not display prev/next if none present
    
    if(!$(".galleryNav_nextArrow").next().attr("href")){
      $("#galleryNav_next").css("display","none");
    }
    if(!$(".galleryNav_prevArrow").next().attr("href")){
      $("#galleryNav_prev").css("display","none");
    }
  });
</script>

<div id="coreContent">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


      <div class="post single hentry">
        <div class="postContent">
          <h3 class="entry-title"><?php the_title(); ?></h3>
          <div class="entry-content">
                 <div class="galleryImage"><?php echo wp_get_attachment_image( $post->ID, 'medium' ); ?></div>
                 <?php if ( !empty($post->post_excerpt) ) the_excerpt(); ?></div>
                 
                 <div id="galleryNav">
                  <div id="galleryNav_controls">
                    <div id="galleryNav_prev">
                      <div class="galleryNav_prevArrow"></div>
                      <?php previous_image_link(array(60,60)) ?>
                    </div>
                    <div id="galleryNav_next">
                      <div class="galleryNav_nextArrow"></div>
                      <?php next_image_link(array(60,60)) ?>
                    </div>
                  </div>
                 </div>
                 <a href="<?php echo get_permalink($post->post_parent); ?>" class="galleryNav_return">Back to Gallery</a>
        </div>
      </div>

      <?php 
      /*
      <div class="googleAd">
        
        <!-- You Ad Code Here -->

      </div>
      */
      ?>
      
	<?php comments_template(); ?>


	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

</div>


<?php get_footer(); ?>
