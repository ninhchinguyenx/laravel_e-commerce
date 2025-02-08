<meta charset="utf-8" />
<title>Dashboard | Velzon - Admin & Dashboard Template</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
<meta content="Themesbrand" name="author" />
<!-- App favicon -->
<link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.icon')}}">

{{-- <!-- jsvectormap css -->
<link href="{{asset('backend/assets/libs/jsvectormap/css/jsvectormap.min.css')}}" rel="stylesheet" type="text/css" />

<!--Swiper slider css-->
<link href="{{asset('backend/assets/libs/swiper/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css" /> --}}

<!-- Layout config Js -->
<script src="{{asset('backend/assets/js/layout.js')}}"></script>
<!-- Bootstrap Css -->
<link href="{{asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{asset('backend/assets/css/icons.min.css')}}"rel="stylesheet" type="text/css" />

@if(isset($config['css']) && is_array($config['css']))
    @foreach($config['css'] as $key => $val)
        {!! '<link href="'.$val.'"  rel="stylesheet" type="text/css" />' !!}
    @endforeach
@endif

<!-- App Css-->
<link href="{{asset('backend/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
<!-- custom Css-->
<link href="{{asset('backend/assets/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
