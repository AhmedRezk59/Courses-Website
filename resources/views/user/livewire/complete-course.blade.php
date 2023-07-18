<div>
    <div class="mb-2" style="text-align: right">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session()->has('failed'))
            <div class="alert alert-danger">
                {{ session('failed') }}
            </div>
        @endif
        <ul>
            @foreach ($questions as $q)
                <li>
                    <h3>{{ $q->body }}</h3>
                    @foreach ($q->answers as $index => $a)
                        <div class="mr-5 flex flex-row justify-content-between">
                            <h3 style="display: inline;">{{ $a->body }}</h3>
                            <input style="float: left" type="checkbox" wire:model.defer="answers.{{ $a->id }}">
                        </div>
                    @endforeach
                </li>
            @endforeach
        </ul>
    </div>
    <form class="button_to" wire:submit.prevent="completeLesson"><input
            class="btn btn-primary btn-lg pull-left mark-action-dev" id="mark-read-id"
            title="قم بحفظ مشاهدتك لذلك المحتوى" type="submit" value="أكملت الإطلاع على هذا المحتوى">
    </form>
</div>
