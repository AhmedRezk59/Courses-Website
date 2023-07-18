@extends('instructor.layouts.master')

@section('content')
    <div class="card">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>التعليق</th>
                    <th>زمن الكتابة</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($comments as $index => $comment)
                    <tr>
                        <td>{{ $index + 1 }}</td>

                        <td><a class="text-bold text-primary underline" href="{{route('instructor.comments.show' , $comment)}}">{{ $comment->body }}</a></td>
                        <td>{{ $comment->created_at }}</td>
                    </tr>
                @empty
                    <tr>
                        <td class="font-bold text-center" colspan="100">لايوجد بيانات</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div style="position:absolute;left:50%;transform:translateX(-50%)">
            {{ $comments->links() }}
        </div>
    </div>
@endsection
