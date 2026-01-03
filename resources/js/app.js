import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';
import './bootstrap';

// import Alpine from 'alpinejs';
// window.Alpine = Alpine;
// Alpine.start();

// inisisalisasi swiper
// Inisialisasi Swiper agar jalan di production
window.addEventListener('DOMContentLoaded', () => {
    new Swiper('.anime', {
        slidesPerView: 2, // Default HP
        spaceBetween: 3,
        loop: false,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        watchOverflow: true,
        // Breakpoints untuk responsif
        breakpoints: {
            375: {
                slidesPerView: 2
            },
            842: {
                slidesPerView: 3,
                spaceBetween: 20
            },
            1000: {
                slidesPerView: 4,
                spaceBetween: 20
            },
            1200: {
                slidesPerView: 6,
                spaceBetween: 20
            },
            1600: {
                slidesPerView: 7,
                spaceBetween: 20
            }
        }
    })

});



