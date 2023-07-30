<div>
    <div class="row mb-3">
         <div class="widget-search clearfix w-25">
            <input wire:model.debounce.300ms="search" type="search" class="form-control" placeholder="    بحث...">
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>الإسم</th>
                <th>البريد الإلكترونى</th>
                <th>رقم الهاتف</th>
                <th>العملة المفضلة</th>
                <th>من يمكنه رؤية الصفحة الشخصية</th>
                <th>استقبال التنويهات</th>
                <th>استقبال ردود الأعضاء على البريد</th>
                <th>تأكيد البريد</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone_number }}</td>
                    <td>{{ $user->currency->code ?? config('services.payments.default-currency') }}</td>
                    <td>{{ $user->who_can_view ? 'الكل' : 'المحاضرين فقط' }}</td>
                    <td>{{ $user->inquiry_mailable ? 'نعم' : 'لا' }}</td>
                    <td>{{ $user->comments_mailable ? 'نعم' : 'لا' }}</td>
                    <td><span @class([
                        'badge' => true,
                        'bg-danger' => !$user->hasVerifiedEmail(),
                        'bg-success',
                        'bg-success' => $user->hasVerifiedEmail(),
                    ])>{{ $user->hasVerifiedEmail() ? 'نعم' : 'لا' }}</span></td>
                </tr>
            @empty
                <tr>
                    <td class="font-bold  text-center" colspan="99">لايوجد بيانات</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div style="position:absolute;left:50%;transform:translateX(-50%)">
        {{ $users->links() }}
    </div>
</div>
