// jQuery plugin to keep the logo following
// the page, but below the header menu.
var windw = this;
$.fn.followTo = function ( ) {
    var $this = this,
        $window = $(windw);

    $window.scroll(function(e){
        if($window.scrollTop() > 50) {
            $this.css({
                position: 'fixed',
                top: 10
            });
        } else {
            $this.css({
                position: 'absolute',
                top: 56
            });
        }
    });
};