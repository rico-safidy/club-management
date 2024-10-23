document.addEventListener('DOMContentLoaded', function () {
    // Slider pour les prochains matchs (garde les mêmes réglages que précédemment si nécessaire)
    var matchSwiper = new Swiper('.swiper-container', {
        slidesPerView: 3,
        spaceBetween: 10,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        loop: false,
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            640: {
                slidesPerView: 2,
                spaceBetween: 15,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            1440: {
                slidesPerView: 4,
                spaceBetween: 25,
            },
        },
    });

    // Slider pour les cartes d'équipe, avec 5 cartes visibles par slide
    var teamSwiper = new Swiper('.team-card-swiper', {
        slidesPerView: 5, // 5 cartes visibles par slide sur grands écrans
        spaceBetween: 10, // Espacement entre les slides
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        loop: false, // Désactive le défilement infini si non nécessaire
        breakpoints: {
            320: {
                slidesPerView: 1, // 1 carte par slide sur les petits écrans (mobile)
                spaceBetween: 10,
            },
            480: {
                slidesPerView: 1, // 1 carte sur des téléphones légèrement plus grands
                spaceBetween: 10,
            },
            640: {
                slidesPerView: 2, // 2 cartes sur des téléphones plus larges
                spaceBetween: 15,
            },
            768: {
                slidesPerView: 3, // 3 cartes sur les tablettes
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 4, // 4 cartes sur les écrans de taille moyenne
                spaceBetween: 20,
            },
            1440: {
                slidesPerView: 5, // 5 cartes sur les écrans plus larges
                spaceBetween: 25,
            },
            2560: {
                slidesPerView: 6, // 6 cartes sur les très grands écrans
                spaceBetween: 30,
            },
            3840: {
                slidesPerView: 7, // 7 cartes sur les écrans 4K
                spaceBetween: 40,
            },
        },
    });
});
