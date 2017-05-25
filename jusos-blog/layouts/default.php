	<?php
		include(TEMPLATEPATH . '/includes/version.php');
		
		$the_query = new WP_Query('cat=-'. $ex_feat . ',-' . $ex_vid . ',-' . $ex_aside . '&showposts=' . $showposts . '&orderby=post_date&order=desc');		
		$wp_query->in_the_loop = true; // Need this for tags to work
		while ($the_query->have_posts()) : $the_query->the_post(); $do_not_duplicate = $post->ID;		
	?>
					
        <h2><a title="Permanent Link zu <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        
        <div class="date-comments">
            <p class="fl"><?php the_time('l, j.F'); ?> von <?php the_author_posts_link(); ?> in <?php the_category(', ') ?></p>    
            <p><span class="fr comments"><?php comments_popup_link('0 Kommentare', '1 Kommentar', '% Kommentare'); ?></span></p>
        </div>        
    
        <?php if ( get_post_meta($post->ID, 'image', true) ) { ?> <!-- DISPLAYS THE IMAGE URL SPECIFIED IN THE CUSTOM FIELD -->
            
           <img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=75&amp;w=75&amp;zc=1&amp;q=95" alt="<?php the_title(); ?>" class="fl" style="margin-top:5px;" />				
            
        <?php } ?> 
    
        <p><?php echo strip_tags(get_the_excerpt(), '<a><strong>'); ?></p>
      
      
        <div class="continue-tags">
            <p class="fl"><a title="Permanent Link zu <?php the_title(); ?>" href="<?php the_permalink() ?>">Mehr &raquo;</a></p>
            <p><?php the_tags('<span class="fr tags">', ', ', '</span>'); ?></p>
        </div>    				
	
	<?php endwhile; ?>
	
    <div class="headlines">

	<?php
		include(TEMPLATEPATH . '/includes/version.php');
		
		$the_query = new WP_Query('cat=-'. $ex_feat . ',-' . $ex_vid . ',-' . $ex_aside . '&showposts=' . $show_headlines . '&offset=' . $showposts . '&orderby=post_date&order=desc');			
		$wp_query->in_the_loop = true; // Need this for tags to work
		while ($the_query->have_posts()) : $the_query->the_post(); $do_not_duplicate = $post->ID;		
	?>    

        <dl>
            <dt><a title="Permanent Link zu <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a> &nbsp; <em><?php the_time('D, j.F Y'); ?></em></dt>
            <dd><?php comments_popup_link('0 Kommentare', '1 Kommentar', '% Kommentare'); ?></dd>
        </dl>
    
    <?php endwhile; ?>
    
    </div><!--/headlines-->
    
       
    <div class="ar"><a href="<?php echo bloginfo('wpurl').'/?page_id='.$GLOBALS['archives_id']; ?>" class="more">Finde mehr im Archiv</a></div>
