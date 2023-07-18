<div>

 
    <div class="row mt-3 mb-3 mr-3">
        <div class="widget-search clearfix w-25">
            <input wire:model.debounce.300ms="search" type="search" class="form-control" placeholder="    بحث...">
        </div>
    </div>
   
    <table class="table table-striped">
        <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>رقم العملية</th>
                <th>البريد الإلكترونى للمستخدم</th>
                <th>المادة</th>
                <th>العملة</th>
                <th>المبلغ</th>
                <th>وقت الدفع</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($payments as $index => $payment)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $payment->order_id }}</td>
                    <td>{{ $payment->user->email }}</td>
                    <td class="text-primary underline text-bold"><a href="{{route('admin.courses.show' , $payment->course->id)}}">{{$payment->course->name}}</a></td>
                    <td>{{ $payment->currency }}</td>
                    <td>{{ $payment->amount }}</td>
                    <td>{{ $payment->created_at }}</td>
                    
                </tr>
            @empty
                <tr>
                    <td class="font-bold  text-center" colspan="5">لايوجد بيانات</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div style="position:absolute;left:50%;transform:translateX(-50%)">
        {{ $payments->links() }}
    </div>
</div>
