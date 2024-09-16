
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ setting('site_name') }}</title>
		<!-- Fav Icon -->
        <link rel="shortcut icon" href="/storage/{{setting('site_favicon')}}">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;0,800;1,300&family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
		<!-- Bootstrap Css -->
        <link rel="stylesheet" href="css/bootstrap.min.css">		
		<!-- Font-awesome Css -->
		<link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- Owl Carousel Css -->
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/owl.theme.default.css">	
        <!-- Magnific-popup -->
		<link rel="stylesheet" href="css/magnific-popup.css">
		<!-- Clock -->
		<link rel="stylesheet" href="css/clock.css">
	    <!-- Animation Css -->
        <link rel="stylesheet" href="css/animate.css">		
        <!-- Custom Style Css -->
        <link rel="stylesheet" href="css/style.css">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
				<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
				<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
			<![endif]-->
    </head>	
    <body data-spy="scroll" data-target=".navbar" data-offset="120" id="topbar">
		<!-- Start Preloader -->
		<div class="preloader d-none">
			<div class="loader"> 
				<span class="light"></span> 
				<span></span> 
				<span></span> 
				<span class="light"></span>
			</div>
		</div>
		<!-- End Preloader -->
		
		@php($more = setting('more_configs'))
		
        <!-- Start Navbar -->
    	<nav class="navbar navbar-expand-lg custom-navbar" id="navigation">
			<div class="container">
				<a href="/" class="logo">
					<img src="/storage/{{setting('site_logo')}}" class="nav-img img-fluid" alt="Logo">
				</a>
                <div class="bar-toggler">
				    <div class="bar1"></div>
					<div class="bar2"></div>
					<div class="bar3"></div>
				</div>				  
                <div class="right-navigation collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
						@foreach(menu('main') as $item)
							<li class="nav-item">
								<a class="nav-link page-scroll" href="{{$item->url}}">{{$item->title}}</a>
							</li>
						@endforeach
						@foreach($sections = ['service', 'about', 'people', 'pricing', 'client', 'images', 'videos', 'blog', 'appointment'] as $section)
							{{-- @if(Arr::get($more, $section.'.is_active', false))
							<li class="nav-item">
								<a class="nav-link page-scroll" href="#{{$section}}">{{Arr::get($more, $section.'.label')}}</a>
							</li>
							@endif --}}
						@endforeach
						<li class="nav-item"><a class="nav-link page-scroll nav-btn" href="#contact">{{Arr::get($more, 'label')}}</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

		<!-- Start Mobile Menu -->
		<div class="menu-bar navbar common-transition">		  
			<div class="menu-bar-data">
				<ul>
					@foreach($sections as $section)
						@if(Arr::get($more, $section.'.is_active', false))
						<li class="nav-item">
							<a class="nav-link page-scroll" href="#{{$section}}">{{Arr::get($more, $section.'.label')}}</a>
						</li>
						@endif
					@endforeach
					<li><a class="nav-link page-scroll" href="#contact">Arr::get($more, 'label')</a></li>
				</ul>
			</div>
		</div>
		<!-- End Mobile Menu -->
		
        <!-- Start Home -->
        <section class="home">
            <div class="home-data">
			   <div class="home-inner owl-carousel">
					@foreach($slides as $slide)
					<div class="item">
					    <div class="home-image">
							<img src="/storage/{{$slide->image}}" alt="{{$slide->heading}}" class="img-fluid">
						</div>
						<div class="home-detail">
						    <h3>{{$slide->title}}</h3>
							<h1 class="home-title">{{$slide->heading}}</h1>
							<p class="mb-4">
								{{$slide->paragraph}}
							</p>
							@if($slide->button_text)
							<div class="home-button">
								<a href="{{$slide->button_url}}" class="btn custom-btn common-transition">{{$slide->button_text}}</a>
							</div>
							@endif
						</div>
					</div>
					@endforeach
				</div>					
            </div> 		
        </section>
        <!-- End Home -->
		
		@if(Arr::get($more, 'service.is_active', false))
		<!-- Start service -->
		<section class="section service" id="service">
			<div class="container">
				@if($title = Arr::get($more, 'service.title'))
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
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
						<div class="service-data one">
							<div class="service-image">
								<img src="/storage/{{$service->image}}" class="common-transition img-fluid" alt="{{$service->title}}">
							</div>
							<div class="service-name">
								<h3 class="m-0">{{$service->title}}</h3>
								<p>{{$service->description}}</p>
								@if($service->button_label)
								<a href="{{$service->button_action}}" class="custom-btn btn common-transition">
							       {{$service->button_label}}
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
		@endif

		@if(Arr::get($more, 'about.is_active', false))
        <!-- Start About Us -->
        <section class="section about" id="about">
            <div class="container">
                <div class="row"> 
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
						<img src="/storage/{{Arr::get($more, 'about.image', setting('site_logo'))}}" class="img-fluid rounded" alt="Logo">
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
						<div class="about-title">
							@if($title = Arr::get($more, 'about.title'))
							<h3>{{$title}}</h3>
							@endif
                            <h2>{{setting('site_name')}}</h2>
						</div>
						<p class="mt-3">{{setting('site_description')}}</p>
						@if($label = Arr::get($more, 'about.button_label'))
						<a href="{{Arr::get($more, 'about.button_action')}}" class="custom-btn btn common-transition">
						   Contact Us
						</a>
						@endif
					</div>
                </div>
            </div>
        </section>
        <!-- End About Us -->
		@endif

		<!-- Start Counter -->
		<div class="section counter d-none" id="counter">
			<div class="container">
				<div class="row">
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 counter-data one">
						<div class="counterarea">
							<div class="counter-icon"><i class="fa fa-smile-o" aria-hidden="true"></i></div>
							<span class="counter-number" data-from="1" data-to="125" data-speed="1000">125</span> <span class="counter-text">Happy Client</span>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 counter-data one">
						<div class="counterarea sec">
							<div class="counter-icon"><i class="fa fa-home" aria-hidden="true"></i></div>
							<span class="counter-number" data-from="1" data-to="292" data-speed="3000">292</span> <span class="counter-text">Our Branches</span> 
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 counter-data two">
						<div class="counterarea third">
							<div class="counter-icon"><i class="fa fa-globe" aria-hidden="true"></i></div>
							<span class="counter-number" data-from="1" data-to="40" data-speed="2000">40</span> <span class="counter-text">Experience</span> 
						</div>
					</div>				 
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 counter-data">
						<div class="counterarea fourth">
							<div class="counter-icon"><i class="fa fa-trophy" aria-hidden="true"></i></div>
							<span class="counter-number" data-from="1" data-to="206" data-speed="4000">206</span> <span class="counter-text">Awards</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Counter -->
		
		@if(Arr::get($more, 'people.is_active', false))
		<!-- Start Team -->  
        <section class="section team-sec" id="people">
            <div class="container">
				@if($title = Arr::get($more, 'people.title'))
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="common-title">
                            <h2>{{$title}}</h2>
                        </div>
                    </div>
                </div>
				@endif
				<div class="row">
					@foreach($people as $person)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="team-data mt-5">
						    <div class="team-image-before"> 
								<div class="team-image"> 
									<img src="/storage/{{$person->image}}" alt="{{$person->name}}" class="img-fluid common-transition">
								</div>
							</div>
							<div class="team-info">
								<h3 class="mb-0"><a href="#">{{$person->name}}</a></h3>
								<span>{{$person->designation}}</span> 
								<div class="team-inner d-none">
									<ul>
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									</ul>										
								</div>
							</div>							
						</div>
                    </div>
					@endforeach
                </div>
			</div>
		</section>
		<!-- End Team -->
		@endif
		
		@if(Arr::get($more, 'pricing.is_active', false))
		<!-- Start Pricing -->
        <section class="section pricing parallaxie layer" id="pricing" style="background-image: url(/storage/{{Arr::get($more, 'pricing.image')}})">
            <div class="container">
				@if($title = Arr::get($more, 'pricing.title'))
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
		@endif

		@if(Arr::get($more, 'testimonial.is_active', false))
        <!-- Start Testimonial -->
        <section class="section testimonial" id="client">
            <div class="container">
				@if($title = Arr::get($more, 'testimonial.title'))
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
											<img src="/storage/{{$testimonial->image}}" alt="{{$testimonial->name}}" class="img-fluid">
										</div> 
									    <span class="client-name text-center">{{$testimonial->name}}</span>
									    <div class="testimonial-desc">									
											<p class="client-review">{{$testimonial->speech}}</p>									
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
		@endif	

		@if(Arr::get($more, 'images.is_active', false))
		<!-- Start Portfolio -->
		<section class="section portfolio" id="images">
			<div class="container-fluid p-0">
				@if($title = Arr::get($more, 'images.title'))
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
		@endif
		
		@if(Arr::get($more, 'videos.is_active', false))
		<!-- Start Portfolio -->
		<section class="section portfolio" id="videos">
			<div class="container-fluid p-0">
				@if($title = Arr::get($more, 'videos.title'))
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
		@endif
		
		@if(Arr::has($more, 'appointment.is_active', false))
		<!-- Start Solution -->
		<section class="section solution" style="background-image: url(/storage/{{Arr::get($more, 'appointment.pre_bg_image')}})">
			<div class="container">
				<div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="common-title">
							@if($title = Arr::get($more, 'appointment.pre_title'))
                            <h2>{{$title}}</h2>
							@endif
							@if($text = Arr::get($more, 'appointment.pre_text'))
                            <div class="common-desc mb-4">{!!$text!!}</div>
							@endif
							@if($button = Arr::get($more, 'appointment.pre_button_text'))
							<a href="#appointment" class="custom-btn two page-scroll btn common-transition">
							    {{$button}}
						    </a>
							@endif
						</div>
                    </div>
                </div>
			</div>
		</section>
        <!-- End Solution -->
		@endif
		
        <!-- Start Blog -->
		<section class="section blog d-none" id="blog">
			<div class="container">
				<div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="common-title">
                            <h2>Latest Post</h2>
                        </div>
                    </div>
                </div>
				<div class="row">
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
						<div class="blog-data mt-5">
							<div class="blog-image">
								<img src="images/blog/blog-1.jpg" class="common-transition img-fluid" alt="">
								<div class="blog-date">
									<span><b>10</b> Aug</span>
								</div>
								<div class="latest">
									<span>Latest</span>
								</div>
							</div>
							<div class="blog-name">
								<div class="author">
									<span class="admin">By Admin</span>
									<span class="category">Gulshan Golden Spa</span>
								</div>
								<a href="#"><h3 class="mb-3">Head Special Massage</h3></a>
								<p>Lorem ipsum dolor sit amet, cons ectetur elit. Ves tibulum nec odios Suspe ndisse cursus mal suada faci lisis. Lorem ipsum dolor.</p>
								<a href="#" class="custom-btn btn common-transition">
							       Read More
						        </a>
							</div>
						</div>						
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
						<div class="blog-data mt-5">
							<div class="blog-image">
								<img src="images/blog/blog-2.jpg" class="common-transition img-fluid" alt="">
								<div class="blog-date">
									<span><b>10</b> Aug</span>
								</div>
							</div>
							<div class="blog-name">
								<div class="author">
									<span class="admin">By Admin</span>
									<span class="category">Gulshan Golden Spa</span>
								</div>
								<a href="#"><h3 class="mb-3">Body Therapy & Relaxation</h3></a>
								<p>Lorem ipsum dolor sit amet, cons ectetur elit. Ves tibulum nec odios Suspe ndisse cursus mal suada faci lisis. Lorem ipsum dolor.</p>
								<a href="#" class="custom-btn btn common-transition">
							       Read More
						        </a>
							</div>
						</div>						
					</div>
				</div>
			</div>
		</section>
		<!-- End Blog -->

		@if(Arr::has($more, 'appointment.is_active', false))
        <!-- Start Appointment -->
        <section class="section appointment parallaxie layer" id="appointment" style="background-image: url(/storage/{{Arr::get($more, 'appointment.form_bg_image')}})">
            <div class="container">
				@if($title = Arr::get($more, 'appointment.form_title'))
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
										<button type="submit" class="btn custom-btn common-transition">{{Arr::get($more, 'appointment.form_button_text')}}</button>
									</div>
								</div>
							</form>
						</div>
					</div>					
				</div>
            </div>
        </section>
        <!-- End Appointment -->
		@endif

		@if($map = $more['map'] ?? '')
		<!-- Start Map -->
        <div class="map" id="map">
            <div class="container-fluid p-0">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="map-frame">
							{!! $map !!}
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Map -->
		@endif
		
        <!-- Start Footer -->	
		<footer class="footer" id="contact">
		    <div class="container">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="footer-logo text-center">
							<img src="/storage/{{setting('site_logo')}}" class="img-fluid" alt="">
						</div>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="row">
							<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
								<div class="address text-center">
									<div class="icon">
										<i class="fa fa-map-marker" aria-hidden="true"></i>
									</div>
									<div class="address-data">
										<h4>{{Arr::get($more, 'location_label')}}</h4>
										<h5>{!! Arr::get($more, 'location') !!}</h5>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
								<div class="address text-center">
									<div class="icon">
										<i class="fa fa-envelope" aria-hidden="true"></i>
									</div>
									<div class="address-data">
										<h4>{{Arr::get($more, 'email_label')}}</h4>
										<h5><a href="mailto:{{ setting('support_email') }}">{{ setting('support_email') }}</a></h5>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
								<div class="address text-center">
									<div class="icon">
										<i class="fa fa-phone" aria-hidden="true"></i>
									</div>
									<div class="address-data">
										<h4>{{Arr::get($more, 'phone_label')}}</h4>
										<h5><a href="tel:{{ setting('support_phone') }}">{{ setting('support_phone') }}</a></h5>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
								<div class="address text-center">
									<div class="icon">
										<i class="fa fa-clock-o" aria-hidden="true"></i>
									</div>
									<div class="address-data">
										<h4>{{Arr::get($more, 'hours_label')}}</h4>
										<h5>{!! Arr::get($more, 'hours') !!}</h5>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<ul class="menu">
							@foreach($sections as $section)
								@if(Arr::get($more, $section.'.is_active', false))
								<li><a class="page-scroll" href="#{{$section}}">{{Arr::get($more, $section.'.label')}}</a></li>
								@endif
							@endforeach
						</ul>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 margin-b">
						<div class="foot_social">
                            @php($social = setting('social_network'))
						    <ul class="social-nav footer-social">
                                @if($url = $social['facebook'] ?? '')
                                    <li>
                                        <a href="{{url($url)}}">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                @endif
                                @if($url = $social['instagram'] ?? '')
                                    <li>
                                        <a href="{{url($url)}}">
                                            <i class="fa fa-instagram" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                @endif
                                @if($url = $social['x_twitter'] ?? '')
                                    <li>
                                        <a href="{{url($url)}}">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                @endif
                                @if($url = $social['youtube'] ?? '')
                                    <li>
                                        <a href="{{url($url)}}">
                                            <i class="fa fa-youtube" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                @endif
                                @if($url = $social['linkedin'] ?? '')
                                    <li>
                                        <a href="{{url($url)}}">
                                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                @endif
                                @if($url = $social['tiktok'] ?? '')
                                    <li>
                                        <a href="{{url($url)}}">
                                            <i class="fa fa-tiktok" aria-hidden="true">T</i>
                                        </a>
                                    </li>
                                @endif
                                @if($url = $social['pinterest'] ?? '')
                                    <li>
                                        <a href="{{url($url)}}">
                                            <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                @endif
							</ul>
						 </div>	
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 d-none">
						<div class="subscribe-inner">
							<div class="s-form">
								<form>
									<input type="text" name="subscribe" id="subscribe" placeholder="Subscribe Us..." class="form-control">
									<button type="submit" name="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- End Footer -->	
    
		<!-- End Bottom Footer -->
		<section class="bottom-footer">
			<div class="container">
				<div class="col-12">
					<h6>© {{setting('site_name')}} 2024</h6>
				</div>
			</div>
		</section>
		<!-- End Bottom Footer -->

	    <!-- Scroll-top -->
		<div class="scroll-top"> 
			<a class="scrollToTop" href="#"> 
			<i class="fa fa-angle-up" aria-hidden="true"></i></a> 
		</div>
        <!--  End Scroll-top  -->
    
        <!-- Javascript -->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>		
		<!-- Bootstrap Js -->
        <script src="js/bootstrap.min.js"></script>		
        <!-- Owl Carousel Js -->
        <script src="js/owl.carousel.min.js"></script>
		<!-- Smooth Scroll Js -->
        <script src="js/jquery.easing.min.js"></script>			
		<!-- Magnific-popup Js -->
		<script src="js/jquery.magnific-popup.min.js"></script>
		<!-- Magnific-popup Js -->
		<script src="js/parallaxie.js"></script>
		<!-- Gallery Filter Js -->
		<script src="js/isotope.pkgd.min.js"></script>
		<script src="js/packery-mode.pkgd.min.js"></script>
		<script src="js/imagesloaded.pkgd.js"></script>
		<!-- Counter Js -->		
        {{-- <script src="js/counter.js"></script> --}}
		<!-- Clock Js -->		
        {{-- <script src="js/clock.js"></script> --}}
        <!-- Custom Js -->		
        <script src="js/custom.js"></script>
		
		@if($whatsapp = $social['whatsapp'] ?? '')
		<script src="js/wa.js"></script>
		<script>
			new WAChatBox({
				link: "https://wa.me/{{$whatsapp}}",
				user: {
					name: "{{setting('site_name')}}",
					avatar: "https://randomuser.me/api/portraits/women/20.jpg",
					status: "Typically replies within an hour",
				},
				text: `Hey There 👋<br><br>I'm here to help, so let me know what's up and I'll be happy to find a solution 🤓`,
				button_text: "Need Help?",
			});
		</script>
		@endif
    </body>
</html>