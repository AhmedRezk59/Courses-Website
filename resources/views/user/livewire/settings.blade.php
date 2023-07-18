<div>
    @if (session()->has('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif

    <div class="well form_container">
        <div class="centered-nav mobile-tabs-bar mobile-tabs-5 settings-page-tabs clearfix ">
            <span style="float: right">
                <a @class(['active' => $tab == 'personalInfo']) wire:click="changeTab('personalInfo')" href="javascript:void(0)"
                    id="profile_settings">
                    <i class="icon-user-4  site-icons"></i>
                    <span class="setting-txt">البيانات الشخصية<span>
                        </span></span></a>

                <a @class(['active' => $tab == 'accountPass']) wire:click="changeTab('accountPass')" id="account_settings"
                    href="javascript:void(0)">
                    <i class=" icon-key-3  site-icons"></i>
                    <span class="setting-txt">بيانات الدخول</span>
                </a>

                <a @class(['active' => $tab == 'general_settings']) wire:click="changeTab('general_settings')" id="general_settings"
                    href="javascript:void(0)">
                    <i class="icon-locked  site-icons"></i>
                    <span class="setting-txt">إعدادات</span>
                </a>

            </span>

        </div>
        @if ($tab == 'personalInfo')
            @livewire('info-settings')
        @elseif ($tab == 'accountPass')
            @livewire('account-password-settings')
        @elseif ($tab == 'general_settings')
            @livewire('general-settings')
        @endif

    </div>

</div>
