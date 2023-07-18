<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('شكرا للتسجيل! ينبغى عليك تأكيد بريدك الإلكترونى.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('تم إرسال بريد إلكترونى جديد إلى حسابك.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('instructor.verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('إعادة إرسال بريد التأكيد') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('instructor.logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('تسجيل الخروج') }}
            </button>
        </form>
    </div>
</x-guest-layout>
