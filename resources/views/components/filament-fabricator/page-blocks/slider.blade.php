@aware(['page'])

<section @class(['home', 'section' => $condensed])>
    <div @class(['home-data', 'container' => $condensed])>
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
