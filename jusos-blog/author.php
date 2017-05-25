<?php get_header(); ?>



<div id="centercol" class="page-wrapper">
    <article>
        <!-- This sets the $curauth variable -->
        <?php
        if (isset($_GET['author_name'])) :
            $curauth = get_userdatabylogin($author_name);
        else :
            $curauth = get_userdata(intval($author));
        endif;
        ?>

        <h2><?php echo $curauth->display_name; ?></h2>


        <?php
        if ($curauth->user_description == "") {
            echo $curauth->first_name . " hat noch keine Angaben &uuml;ber sich hinterlegt.";
        } else {
            echo $curauth->user_description;
        }
        ?>

        <?php if ($curauth->user_url != "") { ?><br /><br />Website: <a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a><?php } ?>

        <br />
    </article>
    <div style="clear: both;"></div>




    <?php $curent_author = $curauth->display_name; ?>
    <article>
        <!-- The Loop -->
        <?php if (have_posts()) : the_post(); ?>

            <h3><a href="<?php echo bloginfo('wpurl'); ?>/author/<?php echo $curauth->nickname; ?>/feed" title="Beitr&auml;ge von <?php echo $curauth->display_name; ?> abonieren"><img src="<?php bloginfo('template_directory'); ?>/images/ico-rss.gif" style="float:left; margin-right:5px;" alt="RSS" />Beitr&auml;ge von <?php echo $curauth->display_name; ?>:</a></h3>

            <?php
            include(TEMPLATEPATH . '/includes/version.php');



            $the_query = new WP_Query('cat=-' . $ex_vid . ',-' . $ex_aside . '&showposts=' . $showposts . '&orderby=post_date&order=desc');
            $wp_query->in_the_loop = true; // Need this for tags to work
            while ($the_query->have_posts()) : $the_query->the_post();
                $do_not_duplicate = $post->ID;
                //while (have_posts()) : the_post();		
                ?>

                <?php $postauthor = the_author('', false);
                if ($postauthor == $curent_author) { ?>
                    <h2><a title="Permanent Link zu <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>

                    <div class="date-comments">
                        <p class="fl"><?php the_time('l, j.F'); ?> von <?php the_author_posts_link(); ?> in <?php the_category(', ') ?></p>    
                        <p><span class="fr comments"><?php comments_popup_link('0 Kommentare', '1 Kommentar', '% Kommentare'); ?></span></p>
                    </div>        

                    <?php if (get_post_meta($post->ID, 'image', true)) { ?> <!-- DISPLAYS THE IMAGE URL SPECIFIED IN THE CUSTOM FIELD -->

                        <img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=75&amp;w=75&amp;zc=1&amp;q=95" alt="<?php the_title(); ?>" class="fl" style="margin-top:5px;" />				

                    <?php } ?> 

                    <p><?php echo strip_tags(get_the_excerpt(), '<a><strong>'); ?></p>


                    <div class="continue-tags">
                        <p class="fl"><a title="Permanent Link zu <?php the_title(); ?>" href="<?php the_permalink() ?>">Mehr &raquo;</a></p>
                        <p><?php the_tags('<span class="fr tags">', ', ', '</span>'); ?></p>
                    </div> 
                <?php } else {
                    
                } ?>   				

            <?php endwhile; ?>







            <div class="headlines">

                <?php
                include(TEMPLATEPATH . '/includes/version.php');

                $the_query = new WP_Query('cat=-' . $ex_vid . ',-' . $ex_aside . '&showposts=10000000&offset=' . $showposts . '&orderby=post_date&order=desc');
                $wp_query->in_the_loop = true; // Need this for tags to work
                while ($the_query->have_posts()) : $the_query->the_post();
                    $do_not_duplicate = $post->ID;
                    ?>    
                    <?php $postauthor = the_author('', false);
                    if ($postauthor == $curent_author) { ?>

                        <dl>
                            <dt><a title="Permanent Link zu <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a> &nbsp; <em><?php the_time('D, j.F Y'); ?></em></dt>
                            <dd><?php comments_popup_link('0 Kommentare', '1 Kommentar', '% Kommentare'); ?></dd>
                        </dl>
                    <?php } else {
                        
                    } ?>

                <?php endwhile; ?>

            </div><!--/headlines-->


        <?php else: ?>
            <h3><?php echo $curauth->display_name; ?> hat noch keine Beitr&auml;ge geschrieben.</h3>

        <?php endif; ?>
        <!-- End Loop -->

    </article>


</div><!--/col1-->








<?php get_sidebar(); ?>
<?php get_footer(); ?>
