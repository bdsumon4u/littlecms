@aware(['page'])
<!-- Start Appointment -->
<section class="section appointment parallaxie layer" id="appointment" style="background-image: url(/storage/{{$image}})">
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
        <div class="row mt-5">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 d-none">
                <div class="clock-section">
                    <span class="top-clock-frames"></span>
                    <span class="bottom-clock-frames"></span>
                    <div class="clock tm">
                        <div class="hand hour"></div>
                        <div class="hand minute"></div>
                        <div class="hand second"></div>
                        <div class="number number1">1</div>
                        <div class="number number2">2</div>
                        <div class="number number3">3</div>
                        <div class="number number4">4</div>
                        <div class="number number5">5</div>
                        <div class="number number6">6</div>
                        <div class="number number7">7</div>
                        <div class="number number8">8</div>
                        <div class="number number9">9</div>
                        <div class="number number10">10</div>
                        <div class="number number11">11</div>
                        <div class="number number12">12</div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mx-auto">
                <div class="appointment-form">
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                    @endif
                    <form action="/appointments" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group mt-2 mb-2">
                                    <input name="name" id="name" type="text" class="form-control" placeholder="Your Name*" required="">
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group mt-2 mb-2">
                                    <input name="phone" id="phone" type="text" class="form-control" placeholder="Your Phone Number*" required="">
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group mt-2 mb-2">
                                    <input name="fdate" id="fdate" type="date" class="form-control" placeholder="Enter Date*" required="">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group mt-2 mb-2">
                                    <select class="form-control" name="service_id" id="service-id">
                                        @foreach($services as $service)
                                        <option value="{{$service->id}}">{{$service->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group mt-2 mb-2">
                                    <textarea name="message" id="message" rows="4" class="form-control" placeholder="Your message..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <button type="submit" class="btn custom-btn common-transition">{{$buttonText}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>					
        </div>
    </div>
</section>
<!-- End Appointment -->