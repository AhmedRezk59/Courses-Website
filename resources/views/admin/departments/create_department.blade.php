@extends('admin.layouts.master')

@section('content')
    <div class="card">
        <form action="{{ route('admin.departments.store') }}" method="post">
            @csrf
            <div class="row mx-3">
                <div class="form-group col-12">
                    <label for="exampleInputName1">اسم القسم</label>
                    <input type="name" class="form-control" value="{{ old('name') }}" id="exampleInputName1"
                        name="name" placeholder="ادخل اسم القسم">
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger text-bold" />
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <button type="submit" class="btn-lg btn-inline-block btn-primary bg-primary text-white mt-2">إنشاء
                    القسم</button>
            </div>
        </form>
    </div>
@endsection
