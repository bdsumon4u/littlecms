@aware(['page'])
<!-- Start Pricing -->
<section class="section pricing parallaxie layer" id="price" style="background-image: url(/storage/{{$image}})">
    <div class="container">
        @if($title)
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="common-title">
                    <h2>{{$title}}</h2>
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            @foreach($services as $service)
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="pricing-data mt-5">
                    <div class="pricing-image">
                        <div class="pricing-image-box"> 
                            <img src="/storage/{{$service->image}}" class="img-fluid common-transition" alt="{{$service->title}}">
                        </div>
                    </div>
                    <div class="pricing-desc">
                        <h3>{{$service->title}}</h3>
                        <p>{{$service->duration}}</p>
                        <span class="price">{{$service->price}}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Pricing -->