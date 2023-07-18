@extends('instructor.layouts.master')

@section('content')
    <div class="card">
        @if (session()->has('msg'))
            <div class="alert alert-success text-bold">
                {{ session('msg') }}
            </div>
        @endif
        <div class=" flex flex-row justify-end">
            <a href="{{ route('instructor.courses.show', $directory->course) }}"
                class="btn btn-primary d-inline-block mt-1 ml-1" style="width: 200px">الرجوع للمادة</a>

        </div>
        <form action="{{ route('instructor.directories.update', $directory->id) }}" method="post">
            @csrf
            @method('put')
            <div class="row mx-3">
                <div class="form-group col-12">
                    <label for="exampleInputName1">اسم العنوان الرئيسى</label>
                    <input type="name" class="form-control" value="{{ $directory->name }}" id="exampleInputName1"
                        name="name" placeholder="ادخل اسم العنوان الرئيسى">
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger text-bold" />
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <button type="submit" class="btn-lg btn-inline-block btn-primary bg-primary text-white mt-2">تعديل
                    العنوان الرئيسى</button>
            </div>
        </form>
    </div>
@endsection
