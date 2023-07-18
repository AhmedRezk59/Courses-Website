@extends('admin.layouts.master')

@section('content')
    <div class="card">
        <div class="flex flex-row justify-end mt-3 ml-3">
            <form action="{{route('admin.departments.destroy' , $department)}}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-danger " type="submit"  style="float: left">
                    حذف القسم
                </button>
            </form>
        </div>
        <form action="{{ route('admin.departments.update' , $department) }}" method="post">
            @csrf
            @method('put')
            <div class="row mx-3">
                <div class="form-group col-12">
                    <label for="exampleInputName1">اسم القسم</label>
                    <input type="name" class="form-control" value="{{ $department->name }}" id="exampleInputName1"
                        name="name" placeholder="ادخل اسم القسم">
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger text-bold" />
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <button type="submit" class="btn-lg btn-inline-block btn-primary bg-primary text-white mt-2">تعديل
                    القسم</button>
            </div>
        </form>
    </div>
@endsection
