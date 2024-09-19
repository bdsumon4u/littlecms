@props(['page'])
<x-filament-fabricator::layouts.base :title="$page->title">
    {{-- Header Here --}}

    @php
        $more = setting('more_configs');

        $menuItems = menu('main', collect($page->blocks)
            ->map(function ($item) {
                if (! $label = \Arr::get($item, 'data.label')) {
                    return null;
                }

                return (object)['title' => $label, 'url' => '#' . $item['type']];
            })
            ->filter()
        )
        ->map(function ($item) {
            if (url()->current() != url('/') && \Str::startsWith($item->url, '#')) {
                $item->url = url('/') . $item->url;
            }
            
            return $item;
        });
    @endphp

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
                    @foreach($menuItems as $item)
                        <li class="nav-item">
                            <a class="nav-link page-scroll" target="{{$item->target??'_self'}}" href="{{$item->url}}">{{$item->title}}</a>
                        </li>
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
                @foreach($menuItems as $item)
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{$item->url}}">{{$item->title}}</a>
                    </li>
                @endforeach
                <li><a class="nav-link page-scroll" href="#contact">{{Arr::get($more, 'label')}}</a></li>
            </ul>
        </div>
    </div>
    <!-- End Mobile Menu -->

    <x-filament-fabricator::page-blocks :blocks="$page->blocks" />

    {{-- Footer Here --}}
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
                        @foreach($menuItems as $item)
                            <li><a class="page-scroll" href="{{$item->url}}">{{$item->title}}</a></li>
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
</x-filament-fabricator::layouts.base>