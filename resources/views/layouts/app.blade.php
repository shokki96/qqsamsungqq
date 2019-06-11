@include('layouts.header')

<div class="container katalogone">
    @yield('breadcrumb')
    <div class="container live">
        @if (session('status_message'))
            <div class="row justify-content-center">
                <div class="alert alert-{{session('status')}} alert-dismissible fade show col-md-6 " role="alert">
                    {{ session('status_message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
        @yield('content')
    </div>
</div>
@yield('content_outer')
@include('layouts.footer')
