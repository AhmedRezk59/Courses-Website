@extends('admin.layouts.master')

@section('content')
    <div class="card">
        <form action="{{ route('admin.currencies.store') }}" method="post">
            @csrf
            <div class="row mx-3">
                <div class="form-group col-12">
                    <label for="exampleInputName1">اسم العملة</label>
                    <input type="name" class="form-control" value="{{ old('name') }}" id="exampleInputName1"
                        name="name" placeholder="ادخل اسم العملة">
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger text-bold" />
                </div>
            </div>
            <div class="row mx-3">
                <div class="form-group col-12">
                    <label for="exampleInputName1">كود العملة</label>
                    <input type="name" class="form-control" value="{{ old('code') }}" id="exampleInputName1"
                        name="code" placeholder="ادخل كود العملة">
                        <x-input-error :messages="$errors->get('code')" class="mt-2 text-danger text-bold" />
                </div>
            </div>
            <div class="row mx-3">
                <div class="form-group col-12">
                    <label for="exampleInputName1">سعر العملة مقارنة بالدولار الأمريكى</label>
                    <input type="name" class="form-control" value="{{ old('rate') }}" id="exampleInputName1"
                        name="rate" placeholder="ادخل كود العملة">
                        <x-input-error :messages="$errors->get('rate')" class="mt-2 text-danger text-bold" />
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <button type="submit" class="btn-lg btn-inline-block btn-primary bg-primary text-white mt-2">إنشاء
                    العملة</button>
            </div>
        </form>
    </div>
@endsection
