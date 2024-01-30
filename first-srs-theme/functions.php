<?php


if (site_url() == "http://localhost/wordpress") {
    define("VERSION", time());
} else {
    define("VERSION", wp_get_theme()->get("Version"));
};
// done
function firstSrsTheme()
{
    load_theme_textdomain("firstSrsTheme");
    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
    $firstSrsTheme_custom_header_details = array(
        'header-text' => true,
        'defaull-text-color' => '#222',
        'width' => 1200,
        'height' => 600
    );
    add_theme_support("custom-header", $firstSrsTheme_custom_header_details);
    $firstSrsTheme_custom_logo_defaults = array(
        "width" => "100",
        "height" => "100",
        'flex-height' => true,
        'flex-width'  => true
    );
    add_theme_support("custom-logo", $firstSrsTheme_custom_logo_defaults);
    $firstSrsTheme_custom_background_defaults = array(
        'default-color'          => '000',    // Default background color (hexadecimal value)
        'default-image'          => '',          // Default background image (URL)
        'default-repeat'         => 'repeat',    // Default background image repeat property
        'default-position-x'     => 'left',      // Default background image horizontal position
        'default-position-y'     => 'top',       // Default background image vertical position
        'default-size'           => 'auto',      // Default background image size
        'default-attachment'     => 'scroll',    // Default background image attachment
        'wp-head-callback'       => '_custom_background_cb',
        'admin-head-callback'    => '',
        'admin-preview-callback' => '',
    );
    add_theme_support("custom-background", $firstSrsTheme_custom_background_defaults);
    register_nav_menu("topmenu", __("Top Menu", "firstSrsTheme"));
    register_nav_menu("footermenu", __("Footer Menu", "firstSrsTheme"));
    add_theme_support("post-formats", array("audio", "video", "quote", "image"));
    // dag kne jinish janar baki
}
add_action("after_setup_theme", "firstSrsTheme");

function firstSrsTheme_assets()
{
    wp_enqueue_style("localStyle", get_stylesheet_uri(), null, VERSION);
    wp_enqueue_style("bootstrap", "//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
    
    wp_enqueue_style("featherLight", "//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css");
    wp_enqueue_script("tailwind", "//cdn.tailwindcss.com");
    wp_enqueue_script("featherLightJs", "//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js", array("jquery"), "0.0.1", true);
    wp_enqueue_script("localJs", get_template_directory_uri() . '/assets/js/main.js', array("jquery", "featherLightJs"), VERSION, true);
}
add_action("wp_enqueue_scripts", "firstSrsTheme_assets");


function firstSrsTheme_sidebar()
{
    register_sidebar(
        array(
            'name' => __('single Post Sidebar', 'firstSrsTheme_sidebar'),
            'id' => 'sidebar-1',
            'description' => __('Right Sidebar', 'firstSrsTheme_sidebar'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title"></h2>',
            'after_title' => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name' => __('Footer Left Sidebarr', 'firstSrsTheme_sidebar'),
            'id' => 'left-sidebar',
            'description' => __('wdiget left sidebar of footer ', 'firstSrsTheme_sidebar'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '',
            'after_title' => '',
        )
    );
    register_sidebar(
        array(
            'name' => __('Footer Right Sidebarr', 'firstSrsTheme_sidebar'),
            'id' => 'right-sidebar',
            'description' => __('wdiget right sidebar of footer ', 'firstSrsTheme_sidebar'),
            'before_widget' => '<section id="%1$s" class="widget text-right %2$s">',
            'after_widget' => '</section>',
            'before_title' => '',
            'after_title' => '',
        )
    );
};
add_action("widgets_init", "firstSrsTheme_sidebar");



function firstSrsTheme_the_excerpt($excerpt)
{
    if (!post_password_required()) {
        return $excerpt;
    } else {
        echo get_the_password_form();
    }
};
add_filter("the_excerpt", "firstSrsTheme_the_excerpt");

function firstSrsTheme_protected_title_change()
{
    return '<svg fill="#000000" height="30px" width="30px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 330 330" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="XMLID_486_"> <path id="XMLID_487_" d="M165,330c63.411,0,115-51.589,115-115c0-29.771-11.373-56.936-30-77.379V85c0-46.869-38.131-85-85-85 S80.001,38.131,80.001,85v52.619C61.373,158.064,50,185.229,50,215C50,278.411,101.589,330,165,330z M180,219.986V240 c0,8.284-6.716,15-15,15s-15-6.716-15-15v-20.014c-6.068-4.565-10-11.824-10-19.986c0-13.785,11.215-25,25-25s25,11.215,25,25 C190,208.162,186.068,215.421,180,219.986z M110.001,85c0-30.327,24.673-55,54.999-55c30.327,0,55,24.673,55,55v29.029 C203.652,105.088,184.91,100,165,100c-19.909,0-38.651,5.088-54.999,14.028V85z"></path> </g> </g></svg> %s';
};

add_filter("protected_title_format", "firstSrsTheme_protected_title_change");

function firstSrsTheme_menu_item_class($classes, $item)
{
    $classes[] = "list-inline-item";
    return $classes;
}


add_filter("nav_menu_css_class", "firstSrsTheme_menu_item_class", 10, 2);
$width = 200;
$height = 300;

add_image_size("feature_img", $width, $height, true);
function firstSrsTheme_about_page_template_banner()
{
    if (is_page()) {
        $first_srs_theme_feat_img = get_the_post_thumbnail_url(null, "large");


?>
        <style>
            .page-header {
                background-image: url(<?php echo $first_srs_theme_feat_img; ?>);
            }
        </style>
        <?php
    }
    if (is_front_page()) {
        if (current_theme_supports("custom-header")) {
        ?>
            <style>
                .header {
                    background: url(<?php echo header_image() ?>);
                }

                .header h1.heading a,
                h3.tagline {
                    color: #<?php echo get_header_textcolor(); ?> 
                    <?php
                     if (!display_header_text()) {
                      echo "display:none;";
                      }
                       ?>
                }
            </style>
<?php
        }
    }
}

add_action("wp_head", "firstSrsTheme_about_page_template_banner", 11);
?>

