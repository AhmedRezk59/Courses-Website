<form wire:submit.prevent="completeCourse">
    @if (session()->has('success'))
        <div class="alert alert-success text-right">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('failed'))
        <div class="alert alert-danger  text-right">
            {{ session('failed') }}
        </div>
    @endif
    <ul style="list-style-type: none">
        @foreach ($questions as $q)
            <li class="mb-3">
                <h3>{{ $q->body }}</h3>
                @foreach ($q->answers as $index => $a)
                    <div class="mr-5 flex flex-row justify-content-between">
                        <h3 style="display: inline;">{{ $a->body }}
                        </h3>
                        <input style="float: left" type="checkbox" wire:model.defer="answers.{{ $a->id }}">
                    </div>
                @endforeach
            </li>
        @endforeach
    </ul>

    <input class="btn btn-primary btn-lg pull-left mark-action-dev" id="mark-read-id"
        title="قم بحفظ مشاهدتك لذلك المحتوى" type="submit" value="أكملت الاختبار النهائى">
</form>
