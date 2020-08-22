<div class="footer">
    <div class="container">
        <div class="row">
           
                <div class="col-md-6">
                    <?php
                    if(is_active_sidebar( "footer-left-sidebar" )){
                        dynamic_sidebar("footer-left-sidebar");
                    }
                    ?>
                </div>
                
                <div class="col-md-6">
                    <?php
                    if(is_active_sidebar( "footer-right-sidebar" )){
                        dynamic_sidebar("footer-right-sidebar");
                    }
                    ?>
                </div>
                <div class="col-md-12 text-right">
                    <?php
                    wp_nav_menu( 
                        array(
                            'theme_location'  => 'footermenu',
                            'menu_id'         => 'footermenucontainer',
                            'menu_class'      => 'list-inline text-right',
                        )
                    );
                    ?>
                </div>
            
        </div>
    </div>
</div>

<?php wp_footer(  );?>
</body>
</html>