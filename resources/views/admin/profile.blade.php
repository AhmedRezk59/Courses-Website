@extends('admin.layouts.master')

@section('content')
    <div class="card">
        @if (session()->has('msg'))
            <div class="alert alert-success text-bold">
                {{ session('msg') }}
            </div>
        @endif
        <form method="POST" action="{{ route('admin.profile.update') }}">
            @csrf
            @method('put')

            <!-- Name -->
            <div>


                <div class="d-flex">
                    <x-input-label for="name" :value="__('اسم المستخدم')" />
                    <abbr class="req">*</abbr>
                </div>
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="auth()
                    ->guard('admin')
                    ->user()->name" required
                    autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                
                <div class="d-flex">
                    <x-input-label for="email" :value="__('البريد الالكترونى')" />
                    <abbr class="req">*</abbr>
                </div>
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="auth()
                    ->guard('admin')
                    ->user()->email"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <!-- job -->



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
                    name="password_confirmation" autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>


            <div class="flex items-center text-center justify-end mt-4">

                <x-primary-button class="ml-4">
                    {{ __('تحديث البيانات') }}
                </x-primary-button>
            </div>
        </form>

    </div>
@endsection
