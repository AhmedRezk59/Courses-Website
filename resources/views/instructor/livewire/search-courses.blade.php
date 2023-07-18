<div>
    @if (session()->has('msg'))
        <div class="alert alert-success text-bold">
            {{ session('msg') }}
        </div>
    @endif
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
                <th>القسم</th>
                <th>الحالة</th>
                <th>مدفوع</th>
                <th>عدد عمليات الشراء</th>
                <th>السعر</th>
                <th>السعر بعد الخصم</th>
                <th>تاريخ نهاية الخصم</th>
                <th>تاريخ بداية المادة</th>
                <th>تاريخ نهاية المادة</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($courses as $index => $course)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td @class(["text-bold text-primary underline"=> $course->status !== App\Enums\CourseStatus::REJECTED])>
                        @if ($course->status !== App\Enums\CourseStatus::REJECTED)
                            <a href="{{ route('instructor.courses.show', $course->id) }}">{{ $course->name }}</a>
                        @else
                            {{ $course->name }}
                        @endif
                    </td>
                    <td>{{ $course->department->name }}</td>
                    <td><span
                            @class([
                                'badge' => true,
                                'bg-danger' => $course->isRejected(),
                                'bg-success' => $course->isAccepted(),
                                'bg-primary' => $course->isPending(),
                            ])>{{ $course->isPending() ? 'معلق' : '' }}{{ $course->isAccepted() ? 'مقبول' : '' }}{{ $course->isRejected() ? 'مرفوض' : '' }}</span>
                    </td>
                    <td>{{ $course->is_paid == true ? 'نعم' : 'لا' }}</td>
                    <td>{{ $course->payments_count ?? 0 }}</td>
                    <td>{{ $course->price ?? 0 }}</td>
                    <td>{{ $course->discount_price ?? 0 }}</td>
                    <td>{{ $course->end_discount_date ?? '' }}</td>
                    <td>{{ $course->start_date }}</td>
                    <td>{{ $course->end_date }}</td>
                </tr>
            @empty
                <tr>
                    <td class="font-bold text-center" colspan="100">لايوجد بيانات</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div style="position:absolute;left:50%;transform:translateX(-50%)">
        {{ $courses->links() }}
    </div>
</div>
