    <div class="footer-container">
        <footer class="wrapper">
            <hr />
            <section>
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("footer") ) : endif; ?>
            </section>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'bottom-nav',
                'container'      => 'nav',
                'container_id'   => 'bottom',
                'menu_class'     => 'menu',
                'menu_id'        => FALSE,
            ));
            ?>
        </footer>
    </div><!-- .footer-container -->

<!-- BEGIN wp_footer() output -->
<?php wp_footer(); ?>
<!-- END wp_footer() output -->

</body>
</html>
