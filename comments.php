<div class="comments">

    <h2 class="comments-title">
        <?php
$comments_cn = get_comments_number(  );
if(1 == $comments_cn){
    _e("1 Comments","alpha");
}else{
    echo $comments_cn." ".__("comments","alpha");
}

?>
    </h2>

<div class="comments-list">
    <?php
    wp_list_comments(  );
    ?>
    <div class="comments-pagination">
    <?php the_comments_pagination( array(
        'prev_text'          =>'<'. __( 'Older comments','alpha' ),
        'next_text'          =>'>'. __( 'Newer comments','alpha' ),
        'screen_reader_text' => __(' ','alpha')
    ) ); ?>
    </div>
    <?php


    if(!comments_open(  )){
        _e("Comments are closed.","alpha");
    }
    
    ?>
</div>



<div class="comments-form">
<?php
comment_form( );
?>    
</div>

</div>