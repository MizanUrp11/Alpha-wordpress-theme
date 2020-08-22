<?php
/* 
*Template Name: Pricing table template
*
**/

get_header(  );
$pricing = get_post_meta( get_the_ID(  ), '_alpha_pt_pricing_table', true );
$services = get_post_meta( get_the_ID(  ), '_alpha_services', true );

 ?>
 
     <div class="container">
         <div class="row">
             <?php foreach($pricing as $ptc): ?>
                <div class="col-md-4">
                    <h2><?php echo esc_html__($ptc['_alpha_pt_caoptions'])?></h2>
                    <ul>
                        <?php foreach($ptc['_alpha_pt_options'] as $pto): ?>
                            <li><?php echo esc_html__($pto); ?></li>
                            <?php endforeach; ?>
                    </ul>
                    <h2><?php echo esc_html__($ptc['_alpha_pt_price'])?></h2>
                </div>
             <?php endforeach; ?>
         </div>
         <div class="row">
             <?php foreach($services as $service): ?>
                <div class="col-md-4">

                    <i class="fa <?php echo esc_attr($service['_alpha_icon']); ?>"></i>
                    <h2><?php echo esc_html( $service['_alpha_title'] ); ?></h2>
                    <p><?php echo esc_html( $service['_alpha_content'] ); ?></p>
                </div>
                    <?php endforeach; ?>
         </div>
     </div>

<?php
get_footer();