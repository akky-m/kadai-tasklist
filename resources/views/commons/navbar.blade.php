<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="/">Tasklist</a>
         
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
               @if (Auth::check())
                    <li class="nav-item">{!! link_to_route('users.index', 'Users', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item dropdown">
            </ul>
            <ul class="dropdown-menu dropdown-menu-right">
                <li class="dropdown-item">{!! link_to_route('users.show', 'My profile', ['id' => Auth::id()]) !!}</li>
                <li class="dropdown-divider"></li>
                <li class="dropdown-item">{!! link_to_route('logout.get', 'Logout') !!}</li>
            </ul>
            
            
        </div>
    </nav>
</header>