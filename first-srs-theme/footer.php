<div class="footer">
    <div class="container">
        <div class="col-md-12">
        </div>
        <div class="row">
            <div class="col-md-6">
                <?php
                if (is_active_sidebar("left-sidebar")) {
                    dynamic_sidebar("left-sidebar");
                }; ?>
            </div>
            <div class="col-md-6">

                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'footermenu',
                        'menu_id' => 'footercontainer',
                        'menu_class' => 'list-inline text-right'
                    )
                );
                ?>
            </div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>

</html>