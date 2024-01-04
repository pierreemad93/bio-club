<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Questions') }}
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                {{-- Search --}}
                <div class="grid grid-cols-4 gap-4 my-6">
                    {{-- search for question --}}
                    <input type="text" placeholder="Write the questions" class="input input-bordered w-full"
                        wire:model.live="search" />
                    {{-- filter by grade  --}}
                    <div class="form-control">
                        <select class="select select-bordered w-full max-w-xs" wire:model.live="grade">
                            <option value="" selected>Select the grade </option>
                            @foreach ($grades as $grade)
                                <option value="{{$grade->id}}">{{$grade->name}}</option>
                            @endforeach
                        </select>
                    </div>
                     {{-- filter by lo  --}}
                     <div class="form-control">
                        <select class="select select-bordered w-full max-w-xs" wire:model.live="lo">
                            <option value="" selected>Select the Lo </option>
                            @foreach ($los as $lo)
                                <option value="{{$lo['lo']}}">{{$lo['lo']}}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- add questions --}}
                    <a class="btn btn-neutral" href="{{route('question.create')}}">Add Question</a>
                </div>
                {{-- Display questions --}}
                <div class="overflow-x-auto">
                    <table class="table">
                        <!-- head -->
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>lo</th>
                                <th>Question</th>
                                <th>Grade</th>
                                <th>Added by</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quizzs as $key=>$quizz)
                                <tr>
                                    <th>{{ $key + 1 }}</th>
                                    <th>{{ $quizz->lo }}</th>
                                    <td>{{ $quizz->question }}</td>
                                    <td>
                                        {{ $quizz->grade->name }}
                                    </td>
                                    <td></td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
