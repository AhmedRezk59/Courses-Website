<div class="well form_container">
    <form class="edit_user" wire:submit.prevent="updatePreferences"
        accept-charset="UTF-8"
        method="post">
        <ul class="list-group p-0 mb-2">
            <li class="list-group-item pr-3 py-2 pr-sm-0 border-0">
                <label> صفحتك الشخصية </label>
                <div class="clearfix privacy-settings p-3 bg-light border">
                    <span class="pull-right">من يمكنه تصفح صفحتك الشخصية</span>
                    <label class="pull-right">
                        <input  value="1" wire:model="whoCanView" type="radio" name="user[private_profile]"
                            id="user_private_profile_false">
                        الجميع</label>
                    <label class="pull-right">
                        <input type="radio" value="0"  name="user[private_profile]" wire:model="whoCanView"
                            id="user_private_profile_true">
                        محاضرو المواد التي أدرسها</label>
                </div>
            </li>

            <li class="list-group-item pr-3 py-2 pr-sm-0 border-0">
                <label> التنويهات </label>
                <div class="clearfix privacy-settings p-3 bg-light border">
                    <span class="pull-right">هل ترغب في استلام التنويهات على بريدك الإلكتروني</span>
                    <label class="pull-right">
                        <input wire:model="inquiry_mailable" type="radio" value="1" checked="checked" name="user[notifiable]"
                            id="user_notifiable_true">
                        نعم</label>
                    <label class="pull-right">
                        <input wire:model="inquiry_mailable" type="radio" value="0" name="user[notifiable]" id="user_notifiable_false">
                        لا</label>
                </div>
            </li>

            <li class="list-group-item pr-3 py-2 pr-sm-0 border-0">
                <label> الردود على تعليقاتك </label>
                <div class="clearfix privacy-settings p-3 bg-light border">
                    <span class="pull-right">هل ترغب في استلام ردود الأعضاء على تعليقاتك على بريدك الإلكتروني</span>
                    <label class="pull-right">
                        <input wire:model="comments_mailable" type="radio" value="1" name="user[replies_notifiable]"
                            id="user_replies_notifiable_true">
                        نعم</label>
                    <label class="pull-right">
                        <input wire:model="comments_mailable" type="radio" value="0" name="user[replies_notifiable]"
                            id="user_replies_notifiable_false">
                        لا</label>
                </div>
            </li>

           <li class="list-group-item pr-3 py-2 pr-sm-0 border-0">
                <label> العملة المفضلة للدفع</label>
                <select class="form-control" wire:model="currency_id" name="currency_id" >
                    @foreach ($currencies as $currency)
                        <option @selected($currency_id == $currency->id) value="{{$currency->id}}">{{$currency->name}}</option>
                    @endforeach
                </select>
           </li>

        </ul>
        <div class="form-group text-left">
            <a class="btn btn-link text-secondary" href="/">إلغاء</a>
            <input type="submit" name="commit" value="حفظ التعديلات" class="site-btn btn btn-primary"
                data-disable-with="حفظ التعديلات">
        </div>
    </form>



</div>
