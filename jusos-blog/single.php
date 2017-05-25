<?php get_header(); ?>

		<div id="centercol">

		<?php if (have_posts()) : ?>
	
			<?php while (have_posts()) : the_post(); ?>
				

				<article id="post-<?php the_ID(); ?>"  <?php post_class(); ?> >
				
                                    <header>
                                         <time class="updated" pubdate><span class="day"><?php the_time('d.'); ?></span><span><?php the_time('M y'); ?></span></time>
					<h2 class="singleh2"><a title="Permanent Link zu <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                                        <p class="byline author vcard">
                                            von <span class="fn"><?php the_author(); ?></span>
                                            <span class="fr"><?php the_category(', ') ?></span>
                                        </p>
                                    </header>
                                    
					<div class="entry">
						<?php the_content('<span class="continue">Mehr &raquo;</span>'); ?>						
					</div>

					<?php the_tags('<p>Tags: ', ', ', '</p>'); ?> 
                                    <div style="clear: both;"></div>
				</article><!--/post-->			
				
				<div id="comments">
					<?php comments_template(); ?>
				</div>

		<?php endwhile; ?>
		
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('< Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries >') ?></div>
		</div>		
	
	<?php endif; ?>							

		</div><!--/centercol-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>