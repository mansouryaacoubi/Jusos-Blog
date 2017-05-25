<?php get_header(); ?>



		<div id="centercol">

		<?php if (have_posts()) : ?>
		     	
            <h2><?php the_title(); ?></h2>    
               
	
			<?php while (have_posts()) : the_post(); ?>		

				<div class="post" id="post-<?php the_ID(); ?>">
		
					<div class="entry">
						<?php the_content('<span class="continue">Mehr &raquo;</span>'); ?> 
					</div>
				
				</div><!--/post-->

			<?php endwhile; ?>
	
		<?php endif; ?>				
    
  
<ul>
<?php
wp_list_bookmarks('categorize=&title_li=&category=2&before=<li>&after=</li>&between=<br />&show_images=0&show_description=0&orderby=name');
?>
</ul><br />




		</div><!--/col1-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>