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
                <th>تأكيد البريد</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($admins as $index => $admin)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td><span @class([
                        'badge' => true,
                        'bg-danger' => !$admin->hasVerifiedEmail(),
                        'bg-success',
                        'bg-success' => $admin->hasVerifiedEmail(),
                    ])>{{ $admin->hasVerifiedEmail() ? 'نعم' : 'لا' }}</span></td>
                </tr>
            @empty
                <tr>
                    <td class="font-bold  text-center" colspan="5">لايوجد بيانات</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div style="position:absolute;left:50%;transform:translateX(-50%)">
        {{ $admins->links() }}
    </div>
</div>
