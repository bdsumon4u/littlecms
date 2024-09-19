@aware(['page'])
<!-- Start service -->
<section class="section service" id="service">
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
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 d-flex">
                <div class="service-data one d-flex flex-column">
                    <div class="service-image">
                        <img src="/storage/{{$service['image']}}" class="common-transition img-fluid" alt="{{$service['title']}}">
                    </div>
                    <div class="service-name d-flex flex-grow-1 flex-column">
                        <h3 class="m-0">{{$service['title']}}</h3>
                        <p class="flex-grow-1">{{$service['description']}}</p>
                        @if($service['button_label'])
                        <a href="{{$service['button_action']}}" class="custom-btn btn common-transition">
                            {{$service['button_label']}}
                        </a>
                        @endif
                    </div>
                </div>						
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End service -->
