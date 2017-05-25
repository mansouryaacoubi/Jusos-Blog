<?php get_header(); ?>

<div id="centercol">

    <?php if (have_posts()) : ?>

        <?php if (is_category()) { ?>

                <!--h3><?php echo single_cat_title(); ?></h3-->        

        <?php } elseif (is_day()) { ?>
            <h3 class="headline">Archiv | <?php the_time('F jS, Y'); ?></h3>

        <?php } elseif (is_month()) { ?>
            <h3 class="headline">Archiv | <?php the_time('F Y'); ?></h3>

        <?php } elseif (is_year()) { ?>
            <h3 class="headline">Archiv | <?php the_time('Y'); ?></h3>

        <?php } ?>


        <?php while (have_posts()) : the_post(); ?>		

            <article id="post-<?php the_ID(); ?>"  <?php post_class(); ?> >
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

                <?php include(TEMPLATEPATH . '/includes/version.php'); ?>
                <p><?php
        if (is_category($vidcat)) {
            the_content();
        } else {
            echo strip_tags(get_the_excerpt(), '<a><strong>');
        }
        ?></p>

                <div class="continue-tags">
                    <p class="fl"><a title="Permanent Link zu <?php the_title(); ?>" href="<?php the_permalink() ?>">Mehr &raquo;</a></p>
                    <p><?php the_tags('<span class="fr tags">', ', ', '</span>'); ?></p>
                </div>    				

            </article><!--/post-->

    <?php endwhile; ?>

        <div class="navigation">
            <div class="alignleft"><?php next_posts_link('< Previous Entries') ?></div>
            <div class="alignright"><?php previous_posts_link('Next Entries >') ?></div>
        </div>		

<?php endif; ?>							

</div><!--/col1-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>