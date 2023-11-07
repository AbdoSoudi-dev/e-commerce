<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User Profile-->
        <div class="user-profile">
            <div class="user-pro-body">
                <div><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"></div>
                <div class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu"
                       data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        {{ auth('admin')->user()->name }}
                        <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu animated flipInY">

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item"  aria-expanded="false" href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit(); " >
                                <i class="far fa-circle text-success"></i>
                                <span class="hide-menu">تسجيل خروج</span>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Products</span></a>
                    <ul aria-expanded="false" class="collapse" data-turbolinks="false">

                        <li><a href="/products" data-turbolinks="true">Products</a></li>

                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>

