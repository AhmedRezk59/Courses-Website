@extends('admin.layouts.master')
@section('content')
    <div class="card">


        @if (session()->has('msg'))
            <div class="alert alert-success text-bold">
                {{ session('msg') }}
            </div>
        @endif
        <div class="row">
            <div class="flex flex-row justify-content-center text-bold w-100" style="font-size: 22px">
                <h3>محتويات المادة</h3>
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
                                        <div class="mr-3 flex flex-row" style="line-height: 18px">
                                            <i class="fas fa-play ml-3"></i>
                                            <a class="text-bold underline text-primary " style="font-size: 18px"
                                                href="{{ route('admin.lessons.show', [$lesson]) }}">{{ $lesson->name }}</a>
                                        </div>
                                    @empty
                                        لايوجد دروس
                                    @endforelse
                                    {{-- end of lessons --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center flex flex-row justify-content-center mt-3">
                    <div class="alert alert-primary text-bold w-50 ">
                        لا يوجد عناوين رئيسية
                    </div>
                </div>
            @endforelse
        </div>


        <div class="row flex flex-row justify-content-around mb-4 mt-3">
            <form
                action="{{ route('admin.courses.change.state', [$course->id, \App\Enums\CourseStatus::ACCEPTED->value]) }}"
                method="post">
                @csrf
                    <button type="submit" class="btn btn-success bg-success">قبول المادة</button>
            </form>
            <form
                action="{{ route('admin.courses.change.state', [$course->id, \App\Enums\CourseStatus::REJECTED->value]) }}"
                method="post">
                @csrf
                <button type="submit" class="btn btn-danger bg-danger">رفض المادة</button>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
@endsection
