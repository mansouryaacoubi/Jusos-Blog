<div class="fix"></div>




</div>
<!--/columns -->
</div>
<!--/columns-wrap-->


</div>
<!--/page -->


<div id="footer">

    <div id="footer-inner">

        <?php
        if (has_nav_menu('menu1')) { 
            wp_nav_menu(array('theme_location' => 'menu1'));
        }
        ?>
        

        <!--/search -->

    </div>
    <!--/footer-inner -->


    <div id="footer-date-title">

        <div>&copy; <?php echo date('Y'); ?></div>
        <div id="footer-title"><?php bloginfo('name'); ?></div>
        <div id="footer-subtitle"><?php bloginfo('description'); ?></div>

    </div>

</div>

<?php wp_footer(); ?>

<?php
if (get_option('woo_google_analytics') <> "") {
    echo stripslashes(get_option('woo_google_analytics'));
}
?>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/includes/js/jquery-1.2.1.pack.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/includes/js/tabs.js"></script>	 
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/includes/js/jcycle.js"></script>

</body>
</html>