<?php

 function srs_register_styles(){
 wp_enqueue_style("srs_CSS", get_template_directory_uri() . "/styles.css", array(), '1.0', "all");
 }

 add_action('wp_enqueue_scripts','srs_register_styles');


?>