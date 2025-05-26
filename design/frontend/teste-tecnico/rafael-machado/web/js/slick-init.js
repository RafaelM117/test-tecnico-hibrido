define(['jquery', 'slick'], function ($) {
    'use strict';

    return function () {
        $(document).ready(function () {
            $('.slick-carousel').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                arrows: true,
                autoplay: true,
                autoplaySpeed: 4000,
                dots: false,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: { slidesToShow: 3 }
                    },
                    {
                        breakpoint: 768,
                        settings: { slidesToShow: 2 }
                    },
                    {
                        breakpoint: 480,
                        settings: { slidesToShow: 1 }
                    }
                ]
            });
        });
    };
});
