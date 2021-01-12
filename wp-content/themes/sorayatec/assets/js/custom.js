(function () {

    // store the slider in a local variable
    var $window = $(window),
        flexslider = {
            vars: {}
        };

    function getSliderDirection() {
        return (window.innerWidth > 768) ? "vertical" : "horizontal";
    }
    
    function getGridSize() {
        return (window.innerWidth < 768) ? 2 : 1;

    }

    /* $(function() {
       SyntaxHighlighter.all();
     });
    */
    $window.load(function () {

        $('#carousel').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            itemWidth: 191,
            direction: getSliderDirection(),
            minItems: getGridSize(),
            maxItems: getGridSize(),
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
    });

    // check grid size on resize event
    $window.resize(function () {

        var gridSize = getSliderDirection();

        flexslider.vars.direction = gridSize;
        flexslider.vars.direction = gridSize;

        var gridSizes = getGridSize();

        flexslider.vars.minItems = gridSizes;
        flexslider.vars.maxItems = gridSizes;
    });
}());