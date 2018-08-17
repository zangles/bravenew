@extends('layouts.web')
@section('content')
    @include('partials.navbar')
    @include('partials.header')

    <section id="search" class="container services">
        <div class="row">
            <br><br>
            <div class="col-md-10 col-md-offset-1">
                <form action="{{ route('search') }}" method="post">
                    @csrf
                    <label for="">Search</label>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search for..." value="{{ $search }}">
                            <span class="input-group-btn">
                                <select name="distance" id="distance" class="form-control distanceDropdown">
                                @foreach($distances as $distance)
                                        <option value="{{ $distance }}"
                                                @if($selectedDistance == $distance) selected @endif>
                                        @if($distance == 0) Anywhere @else {{ $distance }} {{ $metric }} @endif
                                    </option>
                                @endforeach
                            </select>
                            </span>
                        </div>
                    </div>
                    <input type="hidden" id="latitude" name="latitude">
                    <input type="hidden" id="longitude" name="longitude">
                    <div class="text-right">
                        <button class="btn btn-success" type="submit">Search</button>
                    </div>
                </form>
                @if(isset($result))
                    <div class="navy-line"></div>
                    @if (count($result) == 0)
                        <div class="text-center">
                            <h1>No services found in this range</h1>
                        </div>
                    @else
                        <div class="text-center">
                            <h2>{{ count($result) }} service found</h2>
                        </div>
                        @foreach($result as $service)
                            @include('partials.searchResultItem', $service)
                        @endforeach
                    @endif
                @endif
            </div>
        </div>
    </section>

    @include('partials.contactUs')
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $.post("{{ env('GOOGLE_MAP_GEOLOCATION_API') }}", function (result) {
                $('#latitude').val(result.location.lat);
                $('#longitude').val(result.location.lng);
            });
        });
    </script>
@endsection
