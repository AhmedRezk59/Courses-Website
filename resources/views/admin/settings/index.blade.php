@extends('admin.layouts.master')
@section('content')
    <div class="card">
        @if (session()->has('msg'))
            <div class="alert alert-success text-bold">
                {{ session('msg') }}
            </div>
        @endif
        <form action="{{ route('admin.settings.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="row mx-3">
                <div class="form-group col-12">
                    <label for="exampleInputName1">الصورة الرئيسية</label>
                    <input type="file" class="form-control col-12" id="exampleInputName1" name="banner">
                    <x-input-error :messages="$errors->get('banner')" class="mt-2 text-danger text-bold" />
                </div>
            </div>
            <div class="row mx-3">
                <div class="form-group col-12">
                    <label for="exampleInputName1">الصورة الجانبية لصفحة المواد</label>
                    <input type="file" class="form-control col-12" id="exampleInputName1" name="courses_cover">
                    <x-input-error :messages="$errors->get('courses_cover')" class="mt-2 text-danger text-bold" />
                </div>
            </div>


            <div class="row mx-3">
                <div class="form-group col-12">
                    <label for="exampleInputName1">العنوان البديل للمواد المرتقبة</label>
                    <input type="text" class="form-control col-12" id="exampleInputName1"
                        value="{{ $settings->waited_lectures_name }}" name="waited_lectures_name" />
                    <x-input-error :messages="$errors->get('waited_lectures_name')" class="mt-2 text-danger text-bold" />
                </div>
            </div>

            <div class="row mx-3">
                <div class="form-group col-12">
                    <label for="exampleInputName1">العنوان البديل للمواد الحالية</label>
                    <input type="text" class="form-control col-12" id="exampleInputName1"
                        value="{{ $settings->current_lectures_name }}" name="current_lectures_name" />
                    <x-input-error :messages="$errors->get('current_lectures_name')" class="mt-2 text-danger text-bold" />
                </div>
            </div>

            <div class="row mx-3">
                <div class="form-group col-12">
                    <label for="exampleInputName1">محاضرات مرئية</label>
                    <textarea class="form-control col-12" id="exampleInputName1" name="seen_lectures">{{ $settings->seen_lectures }}</textarea>
                    <x-input-error :messages="$errors->get('seen_lectures')" class="mt-2 text-danger text-bold" />
                </div>
            </div>
            <div class="row mx-3">
                <div class="form-group col-12">
                    <label for="exampleInputName1">صورة المحاضرات المرئية</label>
                    <input type="file" class="form-control col-12" id="exampleInputName1" name="seen_lectures_image">
                    <x-input-error :messages="$errors->get('seen_lectures_image')" class="mt-2 text-danger text-bold" />
                </div>
            </div>

            <div class="row mx-3">
                <div class="form-group col-12">
                    <label for="exampleInputName1">تمارين تفاعلية</label>
                    <textarea class="form-control col-12" id="exampleInputName1" name="training">{{ $settings->training }}</textarea>
                    <x-input-error :messages="$errors->get('training')" class="mt-2 text-danger text-bold" />
                </div>
            </div>
            <div class="row mx-3">
                <div class="form-group col-12">
                    <label for="exampleInputName1">صورة التمارين التفاعلية</label>
                    <input type="file" class="form-control col-12" id="exampleInputName1" name="training_image">
                    <x-input-error :messages="$errors->get('training_image')" class="mt-2 text-danger text-bold" />
                </div>
            </div>
            <div class="row mx-3">
                <div class="form-group col-12">
                    <label for="exampleInputName1">شهادات إكمال</label>
                    <textarea class="form-control col-12" id="exampleInputName1" name="certificates">{{ $settings->certificates }}</textarea>
                    <x-input-error :messages="$errors->get('certificates')" class="mt-2 text-danger text-bold" />
                </div>
            </div>
            <div class="row mx-3">
                <div class="form-group col-12">
                    <label for="exampleInputName1">صورة شهادات إكمال</label>
                    <input type="file" class="form-control col-12" id="exampleInputName1" name="certificates_image">
                    <x-input-error :messages="$errors->get('certificates_image')" class="mt-2 text-danger text-bold" />
                </div>
            </div>
            <div class="row mx-3">
                <div class="form-group col-12">
                    <label for="exampleInputName1">مجتمع تعليمي</label>
                    <textarea class="form-control col-12" id="exampleInputName1" name="community">{{ $settings->community }}</textarea>
                    <x-input-error :messages="$errors->get('community')" class="mt-2 text-danger text-bold" />
                </div>
            </div>
            <div class="row mx-3">
                <div class="form-group col-12">
                    <label for="exampleInputName1">صورة المجتمع تعليمي</label>
                    <input type="file" class="form-control col-12" id="exampleInputName1" name="community_image">
                    <x-input-error :messages="$errors->get('community_image')" class="mt-2 text-danger text-bold" />
                </div>
            </div>
            <div class="row mx-3">
                <div class="form-group col-12">
                    <label for="exampleInputName1">هدف الطالب</label>
                    <textarea class="form-control col-12" id="exampleInputName1" name="student">{{ $settings->student }}</textarea>
                    <x-input-error :messages="$errors->get('student')" class="mt-2 text-danger text-bold" />
                </div>
            </div>
            <div class="row mx-3">
                <div class="form-group col-12">
                    <label for="exampleInputName1">صورة الطالب</label>
                    <input type="file" class="form-control col-12" id="exampleInputName1" name="student_image">
                    <x-input-error :messages="$errors->get('student_image')" class="mt-2 text-danger text-bold" />
                </div>
            </div>
            <div class="row mx-3">
                <div class="form-group col-12">
                    <label for="exampleInputName1">هدف الموظف</label>
                    <textarea class="form-control col-12" id="exampleInputName1" name="employee">{{ $settings->employee }}</textarea>
                    <x-input-error :messages="$errors->get('employee')" class="mt-2 text-danger text-bold" />
                </div>
            </div>
            <div class="row mx-3">
                <div class="form-group col-12">
                    <label for="exampleInputName1">صورة الموظف</label>
                    <input type="file" class="form-control col-12" id="exampleInputName1" name="employee_image">
                    <x-input-error :messages="$errors->get('employee_image')" class="mt-2 text-danger text-bold" />
                </div>
            </div>
            <div class="row mx-3">
                <div class="form-group col-12">
                    <label for="exampleInputName1">هدف الباحث عن وظيفة</label>
                    <textarea class="form-control col-12" id="exampleInputName1" name="job_searcher">{{ $settings->job_searcher }}</textarea>
                    <x-input-error :messages="$errors->get('job_searcher')" class="mt-2 text-danger text-bold" />
                </div>
            </div>
            <div class="row mx-3">
                <div class="form-group col-12">
                    <label for="exampleInputName1">صورة الباحث عن وظيفة</label>
                    <input type="file" class="form-control col-12" id="exampleInputName1" name="job_searcher_image">
                    <x-input-error :messages="$errors->get('job_searcher_image')" class="mt-2 text-danger text-bold" />
                </div>
            </div>
            <div class="row mx-3">
                <div class="form-group col-12">
                    <label for="exampleInputName1">هدف الباحث عن المعرفة</label>
                    <textarea class="form-control col-12" id="exampleInputName1" name="knowledge_seeker">{{ $settings->knowledge_seeker }}</textarea>
                    <x-input-error :messages="$errors->get('knowledge_seeker')" class="mt-2 text-danger text-bold" />
                </div>
            </div>
            <div class="row mx-3">
                <div class="form-group col-12">
                    <label for="exampleInputName1">صورة الباحث عن المعرفة</label>
                    <input type="file" class="form-control col-12" id="exampleInputName1"
                        name="knowledge_seeker_image">
                    <x-input-error :messages="$errors->get('knowledge_seeker_image')" class="mt-2 text-danger text-bold" />
                </div>
            </div>
            <div class="row mx-3">
                <div class="form-group col-12">
                    <label for="exampleInputName1">تويتر</label>
                    <input type="text" class="form-control" value="{{ $settings->twitter ?? '' }}"
                        id="exampleInputName1" name="twitter" placeholder="ادخل تويتر">
                    <x-input-error :messages="$errors->get('twitter')" class="mt-2 text-danger text-bold" />
                </div>
            </div>

            <div class="row mx-3">
                <div class="form-group col-12">
                    <label for="exampleInputName1">فيسبوك</label>
                    <input type="text" class="form-control" value="{{ $settings->facebook ?? '' }}"
                        id="exampleInputName1" name="facebook" placeholder="ادخل فيسبوك">
                    <x-input-error :messages="$errors->get('facebook')" class="mt-2 text-danger text-bold" />
                </div>
            </div>

            <div class="row mx-3">
                <div class="form-group col-12">
                    <label for="exampleInputName1">البريد الإلكترونى</label>
                    <input type="text" class="form-control" value="{{ $settings->contact_mail ?? '' }}"
                        id="exampleInputName1" name="contact_mail" placeholder="ادخل البريد الإلكترونى">
                    <x-input-error :messages="$errors->get('contact_mail')" class="mt-2 text-danger text-bold" />
                </div>
            </div>

            <div class="row mx-3">
                <div class="form-group col-12">
                    <label for="exampleInputName1">إنستاغرام</label>
                    <input type="text" class="form-control" value="{{ $settings->instagram ?? '' }}"
                        id="exampleInputName1" name="instagram" placeholder="ادخل إنستاغرام">
                    <x-input-error :messages="$errors->get('instagram')" class="mt-2 text-danger text-bold" />
                </div>
            </div>

            <div class="row mx-3">
                <div class="form-group col-12">
                    <label for="exampleInputName1">يوتيوب</label>
                    <input type="text" class="form-control" value="{{ $settings->youtube ?? '' }}"
                        id="exampleInputName1" name="youtube" placeholder="ادخل يوتيوب">
                    <x-input-error :messages="$errors->get('youtube')" class="mt-2 text-danger text-bold" />
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <button type="submit" class="btn-lg btn-inline-block btn-primary bg-primary text-white mt-2">تحديث
                    إعدادات
                    الموقع</button>
            </div>
        </form>
    </div>
@endsection
