<div class="header">

    <div class="container">

        <div class="row">

<h2 class="text-2xl text-[#373737] text-center">Hi guys I am from tailwind</h2>
            <div class="col-md-12">
                <?php
                if (current_theme_supports("custom-logo")) {
                ?>
                    <div class="header-logo text-center mx-auto ">
                        <?php
                        the_custom_logo();

                        ?>
                    </div>

                <?php
                };
                ?>

                <h3 class="tagline"><?php bloginfo("description"); ?></h3>
                <h1 class="align-self-center display-1 text-center heading">
                    <a href="<?php echo site_url(); ?>"><?php bloginfo("name") ?></a>
                </h1>
            </div>

        </div>
        <div class="col-md-12">
            <div class="navigation">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'topmenu',
                        'menu_id' => 'topmenucontainer',
                        'menu_class' => 'list-inline text-center'
                    )
                );
                ?>
            </div>
        </div>
    </div>
</div>