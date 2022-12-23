<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                <li class="@if(Request::Route()->getName() == 'home') active @endif"><a class="waves-effect waves-dark" href="{{ route('home') }}" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a></li>

                <li class="@if(Request::Route()->getName() == 'products.index' || Request::Route()->getName() == 'products.create' || Request::Route()->getName() == 'products.edit' || Request::Route()->getName() == 'products.show') active @endif"><a class="waves-effect waves-dark" href="{{ route('products.index') }}" aria-expanded="false"><i class="mdi mdi-briefcase-check text-info"></i><span class="hide-menu">Product Management</span></a></li>
                
            </ul>
        </nav>
    </div>
</aside>