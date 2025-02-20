<body>
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update PARQ Assessment') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your Physical Activity Readiness Questionnaire (PAR-Q) responses.") }}
        </p>
    </header>

    <form method="post" action="{{ route('parq.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        @foreach ([
            'heart_condition' => 'Has your doctor ever said that you have a heart condition and that you should only do physical activity recommended by a doctor?',
            'chest_pain_phys' => 'Do you feel pain in your chest when you do physical activity?',
            'chest_pain_non_phys' => 'In the past month, have you had chest pain when you were not doing physical activity?',
            'balance_loss' => 'Do you lose your balance because of dizziness or do you ever lose consciousness?',
            'bone_joint_problem' => 'Do you have a bone or joint problem that could be worsened by a change in your physical activity?',
            'drug_prescrip' => 'Is your doctor currently prescribing drugs for your blood pressure or heart condition?',
            'other_reason' => 'Do you know of any other reason why you should not do physical activity?'
        ] as $field => $question)
        <div class="mb-6 pt-3 rounded bg-gray-200">
            <x-input-label :for="$field" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__($question)" required="true" />
            <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex">
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                    <div class="flex items-center ps-3">
                        <input id="{{ $field }}_yes" type="radio" value="Yes" name="{{ $field }}" 
                            {{ old($field, $userParq->$field ?? '') === 'Yes' ? 'checked' : '' }}
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500" required>
                        <label for="{{ $field }}_yes" class="w-full py-3 ms-2 text-sm font-medium text-gray-900">{{ __('Yes') }}</label>
                    </div>
                </li>
                <li class="w-full">
                    <div class="flex items-center ps-3">
                        <input id="{{ $field }}_no" type="radio" value="No" name="{{ $field }}"
                            {{ old($field, $userParq->$field ?? '') === 'No' ? 'checked' : '' }}
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500" required>
                        <label for="{{ $field }}_no" class="w-full py-3 ms-2 text-sm font-medium text-gray-900">{{ __('No') }}</label>
                    </div>
                </li>
            </ul>
            <x-input-error :messages="$errors->get($field)" class="mt-2" />
        </div>
        @endforeach

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
            <x-secondary-button type="button" id="cancel-parq-edit">{{ __('Cancel') }}</x-secondary-button>
        </div>
    </form>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editParqBtn = document.getElementById('edit-parq-btn');
        const cancelParqBtn = document.getElementById('cancel-parq-edit');
        const parqViewSection = document.getElementById('parq-view');
        const parqEditSection = document.getElementById('parq-edit');

        if (editParqBtn && cancelParqBtn && parqViewSection && parqEditSection) {
            editParqBtn.addEventListener('click', function() {
                parqViewSection.classList.add('hidden');
                parqEditSection.classList.remove('hidden');
            });

            cancelParqBtn.addEventListener('click', function() {
                parqEditSection.classList.add('hidden');
                parqViewSection.classList.remove('hidden');
            });
        }
    });
</script>
</body>