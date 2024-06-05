@extends('layouts.main')

@section('content')
<main class="main">    <div class="container authorization">
        <section class="authorization__header"></section>
        <section class="authorization__body">
            <div class="authorization__left-container"><a class="authorization__back-button button button--outlined button--small js-audio" href="{{route('register')}}"><span>Регистрация</span></a>
                <h2 class="authorization__title page__title js-audio">Войти на сайт</h2>
                <h5 class="authorization__text">Для авторизации, пожалуйста, введи свои данные</h5>

                <form method="POST" action="{{ route('login') }}" class="authorization__form" autocomplete="off">
                    @csrf
                    <div class="authorization__form-phone">
                        <label class="authorization__form-label" for="email">Напиши свой  email<span class="authorization__asterisk"> *</span></label>
                        <input class="authorization__input" id="email" autocomplete="off" type="email" placeholder="Email" name="email">
                        <br>
                        <label class="authorization__form-label" for="password">Напиши свой пароль<span class="authorization__asterisk"> *</span></label>
                        <input class="authorization__input" id="password" autocomplete="off" type="password" name="password" placeholder="Пароль">
                        <button class="authorization__btn authorization__btn-phone button button--filled js-audio" type="submit">Войти
                        </button>
                    </div>

                </form>            </div>

        </section>
    </div>
</main>

@endsection
