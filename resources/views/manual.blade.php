@extends('layouts.main')

@section('content')

    <div class="container">
        <section class="page__header">
            <div class="page__title js-audio">Инструкция</div>
            <br>
        </section>
        <section class="page__body">
            <div class="page__wrapper">
{{--                <div class="sp-gallery">--}}
{{--                    <div class="sp-gallery-items">--}}
{{--                        <div class="sp-gallery-item" style="max-width: 600px; max-height: 300px; ">--}}
{{--                            <img alt="" src="{{ asset('storage/' . $post->img) }}" style="border-radius: 20px">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="page__desc">
                    <p><span class="text-big"
                              style="background-color:transparent;color:#000000;">&nbsp;{!! $manual->text !!}
                        </span>   </p>

                </div>
            </div>
        </section>
    </div>

@endsection
