import Swiper from 'swiper';
import { Pagination, Autoplay } from 'swiper/modules';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import 'swiper/css';
import 'swiper/css/pagination';

window.Swiper = Swiper;

document.addEventListener('DOMContentLoaded', () => {
    new Swiper('.testimonialSwiper', {
        modules: [Pagination, Autoplay],

        loop: true,
        centeredSlides: true,
        speed: 800,

        slidesPerView: 1.2,
        spaceBetween: 20,

        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },

        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },

        breakpoints: {
            768: {
                slidesPerView: 2,
                spaceBetween: 30,
            },

            1024: {
                slidesPerView: 3,
                spaceBetween: 40,
            }
        }
    });
});