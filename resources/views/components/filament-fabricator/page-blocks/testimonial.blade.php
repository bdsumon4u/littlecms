@aware(['page'])
<!-- Start Testimonial -->
<section class="section testimonial" id="testimonial">
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
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="inner-testimonial owl-carousel">
                    @foreach($testimonials as $testimonial)
                    <div class="testimonial-data">
                        <div class="mt-5">
                            <div class="testimonial-detail">
                                <div class="testimonial-img">
                                    <img src="/storage/{{$testimonial['image']}}" alt="{{$testimonial['name']}}" class="img-fluid">
                                </div> 
                                <span class="client-name text-center">{{$testimonial['name']}}</span>
                                <div class="testimonial-desc">									
                                    <p class="client-review">{{$testimonial['speech']}}</p>									
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach							
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Testimonial -->