<template>
        <swiper
        :centeredSlides="true"
        :autoplay="{
            delay: 2500,
            disableOnInteraction: false,
        }"
        :pagination="{
            clickable: true,
        }"
        :navigation="true"
        :modules="modules"
        class="mySwiper"
    >
            <swiper-slide>
                <div class="slider">
                    <div class="carousel-inner">
                        <h1>Get a jump on joy<br> <span>Shop holiday gifts</span></h1>
                            <div class="overlay"></div>
                        <img
                            className="object-fill w-full h-full" 
                            src="/images/carousel/slide_2.jpg"
                            alt="image slide 2"
                    />
                    </div>
                </div>
            </swiper-slide>
            <swiper-slide>
                <div class="slider">
                    <div class="carousel-inner" >
                        <h1>Early Black Friday <br> <span>deals</span> are here <br></h1>
                            <div class="overlay"></div>
                        <img
                            className="object-fill w-full h-full" 
                            src="/images/carousel/slide_3.jpg"
                            alt="image slide 3"
                    />
                    </div>
                </div>
            </swiper-slide>
            <swiper-slide>
                <div class="slider">
                    <div class="carousel-inner" >
                        <h1>Shop By <span>Category</span></h1>
                            <div class="overlay"></div>
                        <img
                            className="object-fill w-full h-full" 
                            src="/images/carousel/slide_1.jpg"
                            alt="image slide 1"
                    />
                    </div>
                </div>
            </swiper-slide>
    </swiper>
</template>
<script>
// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from "swiper/vue";

// Import Swiper styles
import "swiper/css";

import "swiper/css/pagination";
import "swiper/css/navigation";

// import required modules
import { Autoplay, Pagination, Navigation } from "swiper";

export default {
    components: {
        Swiper,
        SwiperSlide,
    },
    setup() {
        return {
            modules: [Autoplay, Pagination, Navigation],
        };
    },
};
</script>

<style scoped>
.swiper-button-next{
    background-color: #ffffff66;
    color: black;
    width: 5%;
    height: 10%;
}
.slider .carousel-inner {
    display: flex;
    align-items: center;
    justify-content: left;
    height: 500px;
}

@media(max-width:768px) {
    .slider .carousel-inner {
        justify-content: center;
    }
}

.slider .carousel-inner h1 {
    position: absolute;
    color: #fff;
    z-index: 3;
    font-size: 50px;
    font-weight: bold;
    max-width: 900px;
    line-height: 1.5;
    left: 100px;
}

@media(max-width:768px) {
    .slider .carousel-inner h1 {
        font-size: 20px;
        max-width: 100%;
        left: auto;
        text-align: center;
    }
}

@media(max-width:992px) {
    .slider .carousel-inner h1 {
        font-size: 25px;
    }
}

.slider .carousel-inner h1 span {
    /* background-color: #2d942473;*/
    background-color: #017afe7a;
    display: inline-block;
    padding: 2px 10px;
}

.slider .carousel-inner .overlay {
    position: absolute;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    background-color: rgba(0, 0, 0, .6);
    z-index: 2;
}

.slider .carousel-item {
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}

.slider .carousel-indicators button {
    height: 8px;
    cursor: pointer;
}


/* End Slider */</style>