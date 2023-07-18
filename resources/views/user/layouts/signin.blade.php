<div @class([
        'modal fade forms-modal',
        'show d-block' => session()->has('modal') && session('modal') === 'signin',
    ]) id="signin-modal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-light py-3">
                    <h5 class="modal-title w-100 text-center">
                        <i class="icon-key-2 site-icons mx-2"></i>
                        دخول
                    </h5>
                    <button type="button" class="close px-0 pt-3 text-secondary class close-modal"
                        data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body px-4">
                    <form class="new_user" id="new_user" action="{{ route('login') }}" accept-charset="UTF-8"
                        method="post">
                        @csrf
                        
                        <div class="border border-sm-0 p-3 bg-white">

                            <div class="form-group">
                                <div class="d-flex">
                                    <label for="inputEmailLoginPop">البريد الإلكتروني</label>
                                    <abbr class="req">*</abbr>
                                </div>
                                <input autofocus="autofocus" id="inputEmailLoginPop" class="form-control"
                                    type="email" value="{{ old('email') }}" name="email" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger"
                                    style="margin-right: 30px !important" />
                            </div>
                            <div class="form-group">
                                <div class="d-flex">
                                    <label for="inputPasswordLoginPop">كلمة المرور</label>
                                    <abbr class="req">*</abbr>
                                </div>
                                <input id="inputPasswordLoginPop" class="form-control" type="password"
                                    name="password" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger"
                                    style="margin-right: 30px !important" />
                            </div>

                            <div class="form-group mb-0">
                                <input value="1" type="checkbox" checked="checked" name="remember_me"
                                    id="user_remember_me" />
                                <label for="user_remember_me">تذكرني</label>
                            </div>
                        </div>
                        <div class="forget-password">
                            <p><a data-dismiss="modal" aria-hidden="true" href="#password-modal" role="button"
                                    id="remember_password_id">لا تتذكر كلمة المرور؟</a></p>


                            <p>ليس لديك حساب؟ <a data-dismiss="modal" aria-hidden="true" href="#signup-modal"
                                    role="button" data-toggle="modal">حساب جديد</a></p>
                        </div>

                        <div class="form-controls text-left pb-0">
                            <button type="button" href="#" class="close-modal btn btn-link text-secondary"
                                data-dismiss="modal" aria-hidden="true">إلغاء</button>
                            <button type="submit" name="commit" value="دخول"
                                class="btn btn-primary site-btn small-btn" id="login_button"
                                data-disable-with="دخول" />دخول</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>