@extends('admin.layouts.master')

@section('content')

    <div class="card">
        @if (session()->has('msg'))
            <div class="alert alert-success text-bold">
                {{ session('msg') }}
            </div>
        @endif
        <form action="{{ route('admin.courses.course.update', $course->id) }}" method="post" class="dropzone" id="form">
            @csrf
            @method('put')
            <div class="row">
                <div class="form-group col-12">
                    <label for="exampleInputEmail1">اسم المادة</label>
                    <input type="name" class="form-control" required value="{{ $course->name }}" id="exampleInputEmail1"
                        name="name" placeholder="ادخل اسم المادة">
                </div>
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger text-bold" />
            </div>
            <div class="row">
                <div class="form-group col-12">
                    <label for="exampleInputEmail1">قسم المادة</label>
                    <select class="form-control" required value="{{ $course->department }}" id="exampleInputEmail1"
                        name="department_id" placeholder="اختر قسم المادة">
                        <option disabled value="">من فضلك اختر قسم المادة</option>
                        @foreach ($departments as $d)
                            <option @selected($course->department->id == $d->id) value="{{ $d->id }}">{{ $d->name }}</option>
                        @endforeach
                    </select>
                </div>
                <x-input-error :messages="$errors->get('department_id')" class="mt-2 text-danger text-bold" />
            </div>
            <div class="row">
                <div class="card card-outline card-info col-12">
                    <div class="card-body pad">
                        <div class="mb-3">
                            <label for="description">الوصف</label>
                            <textarea class="" id="description" name="description" placeholder="يمكنك كتابةالتفاصيل هنا..." required
                                id="description"
                                style="width: 100%; height: 200px; font-size: 18px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $course->description }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2 text-danger text-bold" />

                        </div>
                    </div>
                </div>
            </div>
           
            <div class="row mb-5">
                <label for="" class="mr-3">العرض التعريفى الحالى للمادة</label>
                <div class="mx-auto" style="width:90%;">
                    <video class="player" height="960px" src="{{ route('admin.play.video', $course->id) }}" controls>
                    </video>
                </div>
            </div>
            
            <div class="row d-block  mb-3" style="position: relative">
                <label for="" class="mr-3">الصورة التوضيحية الحالية للكورس</label>
                <img src="{{ route('admin.get.thumbinal', $course->id) }}" width="400" height="300"
                    style="position: relative;right: 50%;transform: translateX(50%)" alt="">
            </div>

            <div class="row">
                <div class="d-flex flex-row col-6 mt-5" style="transform: translateY(-10px)">
                    <label style="margin-right: 50px;margin-left: 20px;">هل المادة مدفوعة؟</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" @checked($course->is_paid == true) required value="1"
                            type="radio" id="customRadio1" name="is_paid">
                        <label for="customRadio1" class="custom-control-label">مدفوع</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" @checked($course->is_paid == false) required value="0"
                            type="radio" id="customRadio2" name="is_paid">
                        <label for="customRadio2" class="custom-control-label">مجانى</label>
                    </div>
                    <x-input-error :messages="$errors->get('is_paid')" class="mt-2 text-danger text-bold" />

                </div>
                <div class="form-group  col-6">
                    <label for="exampleInputPrice">السعر بالدولار الأمريكى</label>
                    <input type="number" step="any" value="{{ $course->price }}" class="form-control"
                        id="exampleInputPrice" name="price" placeholder="ادخل السعر">
                    <x-input-error :messages="$errors->get('price')" class="mt-2 text-danger text-bold" />

                </div>
            </div>

            <div class="row">
                <div class="form-group  col-6">
                    <label for="exampleInputPriceDiscount">السعر بعد الخصم بالدولار الأمريكى</label>
                    <input type="number" step="any" value="{{ $course->discount_price }}" class="form-control"
                        id="exampleInputPriceDiscount" name="discount_price" placeholder="ادخل السعر بعد الخصم">
                    <x-input-error :messages="$errors->get('discount_price')" class="mt-2 text-danger text-bold" />

                </div>

                <div class="form-group  col-6">
                    <label for="exampleInputPriceDiscountEndDate">تاريخ انتهاء الخصم</label>
                    <input type="date" class="form-control" value="{{ $course->end_discount_date }}"
                        id="exampleInputPriceDiscountEndDate" name="end_discount_date"
                        placeholder="ادخل تاريخ انتهاء الخصم">
                    <x-input-error :messages="$errors->get('end_discount_date')" class="mt-2 text-danger text-bold" />

                </div>

            </div>
            <div class="row">
                <div class="form-group  col-6">
                    <label for="exampleInputCourseStartDate">تاريخ بداية المادة</label>
                    <input type="date" class="form-control current_date" value="{{ $course->start_date }}"
                        id="exampleInputCourseStartDate" name="start_date" required
                        placeholder="ادخل تاريخ انتهاء الخصم">
                    <x-input-error :messages="$errors->get('start_date')" class="mt-2 text-danger text-bold" />

                </div>
                <div class="form-group  col-6">
                    <label for="exampleInputCourseEndDate">تاريخ انتهاء المادة</label>
                    <input type="date" class="form-control current_date" value="{{ $course->end_date }}"
                        id="exampleInputCourseEndDate" name="end_date" required placeholder="ادخل تاريخ انتهاء الخصم">
                    <x-input-error :messages="$errors->get('end_date')" class="mt-2 text-danger text-bold" />

                </div>
            </div>

            <div class="row">
                <div class="card card-outline card-info col-6">
                    <div class="card-body pad">
                        <div class="mb-3">
                            <label for="curriculum">المنهج</label>

                            <textarea class="textarea" id="curriculum" name="curriculum" placeholder="يمكنك كتابة المنهج هنا..." required
                                style="width: 100%; height: 200px; font-size: 18px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $course->curriculum }}</textarea>
                            <x-input-error :messages="$errors->get('curriculum')" class="mt-2 text-danger text-bold" />

                        </div>
                    </div>
                </div>

                <div class="card card-outline card-info col-6">
                    <div class="card-body pad">
                        <div class="mb-3">
                            <label for="target_audience">الفئة المستهدفة</label>
                            <textarea class="textarea" id="target_audience" name="target_audience"
                                placeholder="يمكنك كتابة الفئة المستهدفة هنا..." id="target_audience" required
                                style="width: 100%; height: 200px; font-size: 18px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $course->target_audience }}</textarea>
                            <x-input-error :messages="$errors->get('target_audience')" class="mt-2 text-danger text-bold" />

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card card-outline card-info col-6">
                    <div class="card-body pad">
                        <div class="mb-3">
                            <label for="outputs">المخرجات</label>
                            <textarea class="textarea" id="outputs" name="outputs" placeholder="يمكنك كتابةالمخرجات هنا..." required
                                id="outputs"
                                style="width: 100%; height: 200px; font-size: 18px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $course->outputs }}</textarea>
                            <x-input-error :messages="$errors->get('outputs')" class="mt-2 text-danger text-bold" />

                        </div>
                    </div>
                </div>

                <div class="card card-outline card-info col-6">
                    <div class="card-body pad">
                        <div class="mb-3">
                            <label for="references">المراجع</label>
                            <textarea class="textarea" id="references" name="references" placeholder="يمكنك كتابةالمراجع هنا..." required
                                id="references"
                                style="width: 100%; height: 200px; font-size: 18px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $course->references }}</textarea>
                            <x-input-error :messages="$errors->get('references')" class="mt-2 text-danger text-bold" />

                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <button type="submit" class="btn-lg btn-inline-block btn-primary bg-primary text-white mt-2">تعديل
                    المادة</button>
            </div>
        </form>

        <script>
            $("input[name='is_paid']").change(function() {
                var buttonVal = $(this).val();
                if (buttonVal == 1) {
                    $('input[name="price"]').val({{ $course->price }})
                    $('input[name="discount_price"]').val({{ $course->discount_price }})
                } else {
                    $('input[name="price"]').val(null)
                    $('input[name="discount_price"]').val(null)
                    $('input[name="end_discount_date"]').val(null)
                }
            })
        </script>


    </div>
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
                                    <a data-toggle="collapse" data-parent="#accordion"
                                        href="#collapse{{ $dir->id }}">
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
