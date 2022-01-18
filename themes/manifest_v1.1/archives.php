<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

<div id="coreContent">
  <div id="archives" class="single hentry">  
    <h2 class="entry-title"><?php the_title(); ?></h2>
    
    <h3>Recent Articles</h3>

    <?php query_posts('cat=&showposts=5'); ?>
    <ul id="recentPosts">

    		<?php while (have_posts()) : the_post(); ?>

       <li>
         <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
         <div class="postDate"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_date('F j, Y') ?></abbr></div>
       </li>

    		<?php endwhile; ?>

     </ul>
    
    
    <div id="date">
      <h3>Months</h3>
      <ul>
        <?php wp_get_archives('type=monthly&show_post_count=1'); ?>
      </ul>
 
      <h3>Categories</h3>
       <ul class="categories">
       <?php wp_list_categories('title_li=&show_count=1'); ?>
       </ul>
      
    </div>
    
    <div id="cattags">
 
      <h3>Tags</h3>
      <?php wp_tag_cloud('format=list'); ?>
    </div>


  </div>

</div>

<?php get_footer(); ?>
