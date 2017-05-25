<?php
include(TEMPLATEPATH . '/includes/version.php');

$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$new_query = new WP_Query('paged=-' . $paged . 'cat=-' . $ex_feat . ',-' . $ex_vid . ',-' . $ex_aside . '&posts_per_page=' . $posts_per_page . '&orderby=post_date&order=desc');
$wp_query->in_the_loop = true; // Need this for tags to work

while ($new_query->have_posts()) : $new_query->the_post();
    $do_not_duplicate = $post->ID;
    ?>
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
    <div class="alignleft"><?php next_posts_link('< ältere Einträge') ?></div>
    <div class="alignright"><?php previous_posts_link('neuere Einträge >') ?></div>
</div>	

<!--<div class="headlines">

<?php
include(TEMPLATEPATH . '/includes/version.php');

$the_query = new WP_Query('cat=-' . $ex_feat . ',-' . $ex_vid . ',-' . $ex_aside . '&showposts=' . $show_headlines . '&offset=' . $showposts . '&orderby=post_date&order=desc');
$wp_query->in_the_loop = true; // Need this for tags to work
while ($the_query->have_posts()) : $the_query->the_post();
    $do_not_duplicate = $post->ID;
    ?>    

            <dl>
                <dt><a title="Permanent Link zu <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a> &nbsp; <em><?php the_time('D, j.F Y'); ?></em></dt>
                <dd><a href="#"><?php comments_popup_link('0 Kommentare', '1 Kommentar', '% Kommentare'); ?></a></dd>
            </dl>

<?php endwhile; ?>

</div>/headlines-->

<?php wp_reset_query(); ?>

<!--<div class="ar"><a href="<?php echo bloginfo('wpurl') . '/?page_id=' . $GLOBALS['archives_id']; ?>" class="more">Finde mehr im Archiv</a></div>-->
