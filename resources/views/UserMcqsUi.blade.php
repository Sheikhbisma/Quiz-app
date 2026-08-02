@extends('layout.usermasterlayout')

@section('content')
<div class="min-h-screen py-8 px-4" style="background-color: var(--bg-cream);">
    <div class="max-w-2xl mx-auto">

        <div class="bg-white rounded-4xl p-6 md:p-10 border shadow-sm" style="border-color: var(--accent-tan);">

            <div class="flex justify-between items-center mb-6">
                <span class="text-sm font-bold" style="color: var(--primary-dark);">
                    {{$mcqsData['quizName']}}
                </span>
                <span class="text-sm font-medium" style="color: var(--text-dark);">
                    {{ $mcqsData['attemptmcq'] }} / {{ $mcqsData['totalMcqs'] }}
                </span>
            </div>
@php 
    $percentage = ($mcqsData['attemptmcq'] / $mcqsData['totalMcqs']) * 100;
@endphp        
    <div class="progress-container">
                <div class="progress-fill" style="width: <?php echo $percentage; ?>%"></div>
            </div>

            <form id="quizForm" action="{{ route('submitandnext', [$mcqsData['quizName'], $mcqsData['currentMcqs']->quiz_id]) }}" method="POST">
                @csrf
                <input type="hidden" name="mcqs_id" value="{{ $mcqsData['currentMcqs']->id }}">
                <input type="hidden" name="attempt" value="{{ $mcqsData['attemptmcq'] }}">
                <input type="hidden" name="recordid" value="{{ $mcqsData['recordid'] }}">

                <div id="errorMsg" class="hidden error-box">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    <span>Please select an answer to continue.</span>
                </div>

                <h2 class="text-xl md:text-2xl font-bold mb-8" style="color: var(--primary-dark);">
                   {{ $mcqsData['currentMcqs']->mcqs }}
                </h2>

                <div class="space-y-4 mb-10">
                    @foreach(['A', 'B', 'C', 'D'] as $key)
                        @php $optionLabel = 'Option_' . $key; @endphp
                        <label class="block cursor-pointer">
                            <input type="radio" name="answer" value="{{ $key }}" class="hidden peer">
                            <div class="option-container">
                                <span class="option-badge">{{ $key }}</span>
                                <span class="option-text" >
                                   {{ $mcqsData['currentMcqs']->$optionLabel }}
                                </span>
                            </div>
                        </label>
                    @endforeach
                </div>

                <div class="pt-6 border-t flex justify-end" style="border-color: var(--accent-tan);">
                    <button type="submit" class="btn-standard px-10 py-4 text-lg">
                        Submit & Next
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    const form = document.getElementById('quizForm');
    const error = document.getElementById('errorMsg');

    form.addEventListener('submit', function(e) {
        const selected = document.querySelector('input[name="answer"]:checked');
        if (!selected) {
            e.preventDefault();
            error.classList.remove('hidden');
        }
    });

    document.querySelectorAll('input[name="answer"]').forEach(radio => {
        radio.addEventListener('change', () => error.classList.add('hidden'));
    });
</script>
@endsection