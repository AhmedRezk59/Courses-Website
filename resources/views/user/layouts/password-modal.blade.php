 <div @class([
        'modal fade forms-modal',
        'show d-block' => session()->has('modal') && session('modal') === 'reset',
    ]) id="password-modal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalScrollableTitle" style="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center">
                        <i class="icon-key-2 site-icons mx-2"></i>
                        إعادة ضبط كلمة المرور
                    </h5>
                </div>
                <div class="modal-body">
                    <form class="new_user" id="new_user" action="{{ route('password.email') }}"
                        accept-charset="UTF-8" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="d-flex">
                                <label for="inputEmailRemPop">البريد الإلكتروني</label>
                                <abbr class="req">*</abbr>
                            </div>
                            <input autofocus="autofocus" id="inputEmailRemPop" class="form-control" type="email"
                                value="{{ old('email') }}" name="email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger"
                                style="margin-right: 30px !important" />
                        </div>

                        <div class="form-controls">
                            <a class="btn btn-link close-modal" href="#" data-dismiss="modal"
                                aria-hidden="true">إلغاء</a>
                            <button type="submit" name="commit" class="site-btn btn btn-primary small-btn"
                                id="remmeber_pass_submit" data-disable-with="ارسال التعليمات" />ارسال
                            التعليمات</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>