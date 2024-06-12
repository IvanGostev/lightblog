@extends('layouts.main')

@section('content')

    <div class="container">
        <section class="page__header">
            <a class="button button--outlined button--small js-audio" href="/">
                <img class="button__icon" src="{{ asset('images/arrow-left.svg')}}">
                <span>Вернуться к постам</span>
            </a>
            <div class="page__title js-audio">{{$post->title}}</div>
            <div class="news-item__tags">
                @foreach($post->tags as $tag)
                    <a class="filter-tag filter-tag--orange-light" href="/?tag={{$tag->id}}" rel="nofollow">
                        {{$tag->title}} </a>
                @endforeach

            </div>
            <br>
        </section>
        <section class="page__body">
            <div class="page__wrapper">
                <div class="sp-gallery">
                    <div class="sp-gallery-items">
                        <div class="sp-gallery-item" style="max-width: 600px; max-height: 300px; ">
                            <img alt="" src="{{ asset('storage/' . $post->img) }}" style="border-radius: 20px">
                        </div>
                    </div>
                </div>
                <div class="page__desc">
                    <p><span class="text-big"
                             style="background-color:transparent;color:#000000;">&nbsp;{!! $post->text !!}
                        </span></p>

                </div>
            </div>
        </section>
        <section>
            <div class="post__comments comments">
                <div class="comments__header">
                    <p class="comments__headline">
                        <span class="comments__title">Комментарии&nbsp;—&nbsp;</span>
                        <span class="comments__count text-orange">{{$post->commentsCount()}}</span>
                    </p>

                </div>
                <div class="comments__body js-comments-body">
                    @foreach($post->comments() as $comment)
                        <div class="comment post__comment">
                            <p class="comment__message js-audio">{{$comment->text}}</p>
                            <div class="comment__info">
                                <span class="comment__name text-orange">{{$comment->user()->name}}</span>
                                <span class="comment__date">{{$comment->created_at}}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
                @auth()
                    @if($accepted)
                        <form class="comments__footer js-comment" method="post" action="{{route('comment.store')}}">
                            @csrf
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

                            <input class="comments__input  required" type="text" name="text"
                                   placeholder="Напиши свой комментарий">
                            {{--                        <div class="post__emoji-list">--}}
                            {{--                            <span class="emoji post__emoji-item post-emoji-js">😄</span>--}}
                            {{--                            <span class="emoji post__emoji-item post-emoji-js">😁</span>--}}
                            {{--                            <span class="emoji post__emoji-item post-emoji-js">😆</span>--}}
                            {{--                            <span class="emoji post__emoji-item post-emoji-js">🤣</span>--}}
                            {{--                            <span class="emoji post__emoji-item post-emoji-js">😂</span>--}}
                            {{--                            <span class="emoji post__emoji-item post-emoji-js">🥰</span>--}}
                            {{--                            <span class="emoji post__emoji-item post-emoji-js">😍</span>--}}
                            {{--                            <span class="emoji post__emoji-item post-emoji-js">😝</span>--}}
                            {{--                        </div>--}}
                            <button class="button comments__add-btn" type="submit">Добавить комментарий</button>
                        </form>
                    @endif
                @endauth

                <br>
            </div>
        </section>

    </div>

@endsection
