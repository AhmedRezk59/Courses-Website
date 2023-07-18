  <div @class([
        'modal fade forms-modal',
        session()->has('modal') && session('modal') === 'signup'
            ? 'show d-block'
            : '',
    ]) id="signup-modal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-light py-3">
                    <h5 class="modal-title w-100 text-center">
                        <i class="icon-users site-icons"></i>
                        اشترك
                    </h5>
                    <button type="button" class="close px-0 pt-3 text-secondary" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body px-4">
                    <form class="new_user" id="new_user" action="{{ route('register') }}" accept-charset="UTF-8"
                        method="post">
                        @csrf
    
                        <div class="border border-sm-0 p-3 bg-white">
                            <div class="form-group">
                                <div class="d-flex">
                                    <label for="inputNameForm">الاسم الاول</label>
                                    <abbr class="req">*</abbr>
                                </div>
                                <input autofocus="autofocus" id="inputNameForm" class="form-control" type="text"
                                    value="{{ old('first_name') }}" name="first_name" />
                                <x-input-error :messages="$errors->get('first_name')" class="mt-2 text-danger"
                                    style="margin-right: 30px !important" />

                            </div>
                            <div class="form-group">
                                <div class="d-flex">
                                    <label for="inputNameForm">الاسم الأخير</label>
                                    <abbr class="req">*</abbr>
                                </div>
                                <input autofocus="autofocus" id="inputNameForm" class="form-control" type="text"
                                    value="{{ old('last_name') }}" name="last_name" />
                                <x-input-error :messages="$errors->get('last_name')" class="mt-2 text-danger"
                                    style="margin-right: 30px !important" />

                            </div> 
                            <div class="form-group">
                                <div class="d-flex">
                                    <label for="inputNameForm">رقم الهاتف</label>
                                    <abbr class="req">*</abbr>
                                </div>
                                <input autofocus="autofocus" id="inputNameForm" class="form-control" type="text"
                                    value="{{ old('phone_number') }}" name="phone_number" />
                                <x-input-error :messages="$errors->get('phone_number')" class="mt-2 text-danger"
                                    style="margin-right: 30px !important" />

                            </div>

                            <div class="form-group">
                                <div class="d-flex">
                                    <label for="inputEmailForm">البريد الإلكتروني</label>
                                    <abbr class="req">*</abbr>
                                </div>
                                <input id="inputEmailForm" class="form-control" type="email"
                                    value="{{ old('email') }}" name="email" />
                                <x-input-error :messages="$errors->get('email')" style="margin-right: 30px !important"
                                    class="mt-2 text-danger" />

                            </div>

                            <div class="form-group">
                                <div class="d-flex">
                                    <label for="inputPasswordForm">كلمة المرور</label>
                                    <abbr class="req">*</abbr>
                                </div>
                                <input id="inputPasswordForm" class="form-control" type="password"
                                    name="password" />
                                <x-input-error :messages="$errors->get('password')" style="margin-right: 30px !important"
                                    class="mt-2 text-danger" />

                            </div>

                            <div>
                                <div class="form-group">
                                    <div class="d-flex">
                                        <label for="inputPasswordConForm">تأكيد كلمة المرور</label>
                                        <abbr class="req">*</abbr>
                                    </div>
                                    <input id="inputPasswordConForm" class="form-control" type="password"
                                        name="password_confirmation" />
                                    <x-input-error :messages="$errors->get('password_confirmation')" style="margin-right: 30px !important"
                                        class="mt-2 text-danger" />

                                </div>
                            </div>

                            <div>
                                <div class="form-group login-with-error-div">
                                    <div class="d-flex">
                                        <label for="user_شروط الاستخدام">شروط الاستخدام</label>
                                        <abbr class="req">*</abbr>
                                    </div>
                                    <label class="form-check-label px-1">بإنشائك لهذا الحساب أنت توافق على <a
                                            href="{{ route('terms') }}"> شروط استخدام
                                        </a>المنصة</label>
                                </div>
                            </div>
                        </div>
                        <div class="forget-password">
                            <p> لديك حساب؟
                                <a data-dismiss="modal" aria-hidden="true" href="#signin-modal" role="button"
                                    data-toggle="modal" id="signin-id" rel="nofollow">دخول</a>
                            </p>
                        </div>

                        <div class="form-group text-left mt-3">
                            <a class="btn btn-link text-secondary" href="#" data-dismiss="modal"
                                rel="nofollow" aria-hidden="true">إلغاء</a>
                            <input type="submit" name="commit" value="اشترك" class="site-btn btn btn-primary"
                                data-disable-with="اشترك" />
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>