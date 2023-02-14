{{-- Content --}}
@if (true)
@yield('content')
@else
<div class="d-flex flex-column-fluid">
    <div class="{{ Metronic::printClasses('content-container', false) }}">
        @yield('content')
    </div>
</div>
</div>
@endif