<div class="page-content">
    <div id="flash_messages">

    </div>
    <div id="wall" class="page-content wall">
        <div class="mobile-padding">
            <!-- answers Start -->
            <div class="info-item">
                <div id="wallpost_form" wire:submit.prevent="addComment" class="status form_container ">
                    <form class="wallpost_form_class_dev" id="new_wallpost" accept-charset="UTF-8" method="post">
                        <div class="row no-gutters">
                            <div class="user-small col-1">
                                <a class="my-0 m-x-auto" href="{{ route('user.page') }}">
                                    <img class="img-fluid"
                                        src="{{ !is_null(auth()->user()->avatar) ? route('get.avatar', auth()->user()) : asset('default-logo.png') }}"
                                        style="display: inline;">
                                </a>
                            </div>
                            <div class="form-list status-update pr-2 col-11">
                                <div class="form-group">
                                    <textarea wire:model.defer="body" class="comment-text form-control" placeholder="ماذا تود قوله؟ شارك الآخرين هنا‎"
                                        id="wallpost_body"></textarea>
                                    <x-input-error :messages="$errors->get('body')" class="mt-2 text-danger"
                                        style="margin-right: 30px !important" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-left">
                            <button type="submit" class="btn btn-primary wallpost-submit">انشر</button>
                        </div>
                    </form>
                </div>


                <div class="item-title lecture-comments-title"></div>
                <div id="post-all">
                    @foreach ($comments as $comment)
                        <div>
                            <div class="row no-gutters border p-2 bg-white">
                                <div class="user-small col-2 col-sm-1 ">
                                    <a
                                        href="{{ $comment->user->who_can_view == true ? route('user.page', $comment->user) : '#' }}">
                                        <img class="img-fluid"
                                            src="{{ isset($comment->user->avatar) ? route('get.avatar', $comment->user) : asset('default-logo.png') }}"
                                            style="display: inline;">
                                    </a>
                                </div>
                                <div class="comment-content  col-10 col-sm-11">

                                    <h5>
                                        <a class="user-link"
                                            href="{{ $comment->user->who_can_view == true ? route('user.page', $comment->user) : '#' }}">{{ $comment->user->name }}</a>
                                        <span class="comment-date">{{ $comment->created_at }}</span>
                                    </h5>
                                    <p>{{ $comment->body }}</p>
                                    <div class="post-acions">
                                        <a class="like-post" href="javascript:void(0)"
                                            wire:click="like({{ $comment->id }})" data-original-title="أعجبني"><i
                                                class="icon-thumbs-up site-icons"></i> <span id="post_like_count_78285"
                                                class="likesCount">{{ $comment->likes }}</span></a>
                                    </div>

                                </div>
                            </div>
                            <div class="comments-list">
                                <ul class="container-fluid p-0" id="comments_ul_78285">
                                    @foreach ($comment->replies as $reply)
                                        <li class="comment-block main-comment  " id="comment_block_717423"
                                            style="display: list-item;">
                                            <div class="row no-gutters id-comment py-2 pr-3">
                                                <div class="user-small col-2 col-sm-1  ">
                                                    @if ($reply->is_instructor == true)
                                                        <a href="{{ route('instructor.page', $reply->user) }}">
                                                            <img
                                                                src="{{ isset($reply->user->avatar) ? route('instructor.avatar', $reply->user) : asset('default-logo.png') }}">

                                                        </a>
                                                    @else
                                                        <a
                                                            href="{{ $reply->user->who_can_view == true ? route('user.page', $reply->user) : '#' }}">
                                                            <img
                                                                src="{{ isset($reply->user->avatar) ? route('get.avatar', $reply->user) : asset('default-logo.png') }}">

                                                        </a>
                                                    @endif
                                                </div>
                                                <div class="comment-content  col-10 col-sm-11">


                                                    <h5>
                                                        @if ($reply->is_instructor == true)
                                                            <a class="user-link" id="user_760932"
                                                                href="{{ route('instructor.page', $reply->user) }}">{{ $reply->user->name }}</a>
                                                        @else
                                                            <a class="user-link" id="user_760932"
                                                                href="{{ $reply->user->who_can_view == true ? route('user.page', $reply->user) : '#' }}">{{ $reply->user->name }}</a>
                                                        @endif

                                                    </h5>
                                                    <p>{{ $reply->body }}</p>

                                                    <div class="post-acions">
                                                        <span class="comment-date">{{ $reply->created_at }}</span>
                                                        <a class="like-post" href="javascript:void(0)"
                                                            wire:click="like({{ $reply->id }})"
                                                            data-original-title="أعجبني"><i
                                                                class="icon-thumbs-up site-icons"></i> <span
                                                                id="post_like_count_78285"
                                                                class="likesCount">{{ $reply->likes }}</span></a>
                                                    </div>
                                                </div>



                                            </div>

                                        </li>
                                    @endforeach

                                    <li class="comment-entery-block main-comment">

                                        <form class="new_comment d-block" accept-charset="UTF-8" method="post">
                                            <div class="row no-gutters p-2">
                                                <div class="user-small col-2 col-sm-1 ">
                                                    <a href="{{ route('user.page') }}">
                                                        <img src="{{ auth()->user()->avatar !== null ? route('get.avatar', auth()->user()) : asset('default-logo.png') }}"
                                                            style="display: inline;">
                                                    </a>
                                                </div>
                                                <div class=" col-10 col-sm-11">
                                                    <div class="well add-comment form-group">
                                                        <textarea wire:keydown.enter="addComment({{ $comment->id }})" rows="0" wire:model.defer="body"
                                                            class="comment-text not-discussion comment-mobile-text form-control overflow-hidden"
                                                            placeholder="شارك بتعليقك عن هذه المشاركة" id="new_comment_74218-text_area" name="comment[body]"></textarea>

                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    @endforeach

                </div>

            </div>
        </div>

    </div>

</div>
