<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script>
            const swiper1 = new Swiper('.swiper1', {
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
                    el: '.swiper-pagination1',
                },

                // Navigation arrows
                navigation: {
                    nextEl: '.swiper-button-next1',
                    prevEl: '.swiper-button-prev1',
                },

            });

            const swiper2 = new Swiper('.swiper2', {
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
                loop: true,

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
                    nextEl: '.swiper-button-next2',
                    prevEl: '.swiper-button-prev2',
                },

            });
        </script>