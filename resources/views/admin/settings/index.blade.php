@extends('admin.layouts.master')
@section('content')
    <div class="card">
        @if (session()->has('msg'))
            <div class="alert alert-success text-bold">
                {{session('msg')}}
            </div>
        @endif
        <form action="{{ route('admin.settings.update') }}" method="post">
            @csrf
            @method('put')
            <div class="row mx-3">
                <div class="form-group col-12">
                    <label for="exampleInputName1">تويتر</label>
                    <input type="text" class="form-control" value="{{ $settings->twitter ?? '' }}" id="exampleInputName1"
                        name="twitter" placeholder="ادخل تويتر">
                    <x-input-error :messages="$errors->get('twitter')" class="mt-2 text-danger text-bold" />
                </div>
            </div>

            <div class="row mx-3">
                <div class="form-group col-12">
                    <label for="exampleInputName1">فيسبوك</label>
                    <input type="text" class="form-control" value="{{ $settings->facebook ?? '' }}" id="exampleInputName1"
                        name="facebook" placeholder="ادخل فيسبوك">
                    <x-input-error :messages="$errors->get('facebook')" class="mt-2 text-danger text-bold" />
                </div>
            </div>

            <div class="row mx-3">
                <div class="form-group col-12">
                    <label for="exampleInputName1">البريد الإلكترونى</label>
                    <input type="text" class="form-control" value="{{ $settings->contact_mail ?? '' }}" id="exampleInputName1"
                        name="contact_mail" placeholder="ادخل البريد الإلكترونى">
                    <x-input-error :messages="$errors->get('contact_mail')" class="mt-2 text-danger text-bold" />
                </div>
            </div>

            <div class="row mx-3">
                <div class="form-group col-12">
                    <label for="exampleInputName1">إنستاغرام</label>
                    <input type="text" class="form-control" value="{{ $settings->instagram ?? '' }}" id="exampleInputName1"
                        name="instagram" placeholder="ادخل إنستاغرام">
                    <x-input-error :messages="$errors->get('instagram')" class="mt-2 text-danger text-bold" />
                </div>
            </div>

            <div class="row mx-3">
                <div class="form-group col-12">
                    <label for="exampleInputName1">يوتيوب</label>
                    <input type="text" class="form-control" value="{{ $settings->youtube ?? '' }}" id="exampleInputName1"
                        name="youtube" placeholder="ادخل يوتيوب">
                    <x-input-error :messages="$errors->get('youtube')" class="mt-2 text-danger text-bold" />
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <button type="submit" class="btn-lg btn-inline-block btn-primary bg-primary text-white mt-2">تحديث إعدادات
                    الموقع</button>
            </div>
        </form>
    </div>
@endsection
