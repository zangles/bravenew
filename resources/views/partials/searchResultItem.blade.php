<div class="widget p-xl gray-section">
    <h2>
        {{ $service->title }}
    </h2>
    <ul class="list-unstyled m-t-md">
        <li>
            <span class="fa fa-comment m-r-xs"></span>
            <label>Description:</label>
            {{ $service->description }}
        </li>
        <li>
            <span class="fa fa-map-marker m-r-xs"></span>
            <label>Address:</label>
            {{ $service->address }}
        </li>
        <li>
            <span class="fa fa-location-arrow m-r-xs"></span>
            <label>Distance:</label>
            {{ round($service->distance,2) }} {{ $metric }}
        </li>
    </ul>
</div>
