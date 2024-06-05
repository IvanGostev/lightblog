@extends('layouts.main')

@section('content')
    <main class="main">    <div class="container authorization">
            <section class="authorization__header"></section>
            <section class="authorization__body">
                <div class="authorization__left-container"><a class="authorization__back-button button button--outlined button--small js-audio" href="{{route('login')}}"><span>Войти</span></a>
                    <h2 class="authorization__title page__title js-audio">Регистрация на сайте</h2>
                    <h5 class="authorization__text">Для регистрации, пожалуйста, введи свои данные</h5>

                    <form method="POST" action="{{ route('register') }}" class="authorization__form" autocomplete="off">
                        @csrf
                        <div class="authorization__form-phone">
                            <label class="authorization__form-label" for="name">Напиши свое имя<span class="authorization__asterisk">*</span></label>
                            <input class="authorization__input" required id="name" autocomplete="off" type="text" placeholder="Имя" name="name">
                            <br>
                            <label class="authorization__form-label" for="email">Напиши свой  email<span class="authorization__asterisk">*</span></label>
                            <input class="authorization__input" required id="email" autocomplete="off" type="email" placeholder="Email" name="email">
                            <br>
                            <label class="authorization__form-label" for="password">Напиши свой пароль<span class="authorization__asterisk">*</span></label>
                            <input class="authorization__input" required id="password" name="password"  autocomplete="off" type="password" placeholder="Пароль">
                            <br>
                            <label class="authorization__form-label" for="password-confirm">Напиши повтор своего пароля<span class="authorization__asterisk">*</span></label>
                            <input class="authorization__input" required id="password-confirm" name="password_confirmation"  autocomplete="off" type="password" placeholder="Повтор пароля">
                            <button class="authorization__btn authorization__btn-phone button button--filled js-audio"  type="submit">Зарегистрироваться
                            </button>
                        </div>

                    </form>            </div>

            </section>
        </div>
    </main>
@endsection
