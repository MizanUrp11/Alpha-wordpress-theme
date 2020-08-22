; (function ($) {
    $(document).ready(function () {

        $(".popup").each(function(){
            var image = $(this).find("img").attr("src");
            $(this).attr("href",image);
        });



        var slider = tns({
            autoplay: true,
            nav: false,
            controls: false,
            autoplayButtonOutput: false,
            container: ".slider",
            items: 1,
            mouseDrag: true,
            slideBy: "page",
            swipeAngle: false,
            speed: 500,
            gutter: 10,
        });

      
           
                
         



    });
}(jQuery));