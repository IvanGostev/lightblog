@extends('layouts.main')

@section('content')

    <main class="main">
        <div class="page">
            <section class="page__header">
                <div class="container">
                    <div class="page__tags">
                        <style>
                            a {
                                all: unset;
                            }
                        </style>
                        <!--@todo обновить вывод тегов чтобы не пропадали-->
                        <span class="page__tags-headline">Фильтр по тегам:</span>
                        <a class="filter-tag {{!isset($tagActive) ? 'filter-tag--orange' : ''}}" href="/">Все теги</a>
                        @foreach($tags as $tag)
                            <a class="filter-tag {{isset($tagActive) ? ($tag->id == $tagActive->id ? 'filter-tag--orange' : '') : ''}}" href="/?tag={{$tag->id}}" rel="nofollow">
                                {{$tag->title}} </a>
                        @endforeach

{{--                        <a class="filter-tag filter-tag--orange" href="/useful/?tags=Готовим" rel="nofollow">--}}
{{--                            Готовим </a>--}}
                    </div>
                </div>
            </section>
            <section class="page__body">
                <div class="container">
                    <div class="education-list__items-container items-list">
                        @foreach($posts as $post)
                            <article class="education-item item-content">
                                <img class="education-item__img" src="{{ asset('storage/' . $post->img)}}">
                                <div class="education-item__content">
                                    <div class="education-item__tags">
                                        @foreach($post->tags as $tag)
                                            <a class="filter-tag" href="/?tag={{$tag->id}}" rel="nofollow">
                                                {{$tag->title}} </a>
                                        @endforeach
                                    </div>
                                    <h3 class="education-item__title js-audio"><span class="text-ellipsis">{{$post->title}}</span>
                                        <span style="font-weight: 400; font-size: 1rem;">{{$post->created_at}}</span>
                                    </h3>

                                    <p class="education-item__description text-ellipsis"></p>
                                    <a class="button button--outlined education-item__btn js-audio"
                                       href="{{route('post.show', $post->id)}}">Прочитать до конца</a>
                                </div>
                            </article>
                        @endforeach

                    </div>
                </div>
            </section>
        </div>
    </main>

@endsection
