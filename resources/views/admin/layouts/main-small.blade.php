<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8" />
    <meta name="format-detection" content="telephone=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Israeli Travel Admin</title>
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
{{--    <link rel="manifest" href="/site.webmanifest">--}}
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- favicon -->

    <!-- Open Graph  -->
    <meta property="og:type" content="business.business" />
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="/OG.png" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="627" />
    <meta property="og:site_name" content="" />
    <meta property="og:locale" content="en_EN" />
    <!-- Open Graph  -->

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:title" content="" />
    <meta property="twitter:description" content="" />
    <meta property="twitter:site" content="" />
    <meta property="twitter:url" content="" />
    <meta property="twitter:image:src" content="/OG.png" />
    <!-- Twitter -->

    <!-- plugins -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default&_v=20231218000314"></script>
    <link rel="stylesheet" href="{{asset('css/libs/swiper-bundle.min.css?_v=20231218000314')}}"/>
    <link rel="stylesheet" href="{{asset('css/libs/daterangepicker.css?_v=20231218000314')}}"/>
    <link rel="stylesheet" href="{{asset('css/libs/fancybox.css?_v=20231218000314')}}"/>
    <link rel="stylesheet" href="{{asset('css/libs/no-ui-slider.css?_v=20231218000314')}}"/>
    <!-- plugins -->

    <link rel="stylesheet" href="{{asset('css/reset.min.css?_v=20231218000314')}}"/>
    <link rel="stylesheet" href="{{asset('css/style.min.css?_v=20231218000314')}}"/>




</head>

<body>
<div class="wrapper">
    <header class="header">
        <div class="header__container container">
            <div class="header__body">
                <a href="{{route('admin.user.index')}}" class="menu__nav-link">
                    <span style="font-weight: 800">BACK</span>
                </a>
                <button type="button" aria-label="open mobile menu" class="header__btn icon-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </header>
    @yield('content')
</div>
<!-- plugins -->
<script src="{{asset('js/libs/jquery-3.7.1.min.js?_v=20231218000314')}}"></script>
<script src="{{asset('js/libs/swiper-bundle.min.js?_v=20231218000314')}}"></script>
<script src="{{asset('js/libs/fancybox.min.js?_v=20231218000314')}}"></script>
<script src="{{asset('js/libs/moment.min.js?_v=20231218000314')}}"></script>
<script src="{{asset('js/libs/daterangepicker.min.js?_v=20231218000314')}}"></script>
<script src="{{asset('js/libs/nouislider.min.js?_v=20231218000314')}}"></script>


<script>(g => {
        var h, a, k, p = "The Google Maps JavaScript API", c = "google", l = "importLibrary", q = "__ib__",
            m = document, b = window;
        b = b[c] || (b[c] = {});
        var d = b.maps || (b.maps = {}), r = new Set, e = new URLSearchParams,
            u = () => h || (h = new Promise(async (f, n) => {
                await (a = m.createElement("script"));
                e.set("libraries", [...r] + "");
                for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
                e.set("callback", c + ".maps." + q);
                a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
                d[q] = f;
                a.onerror = () => h = n(Error(p + " could not load."));
                a.nonce = m.querySelector("script[nonce]")?.nonce || "";
                m.head.append(a)
            }));
        d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n))
    })
    ({key: "AIzaSyAUck4xrR09y-QsooXufbOgOpcMLDpisSg", v: "beta"});</script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUck4xrR09y-QsooXufbOgOpcMLDpisSg&_v=20231218000314"></script> -->

<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUck4xrR09y-QsooXufbOgOpcMLDpisSg&callback=initMap&libraries=marker&v=beta&_v=20231218000314"></script> -->

<!-- plugins -->

<script src="{{asset('js/app.js')}}"></script>

</body>

</html>
