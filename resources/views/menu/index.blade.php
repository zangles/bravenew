<ul class="nav metismenu" id="side-menu">
    <li class="nav-header">
        @include('menu.partials.profile')
        <div class="logo-element">
            IN+
        </div>
    </li>
    <li class="active">
        <a href="{{ route('services.index') }}"><i class="fa fa-cubes"></i> <span class="nav-label">Services</span></a>
    </li>
</ul>