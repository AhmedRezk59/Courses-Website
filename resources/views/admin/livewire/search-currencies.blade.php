<div>

    @if (session()->has('msg'))
        <div class="alert alert-success text-bold">
            {{session('msg')}}
        </div>
    @endif
    <div class="row mb-3">
        <div class="widget-search clearfix w-25">
            <input wire:model.debounce.300ms="search" type="search" class="form-control" placeholder="    بحث...">
        </div>
    </div>
    <div class="row mb-3">
        <div class="widget-search clearfix w-25">
            <a class="btn btn-primary" href="{{route('admin.currencies.create')}}">إضافة عملة</a>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>الإسم</th>
                <th>كود العملة</th>
                <th>سعر العملة مقارنة بالدولار الأمريكى</th>
                <th>العمليات</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($currencies as $index => $currency)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $currency->name }}</td>
                    <td>{{ $currency->code }}</td>
                    <td>{{ $currency->rate }}</td>
                    <td>
                        <a class="btn btn-primary bg-primary" href="{{ route('admin.currencies.edit', $currency->id) }}">تعديل</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="font-bold  text-center" colspan="5">لايوجد بيانات</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div style="position:absolute;left:50%;transform:translateX(-50%)">
        {{ $currencies->links() }}
    </div>
</div>
