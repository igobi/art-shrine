<?php
/**
 * Your Inspiration Themes
 * 
 * @package WordPress
 * @subpackage Your Inspiration Themes
 * @author Your Inspiration Themes Team <info@yithemes.com>
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */
/*
function yit_blog_type_options( $array ) {
   // $array['big-ribbon']   = __( 'Big Ribbon', 'yit' );
   // $array['small-ribbon'] = __( 'Small Ribbon', 'yit' );
   // $array['big-image']   = __( 'Big Image', 'yit' );
    $array['small-image'] = __( 'Small Image', 'yit' );
    return $array;
}
add_filter( 'yit_blog-type_options', 'yit_blog_type_options' );


add_filter('yit_blog-type_std', create_function('', 'return "small-image"; '));

*/
function yit_tab_blog_settings( $items ) {

    unset( $items[62] );
    unset( $items[64] );
    unset( $items[66] );
    $items[50] = array(
        'id'      => 'blog-type',
        'type'    => 'select',
        'name'    => __( 'Blog Type', 'yit' ),
        'desc'    => __( 'Choose the layout for your blog page.', 'yit' ),
        'options' => array(

            'small-image' => __( 'Small Image', 'yit' )
        ),
        'std'     => apply_filters( 'yit_blog-type_std', 'small-image' )
    );

    $items[51] = array(
        'id'   => 'blog-single-type',
        'type' => 'select',
        'name' => __( 'Blog single type', 'yit' ),
        'desc' => __( 'Choose the layout for your blog in the post detail page.', 'yit' ),
        'options' => array(

            'big-image' => __( 'Big Image', 'yit' ),
            'small-image' => __( 'Small Image', 'yit' )
        ),
        'std' => 'big-image' // Same blog type of the list
    );
    unset( $items[50] );
    unset( $items[51] );
    $items[63] = array(
        'id'   => 'blog-show-author',
        'type' => 'onoff',
        'name' => __( 'Show author in blog detail', 'yit' ),
        'desc' => __( 'Select if you want to show the author of the post in blog detail.', 'yit' ),
        'std'  => apply_filters( 'yit_blog-show-author_std', 1 )
    );

    $items[65] = array(
        'id'   => 'blog-show-categories',
        'type' => 'onoff',
        'name' => __( 'Show categories in blog detail', 'yit' ),
        'desc' => __( 'Select if you want to show the categories of the post in blog detail.', 'yit' ),
        'deps' => apply_filters( 'yit_blog-show-categories_deps', array(
            'ids' => 'blog-type',
            'values' => 'elegant'
        ) ),
        'std'  => apply_filters( 'yit_blog-show-categories_std', 1 )
    );

    $items[80] = array(
        'id'   => 'blog-show-tags',
        'type' => 'onoff',
        'name' => __( 'Show tags in blog detail', 'yit' ),
        'desc' => __( 'Select if you want to show the tags of the post in blog detail', 'yit' ),
        'std'  => apply_filters( 'yit_blog-show-tags_std', 1 )
    );



/*
    $items[90] = array(
        'id'   => 'blog-post-formats-list',
        'type' => 'onoff',
        'name' => __( 'Show post formats on posts list', 'yit' ),
        'desc' => __( 'Select if you want to show the post formats also in the posts list and not only in the post detail page.', 'yit' ),
        'deps' => array(
            'ids' => 'blog-type',
            'values' => 'big-ribbon'
        ),
        'std'  => apply_filters( 'yit_blog-post-formats-list_std', 0 )
    );*/
    
    return $items;
}
add_filter( 'yit_submenu_tabs_theme_option_blog_settings', 'yit_tab_blog_settings' );

function yit_blog_comments_icons_deps() {
    return array(
        'ids' => 'blog-type',
        'values' => 'big-ribbon,small-ribbon'
    );
}
add_filter( 'yit_blog-comments-icon_deps', 'yit_blog_comments_icons_deps' );

function yit_blog_categories_deps() {
    return array(
        'ids' => 'blog-type',
        'values' => 'big-ribbon,small-ribbon,big-image,small-image'
    );
}
add_filter( 'yit_blog-show-categories_deps', 'yit_blog_categories_deps' );


add_filter( 'yit_blog-show-read-more_std', create_function( '', 'return 0;' ) );
add_filter( 'yit_blog-read-more-text_std', create_function( '', 'return "READ MORE";' ) );

function yit_blog_comments_icon_std() {
    return array( 'icon' => 'icon-comment', 'custom' => YIT_THEME_IMG_URL . '/icons/comments.png' );
}
add_filter( 'yit_blog-comments-icon_std', 'yit_blog_comments_icon_std' );

add_filter( 'yit_blog-type_std', create_function( '', 'return "big-image";' ) );
