<div>
    <form class="edit_user" wire:submit.prevent="updateInfo" id="edit_user_760932"
        action="{{ route('user.profile.update') }}" accept-charset="UTF-8" method="post">
        @method('put')
        @csrf

        <div class="form-group">
            <div class="d-flex">
                <label for="email">البريد الإلكترونى</label>
                <abbr class="req">*</abbr>
            </div>
            <input wire:model="email" class="form-control" type="text" name="email" id="email">
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" style="margin-right: 30px !important" />
        </div>
        <div class="form-group">

            <div class="form-group">
                <div class="d-flex">
                    <label for="user_user_name">اسم المستخدم الأول</label>
                    <abbr class="req">*</abbr>
                </div>
                <input wire:model="first_name" class="form-control" type="text" name="first_name"
                    id="user_user_name">
                <x-input-error :messages="$errors->get('first_name')" class="mt-2 text-danger" style="margin-right: 30px !important" />
            </div>
            <div class="form-group">
                <div class="d-flex">
                    <label for="user_user_name">اسم المستخدم الثانى</label>
                    <abbr class="req">*</abbr>
                </div>
                <input wire:model="last_name" class="form-control" type="text" name="last_name" id="user_user_name">
                <x-input-error :messages="$errors->get('last_name')" class="mt-2 text-danger" style="margin-right: 30px !important" />
            </div>
            <div class="form-group">
                <div class="d-flex">
                    <label for="inputNameForm">رقم الهاتف</label>
                    <abbr class="req">*</abbr>
                </div>
                <input wire:model="phone_number" autofocus="autofocus" id="inputNameForm" class="form-control" type="text"
                     name="phone_number" />
                <x-input-error :messages="$errors->get('phone_number')" class="mt-2 text-danger" style="margin-right: 30px !important" />

            </div>




            <div class="photo-field border-fields mb-4">
                <label for="avatar">صورة شخصية</label>
                <div class=" bg-light mh-100 h-auto mt-1">
                    <i class="site-icons icon-image-2 "></i>
                    <div class=" w-80 float-left mt-3">
                        <input wire:model="avatar" type="file" name="avatar" id="avatar">
                    </div>
                </div>
                <x-input-error :messages="$errors->get('avatar')" class="mt-2 text-danger" style="margin-right: 30px !important" />
            </div>


            <div class="form-group text-left">
                <a class="btn btn-link text-secondary" href="{{ url('/') }}">إلغاء</a>
                <button type="submit" class="site-btn btn btn-primary">حفظ
                    التعديلات</button>
            </div>

        </div>
    </form>
</div>
