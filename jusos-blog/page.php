<?php get_header(); ?>



<div id="centercol" class="page-wrapper">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

        <?php if (have_posts()) : ?>
            <header>
                <h2><?php the_title(); ?></h2>    
            </header>

            <?php while (have_posts()) : the_post(); ?>		

                <div class="post" id="post-<?php the_ID(); ?>">

                    <div class="entry">
                        <?php the_content('<span class="continue">Mehr &raquo;</span>'); ?> 
                    </div>

                </div><!--/post-->



            <?php endwhile; ?>

        <?php endif; ?>				





        <?php
        if (is_page('18')) {
            print "<ul class=\"linkliste\">";
            wp_list_bookmarks('categorize=&title_li=&category=2&before=<li>&after=</li>&between=<br />&show_images=0&show_description=0&orderby=name');
            print "</ul>";
        } elseif (is_page('20')) {


            //wp_list_authors('show_fullname=1&feed=1&feed_image=/wp-content/uploads/userphoto/');
            $allauthdata = $wpdb->get_results("
    SELECT A.umeta_id, A.user_id, A.meta_key, A.meta_value, D.user_nicename
    FROM $wpdb->usermeta A, $wpdb->users D, $wpdb->posts B
    WHERE A.user_id=D.ID AND A.user_id=B.post_author AND B.post_type='post' AND A.meta_key in('first_name','last_name','description','userphoto_image_file','nickname')
    group by A.umeta_id ORDER BY D.user_nicename", ARRAY_A
            );
            //print_r($allauthdata);
            global $authorlist;
            foreach ($allauthdata as $authordata) {
                $authorlist[$authordata['user_id']][$authordata['meta_key']] = $authordata['meta_value'];
                $authorlist[$authordata['user_id']]['user_nicename'] = $authordata['user_nicename'];
            }
            foreach ($authorlist as $authorkram) {
                if ($authorkram['user_nicename'] != "admin") {

                    $chars = 240;
                    $text = $authorkram['description'] . " ";
                    $text = substr($text, 0, $chars);
                    $text = substr($text, 0, strrpos($text, ' '));
                    $authorkram['description'] = $text . "[...]";


                    $autorenbild = "/uploads/userphoto/" . $authorkram['userphoto_image_file'];
                    if (!is_file($_SERVER['DOCUMENT_ROOT'] . $autorenbild))
                        $autorenbild = "/uploads/userphoto/default.jpg";
                    ?><p style="clear:left"/><a href="/author/<?php echo $authorkram['user_nicename']; ?>"><img src="<?php echo $autorenbild; ?>" width="80" style="margin:3px 10px 10px 0px" align="left" border="0"></a>
                        <?php
                        echo '<a href="/author/' . $authorkram['user_nicename'] . '"><b>' . $authorkram['first_name'] . " " . $authorkram['last_name'] . "</b></a> " . $authorkram['description'];
                    }
                }
            }
            ?>









    </article>
</div><!--/col1-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>