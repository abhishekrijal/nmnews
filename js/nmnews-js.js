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
        $this.prev('.entry-content').slideToggle();
        $this.toggleClass('open');
     });

     //img fixes
     var $images = $('article img');
     if($images.length >= 1) {
        $images.each(function(){
            $this = $(this);
            src = $this.attr('src');
            $this.hide();
            parent = $this.parent();
            parent.css('background-image','url('+ src + ')');
        })
     }

     var $leaders = $('.leader-post');
     $leaders.each(function(){
         $this = $(this);
         height = $this.innerHeight();
         //$this.next('.minion-posts').css('height',height);
        //  $this.next('.minion-posts').find('.card').each(function(){
        //     $this = $(this);
        //     $this.css('height',height/4);
        //  })
     });


     //fixed-navbar
     $(window).scroll(function(){
         var $win = $(window);
         var scrollTop = $win.scrollTop();
         var $el = $('.navbar');
         if(scrollTop >= 180){
             $el.addClass('fixed');
         }else {
            $el.removeClass('fixed');
         }
     })
})(jQuery);