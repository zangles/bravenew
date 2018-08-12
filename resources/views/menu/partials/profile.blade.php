<div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle profileImage" src="{{ asset('img/user_profile.jpg') }}" />
                             </span>
    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ Auth::user()->name }}</strong>
                             </span> <span class="text-muted text-xs block">BackEnd Developer <b class="caret"></b></span> </span> </a>
    <ul class="dropdown-menu animated fadeInRight m-t-xs">
        <li><a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a></li>
    </ul>
</div>