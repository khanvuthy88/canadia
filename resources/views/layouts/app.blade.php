<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/animate/animate.css') }}">
    <style type="text/css">
        .kh .nav-item a{
            font-family: "Khmer os content";
        }
        .sticky {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1;
            background: #fff !important;
        }
        .sticky + .py-4 {
            padding-top: 60px;
        }
    </style>
    @yield('custom-style')
</head>
<body class="{{ app()->getLocale() }}">
    <div id="app">

            <nav class="navbar navbar-expand-md navbar-light shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <!-- {{ config('app.name', 'Laravel') }} -->
                        <img src="{{ url('/images/logo_cnb.png') }}">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" id="about-canadia-bank" onclick="showModal('#about-canadia-bank_modal')" href="#">
                                        {{ __('menu.about_canadia') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="get-help" href="#" onclick="showModal('#gethelp_modal')">
                                        {{ __('menu.get_help') }}
                                    </a>
                                </li>
                                
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>LANGUAGE</a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item lang-kh" href="{{ url('/kh') }}">
                                           KH
                                        </a>
                                        <a class="dropdown-item lang-en" href="{{ url('/en') }}">
                                           EN
                                        </a>
                                        <a class="dropdown-item lang-zh" href="{{ url('/zh') }}">
                                           ZH
                                        </a>
                                    </div>
                                </li>                                
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>


        <main class="py-4">
            @yield('content')
        </main>
        <footer>
            <footer-components></footer-components>
        </footer>
        
    </div>

    <!-- About Canadia Modal -->
    <div class="modal fade" id="about-canadia-bank_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header shadow-sm">
            <h5 class="modal-title" id="exampleModalLabel">About Canadia Bank</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <img src="{{ asset('images/cnb.jpg') }}">
            <h5>Canadia Bank Plc. was established on 11th November 1991 as "Canadia Gold & Trust Corporation Ltd.", joint-venture between Cambodian - Canadians and the National Bank of Cambodia (Central Bank of Cambodia).</h5>
            <p>The bank's management consisted of former staff of the National Bank of Cambodia and its Cambodian – Canadian shareholders.
The main activities were based on gold transactions, gold plaque manufacturing and lending to local merchants. On 19th April 1993 the name was changed into CANADIA BANK LTD., licensed as a Commercial Bank with the National Bank of Cambodia and registered with the Ministry of Commerce. On 16th December 2003 the name of the bank changed into CANADIA BANK PLC. (Public Limited Company).</p>

<p>Since privatization in 1998 the Bank has become the largest local bank in Cambodia. With a worldwide network of correspondent banking relationships and a solid base of local and international customers CANADIA BANK PLC holds commanding market shares in loans as well as deposits. </p>

<p>The bank offers a wide range of financial services through its Head Office and its 57 branches in Phnom Penh and major cities throughout the country.</p>

          </div>
          
        </div>
      </div>
    </div>

    <!-- Get Help Modal -->
    <div class="modal fade" id="gethelp_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header shadow-sm">
            <h5 class="modal-title" id="exampleModalLabel">Get Help</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="get-help row">
                <div class="inner col-md-6 col-sm-12 mb-3 text-center">
                    <img src="{{ asset('images/icons/phone.svg') }}">
                    <h1>Call Center</h1>
                    <h4><a href="#">+855 23 868 222</a></h4>
                </div>
                <div class="inner col-md-6 col-sm-12 mb-3 text-center">
                    <img src="{{ asset('images/icons/chat.svg') }}">
                    <h1>24/7 Chat</h1>
                    <h4>We have a dedicated Chat team to help you anytime</h4>
                </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
        function showModal(target) {
            $(target).modal('show');
        }
    </script>
    <script type="text/javascript">
        let $top_size = $(".py-4"),
            navbar = $('.navbar');
            y_pos = $top_size.offset().top,

        $(document).ready(function(){
            $(document).scroll(function(){
                let scrollTop = $(this).scrollTop();
                if (scrollTop > y_pos) {
                  navbar.addClass("sticky animate slideInDown");
                } else {
                  navbar.removeClass("sticky");
                }
            });
        });
    </script>
    <script type="text/javascript">
        window.$zopim || (function (d, s) {
          var z = $zopim = function (c) { 
          z._.push(c) 
          }, $ = z.s =
              d.createElement(s), e = d.getElementsByTagName(s)[0]; 
          z.set = function (o) {
              z.set._.push(o)
          }; 
          z._ = []; 
          z.set._ = []; 
          $.async = !0; 
          $.setAttribute("charset", "utf-8");
          $.src = "https://v2.zopim.com/?4avV5oSuCuOMZNVdcSjSCv5PHGKiH1j9"; 
          z.t = +new Date; 
          $.
          type = "text/javascript"; 
          e.parentNode.insertBefore($, e)
        })(document, "script");
        
    </script>
    @yield('script')
</body>
</html>
