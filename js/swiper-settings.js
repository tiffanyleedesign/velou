const swiper = new Swiper('.testimonial-swiper', {
    loop: true,
    autoHeight: true,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
       
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    slidesPerView: 1,
    spaceBetween: 10,
    breakpoints: {
        800: {
            slidesPerView: 1,
            spaceBetween: 20
        },
    }
});


var menu = ['01', '02', '03', '04'];


const swiperStylist = new Swiper('.stylist-swiper', {
    loop: true,
    autoHeight: true,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
        renderBullet: function (index, className) {
            return '<span class="' + className + '">' + (menu[index]) + '</span>';
          },
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    slidesPerView: 1,
    spaceBetween: 10,
    breakpoints: {
        800: {
            slidesPerView: 1,
            spaceBetween: 20
        },
    }
});