<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Discussion extends Component
{
    public $course;
    public $body = '';
    public $comments;
    protected $validationAttributes = [
        'body' => 'التعليق'
    ];

    protected $rules = [
        'body' => 'required|string|max:255',
    ];

    public function getComments()
    {
        $this->comments = Comment::where('course_id', $this->course->id)
            ->where('parent_id', null)
            ->where('lesson_id', null)
            ->with([

                'replies'
            ])
            ->get();
    }

    public function mount($course)
    {
        $this->course = $course;
        $this->getComments();
    }

    public function addComment($parent_id = null)
    {
        $this->validate();
        $data = [
            'body' => $this->body,
            'user_id' => auth()->user()->id,
            'course_id' => $this->course->id,
        ];
        if (isset($parent_id)) {
            $data['parent_id'] = $parent_id;
        }
        $comment = Comment::create($data);
        if ($parent_id != null) {
            $comment->parent->update([
                'is_read' => false
            ]);
        }
        $this->getComments();
        $this->body = '';
    }

    public function like($id)
    {
        $count = DB::table('comment_user')->where('user_id', auth()->user()->id)->where('comment_id', $id)->count();
        if ($count == 0) {
            DB::table('comment_user')->insert([
                'comment_id' => $id,
                'user_id' => auth()->user()->id
            ]);
        } else {
            DB::table('comment_user')->where('comment_id', $id)->where('user_id', auth()->user()->id)->delete();
        }
        $this->getComments();
        $this->body = '';
    }
    public function render()
    {
        return view('user.livewire.discussion');
    }
}
