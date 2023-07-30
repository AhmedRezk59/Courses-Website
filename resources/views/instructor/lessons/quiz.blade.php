<div class="text-center">
    @error('questions.*')
        <p class="text-danger text-bold">
            {{ $message }}
        </p>
    @enderror
    @error('questions.*.answers')
        <p class="text-danger text-bold">
            {{ $message }}
        </p>
    @enderror
    @if (session()->has('error'))
        <p class="text-danger text-bold">
            {{ session('error') }}
        </p>
    @endif

    @foreach (range(0, $noq - 1) as $index)
        <div class="col-12  mt-3">
            <div class="flex flex-row justify-content-center align-items-center my-4">
                <label for="">السؤال {{ $index + 1 }}</label>
                <button class="btn btn-danger bg-danger mr-3" wire:click="removeQuestion({{ $index }})"
                    type="button">حذف سؤال</button>
            </div>
            <div class="flex flex-row">
                <label for="">عنوان السؤال</label>
                <input type="text" class="form-control" name="questions[{{ $index }}][body]"
                    wire:model="questions.{{ $index }}.question.body">
            </div>
            @foreach (range(1, $questions[$index]['noAs']) as $answersIndex)
                <div class="flex flex-row mt-5 justify-content-around align-items-center">
                    <label for="">الإجابة {{ $answersIndex }}</label>
                    <input type="text" class="form-control col-11"
                        name="questions[{{ $index }}][answers][{{ $answersIndex }}][body]"
                        wire:model="questions.{{ $index }}.question.answers.{{ $answersIndex }}.body">
                    <input class="form-control" value="1" type="checkbox"
                        name="questions[{{ $index }}][answers][{{ $answersIndex }}][correct]"
                        wire:model="questions.{{ $index }}.question.answers.{{ $answersIndex }}.correct"
                        id="">
                </div>
            @endforeach
            <button class="btn btn-primary bg-primary mt-3" wire:click="addAnswer({{ $index }})"
                type="button">إضافة إجابة</button>
        </div>
    @endforeach
    <button class="btn btn-primary bg-primary mt-3" type="button" wire:click="addQuestion">إضافة سؤال</button>

</div>
