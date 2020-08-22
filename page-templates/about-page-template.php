<?php 
/* Template Name: About page template */ 
?>

<?php get_header(); ?>

<body <?php body_class( );?>>

<?php get_template_part( "/template-parts/about-page/hero-page" ); ?>

<div class="posts">

<?php 
while (have_posts()) {
    the_post(  );

?>
    <div <?php post_class( );?>>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="post-title text-center">
                    <a href="<?php the_permalink(  );?>"><?php the_title( );?></a>
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <p class="text-center">
                        <strong><?php the_author();?></strong><br/>
                        <?php echo get_the_date("jS F Y"); ?>

                        <?php echo get_the_tag_list("<ul class=\"list-unstyled\"><li>","</li><li>","</li></ul>"); ?>
                    </p>
                    
                </div>
                <div class="col-md-10 offset-md-1">
                    <p class="text-center">
                        <?php
                        if(has_post_thumbnail( )){
                            //$post_thumbnail_url = get_the_post_thumbnail_url( null, 'large' );
                            echo '<a class="popup" href="#" data-featherlight="image">';
                            the_post_thumbnail( "large", array("class='img-fluid'") );
                            echo '</a>';
                        }
                        ?>
                    </p> 
                    <?php the_excerpt(  ); ?>
                    

                </div>
            </div>

            <div class="row my-5">
            <div class="col-md-10 offset-md-1">
            
                
                <?php
                if(class_exists('Attachments')){
                    ?>
                    <h2 class="text-center mb-5">Our Team</h2>
                    
                    <?php
                }
                ?>
            
            <div>
<div class="row">
<?php
if(class_exists( 'Attachments' )){
    $attachments = new Attachments( 'team' );
    if ($attachments->exist()) {
        while($attachments->get()){
            ?>
<div class="col-md-4">
    <?php echo $attachments->image("thumbnail"); ?>
    <h3><?php echo esc_html( $attachments->field('name') ); ?></h3>
    <p><?php echo esc_html( $attachments->field('position') ); ?></p>
    <p class="font-weight-light"><?php echo esc_html( $attachments->field('company') ); ?></p>
    <p><?php echo esc_html( $attachments->field('bio') ); ?></p>
    <button class="btn btn-info btn-block">Contact</button>
</div>

<?php
        }
    }
}

?>

</div>
            </div>
            </div>
            </div>

        </div>
    </div>

<?php
}
?>
    

</div>

<?php get_footer(  );?>