<!-- JAVASCRIPT -->
<script src="{{asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('backend/assets/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
<script src="{{asset('backend/assets/js/plugins.js')}}"></script>

<!-- Lib js -->
@if(isset($config['js']) && is_array($config['js']))
    @foreach($config['js'] as $key => $val)
        {!! '<script src="'.$val.'"></script>' !!}
    @endforeach
@endif



<!-- App js -->
<script src="{{asset('backend/assets/js/app.js')}}"></script>