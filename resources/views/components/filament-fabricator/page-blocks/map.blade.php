@aware(['page'])
<!-- Start Map -->
<div class="map" id="map">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="map-frame">
                    {!! $map ?? \Arr::get(setting('more_configs'), 'map') !!}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Map -->