<?php
/*
Plugin Name: Simple Bread Crumb
Plugin URI: http://soumabali.com/
Description: Just another simple breadcrumb plugin.
Author: I Wayan Sudharmika
Author URI: http://soumabali.com/
Version: 0.2
Copyright: I Wayan Sudharmika
*/

defined( 'ABSPATH' ) or die( 'Plugin file cannot be accessed directly.' );
/*
 load plugin in wp_footer
 */
add_action('wp_footer', 'sb_breadcrumb');

/*
 Main function of plugin
 */
function sb_breadcrumb() {
    sb_style();
    $breadcrumb = "";
    $parent = "yes";
    do {
        if(intval($post->post_parent)>0)
        {
            $parent_title = get_the_title( $post->post_parent );
            $parent_url = get_permalink( $post->post_parent );
            $parent = "no";
            $breadcrumb = "<li><a href='".$parent_url."'>".$parent_title."</a></li>". $breadcrumb;
            $post = get_post($post->post_parent);
        }else{
            $parent = "no";
        }
    } while ($parent == "yes");

    return $breadcrumb;

}

/*
 declare default style of plugin
 */
function sb_style(){
    wp_register_style( 'sb_plugin_style', plugins_url('include/css/sb_style.css', __FILE__) );
    wp_enqueue_style( 'sb_plugin_style' );
}

/*
 View the breadcrumb
 */
function sb_view_breadcrumb(){
    $home       = "<a href='".get_home_url()."'>Home</a>";
    $current    = "<a href='".get_permalink()."' >". get_the_title() ."</a>";

    if(is_front_page() or is_home()){

        echo '
            <ul class="sb_breadcrumb">
                <li>'.$home.'</li>
            </ul>
        ';

    }elseif(is_category() || is_single()){
        $categories = get_the_category();
        $category_id = $categories[0]->cat_ID;

        echo '
            <ul class="sb_breadcrumb">
                <li>'.$home.'</li>
                <li><a href="'.get_category_link( $category_id ).'">'.get_cat_name( $category_id ).'</a></li>';

        if(is_single()){
           echo '<li>'.$current.'</li>';
        }
        echo ' </ul> ';

    }elseif(is_archive()){
        echo '
            <ul class="sb_breadcrumb">
                <li>'.$home.'</li>
            ';

        if(is_year()){
            echo '<li><a href="">'.get_the_date( 'Y' ).'</a></li>';
        }else{
            echo '<li><a href="">'.get_the_date( 'F' ).'</a></li>';
        }

        echo '</ul>
        ';

    }elseif(is_page()){
        echo '
            <ul class="sb_breadcrumb">
                <li>'.$home.'</li>
                '.sb_breadcrumb().'
                <li>'.$current.'</li>
            </ul>
        ';
    }

}


/*
 create shortcode for the plugin
 */
add_shortcode("sb-view-breadcrumb", "sb_shortcode_handler");

function sb_shortcode_handler() {
    $sb_output  = sb_view_breadcrumb();
    return $sb_output;
}

