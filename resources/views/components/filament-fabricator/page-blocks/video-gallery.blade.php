@aware(['page'])
<!-- Start Portfolio -->
<section class="section portfolio" id="videos">
    <div class="container-fluid p-0">
        @if($title)
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="common-title">
                    <h2><span class="common-color">{{$title}}</span></h2>
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="button-group video-button-group filter-button-group">
                    <button class="active show_all" data-filter="*">show all</button>
                    @foreach($videos as $group => $items)
                        <button class="#" data-filter=".video-{{$group}}">{{$group}}</button>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="video-tab tab-grid">
                @foreach($videos as $group => $items)
                    @foreach($items as $media)
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 portfolio-data video-item item video-{{$group}}">
                            <div class="portfolio-video">
                                <video src="/storage/{{$media->path}}" controls width="100%" height="400"></video>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
        <div class="row mt-5 d-none">
            <div class="col-12">
                <div class="home-button text-center">
                    <a href="#" class="btn custom-btn common-transition">View More 
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Portfolio -->