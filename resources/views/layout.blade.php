<!DOCTYPE html>
<html class="supports-animation supports-columns svg no-touch no-ie no-oldie no-ios supports-backdrop-filter as-mouseuser" lang="en-US">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=1024">
    <title>Tienda e-commerce</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="format-detection" content="telephone=no">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('/css/category-landing.css') }}" media="screen, print">
    <link rel="stylesheet" href="{{ asset('/css/category.css') }}" media="screen, print">
    <link rel="stylesheet" href="{{ asset('/css/merch-tools.css') }}" media="screen, print">
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
</head>

<body class="as-theme-light-heroimage">

    <div class="stack">

        <div class="as-search-wrapper" role="main">

            <div class="as-navtuck-wrapper">
                <div class="as-l-fullwidth  as-navtuck" data-events="event52">
                    <div>
                        <div class="pd-billboard pd-category-header">
                            <div class="pd-l-plate-scale">
                                <div class="pd-billboard-background">
                                    <img src="{{ asset('/img/music-audio-alp-201709.jpg') }}" alt="" width="1440" height="320" data-scale-params-2="wid=2880&amp;hei=640&amp;fmt=jpeg&amp;qlt=95&amp;op_usm=0.5,0.5&amp;.v=1503948581306" class="pd-billboard-hero ir">
                                </div>
                                <div class="pd-billboard-info">
                                    <a href="{{ env('APP_URL') }}" class="mp-title">
                                        <h1 class="pd-billboard-header pd-util-compact-small-18">Tienda e-commerce</h1>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @yield('content')

            <div role="alert" class="as-loader-text ally" aria-live="assertive"></div>
            <div class="as-footnotes">
                <div class="as-footnotes-content">
                    <div class="as-footnotes-sosumi">
                        Todos los derechos reservados Tienda Tecno 2019
                    </div>
                </div>
            </div>

        </div>

    </div>

    <script src="https://www.mercadopago.com/v2/security.js" view="{{isset($securityView) ? $securityView : ""}}"></script>
</body>

</html>
