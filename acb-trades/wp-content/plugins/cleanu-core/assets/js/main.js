;(function($){
    
    $(window).on('elementor/frontend/init',function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/service.default',function(scope,$){

            $('.services-4-col-carousel').owlCarousel({
                loop: true,
                margin: 0,
                nav: true,
                navText: [
                    "<i class='arrow_left'></i>",
                    "<i class='arrow_right'></i>"
                ],
                dots: false,
                autoplay: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    800: {
                        items: 2,
                        margin: 30,
                    },
                    1000: {
                        items: 3,
                        stagePadding: 0,
                    },
                    1367: {
                        items: 3,
                        stagePadding: 100,
                        center: true,
                    },
                }
            });

            $('.services-type-carousel').owlCarousel({
                loop: false,
                nav: false,
                margin: 30,
                dots: true,
                autoplay: true,
                items: 1,
                navText: [
                    "<i class='arrow_left'></i>",
                    "<i class='arrow_right'></i>"
                ]
           });

             $('.services-style-four-carousel').owlCarousel({
                loop: true,
                margin: 30,
                nav: false,
                navText: [
                    "<i class='arrow_left'></i>",
                    "<i class='arrow_right'></i>"
                ],
                dots: false,
                autoplay: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    992: {
                        items: 3,
                    }
                }
            });

        });
    });
    
    $(window).on('elementor/frontend/init',function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/slider.default',function(scope,$){
            $('select').niceSelect();
        });
    });
    $(window).on('elementor/frontend/init',function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/estimate.default',function(scope,$){
            $('select').niceSelect();
        });
    });
    
    $(window).on('elementor/frontend/init',function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/appointment_form.default',function(scope,$){
            $('select').niceSelect();
        });
    });
     $(window).on('elementor/frontend/init',function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/about_image.default',function(scope,$){
            $(".twentytwenty-container").twentytwenty({default_offset_pct: 0.7}); 
        });
    });

    $(window).on('elementor/frontend/init',function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/featured_coursel.default',function(scope,$){
            $('.feature-service-carousel').owlCarousel({
                loop: true,
                nav: false,
                margin: 30,
                dots: true,
                autoplay: true,
                items: 1,
                navText: [
                    "<i class='arrow_left'></i>",
                    "<i class='arrow_right'></i>"
                ]
            });
        });
    });

    $(window).on('elementor/frontend/init',function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/testimonial.default',function(scope,$){
            $('.testimonial-carousel').owlCarousel({
                loop: false,
                nav: false,
                margin: 30,
                dots: true,
                autoplay: true,
                items: 1,
                navText: [
                    "<i class='arrow_left'></i>",
                    "<i class='arrow_right'></i>"
                ]
            });

            $('.testimonial-style-two-carousel').owlCarousel({
                loop: true,
                margin: 30,
                nav: true,
                navText: [
                    "<i class='arrow_left'></i>",
                    "<i class='arrow_right'></i>"
                ],
                dots: false,
                autoplay: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 2
                    }
                }
            });
        });
    });

    $(window).on('elementor/frontend/init',function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/projectwidget.default',function(scope,$){
            $('.project-carousel').owlCarousel({
                loop: false,
                margin: 30,
                nav: true,
                navText: [
                    "<i class='arrow_left'></i>",
                    "<i class='arrow_right'></i>"
                ],
                dots: false,
                autoplay: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    1200: {
                        items: 2,
                        loop: true,
                        center: true
                    }
                }
            });
        });
    });
})(jQuery);