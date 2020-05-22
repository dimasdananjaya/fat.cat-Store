//welcome page



//sales-force-page
$(".sales-pending-orders-carousel").slick({
    arrows: true,
    infinite: false,
    speed: 150,
    dots: true,
    autoplay: true,
    autoplaySpeed: 3000,
    slidesToShow: 4,
    slidesToScroll: 3,
    responsive: [{
        breakpoint: 1024,
        settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        arrows: true
        }
    }, {
        breakpoint: 600,
        settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        arrows: true
        }
    }, {
        breakpoint: 480,
        settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true
        }
    } // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
    ]
    });
