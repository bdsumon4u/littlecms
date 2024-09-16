@aware(['page'])
<!-- Start Portfolio -->
<section class="section portfolio" id="images">
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
                <div class="button-group image-button-group filter-button-group">
                    <button class="active show_all" data-filter="*">show all</button>
                    @foreach($images as $group => $items)
                        <button class="#" data-filter=".image-{{$group}}">{{$group}}</button>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="image-tab tab-grid">
                @foreach($images as $group => $items)
                    @foreach($items as $media)
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 portfolio-data image-item item image-{{$group}}">
                            <div class="portfolio-image">
                                <img src="/storage/{{$media->path}}" class="common-transition img-fluid" alt=""><a href="/storage/{{$media->path}}" class="img-zoom"><i class="fa fa-search" aria-hidden="true"></i></a>
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