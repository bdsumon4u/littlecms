@aware(['page'])
<!-- Start Solution -->
<section class="section solution" style="background-image: url(/storage/{{$image}})">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="common-title">
                    @if($title)
                    <h2>{{$title}}</h2>
                    @endif
                    @if($text)
                    <div class="common-desc mb-4">{!!$text!!}</div>
                    @endif
                    @if($buttonText)
                    <a href="{{$buttonTrigger}}" class="custom-btn two page-scroll btn common-transition">
                        {{$buttonText}}
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Solution -->