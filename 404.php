<?php
get_header();

?>
<body <?php body_class(  ); ?>>
    <div class="container error-content">
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-4 text-center text-danger">
                    <?php _e("Sorry, We could not find the content you are requesting for","alpha"); ?>
                </h1>
            </div>
        </div>
    </div>
</body>
<?php


get_footer( );