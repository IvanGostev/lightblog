<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="LightBlog">
    <title>LightBlog</title>

    <meta name="robots" content="index, follow">
    <meta name="keywords" content="Keywords">
    <meta name="description" content="Мой сайт - Мне полезно">
    <link href="{{ asset("css/template_9a4875b7ce20e262087ed47c6cb5a155_v1.css")}}" type="text/css" data-template-style="true"
          rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&amp;display=swap" rel="stylesheet">
    <script type="text/javascript" async="" id="tmr-code" src="js/code.js"></script>
    <script async="" src="{{ asset('js/tag.js')}}"></script>
    <script type="text/javascript" async="" src="{{ asset('js/ba.js')}}"></script>
    <script src="{{ asset('js/app.js')}}"></script>
    <script src="{{ asset('js/vendors.js')}}"></script>
    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <script src="{{ asset('js/bedScripts.js')}}"></script>

</head>
<body>
<div class="wrapper">
    <header class="header">
        <div class="container header__container">
            <div class="header__wrapper">
                <div class="header__logo-wrapper"><a class="logo" href="/">
                        <div class="logo__img" style="background-image: url({{ asset('images/logo-union.pn')}}g);">
                            <div class="logo__text text-orange">Light</div>
                            <div class="logo__text">Blog</div>
                        </div>
                    </a></div>


                <button class="header__menu-button js-menu-button js-audio" data-closed-text="Меню"
                        data-opened-text="Закрыть">Меню
                </button>
                <div class="header__content-wrapper js-header-content">
                    {{--                    <nav class="navigation header__navigation">--}}
                    {{--                        <a class="navigation__link header__navigation-link js-audio" href="/blog/">--}}
                    {{--                            Посты </a>--}}
                    {{--                        <a class="navigation__link header__navigation-link js-audio" href="/interesting/">--}}
                    {{--                            Интересное </a>--}}
                    {{--                        <a class="navigation__link header__navigation-link active js-audio" href="/useful/">--}}
                    {{--                            Полезное </a>--}}
                    {{--                        <a class="navigation__link header__navigation-link js-audio" href="/about/">--}}
                    {{--                            О проекте </a>--}}
                    {{--                    </nav>--}}

                    <nav class="navigation header__subnavigation">

                        @guest()
                            <a class="button button--orange header__create js-audio" href="{{route('login')}}">
                                <span>Вход/Регистрация</span>
                            </a>
                        @endguest

                        @auth()
                                @if(auth()->user()->role == 1)
                                    <a class="button button--orange header__create js-audio" href="{{route('admin.post.index')}}">
                                        <span>Админ панель</span>
                                    </a>
                                @endif
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button type="submit" class="button button--orange header__create js-audio">
                                    <span>Выйти</span>
                                </button>
                            </form>

                        @endauth
                    </nav>
                </div>
            </div>
        </div>

    </header>
    <div class="gradient-yellow js-yellow-gradient"></div>
    <div class="gradient-red js-red-gradient"></div>
    @yield('content')
    <footer class="footer">
        <div class="container">
            <div class="footer-about">
                <div class="footer-about__item">
                <span>
                    © 2024. LightBlog
                </span>

                </div>
                <!--            <div class="footer-about__item">-->
                <!--                <p class="footer-about__item-text">-->
                <!--    Даунсайд Ап — зарегистрированная в �&nbsp;оссии НО «Благотворительный фонд «Даунсайд-->
                <!--    Ап», свидетельство о гос. регистрации № 7714011745, ОГ�&nbsp;Н 1027739619500, ИНН 7705159882</p>-->
                <!--<p class="footer-about__item-text">-->
                <!--    Использование любых материалов, размещённых на сайте, разрешается при условии активной ссылки на-->
                <!--    downsideup.org</p>            </div>-->
            </div>
        </div>

    </footer>
    <div class="notifications__container"></div>
    <div class="gradient-yellow"></div>
    <div class="gradient-red"></div>
</div>
<script type="text/javascript">
    var platformLanguage = navigator && (
            navigator.language ||
            navigator.browserLanguage ||
            navigator.systemLanguage ||
            navigator.userLanguage ||
            null),
        elemsRU, elemsEN;
    if (platformLanguage.match("ru") && document.getElementsByClassName) {
        elemsRU = document.getElementsByClassName("b-text_lang_ru");
        elemsEN = document.getElementsByClassName("b-text_lang_en");
        var l = elemsEN.length;
        while (l--) {
            elemsEN[l].style.display = "none";
        }
        l = elemsRU.length;
        while (l--) {
            elemsRU[l].style.display = "block";
        }
    }
</script>
<script>
    $(document).ready(function () {
        $(".filter__item--main").click(function (event) {
            console.log('click');
            let elems = document.querySelectorAll(".notification--new");
            if (elems.length > 0) {
                [].forEach.call(elems, function (el) {
                    el.classList.remove("notification--new");
                });
            }
            let countNotificationCollection = document.querySelectorAll(".countNotifications");
            if (countNotificationCollection.length > 0) {
                [].forEach.call(countNotificationCollection, function (countNotification) {
                    countNotification.textContent = "0";
                });
            }
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: "/api/v1/user/ReadUserNotification",
                dataType: "json",
                encode: true,
            }).done(function (data) {

            });
        });
    });
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="https://www.googletagmanager.com/gtag/js?id=G-Q883WVQ1L6"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'G-Q883WVQ1L6');
</script>
<script src="js/cuttr.min.js"></script>

</body>
</html>
