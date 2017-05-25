<?php get_header(); ?>

<div id="centercol">

    <?php if (have_posts()) : ?>

        <h3  class="headline">Tag Archiv: "<?php single_tag_title("", true); ?>"</h3>        

        <?php while (have_posts()) : the_post(); ?>		

            <article id="post-<?php the_ID(); ?>"article  <?php post_class(); ?> >
                <header>
                    <time class="updated" pubdate><span class="day"><?php the_time('d.'); ?></span><span><?php the_time('M y'); ?></span></time>
                    <div class="mhl"><p class="byline author vcard">von <span class="fn"><?php the_author_posts_link(); ?></span> in <span><?php the_category(', ') ?></span>
                        </p>
                        <h2 class="enry-title"><a title="Permanent Link zu <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>

                <!--            <p><span class="fr comments"><?php comments_popup_link('0 Kommentare', '1 Kommentar', '% Kommentare'); ?></span></p>-->
                    </div>
                </header>        

                <?php
                if (has_post_thumbnail()) {
                    the_post_thumbnail('medium', array('class' => 'fl'));
                } elseif (get_post_meta($post->ID, 'image', true)) {
                    ?> <!-- DISPLAYS THE IMAGE URL SPECIFIED IN THE CUSTOM FIELD -->
                    <img src="<?php echo get_post_meta($post->ID, "image", $single = true); ?>" alt="<?php the_title(); ?>" class="fl" style="margin-top:5px;" />	
                <?php } ?>

                <div class="entry">
                    <?php echo strip_tags(get_the_excerpt(), '<a><strong>'); ?>
                </div>

                <div class="continue-tags">
                    <p class="fl"><a title="Permanent Link zu <?php the_title(); ?>" href="<?php the_permalink() ?>">Mehr </a></p>
                    <p><?php the_tags('<span class="fr tags">', ', ', '</span>'); ?></p>
                </div>

            </article>

        <?php endwhile; ?>

        <div class="navigation">
            <div class="alignleft"><?php next_posts_link('< Previous ') ?></div>
            <div class="alignright"><?php previous_posts_link('Next Entries >') ?></div>
        </div>		

    <?php endif; ?>							

</div><!--/col1-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>