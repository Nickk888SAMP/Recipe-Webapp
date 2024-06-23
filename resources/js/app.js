// Swiper
import Swiper from 'swiper';
import { Autoplay, Navigation, Pagination } from 'swiper/modules';
import 'swiper/css/bundle';
window.Swiper = Swiper;

// Livewire Sortable
import 'livewire-sortable'

// Livewire Powergrid
import './../../vendor/power-components/livewire-powergrid/dist/powergrid'
import './../../vendor/power-components/livewire-powergrid/dist/tailwind.css'

const swiper1 = new Swiper('.swiper1', {
    modules: [Navigation, Pagination, Autoplay],
    speed:1000,
    spaceBetween:100,
    autoplay:{
        delay:4000,
        pauseOnMouseEnter: true,
    },
    
    // effect:'coverflow',
    // Optional parameters
    direction: 'horizontal',
    loop: true,

    // If we need pagination
    pagination: {
        el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

});

const swiper2 = new Swiper('.swiper2', {
    modules: [Navigation, Pagination, Autoplay],
    speed:1000,
    spaceBetween:20,
    autoplay:{
        delay:2000,
        pauseOnMouseEnter: true,
    },
    slidesPerView: "auto",
    // effect:'coverflow',
    // Optional parameters
    direction: 'horizontal',
    loop: false,

    breakpoints: {
        // when window width is >= 320px
        300: {
        slidesPerView: 2
        },
        // when window width is >= 480px
        700: {
        slidesPerView: 3
        },
        // when window width is >= 640px
        1000: {
        slidesPerView: 4
        },

    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

});

const swiper3 = new Swiper('.swiper3', {
    modules: [Navigation, Pagination, Autoplay],
    speed:1000,
    spaceBetween:0,
    autoplay:{
        delay:2000,
        pauseOnMouseEnter: true,
    },
    slidesPerView: "auto",
    // effect:'coverflow',
    // Optional parameters
    direction: 'horizontal',
    loop: true,

    // If we need pagination
    pagination: {
        el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

});

