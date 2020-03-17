 <header class="app-header navbar">
        <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">☰</button>
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler sidebar-minimizer d-md-down-none" type="button">☰</button>

        <ul class="nav navbar-nav d-md-down-none">
            <li class="nav-item px-3">
                <a class="nav-link" href="/admin/index/index">General information </a>
            </li>
            <li class="nav-item px-3">
                <a class="nav-link" href="/admin/customer/lists"> My profile </a>
            </li>
            
        </ul>
        <ul class="nav navbar-nav ml-auto">
            
            <li class="nav-item ">
                <a class="nav-link nav-link" data-toggle="dropdown" href="" role="button" aria-haspopup="true" aria-expanded="false">
                    <img src="/public/admin/img/avatars/6.jpg" class="img-avatar" alt="admin@lnp.com">
                    <span class="d-md-down-none">{{@Auth::user()['name']}}</span> |
                </a>
                
            </li>

             <li class="nav-item ">
                <a class="nav-link  nav-link" href="/auth/logout" >
                  
                    <span class="d-md-down-none"> Logout </span>
                </a>
                
            </li>
        </ul>
     

    </header>