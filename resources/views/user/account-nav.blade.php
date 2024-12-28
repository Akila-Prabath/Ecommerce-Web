<ul class="account-nav">
    <li><a href="{{route('user.index')}}" class="menu-link menu-link_us-s"><i class="icon-grid"></i>
        Dashboard</a></li>
    <li><a href="account-orders.html" class="menu-link menu-link_us-s"><i class="icon-file-text"></i>
        Orders</a></li>
    <li><a href="account-address.html" class="menu-link menu-link_us-s"><i class="icon-map-pin"></i>
        Addresses</a></li>
    <li><a href="{{route('user.account-details')}}" class="menu-link menu-link_us-s"><i class="icon-user"></i>
        Account Details</a></li>
    <li><a href="account-wishlist.html" class="menu-link menu-link_us-s"><i class="icon-heart"></i>
        Wishlist</a></li>
    <li>
        <form method="POST" action="{{route('logout')}}" id="logout-form">   
            @csrf 
            <a href="{{route('logout')}}" class="menu-link menu-link_us-s" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="icon-power"></i>
                Logout</a>
        </form>
    </li>
</ul>