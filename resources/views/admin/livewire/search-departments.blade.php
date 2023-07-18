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
            <a class="btn btn-primary" href="{{route('admin.departments.create')}}">إضافة قسم</a>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>الإسم</th>
                <th>العمليات</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($departments as $index => $department)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $department->name }}</td>
                    <td>
                        <a  class="btn btn-primary" href="{{ route('admin.departments.edit', $department->id) }}">تعديل</a>
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
        {{ $departments->links() }}
    </div>
</div>
