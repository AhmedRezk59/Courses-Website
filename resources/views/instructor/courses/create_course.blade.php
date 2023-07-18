@extends('instructor.layouts.master')

@section('content')
    <form action="{{ route('instructor.courses.store') }}" method="post" class="dropzone" id="form">
        @csrf
        <div class="row">
            <div class="form-group col-12">
                <label for="exampleInputEmail1">اسم المادة</label>
                <input type="name" class="form-control" required value="{{ old('name') }}" id="exampleInputEmail1"
                    name="name" placeholder="ادخل اسم المادة">
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger text-bold" />
        </div>
      <div class="row">
            <div class="form-group col-12">
                <label for="exampleInputEmail1">قسم المادة</label>
                <select class="form-control" required
                    id="exampleInputEmail1" name="department_id" placeholder="اختر قسم المادة">
                    <option selected disabled value="">من فضلك اختر قسم المادة</option>
                    @foreach ($departments as $d)
                        <option value="{{ $d->id }}">{{ $d->name }}</option>
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
                        <textarea id="description" name="description" placeholder="يمكنك كتابةالتفاصيل هنا..." required id="description"
                            style="width: 100%; height: 200px; font-size: 18px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('description') }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2 text-danger text-bold" />

                    </div>
                </div>
            </div>
        </div>
        <div class="row card">
            <div class=" col-12">
                <label for="file">العرض التوضيحى للمادة</label>
                <input type="file" name="trailer" />
            </div>
            @if ($errors->get('trailer'))
                <ul style="position: absolute;left: 50%;transform: translateX(-50%)"
                    class="text-sm text-red-600 space-y-1 mt-2 text-danger text-bold" dir="rtl">
                    @foreach ((array) $errors->get('trailer') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif

        </div>
        <div class="row card">
            <div class=" col-12">
                <label for="file">الصورة التوضيحية للكورس</label>
                <input type="file" name="thumbinal" />
            </div>
            @if ($errors->get('thumbinal'))
                <ul style="position: absolute;left: 50%;transform: translateX(-50%)"
                    class="text-sm text-red-600 space-y-1 mt-2 text-danger text-bold" dir="rtl">
                    @foreach ((array) $errors->get('thumbinal') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="row">
            <div class="d-flex flex-row col-6 mt-5" style="transform: translateY(-10px)">
                <label style="margin-right: 50px;margin-left: 20px;">هل المادة مدفوعة؟</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" required value="1" type="radio" id="customRadio1"
                        name="is_paid">
                    <label for="customRadio1" class="custom-control-label">مدفوع</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" required value="0" type="radio" id="customRadio2"
                        name="is_paid">
                    <label for="customRadio2" class="custom-control-label">مجانى</label>
                </div>
                <x-input-error :messages="$errors->get('is_paid')" class="mt-2 text-danger text-bold" />

            </div>
            <div class="form-group  col-6">
                <label for="exampleInputPrice">السعر بالدولار الأمريكى</label>
                <input type="number" step="any" value="{{ old('price') }}" class="form-control" id="exampleInputPrice"
                    name="price" placeholder="ادخل السعر">
                <x-input-error :messages="$errors->get('price')" class="mt-2 text-danger text-bold" />

            </div>
        </div>

        <div class="row">
            <div class="form-group  col-6">
                <label for="exampleInputPriceDiscount">السعر بعد الخصم بالدولار الأمريكى</label>
                <input type="number" step="any" value="{{ old('discount_price') }}" class="form-control"
                    id="exampleInputPriceDiscount" name="discount_price" placeholder="ادخل السعر بعد الخصم">
                <x-input-error :messages="$errors->get('discount_price')" class="mt-2 text-danger text-bold" />

            </div>

            <div class="form-group  col-6">
                <label for="exampleInputPriceDiscountEndDate">تاريخ انتهاء الخصم</label>
                <input type="date" class="form-control" value="{{ old('end_discount_date') }}"
                    id="exampleInputPriceDiscountEndDate" name="end_discount_date" placeholder="ادخل تاريخ انتهاء الخصم">
                <x-input-error :messages="$errors->get('end_discount_date')" class="mt-2 text-danger text-bold" />

            </div>

        </div>
        <div class="row">
            <div class="form-group  col-6">
                <label for="exampleInputCourseStartDate">تاريخ بداية المادة</label>
                <input type="date" class="form-control current_date" value="{{ old('start_date') }}"
                    id="exampleInputCourseStartDate" name="start_date" required placeholder="ادخل تاريخ انتهاء الخصم">
                <x-input-error :messages="$errors->get('start_date')" class="mt-2 text-danger text-bold" />

            </div>
            <div class="form-group  col-6">
                <label for="exampleInputCourseEndDate">تاريخ انتهاء المادة</label>
                <input type="date" class="form-control current_date" value="{{ old('end_date') }}"
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
                            style="width: 100%; height: 200px; font-size: 18px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('curriculum') }}</textarea>
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
                            style="width: 100%; height: 200px; font-size: 18px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('target_audience') }}</textarea>
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
                            style="width: 100%; height: 200px; font-size: 18px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('outputs') }}</textarea>
                        <x-input-error :messages="$errors->get('outputs')" class="mt-2 text-danger text-bold" />

                    </div>
                </div>
            </div>

            <div class="card card-outline card-info col-6">
                <div class="card-body pad">
                    <div class="mb-3">
                        <label for="references">المراجع</label>
                        <textarea class="" id="references" name="references" placeholder="يمكنك كتابةالمراجع هنا..." required
                            id="references"
                            style="width: 100%; height: 200px; font-size: 18px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('references') }}</textarea>
                        <x-input-error :messages="$errors->get('references')" class="mt-2 text-danger text-bold" />

                    </div>
                </div>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            <button type="submit" class="btn-lg btn-inline-block btn-primary bg-primary text-white mt-2">إنشاء
                المادة</button>
        </div>
    </form>
    <script>
        var date = new Date();
        var currentDate = date.toISOString().substring(0, 10);

        document.querySelectorAll('.currentDate').value = currentDate;
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
           


            FilePond.create(document.querySelector('input[name="trailer"]'), {
                server: {
                    url: '{{ route('instructor.course.upload') }}',
                    headers: {
                        'X-CSRF-TOKEN': "{{ @csrf_token() }}",
                    },
                    chunkUploads: true,
                    chunkSize: 2000000
                },
            });

            FilePond.create(document.querySelector('input[name="thumbinal"]'), {
                server: {
                    url: '{{ route('instructor.course.upload.image') }}',
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
