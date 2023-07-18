@extends('instructor.layouts.master')

@section('content')
    <div class="card">
        @if (session()->has('msg'))
            <div class="alert alert-success text-bold">
                {{session('msg')}}
            </div>
        @endif
            <form method="POST" action="{{ route('instructor.profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('put')

                <!-- Name -->
                <div>
                    
                    <div class="d-flex">
                    <x-input-label for="name" :value="__('اسم المستخدم')" />
                    <abbr class="req">*</abbr>
                </div>
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="auth()->guard('instructor')->user()->name"
                        required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    
                    <div class="d-flex">
                    <x-input-label for="email" :value="__('البريد الالكترونى')" />
                    <abbr class="req">*</abbr>
                </div>
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="auth()->guard('instructor')->user()->email"
                        required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <!-- job -->

                <div class="mt-4">
                    
                    <div class="d-flex">
                    <x-input-label for="job" :value="__('الوظيفة')" />
                    <abbr class="req">*</abbr>
                </div>
                    <x-text-input id="job" class="block mt-1 w-full" type="text" name="job" :value="auth()->guard('instructor')->user()->job"
                        required autocomplete="job" />
                    <x-input-error :messages="$errors->get('job')" class="mt-2" />
                </div>
                <!-- Description -->
                <div class="mt-4">
                    
<div class="d-flex">
                    <x-input-label for="description" :value="__('الوصف')" />
                    <abbr class="req">*</abbr>
                </div>
                    <textarea class="block mt-1 w-full" name="description" id="description" cols="30" rows="10" required
                        autocomplete="description">{{ auth()->guard('instructor')->user()->description}}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
                <!-- gender -->

                <div class="mt-4">
                    <div class="d-flex">
                    <x-input-label for="gender" :value="__('النوع')" />
                    <abbr class="req">*</abbr>
                </div>
                    <select class="block mt-1 w-full" name="gender" id="gender"required autocomplete="gender" >
                        <option value="">من فضلك اختر النوع</option>
                        <option @selected(auth()->guard('instructor')->user()->gender == 'ذكر') value="ذكر">ذكر</option>
                        <option @selected(auth()->guard('instructor')->user()->gender =='أنثى') value="أنثى">أنثى</option>
                    </select>
                    <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                </div>
                <!-- country -->

                <div class="mt-4">
                  
                    <div class="d-flex">
                      <x-input-label for="country" :value="__('الدولة')" />
                    <abbr class="req">*</abbr>
                </div>
                    <x-text-input id="country" class="block mt-1 w-full" type="text" name="country" :value="auth()->guard('instructor')->user()->country"
                       required  autocomplete="country" />
                    <x-input-error :messages="$errors->get('country')" class="mt-2" />
                </div>
                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('الرقم السرى')" />

                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" 
                        autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('تأكيد الرقم السرى')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation"  autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="avatar" :value="__('صورة المحاضر')" />

                    <input type="file" name="avatar"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />

                    <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
                </div>

                <div class="flex items-center text-center justify-end mt-4">

                    <x-primary-button class="ml-4">
                        {{ __('تحديث البيانات') }}
                    </x-primary-button>
                </div>
            </form>

    </div>
@endsection
