@aware(['page'])
<!-- Start About Us -->
<section class="section about" id="about">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <img src="/storage/{{$image ?? setting('site_logo')}}" class="img-fluid rounded" alt="{{setting('site_name')}}">
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="about-title">
                    @if($title)
                    <h3>{{$title}}</h3>
                    @endif
                    <h2>{{setting('site_name')}}</h2>
                </div>
                <p class="mt-3">{{$siteDescription ?? setting('site_description')}}</p>
                @if($buttonLabel)
                <a href="{{$buttonAction}}" class="custom-btn btn common-transition">
                    {{$buttonLabel}}
                </a>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- End About Us -->