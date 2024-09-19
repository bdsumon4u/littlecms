@aware(['page'])
<!-- Start Team -->  
<section class="section team-sec" id="team">
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
            @foreach($people as $person)
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="team-data mt-5">
                    <div class="team-image-before"> 
                        <div class="team-image"> 
                            <img src="/storage/{{$person['image']}}" alt="{{$person['name']}}" class="img-fluid common-transition">
                        </div>
                    </div>
                    <div class="team-info">
                        <h3 class="mb-0"><a href="#">{{$person['name']}}</a></h3>
                        <span>{{$person['designation']}}</span> 
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
