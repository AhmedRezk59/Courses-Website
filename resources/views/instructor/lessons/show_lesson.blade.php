@extends('instructor.layouts.master')

@section('content')
    <div class="card">
        @if (session()->has('msg'))
            <div class="alert alert-success text-bold">
                {{ session('msg') }}
            </div>
        @endif
        <div class="flex flex-row justify-content-around my-3">
            <div>
                <a href="{{ route('instructor.courses.show', $lesson->directory->course) }}"
                    class="btn btn-primary d-inline-block mt-1 ml-1" style="width: 200px">الرجوع للمادة</a>

            </div>
            <div>
                <a href="{{ route('instructor.lessons.edit', $lesson) }}" class="btn btn-primary d-inline-block mt-1 ml-1"
                    style="width: 200px">تعديل الدرس</a>

            </div>
            <div>
                <form action="{{ route('instructor.lessons.destroy', $lesson) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger bg-danger d-inline-block mt-1 ml-1" style="width: 200px">حذف الدرس</button>

                </form>
            </div>
        </div>
        <div class="row mx-3">
            <div class="form-group col-12">
                <label for="exampleInputName1">اسم الدرس</label>
                <input type="name" disabled class="form-control" value="{{ $lesson->name }}" id="exampleInputName1"
                    name="name">
            </div>
        </div>
        <div class="row card mx-3">
            <div class="row mb-5">
                <label for="" class="mr-3">الفيديو الحالى للدرس</label>
                <div class="mx-auto" style="width:90%;">
                    <video class="player" height="960px" src="{{ route('instructor.get.lesson', [$lesson->id]) }}" controls>
                    </video>
                </div>
            </div>
        </div>
    </div>
@endsection
