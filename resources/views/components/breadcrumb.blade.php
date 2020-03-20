<div class="d-sm-flex align-items-center justify-content-between mg-b-20">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                @yield('breadcrumb-link')
            </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">@yield('breadcrumb-title')</h4>
    </div>
     <div class="d-none d-md-block">
        @yield('breadcrumb-btn')
    </div>
</div>