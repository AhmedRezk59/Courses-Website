<?php

namespace App\Observers;

use App\Jobs\SendNewCommentAddedEmail;
use App\Mail\NewCommentAddedEmail;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class CommentObserver
{
    /**
     * Handle the Comment "created" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function created(Comment $comment)
    {
        if ($comment->parent_id == null) return;
        $emails = [];
        $parent = $comment->parent;
        $user_ids = $parent->replies()->where('is_instructor', false)->pluck('user_id');
        $emails = User::whereIn('id', $user_ids)->pluck('email');

        if ($comment->is_instructor == false && $parent->user->comments_mailable == true) {
            $emails->push($parent->user->email);
        }

        if (($comment->is_instructor == false && $parent->user->comments_mailable == false) || ($comment->is_instructor == false && $parent->user_id == $comment->user_id)) {
            $emails = $emails->diff([$parent->user->email]);
        }

        if ($comment->is_instructor == true) {
            $emails[] = $parent->user->email;
        }
        $emails = $emails->unique()->filter();
        $emails = $emails->diff([$comment->user->email]);
        if (!$emails->isEmpty()) {
            dispatch(new SendNewCommentAddedEmail($emails, $comment));
        }
    }

    /**
     * Handle the Comment "updated" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function updated(Comment $comment)
    {
        //
    }

    /**
     * Handle the Comment "deleted" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function deleted(Comment $comment)
    {
        //
    }

    /**
     * Handle the Comment "restored" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function restored(Comment $comment)
    {
        //
    }

    /**
     * Handle the Comment "force deleted" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function forceDeleted(Comment $comment)
    {
        //
    }
}
