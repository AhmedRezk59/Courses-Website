@extends('admin.layouts.master')

@section('content')
    <div class="card">
        @if (session()->has('msg'))
            <div class="alert alert-success text-bold">
                {{ session('msg') }}
            </div>
        @endif
        <div class="flex flex-row justify-content-around my-3">
            <div>
                <a href="{{ route('admin.courses.show', $lesson->directory->course) }}"
                    class="btn btn-primary d-inline-block mt-1 ml-1" style="width: 200px">الرجوع للمادة</a>

            </div>
        </div>
        <div class="row mx-3">
            <div class="form-group col-12">
                <label for="exampleInputName1">اسم الدرس</label>
                <input type="name" disabled class="form-control" value="{{ $lesson->name }}" id="exampleInputName1"
                    name="name">
            </div>
        </div>
        <div class="row card mx-3 col-12">
            <label for="" class="mr-3">الفيديو الحالى للدرس</label>
            <div class="" style="margin-right: 100px">
                <div style="margin: auto">
                    <video class="player " width="95%" height="960px"
                        src="{{ route('admin.get.lesson', [$lesson->id]) }}" controls>
                    </video>
                    <script>
                        let player = videojs('video', {
                            controls: true,
                            autoplay: false,
                            preload: 'auto'
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
