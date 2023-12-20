{{-- Check if the user is online --}}
@if (App::environment('production') && @fsockopen('www.google.com', 80))
    {{-- Load online scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
@else
    {{-- Load offline scripts --}}
    <script src="{{ asset('/assets/js/jquery.js') }}"></script>
    <script src="{{ asset('/assets/js/jquery_ui.js') }}"></script>
    <script src="{{ asset('/assets/js/sweetalert.js') }}"></script>
    <script src="{{ asset('/assets/js/my_js.js') }}"></script>
@endif
