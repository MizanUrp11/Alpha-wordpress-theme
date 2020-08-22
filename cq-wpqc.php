<?php
/**
* Template Name: Custom Query WpQuery
*/
?>



<?php get_header(); ?>

<body <?php body_class( );?>>

<?php get_template_part( "/template-parts/common/hero" ); ?>

<div class="posts text-center">


<?php 
$paged = get_query_var("paged") ? get_query_var("paged") : 1;

//$post_ids = array(212,41,38,5,11,15,54,46);

$posts_per_page = 10;

$_p = new WP_Query( array(
     'posts_per_page' => $posts_per_page,
     'paged' => $paged,
    // 'tax_query' => array(
    //     'relation' => 'OR',
    //     array(
    //         'taxonomy' => 'category',
    //         'field' => 'slug',
    //         'terms' => array('about-us')
    //     ),
    //     array(
    //         'taxonomy' => 'post_tag',
    //         'field' => 'slug',
    //         'terms' => array('tag1')
    //     ),
    // )

    // 'monthnum' => 4,
    // 'year' => 2020,
    // 'post_status' => array( 'draft' ),

    // 'tax_query' =>array(
    //     'relation' => 'OR',
    //     array(
    //         'taxonomy' => 'post_format',
    //         'field'    => 'slug',
    //         'terms'    => array( 
    //             'post-format-audio',
    //             'post-format-video'
    //                 ),
    //             'operator' => 'NOT IN'
    //     ),
    // ),

    
    //     'meta_key'   => 'featured',
    // 'meta_value' => '1'
    



    'meta_query' => array(
        'relation' => 'OR',
        array(
            'key' => 'featured',
            'value' => '1',
            'compare' => '='
        ),
        array(
            'key' => 'Homepage',
            'value' => '1',
            'compare' => '='
        )
    )



) );



while ($_p->have_posts() ) {
    $_p->the_post();
    ?>
    <a href="<?php the_permalink(  ); ?>">
    <h2>
        <?php the_title( ); ?>
    </h2>
    </a>
<?php
}

wp_reset_query(  );

?>

<div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">
               <?php
                echo paginate_links( array(
                    'total' => $_p->max_num_pages,
                    'current' => $paged,
                    'prev_text' => __( 'Back','alpha' ),
		            'next_text' => __( 'Next','alpha' ),
                ) );
               ?>
            </div>
        </div>
    </div>


    

</div>

<?php get_footer(  );?>

