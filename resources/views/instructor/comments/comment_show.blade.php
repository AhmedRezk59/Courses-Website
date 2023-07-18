@extends('instructor.layouts.master')

@section('content')
    <div class="card">
        <div>
            @if (session()->has('msg'))
                <div class="alert alert-success text-bold">
                    {{session('msg')}}
                </div>
            @endif
            <div class="row no-gutters border p-2 bg-white">
                <div class="user-small col-2 col-sm-1 ">
                    <a href="{{ route('user.page', $comment->user) }}">
                        <img class="img-fluid"
                            src="{{ isset($comment->user->avatar) ? route('get.avatar', $comment->user) : asset('default-logo.png') }}"
                            style="display: inline;">
                    </a>
                </div>
                <div class="comment-content  col-10 col-sm-11">

                    <h5>
                        <a class="user-link underline text-bold text-primary " style="display: block;float:right"
                            href="{{ route('user.page', $comment->user) }}">{{ $comment->user->name }}</a>
                        <span style="float: left" class="comment-date">{{ $comment->created_at }}</span>
                    </h5>
                    <div class="mt-5">
                        <p>{{ $comment->body }}</p>
                    </div>


                </div>
            </div>
            <div class="comments-list">
                <ul class="container-fluid p-0" id="comments_ul_78285">
                    @foreach ($comment->replies as $reply)
                        <li class="comment-block main-comment  " id="comment_block_717423" style="display: list-item;">
                            <div class="row no-gutters id-comment py-2 pr-3">
                                <div class="user-small col-2 col-sm-1  ">
                                    @if ($reply->is_instructor == true)
                                        <a href="{{ route('instructor.page', $reply->user) }}">
                                            <img width="71px"
                                                src="{{ isset($reply->user->avatar) ? route('instructor.avatar', $reply->user) : asset('default-logo.png') }}">
                                        @else
                                            <a href="{{ route('user.page', $reply->user) }}">
                                                <img width="71px"
                                                    src="{{ isset($reply->user->avatar) ? route('get.avatar', $reply->user) : asset('default-logo.png') }}">
                                    @endif

                                    </a>
                                </div>
                                <div class="comment-content  col-10 col-sm-11">


                                    <h3>
                                        @if ($reply->is_instructor == true)
                                            <a class="user-link underline text-bold text-primary"
                                                style="display: block;float:right" id="user_760932"
                                                href="{{  route('instructor.page', $reply->user) }}">{{ $reply->user->name }}</a>
                                        @else
                                            <a class="user-link underline text-bold text-primary"
                                                style="display: block;float:right" id="user_760932"
                                                href="{{  route('user.page', $reply->user)  }}">{{ $reply->user->name }}</a>
                                        @endif
                                    </h3>
                                    <div class="mt-5">
                                        <p>{{ $reply->body }}</p>
                                    </div>

                                    <div class="post-acions">
                                        <span style="float: left" class="comment-date">{{ $reply->created_at }}</span>

                                    </div>
                                </div>



                            </div>

                        </li>
                    @endforeach


                </ul>
            </div>
            <li class="comment-entery-block main-comment">

                <form class="new_comment d-block" accept-charset="UTF-8" method="post"
                    action="{{ route('instructor.add.comment', $comment) }}">
                    @csrf
                    <div class="row no-gutters p-2">
                        <div class="user-small col-2 col-sm-1 ">
                            <a href="{{ route('user.page') }}">
                                <img src="{{ auth()->guard('instructor')->user()->avatar != false? route('instructor.avatar',auth()->guard('instructor')->user()): asset('default-logo.png') }}"
                                    style="display: inline;">
                            </a>
                        </div>
                        <div class=" col-10 col-sm-11">
                            <div class="well add-comment form-group">
                                <textarea rows="5" name="body"
                                    class="mr-3 ml-1 comment-text not-discussion comment-mobile-text form-control overflow-hidden"
                                    placeholder="شارك بتعليقك عن هذه المشاركة" id="new_comment_74218-text_area" name="comment[body]"></textarea>

                            </div>
                            <button type="submit" class="mr-3 btn btn-primary bg-primary">قم بالرد</button>
                        </div>
                    </div>
                </form>
            </li>
        </div>
    </div>
@endsection
