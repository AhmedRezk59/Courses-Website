<x-guest-layout>
    <form method="POST" action="{{ route('instructor.register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('اسم المستخدم')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('البريد الالكترونى')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!-- job -->

        <div class="mt-4">
            <x-input-label for="job" :value="__('الوظيفة')" />
            <x-text-input id="job" class="block mt-1 w-full" type="text" name="job" :value="old('job')"
                required autocomplete="job" />
            <x-input-error :messages="$errors->get('job')" class="mt-2" />
        </div>
        <!-- Description -->
        <div class="mt-4">
            <x-input-label for="description" :value="__('الوصف')" />

            <textarea class="block mt-1 w-full" name="description" id="description" cols="30" rows="10" required
                autocomplete="description">{{ old('description') }}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>
        <!-- gender -->

        <div class="mt-4">
            <x-input-label for="gender" :value="__('النوع')" />
            <select class="block mt-1 w-full" name="gender" id="gender"required autocomplete="gender"
                value="{{ old('gender', '') }}">
                <option value="">من فضلك اختر النوع</option>
                <option value="ذكر">ذكر</option>
                <option value="أنثى">أنثى</option>
            </select>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>
        <!-- country -->

        <div class="mt-4">
            <x-input-label for="country" :value="__('الدولة')" />
            <x-text-input id="country" class="block mt-1 w-full" type="text" name="country" :value="old('country')"
                required autocomplete="country" />
            <x-input-error :messages="$errors->get('country')" class="mt-2" />
        </div>
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('الرقم السرى')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('تأكيد الرقم السرى')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="avatar" :value="__('صورة المحاضر')" />

            <input type="file" name="avatar"
                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />

            <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('instructor.login') }}">
                {{ __('مسجل بالفعل') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('تسجيل') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
