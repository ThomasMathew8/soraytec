(function($) {
    $(document).ready(function(){
   
      $('#bxslider').bxSlider({
            mode:'fade',
            slideWidth:1000,
            auto: true,
            pagerCustom: '#bxpager'
        });


   //function

     var jQuerywindow = $(window),
       flexslider = {
       vars: {}
       };

     function getSliderDirection() {
   return (window.innerWidth > 768) ? "vertical" : "horizontal";
    }

     function getGridSize() {
       return (window.innerWidth < 768) ? 2 : 1;

      }
  

   //function
   
    $('#carousel').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            itemWidth: 191,
            asNavFor: '#slider'
        });

        $('#slider').flexslider({
            animation: "slide",
            controlNav: false,
            directionNav: false,
            animationLoop: false,
            slideshow: false,
            sync: "#carousel",
            start: function (slider) {
                $('body').removeClass('loading');
            }
        });
      

   //function



   jQuerywindow.resize(function () {

    var gridSize = getSliderDirection();

    flexslider.vars.direction = gridSize;
    flexslider.vars.direction = gridSize;

    var gridSizes = getGridSize();

    flexslider.vars.minItems = gridSizes;
    flexslider.vars.maxItems = gridSizes;
});

  window.fnames = new Array();  
  window.ftypes = new Array();
  fnames[0]='EMAIL';
  ftypes[0]='email';


    var wid = $(window).width();
    if (wid <= 1600) {
        $("#content-6").mCustomScrollbar({
            axis: "x",
            theme: "light-3",
            advanced: {
                autoExpandHorizontalScroll: true
            }
        });
    }
    if (wid <= 767) {
        $("#content-6").mCustomScrollbar("destroy");
    }

   }) 
    


})(jQuery);
