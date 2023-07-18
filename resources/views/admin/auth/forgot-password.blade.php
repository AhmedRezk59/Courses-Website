<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('من فضلك قم بكتابة بريدك الالكترونى وسنرسل لك بريدا بكيفية إعادة إنشاء كلمة السر.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('admin.password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('البريد الإلكترونى')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('إرسال بريد إعادة التعيين') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
