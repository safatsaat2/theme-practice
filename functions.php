<?php

function srs_launcher_setup_theme(){
    load_theme_textdomain("srs_launcher");
    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
};

add_action("after_setup_theme", "srs_launcher_setup_theme");

function srs_launcher_assests(){

    
    // All Styles added
    
    wp_enqueue_style("animate-css", get_theme_file_uri("/assets/css/animate.css"));
    wp_enqueue_style("style-css", get_theme_file_uri("/assets/css/style.css"));
    wp_enqueue_style("bootstrap-css", get_theme_file_uri("/assets/css/bootstrap.css"));
    wp_enqueue_style("iconmoon-css", get_theme_file_uri("/assets/css/icomoon.css"));
    wp_enqueue_style("srs_launcher", get_stylesheet_uri(),null,time());

    // All Scripts Added

    wp_enqueue_script("easing-jquery-js", get_theme_file_uri("/assets/js/jquery.easing.1.3.js"), array("jquery"), null,true);
    wp_enqueue_script("bootstrap-jquery", get_theme_file_uri("/assets/js/bootstrap.min.js"), array("jquery"), null,true);
    wp_enqueue_script("waypoints-jquery-js", get_theme_file_uri("/assets/js/jquery.waypoints.min.js"), array("jquery"), null,true);
    wp_enqueue_script("simplyCountdown-jquery-js", get_theme_file_uri("/assets/js/simplyCountdown.js"), array("jquery"), null,true);
    wp_enqueue_script("main-jquery-js", get_theme_file_uri("/assets/js/main.js"), array("jquery"), time(),true);

    $launcher_year = get_post_meta(get_the_ID(), "year", true);
    $launcher_month = get_post_meta(get_the_ID(), "month", true);
    $launcher_day = get_post_meta(get_the_ID(), "day", true);
    
    wp_localize_script("main-jquery-js", "date_data", array(
        "year"=>$launcher_year,
        "month"=>$launcher_month,
        "day"=>$launcher_day,
    ));

}

add_action("wp_enqueue_scripts", "srs_launcher_assests");

function srs_demo(){
    ?>
    <style>
        #adminmenuback,#adminmenu,#adminmenuwrap{
            background: rebeccapurple !important;
        }
    </style>
    <!-- <script>
        alert("hi there,")
    </script> -->
    <?php
}


add_action("admin_enqueue_scripts", "srs_demo");



function srs_launcher_sidears(){
register_sidebar( 
    array(
        "name" => __('Footer left', 'srs_launcher'),
        "id" => 'footer-left',
        'description' => __('Footer left', 'srs_launcher'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget_title">',
        'after_title' => '</h2>',
    )
);
register_sidebar( 
    array(
        "name" => __('Footer right', 'srs_launcher'),
        "id" => 'footer-right',
        'description' => __('Footer right', 'srs_launcher'),
        'before_widget' => '<section id="%1$s" class="text-center btn-right widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget_title">',
        'after_title' => '</h2>',
    )
);
};

add_action("widgets_init", "srs_launcher_sidears");


function srs_launcher_styles(){
   if(is_page()){
$thumbnail_url = get_the_post_thumbnail_url(null, "large");
 ?>
<style>
    .home-side {background-image: url(<?php echo $thumbnail_url; ?>);}
</style>
<?php
   } 
}


add_action("wp_head", "srs_launcher_styles");
?>