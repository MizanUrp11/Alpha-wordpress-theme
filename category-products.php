<?php

single_cat_title();

$alpha_current_term = get_queried_object(  );

$alpha_term_thumbnail_id = get_field('thumbnail',$alpha_current_term);

if($alpha_term_thumbnail_id){
    $alpha_image_details = wp_get_attachment_image_src( $alpha_term_thumbnail_id, 'alpha_square_new1');
    _e( '<br>', 'alpha' );
    echo "<img src='".esc_url($alpha_image_details[0])."'"."class='acf-image'>";
}
