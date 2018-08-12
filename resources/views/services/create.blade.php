@extends('layouts.admin')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>New Services</h2>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="{{ route('services.index') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content">
        <form action="{{ route('services.store') }}" method="post">
            @csrf
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
                                       value="{{ old('title') }}">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" cols="30" rows="6"
                                          class="form-control">{{ old('description') }}</textarea>
                            </div>

                            <div class="ibox ">
                                <div class="ibox-title">
                                    <h5>Location</h5>
                                </div>
                                <div class="ibox-content">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input id="autocomplete" placeholder="Address" class="form-control"
                                               onFocus="geolocate()" type="text">
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
                                                       class="form-control" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Longitude</label>
                                                <input type="text" placeholder="Longitude" id="lng" name="longitude"
                                                       class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-footer text-right">
                            <button class="btn btn-primary">Save</button>
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
@endsection