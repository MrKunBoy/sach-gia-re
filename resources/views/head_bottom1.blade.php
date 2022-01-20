<div class="main-page-banner pb-50 off-white-bg">
    <div class="container">
        <div class="row">
            <!-- Vertical Menu Start Here -->
            <div class="col-xl-3 col-lg-4 d-none d-lg-block">
                <div class="vertical-menu mb-all-30">
                    <nav>
                        <ul class="vertical-menu-list">
                            {!! \App\Helpers\Helper::menuspc($menuss)!!}

                        </ul>
                    </nav>
                </div>
            </div>
            <!-- Vertical Menu End Here -->

            <!-- Slider Area Start Here -->
            <div class="col-xl-9 col-lg-8 slider_box">
                <div class="slider-wrapper theme-default">
                    <!-- Slider Background  Image Start-->
                    <div id="slider" class="nivoSlider">
                        @foreach($sliders as $slider)
                            <a href="{{$slider->url}}" target="_blank"><img src="{{$slider->thumb}}"
                                                                            data-thumb="{{$slider->thumb}}" alt=""
                                                                            title="{{$slider->name}}"></a>
                        @endforeach
                    </div>
                    <!-- Slider Background  Image Start-->
                </div>
            </div>
            <!-- Slider Area End Here -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>



