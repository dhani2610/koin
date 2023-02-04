<div>
    <div class="box-swiper slider-shop-2">
        <div class="swiper-container swiper-group-3 swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events">
            <div class="swiper-wrapper pt-5" id="swiper-wrapper-6c7074be1e1e8238" aria-live="off" style="transform: translate3d(-1824px, 0px, 0px); transition-duration: 0ms;">

                @foreach ($items as $item)
                <!-- Slides -->
                <div class="swiper-slide">
                    @include('components.card', ['item' => $item])
                </div>
                @endforeach

            </div>
            <div class="swiper-pagination swiper-pagination-1 swiper-pagination-clickable swiper-pagination-bullets">
                <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 1"></span>
            </div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
        </div>
        <div class="swiper-button-next swiper-button-next-group-3" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-6c7074be1e1e8238"></div>
        <div class="swiper-button-prev swiper-button-prev-group-3" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-6c7074be1e1e8238"></div>
    </div>
</div>