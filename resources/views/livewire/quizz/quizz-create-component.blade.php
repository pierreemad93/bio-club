<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Create Question') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div>
                    <form wire:submit.prevent="addQuestion">
                        <!-- lo -->
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Write the Learing outcome (LO)</span>
                            </label>
                            <input type="text" placeholder="Write Lo" class="input input-bordered "
                                wire:model.blur="lo" />
                            @error('lo')
                                <div role="alert" class="alert alert-error mt-3"> {{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Question -->
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Question</span>
                            </label>
                            <textarea class="textarea textarea-bordered h-24" wire:model.blur="question"></textarea>
                            @error('question')
                                <div role="alert" class="alert alert-error mt-3"> {{ $message }}</div>
                            @enderror
                        </div>
                        <!-- image -->
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Upload Image</span>
                            </label>
                            <input type="file" class="file-input file-input-bordered" wire:model.blur="image" />
                        </div>
                        <!-- Answers -->
                        <div class="grid grid-cols-4 gap-4 mt-5">
                            @foreach ($answers as $key => $answer)
                                <!-- write answer -->
                                <div class="form-control col-span-2">
                                    <label class="label">
                                        <span class="label-text">Answer {{ $key }}</span>
                                    </label>
                                    <input type="text" placeholder="Answer {{ $key }}"
                                        wire:model.blur="answers.{{ $key }}" class="input input-bordered " />
                                    {{-- @error('answers.{{ $key }}')
                                        <div role="alert" class="alert alert-error mt-3"> {{ $message }}</div>
                                    @enderror --}}
                                </div>
                                <div class="form-control mt-7">
                                    <a class="btn btn-primary" wire:click="addAnotherAnswer({{ $key }})">
                                        Add Another Answer
                                    </a>
                                </div>
                                <div class="form-control mt-7">
                                    <a class="btn btn-error" wire:click="removeAnswer({{ $key }})">
                                        Remove Answer
                                    </a>
                                </div>
                            @endforeach

                        </div>
                        <!-- Correct Answer -->
                        <div class="form-control mt-5">
                            <select class="select select-bordered w-full max-w-xs" wire:model.blur="correct_answer">
                                <option selected>Select the Correct Answer</option>
                                @foreach ($answers as $answer)
                                    <option value="{{ $answer }}">{{ $answer }}</option>
                                @endforeach
                            </select>
                            @error('correct_answer')
                                <div role="alert" class="alert alert-error mt-3"> {{ $message }}</div>
                            @enderror
                        </div>
                        <!-- grade -->
                        <div class="form-control mt-5">
                            <select class="select select-bordered w-full max-w-xs" wire:model.blur="grade_id">
                                <option selected>Select the grade </option>
                                @foreach ($grades as $grade)
                                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                @endforeach
                            </select>
                            @error('grade_id')
                                <div role="alert" class="alert alert-error mt-3"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-control mt-7">
                            <button class="btn btn-primary">
                                Add question
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
