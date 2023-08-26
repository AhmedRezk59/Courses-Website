@extends('instructor.layouts.master')
@section('content')
    <div class="card">
        <div class="row flex flex-row justify-content-around mb-4 mt-3">
            <a href="{{ route('instructor.courses.edit', $course->id) }}" class="btn btn-primary">
                تعديل
            </a>
            <a href="{{ route('instructor.announcement.create', $course->id) }}" class="btn btn-primary">
                إضافة تنويه
            </a> 
            <a href="{{ route('instructor.quiz.create', $course->id) }}" class="btn btn-primary">
                الإختبار النهائى
            </a>
            @if (DB::table('course_user')->where('course_id', $course->id)->count() == 0)
                <button type="button" data-course_id="{{ $course->id }}" wire:click="changeRoute({{ $course->id }})"
                    class="btn btn-danger bg-danger modal-delete" data-toggle="modal" data-target="#modal-lg">
                    حذف
                </button>
            @endif
        </div>
        @if (DB::table('course_user')->where('course_id', $course->id)->count() == 0)
            <div class="modal fade" id="modal-lg">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">حذف مادة {{ $course->name }}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>هل تريد حذف هذه المادة؟</p>
                        </div>
                        <form action="{{ route('instructor.courses.destroy', $course->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-primary bg-primary"
                                    data-dismiss="modal">إغلاق</button>
                                <button type="submit" class="btn btn-danger bg-danger">حذف</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        @endif
        @if (session()->has('msg'))
            <div class="alert alert-success text-bold">
                {{ session('msg') }}
            </div>
        @endif

        <div class="row">
            @if (count($course->directories) > 0)
                <div class="col-12 text-center flex flex-row justify-content-center">
                    <div class="alert alert-primary text-bold w-25 ">
                        <a href="{{ route('instructor.directories.create', $course->id) }}">إضافة
                            عنوان رئيسى؟</a>
                    </div>
                </div>
            @endif
            <div class="flex flex-row justify-content-center text-bold w-100" style="font-size: 22px">
                <h2>محتويات المادة</h2>
            </div>
            @forelse ($course->directories as $dir)
                <div class="card-body col-9 mx-auto">
                    <div id="accordion">
                        <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->
                        <div class="card card-primary mb-0">
                            <div class="card-header">
                                <h4 class="card-title text-right" style="float: right !important">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $dir->id }}">
                                        {{ $dir->name }}
                                    </a>
                                </h4>

                            </div>
                            <div id="collapse{{ $dir->id }}" class="panel-collapse collapse in">
                                <div class="card-body" style="visibility: visible">
                                    {{-- start of lessons --}}

                                    @forelse ($dir->lessons as $lesson)
                                        <div class="mr-3 flex flex-row mt-3" style="line-height: 18px">
                                            <i class="fas fa-play ml-3"></i>
                                            <a class="text-bold underline text-primary " style="font-size: 18px"
                                                href="{{ route('instructor.lessons.show', [$lesson]) }}">{{ $lesson->name }}</a>
                                        </div>
                                    @empty
                                        لايوجد دروس <a class="text-bold underline text-primary mt-3" style="font-size: 18px"
                                            href="{{ route('instructor.lessons.create', [$course, $dir]) }}">إضافة
                                            درس؟</a>
                                    @endforelse
                                    @if (count($dir->lessons) > 0)
                                        <div class="mt-2">
                                            <a class="text-bold underline text-primary mr-5" style="font-size: 18px;"
                                                href="{{ route('instructor.lessons.create', [$course, $dir]) }}">إضافة
                                                درس؟</a>
                                        </div>
                                    @endif
                                    {{-- end of lessons --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="flex flex-row justify-content-around mt-4 ml-2">
                    <a href="{{ route('instructor.directories.edit', $dir->id) }}"
                        style="float: left !important ; height: 38px;margin-top: 5px"
                        class="btn btn-primary bg-primary">تعديل
                        العنوان الرئيسى</a>

                    <form action="{{ route('instructor.directories.destroy', $dir->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger bg-danger ml-2"
                            style="float: left !important;margin-left: 10px; height: 38px ;margin-top: 5px">حذف العنوان
                            الرئيسى</button>
                    </form>
                </div>
            @empty
                <div class="col-12 text-center flex flex-row justify-content-center mt-3">
                    <div class="alert alert-primary text-bold w-50 ">
                        لا يوجد عناوين رئيسية <a href="{{ route('instructor.directories.create', $course->id) }}">إضافة
                            عنوان رئيسى؟</a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
