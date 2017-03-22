(function($){
    $(".button-collapse").sideNav();

    //slider initialization
     $('.owl-carousel').owlCarousel({
        margin:0,
        loop:true,
        items:2,
        dots:false,
        autoplay: true
     });

     //news view toggle
     $('.vm').on('click',function(){
         $this = $(this);
        $this.prev('.main-content').slideToggle();
     });
})(jQuery);