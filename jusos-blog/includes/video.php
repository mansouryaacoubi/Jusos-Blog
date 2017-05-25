<?php while (have_posts()) : the_post();?>
<?php $category = get_the_category(); $videocat = $category[0]->cat_ID;?>
<?php endwhile; ?>


<?php if(($videocat != "9") || ( is_front_page() )){ ?>
<div class="col1"> 

    <div class="video">
    
        <?php include(TEMPLATEPATH . '/includes/version.php'); ?>
        <?php query_posts('showposts=3&cat=' . $ex_vid); ?>
    
    
        <?php if (have_posts()) : ?>
    
            <?php while (have_posts()) : the_post(); ?>	
                <?php $zindex ="10";?>
                <div id="video-<?php the_ID(); ?>" style="z-index=<?php echo $zindex; $zindex--;?>">
                    <?php the_content(''); ?>
                </div>
                
            
                
            
            <?php endwhile; ?>
        
        <?php endif; ?>
        
       
        
    
    </div>
    
</div>


<div class="col6">
  
	<?php query_posts('showposts=3&cat=' . $ex_vid); ?>
    
    <?php if (have_posts()) : ?>

    <ul class="list3 idTabs">

		<?php while (have_posts()) : the_post(); ?>	
    
            <li><a href="#video-<?php the_ID(); ?>"><?php the_title(); ?></a></li>
            
        <?php endwhile; ?>

    </ul>
    
    <p class="fl"></p>
    <p class="fr"><a title="Alle Videos" href="<?php echo bloginfo('wpurl').'/category/' . $vidcat;?>">Mehr &raquo;</a></p>
    
    
	<?php endif; ?>
  
    
</div>

<?php }
else { ?>

<div class="col6">
  
	<?php query_posts('showposts=10&cat=' . $ex_vid); ?>
    
    <?php if (have_posts()) : ?>

    <ul class="list3 idTabs">

		<?php while (have_posts()) : the_post(); ?>	
    
            <li><a title="Permanent Link zu <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
            
        <?php endwhile; ?>

    </ul>
    
	<?php endif; ?>
  
    
</div>


<?php } ?>





