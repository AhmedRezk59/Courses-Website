<?php

namespace App\Http\Livewire;

use App\Models\Currency;
use Livewire\Component;

class GeneralSettings extends Component
{
    public $whoCanView;
    public $comments_mailable;
    public $inquiry_mailable;
    public $currency_id;
    public $currencies;
    public function __construct()
    {
        $this->whoCanView = auth()->user()->who_can_view;
        $this->comments_mailable = auth()->user()->comments_mailable;
        $this->inquiry_mailable = auth()->user()->inquiry_mailable;
        $this->currency_id = auth()->user()->currency_id ?? Currency::where('code' , config('services.payments.default-currency'))->first()->id;
        $this->currencies = Currency::select('id' , 'name')->get();
    }

    protected function rules()
    {
        return [
            'whoCanView' => ['required', 'boolean'],
            'comments_mailable' => ['required', 'boolean'],
            'inquiry_mailable' => ['required', 'boolean'],
            'currency_id' => ['required' , 'exists:currencies,id']
        ];
    }

    public function updatePreferences()
    {
        $this->validate();
        auth()->user()->update([
            'who_can_view' => $this->whoCanView,
            'inquiry_mailable' => $this->inquiry_mailable,
            'comments_mailable' => $this->comments_mailable,
            'currency_id' => $this->currency_id,
        ]);
        $this->emit('update-info');
    }
    public function render()
    {
        return view('user.livewire.general-settings');
    }
}
