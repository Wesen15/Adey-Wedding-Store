(function($) {
    /*---Owl-carousel----*/    
    // ______________Owl-carousel-icons
    var owl = $('.owl-carousel-icons');
    owl.owlCarousel({
        margin: 25,
        loop: true,
        nav: true,
        autoplay: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1300: {
                items: 3
            }
        }
    });
    
    // ______________Owl-carousel-icons2
    var owl = $('.owl-carousel-icons2');
    owl.owlCarousel({
        loop: true,
        rewind: false,
        margin: 25,
        animateIn: 'fadeInDowm',
        animateOut: 'fadeOutDown',
        autoplay: false,
        autoplayTimeout: 5000, // set value to change speed
        autoplayHoverPause: true,
        dots: false,
        nav: true,
        autoplay: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 2,
                nav: true
            },
            1300: {
                items: 4,
                nav: true
            }
        }
    });
    
    // ______________Owl-carousel-icons3
    var owl = $('.owl-carousel-icons3');
    owl.owlCarousel({
        margin: 25,
        loop: true,
        nav: false,
        dots: false,
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 2
            }
        }
    });
    
    // ______________Owl-carousel-icons4
    var owl = $('.owl-carousel-icons4');
    owl.owlCarousel({
        margin: 25,
        loop: true,
        nav: false,
        dots: false,
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 6
            }
        }
    });
    
    // ______________Owl-carousel-icons5
    var owl = $('.owl-carousel-icons5');
    owl.owlCarousel({
        loop: true,
        rewind: false,
        margin: 25,
        animateIn: 'fadeInDowm',
        animateOut: 'fadeOutDown',
        autoplay: false,
        autoplayTimeout: 5000, // set value to change speed
        autoplayHoverPause: true,
        dots: true,
        nav: false,
        autoplay: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 2,
                nav: true
            },
            1300: {
                items: 4,
                nav: true
            }
        }
    });
    
    // ______________Owl-carousel-icons6
    var owl = $('.owl-carousel-icons6');
    owl.owlCarousel({
        margin: 25,
        loop: true,
        nav: false,
        dots: false,
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });
    
    // ______________Slide-owl-carousel
    var owl = $('.slide-owl-carousel');
    owl.owlCarousel({
        margin: 25,
        loop: true,
        nav: false,
        autoplay: true,
        dots: false,
        animateOut: 'fadeOut',
        smartSpeed: 450,
        responsive: {
            0: {
                items: 1
            }
        }
    });
    
    // ______________Testimonial-owl-carousel2
    var owl = $('.testimonial-owl-carousel2');
    owl.owlCarousel({
        margin: 25,
        loop: true,
        nav: false,
        autoplay: true,
        dots: false,
        animateOut: 'fadeOut',
        smartSpeed: 450,
        responsive: {
            0: {
                items: 1
            }
        }
    });
    
    // ______________Testimonial-owl-carousel3
    var owl = $('.testimonial-owl-carousel3');
    owl.owlCarousel({
        margin: 25,
        loop: true,
        nav: false,
        autoplay: true,
        dots: true,
        responsive: {
            0: {
                items: 1
            }
        }
    });
    
    // ______________Testimonial-owl-carousel4
    var owl = $('.testimonial-owl-carousel4');
    owl.owlCarousel({
        margin: 25,
        loop: true,
        nav: false,
        autoplay: true,
        dots: true,
        responsive: {
            0: {
                items: 1
            }
        }
    });
    
    // ______________Testimonial-owl-carousel
    var owl = $('.testimonial-owl-carousel');
    owl.owlCarousel({
        loop: true,
        rewind: false,
        margin: 25,
        autoplay: true,
        animateIn: 'fadeInDowm',
        animateOut: 'fadeOutDown',
        autoplay: false,
        autoplayTimeout: 5000, // set value to change speed
        autoplayHoverPause: true,
        dots: false,
        nav: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            }
        }
    });
    
    // Additional code to handle navigation visibility for owl-carousel-icons5
    var owl = $('.owl-carousel-icons5');
    owl.owlCarousel({
        loop: false,  // Set loop to false to handle navigation visibility logic
        rewind: false,
        margin: 25,
        animateIn: 'fadeInDowm',
        animateOut: 'fadeOutDown',
        autoplay: false,
        autoplayTimeout: 5000, // set value to change speed
        autoplayHoverPause: true,
        dots: false,  // Set dots to false if you want to manage nav buttons manually
        nav: true,    // Enable nav buttons
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 2,
                nav: true
            },
            1300: {
                items: 3,
                nav: true
            }
        }
    });

    // Hide prev button initially
    $('.owl-prev').hide();

    // Show/Hide prev/next buttons based on carousel position
    owl.on('changed.owl.carousel', function(event) {
        var items = event.item.count; // Number of items
        var item = event.item.index;  // Position of current item

        if (item === 0) {
            $('.owl-prev').hide();
        } else {
            $('.owl-prev').show();
        }

        if (item === items - event.page.size) {
            $('.owl-next').hide();
        } else {
            $('.owl-next').show();
        }
    });
})(jQuery);
