@extends('instructor.layouts.master')

@section('content')
    <div class="card">
        <form action="{{ route('instructor.lessons.update', [$lesson->id]) }}" method="post">
            @csrf
            @method('put')
            <div class="row mx-3">
                <div class="form-group col-12">
                    <label for="exampleInputName1">اسم الدرس</label>
                    <input type="name" class="form-control" value="{{ $lesson->name }}" id="exampleInputName1" name="name"
                        placeholder="ادخل اسم الدرس الرئيسى">
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger text-bold" />
                </div>
            </div>
            <div class="row card mx-3">
                <div class=" col-12">
                    <label for="file">ملف الفيديو الخاص بالدرس</label>
                    <input type="file" name="video" />
                </div>
                @if ($errors->get('video'))
                    <ul style="position: absolute;left: 50%;transform: translateX(-50%)"
                        class="text-sm text-red-600 space-y-1 mt-2 text-danger text-bold" dir="rtl">
                        @foreach ((array) $errors->get('video') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="row mb-5">
                    <label for="" class="mr-3">الفيديو الحالى للدرس</label>
                    <div class="mx-auto" style="width:90%;">
                        <video class="player" height="960px" src="{{ route('instructor.get.lesson', [$lesson->id]) }}"
                            controls>
                        </video>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <button type="submit" class="btn-lg btn-inline-block btn-primary bg-primary text-white mt-2">تعديل
                    الدرس</button>
            </div>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            FilePond.create(document.querySelector('input[name="video"]'), {
                server: {
                    url: '{{ route('instructor.course.upload.lesson') }}',
                    headers: {
                        'X-CSRF-TOKEN': "{{ @csrf_token() }}",
                    },
                    chunkUploads: true,
                    chunkSize: 2000000
                },
            });
        });
    </script>
@endsection
