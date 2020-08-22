<?php
require_once get_theme_file_path('/inc/tgm.php');
require_once get_theme_file_path('/inc/acf-mb.php');
require_once get_theme_file_path('/inc/cmb2-mb.php');

if ( class_exists( 'Attachments' ) ) {
    require_once "lib/attachments.php";

}

if(site_url() == 'http://localhost/wp'){
    define("VERSION",time());
}else{
    define("VERSION",wp_get_theme()->get('Version'));
};



function bootstrapping(){
    load_child_theme_textdomain("alpha");
    add_theme_support( "post-thumbnails");
    add_theme_support( 'title-tag' );

    $alpha_custom_header_details = array(
        'default-text-color'     => '#222',
        'header-text'            => true,
        'width'                  => 1200,
        'height'                 => 600,
        'flex-height'            => true,
        'flex-width'             => true
    );

    add_theme_support( "custom-header",$alpha_custom_header_details);

    $alpha_custom_logo = array(
        'width'       => 100,
        'height'      => 100,
    );

    add_theme_support("custom-logo", $alpha_custom_logo);
    add_theme_support( "custom-background");
    add_theme_support( "post-formats", array("audio","video","quote","image","gallery") );
    add_theme_support( 'html5', array( 'search-form' ) );
    
    add_image_size( "alpha-square", 400, 400, true ); //Default position is center center
    add_image_size( "alpha-portrait", 400, 9999 );
    add_image_size( "alpha-landscape", 9999, 400 );
    add_image_size( "alpha-landscape-hard-cropped", 600, 400,array("left","top") ); //For manually define crop start position

//Interesting problem
add_image_size( "alpha_square_new1", 200, 200, array("left","top") );
add_image_size( "alpha_square_new2", 300, 300, array("right","top") );
add_image_size( "alpha_square_new3", 450, 450, array("center","center") );
add_image_size( "alpha_square_new4", 600, 600, array("right","bottom") );
//End of Interesting problem


    register_nav_menu( 'topmenu', 'Top Menu','alpha' );
    register_nav_menu( 'footermenu', 'Footer Menu','alpha' );
}

add_action( "after_setup_theme", "bootstrapping");

function alpha_scripts(){
    wp_enqueue_style( "alpha_bootstrap", "//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" );
    wp_enqueue_style( "featherlight", "//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css" );
    
    wp_enqueue_style( "dashicons" );
    wp_enqueue_style( "tns-css","//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/tiny-slider.css" );
    wp_enqueue_style( 'fontawesome-css', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css' );
    wp_enqueue_style( "alpha_style", get_theme_file_uri( '/style.css' ));
    
    wp_enqueue_script( 'featherlight-js', '//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js', array('jquery'), '0.0.1', true );
    wp_enqueue_script( 'tns-js', 'https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js', null, '0.0.1', true );
    wp_enqueue_script( 'alpha-mainjs', get_template_directory_uri(  ).'/assets/js/main.js', array('jquery','featherlight-js'), VERSION, 'ture' );
}
add_action( "wp_enqueue_scripts","alpha_scripts");

function alpha_sidebar(){
    register_sidebar( array(
        'name'          => __( 'Single post sidebar','alpha' ),
		'id'            => "sidebar-1",
		'description'   => __('Right sidebar','alpha'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => "</section>",
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => "</h2>",
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer left sidebar','alpha' ),
		'id'            => "footer-left-sidebar",
		'description'   => __('Footer left sidebar','alpha'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => "</section>",
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => "</h2>",
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer right sidebar','alpha' ),
		'id'            => "footer-right-sidebar",
		'description'   => __('Footer right sidebar','alpha'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => "</section>",
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => "</h2>",
    ) );

}

add_action( "widgets_init", "alpha_sidebar");

function alpha_the_excerpt($excerpt){
    if(!post_password_required( )){
        return $excerpt;
    }else{
        echo get_the_password_form(  );
    }
}

add_filter("the_excerpt","alpha_the_excerpt");

function alpha_protected_title_change(){
    return "%s";
}
add_filter( 'protected_title_format', 'alpha_protected_title_change');

function alpha_menu_item_class($classes, $item){
    $classes[] = "list-inline-item";
    return $classes;
}
add_filter( 'nav_menu_css_class','alpha_menu_item_class',10,2 );




if(!function_exists('alpha_header_image')){
    
    function alpha_header_image(){
        if(is_page( )){
            $feature_image_url = get_the_post_thumbnail_url( null, "large" );
            ?>
            <style>
                .page-header{
                    background-image: url(<?php echo $feature_image_url; ?>);
                }
            </style>
            <?php
            
        }
    
        if(is_front_page(  )){
            if(current_theme_supports( "custom-header")){
                ?>
                <style>
                .header{
                    background-image: url(<?php header_image(  ); ?>);
                }
                .header h3.tagline, .header a h1{
                    color: #<?php header_textcolor(  ); ?>;
                    <?php
                    if(!display_header_text()){
                        echo "display: none;";
                    }
                    ?>
                }
                </style>
                <?php
            }
        }
    }
    add_action( 'wp_head', 'alpha_header_image',11);
}



function alpha_body_class_remove($classes){
    //to remove class
    unset( $classes[array_search('wp-custom-logo', $classes)] );
    unset( $classes[array_search('no-customize-support', $classes)] );
//to add class
    $classes[] = "new_class";
    return $classes;
}
add_filter( 'body_class', 'alpha_body_class_remove' );

function alpha_post_class_remove($classes){
    unset($classes[array_search("post_format-post-format-video",$classes)]);
    unset($classes[array_search("hentry",$classes)]);
    return $classes;
}
add_filter( 'post_class', 'alpha_post_class_remove' );


function alpha_search_result_highlight($text){
    if(is_search()){
        $pattern = '/('.join('|',explode(' ',get_search_query(  ))).')/i';
        $text = preg_replace($pattern, '<span class="search-highlight">\0</span>',$text);
    }
    return $text;
}
add_filter( 'the_content', 'alpha_search_result_highlight' );
add_filter( 'the_excerpt', 'alpha_search_result_highlight' );
add_filter( 'the_title', 'alpha_search_result_highlight' );

//Interesting problem

function alpha_srcset_remove(){
    return null;
}
add_filter( 'wp_calculate_image_srcset','alpha_srcset_remove' );

//End of Interesting problem

if(!function_exists('alpha_todays_date')){

    function alpha_todays_date(){
        echo date("d/m/y");
    }
}

function alpha_modify_main_query($wpq){

    if(is_home() && $wpq -> is_main_query(  )){
        //$wpq -> set('post__not_in',array(212));
        $wpq -> set('tag__not_in',array(8));
    }


}
add_action( 'pre_get_posts', 'alpha_modify_main_query' );

//To hide acf menu from left sidebar
//add_filter( 'acf/settings/show_admin', '__return_false' );


function alpha_admin_assets( $hook ) {
    if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
        $post_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }
    if ( "post.php" == $hook ) {
        $post_format = get_post_format($post_id);
        wp_enqueue_script( "admin-js", get_theme_file_uri( "/assets/js/admin.js" ), array( "jquery" ), VERSION, true );
        wp_localize_script("admin-js","alpha_pf",array("format"=>$post_format));
    }
}

add_action( "admin_enqueue_scripts", "alpha_admin_assets" );
