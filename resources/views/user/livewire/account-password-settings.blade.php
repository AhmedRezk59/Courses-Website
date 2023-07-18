<div>
    <div class="well form_container">
        <form class="edit_user" wire:submit.prevent="updatePass" accept-charset="UTF-8" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <div class="d-flex">
                    <label for="email">البريد الإلكترونى</label>
                    <abbr class="req">*</abbr>
                </div>
                <input wire:model="email" class="form-control" type="text" value="{{ auth()->user()->email }}"
                    name="email" id="email">
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" style="margin-right: 30px !important" />

            </div>
            <div class="">
                <label>كلمة المرور <abbr class="req">*</abbr> </label>
                <div class="old-password current-value pt-2 ">
                    <span>**********</span>
                    <a id="change" class="links  btn btn-link edit-password-link pr-2" href="javascript:void(0)">
                        <i class="site-icons icon-pencil-2"></i>
                        تغيير كلمة المرور
                    </a>
                    
                </div>
                <div class=" bg-light mb-3 p-4 edit-password clearfix" style="visibility: visible;display :block">
                    <div class="row">
                        <div class="col-3">
                            <i class="site-icons icon-key-3"></i>
                        </div>
                        <div class="col-9">
                            <div class="select-field w-80 float-left">
                                <label for="user_current_password">كلمة المرور الحالية</label>
                                <div class="form-group mb-0">
                                    <input wire:model="current_password" class="form-control" type="password"
                                        name="current_password" id="user_current_password type">
                                    <x-input-error :messages="$errors->get('current_password')" class="mt-2 text-danger"
                                        style="margin-right: 30px !important" />
                                </div>


                            </div>

                            <div class="select-field w-80 float-left">
                                <label for="user_password">كلمة المرور الجديدة</label>
                                <div class="form-group mb-0">
                                    <input wire:model="password" class="form-control" type="password" name="password"
                                        id="user_password type">

                                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger"
                                        style="margin-right: 30px !important" />
                                </div>
                            </div>

                            <div class="select-field w-80 float-left">
                                <label for="user_password_confirmation">تأكيد كلمة المرور الجديدة</label>
                                <input wire:model="password_confirmation" type="password" name="password_confirmation"
                                    id="user_password_confirmation type">
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger"
                                    style="margin-right: 30px !important" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group text-left mb-0">
                <a class="btn btn-link text-secondary" href="{{ url('/') }}">إلغاء</a>
                <button type="submit" class="site-btn btn btn-primary small-btn">حفظ التعديلات</button>
            </div>
        </form>
    </div>
</div>
