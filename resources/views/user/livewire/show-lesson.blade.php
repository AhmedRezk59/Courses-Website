<div class="page-content">
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <div id="wall" class="mobile-padding lecture-page-content">
        <div class="page-title lec-title position-relative">
            <h2 class="w-75 pl-3">{{ $lesson->name }}</h2>

        </div>



        <div class="course-content">
            <div class="video  widescreen">

                <video width="700" height="450" src="{{ route('user.get.lesson', $lesson) }}" frameborder="0" controls
                    allowfullscreen></video>
                <script>
                    let player = videojs('video', {
                        controls: true,
                        autoplay: false,
                        preload: 'auto'
                    });
                    
                </script>
            </div>
            <div id="mark-as-read-div">
                <div class="subject-action complete-task read-action-dev clearfix mt-3">
                    <livewire:complete-course :lesson="$lesson" />


                </div>




            </div>

            <div class="container-fluid lecture_desc info-item">

            </div>


            <div class="lecture-comments info-item mt-4">
                <div id="comments">




                    <form class="new_comment" accept-charset="UTF-8" method="post" wire:submit.prevent="addComment()">
                        <div class="well add-comment form-group">
                            <textarea wire:model.defer="body" rows="2" class="comment-text not-discussion form-control"
                                placeholder="لديك سؤال أو استفسار عن شيء في المحتوى؟ أو تود المشاركة في النقاش على هذا المحتوى ؟"></textarea>
                            <x-input-error :messages="$errors->get('body')" class="mt-2 text-danger"
                                style="margin-right: 30px !important" />
                        </div>
                        <div class="control-group controls_btn">
                            <div class="controls">
                                <button type="submit"
                                    class="btn btn-primary small-btn add_comment_button add_comment_button_dev">أضف
                                    تعليقا</button>
                            </div>
                        </div>
                    </form>

                    <ul class="container-fluid p-0" id="comments_ul_322">
                        <!-- define comments order -->
                        @foreach ($comments as $comment)
                            <li class="comment-block main-comment not-wall" id="comment_block_7755">
                                <div class="row no-gutters id-comment py-2 pr-3">
                                    <div class="user-small col-2 col-sm-1  ">
                                        <a
                                            href="{{ $comment->user->who_can_view == true ? route('user.page', $comment->user) : '#' }}">
                                            <img src="{{ isset($comment->user->avatar) ? route('get.avatar', $comment->user) : asset('default-logo.png') }}"
                                                style="display: inline;">

                                        </a>
                                    </div>
                                    <div class="comment-content  col-10 col-sm-11">


                                        <h5><a class="user-link" id="user_18411"
                                                href="{{ $comment->user->who_can_view == true ? route('user.page', $comment->user) : '#' }}">{{ $comment->user->name }}</a>
                                        </h5>
                                        <p>{{ $comment->body }}</p>

                                        <div class="post-acions">
                                            <span class="comment-date">{{ $comment->created_at }}</span>
                                            <a href="javascript:void(0)" class="like-comment"
                                                wire:click="like({{ $comment->id }})"><i
                                                    class="icon-thumbs-up site-icons"></i> <span
                                                    id="comment_like_count_7755"
                                                    class="likesCount">{{ $comment->likes }}</span></a>

                                        </div>
                                    </div>

                                    <div class="reply reply col-11 offset-1 pl-3 pl-3" id="reply_7755"
                                        style="display:block">
                                        <form class="reply_form_class_dev" accept-charset="UTF-8" data-remote="true"
                                            method="post">
                                            <div class="well add-comment">
                                                <textarea wire:model.defer="body" wire:keydown.enter="addComment({{ $comment->id }})" rows="2"
                                                    id="reply_body_7755" class="reply_body comment-mobile-text form-control" name="comment[body]"></textarea>
                                                <input type="submit" name="commit" value="أرسل"
                                                    class="btn btn-primary small-btn add_comment_button add_comment_button_dev comment-mobile-submit"
                                                    id="reply_form_7755-submit" data-disable-with="أرسل">
                                            </div>
                                        </form>
                                    </div>

                                </div>
                                <div class="row-fluid child-comment" id="sub-comments-7755" style="">
                                    <ul class="sub-comments container-fluid" id="sub-comments-ul-7755">
                                        <!-- setting lazy_load -->


                                        @foreach ($comment->replies as $reply)
                                            <li class="comment-block not-wall" id="comment_block_7876">
                                                <div class="row no-gutters id-comment py-2 pr-3">
                                                    <div class="user-small col-2 col-sm-1  ">
                                                        @if ($reply->is_instructor == true)
                                                            <a
                                                                href="{{ route('instructor.page', $course->instructor) }}">
                                                                <img src="{{ isset($reply->user->avatar) && $reply->user->avatar != '' ? route('instructor.avatar', $reply->user) : asset('default-logo.png') }}"
                                                                    style="display: inline;">

                                                            </a>
                                                        @else
                                                            <a
                                                                href="{{ $reply->user->who_can_view == true ? route('user.page', $reply->user) : '#' }}">
                                                                <img src="{{ $reply->user->avatar != false ? route('get.avatar', $reply->user) : asset('default-logo.png') }}"
                                                                    style="display: inline;">

                                                            </a>
                                                        @endif
                                                    </div>
                                                    <div class="comment-content  col-10 col-sm-11">


                                                        <h5>
                                                            @if ($reply->is_instructor == true)
                                                                <a class="user-link" id="user_7152"
                                                                    href="{{ route('instructor.page', $reply->user) }}">{{ $reply->user->name }}</a>
                                                            @else
                                                                <a class="user-link" id="user_7152"
                                                                    href="{{ $reply->user->who_can_view == true ? route('user.page', $reply->user) : '#' }}">{{ $reply->user->name }}</a>
                                                            @endif
                                                        </h5>

                                                        <p>{{ $reply->body }}</p>


                                                        <div class="post-acions">
                                                            <span class="comment-date">{{ $reply->created_at }}</span>
                                                            <a id="like_7876" wire:click="like({{ $reply->id }})"
                                                                class="like-comment" href="javascript:void(0)"
                                                                title="" data-original-title="أعجبني"><i
                                                                    class="icon-thumbs-up site-icons"></i> <span
                                                                    id="comment_like_count_7876"
                                                                    class="likesCount">{{ $reply->likes }}</span></a>
                                                        </div>
                                                    </div>


                                                </div>

                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </li>
                            <!-- setting lazy_load -->
                        @endforeach




                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
