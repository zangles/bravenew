@extends('layouts.admin')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Edit Services</h2>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="{{ route('services.index') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content">
        <form action="{{ route('services.update', $service) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }} <br>
                            @endforeach
                        </div>
                    @endif
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Service Info </h5>
                        </div>
                        <div class="ibox-content">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" placeholder="Title" class="form-control" name="title"
                                       value="{{ old('title', $service->title) }}">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" cols="30" rows="6"
                                          class="form-control">{{ old('description', $service->description) }}</textarea>
                            </div>

                            <div class="ibox ">
                                <div class="ibox-title">
                                    <h5>Location</h5>
                                </div>
                                <div class="ibox-content">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input id="autocomplete" placeholder="Address"
                                               class="form-control" onFocus="geolocate()" type="text"
                                               value="{{ old('address', $service->address) }}">
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Street Name</label>
                                                        <input type="text" placeholder="Street Name" name="street_name"
                                                               id="route" class="form-control" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Street Number</label>
                                                        <input type="text" placeholder="Street Number"
                                                               name="street_number" id="street_number"
                                                               class="form-control" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>State</label>
                                                <input type="text" placeholder="State" name="state"
                                                       id="administrative_area_level_1" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Zip Code</label>
                                                <input type="text" placeholder="Zip Code" name="zipcode"
                                                       id="postal_code" class="form-control" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Latitude</label>
                                                <input type="text" placeholder="Latitude" id="lat" name="latitude"
                                                       class="form-control" readonly
                                                       value="{{ old('latitude',$service->latitude) }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Longitude</label>
                                                <input type="text" placeholder="Longitude" id="lng" name="longitude"
                                                       class="form-control" readonly
                                                       value="{{ old('latitude',$service->longitude) }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-footer text-right">
                            <button class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('stylesheets')
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
@endsection
@section('script')
    @include('services.partials.geoscript')
    <script>
        $(document).ready(function () {
            $.getJSON("{{ str_replace(['{lat}','{lng}'],[$service->latitude,$service->longitude],env('GOOGLE_PLACES_API_GEOCODE')) }}", function (data) {
                console.log(data.results);
                for (var i = 0; i < data.results[0].address_components.length; i++) {
                    var addressType = data.results[0].address_components[i].types[0];
                    if (componentForm[addressType]) {
                        var val = data.results[0].address_components[i][componentForm[addressType]];
                        document.getElementById(addressType).value = val;
                    }
                }
            });
        });
    </script>
@endsection