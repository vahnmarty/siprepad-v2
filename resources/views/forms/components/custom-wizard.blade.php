@php
    $isRtl = __('filament::layout.direction') === 'rtl';
    $previousArrowIcon = $isRtl ? 'heroicon-o-chevron-right' : 'heroicon-o-chevron-left';
    $nextArrowIcon = $isRtl ? 'heroicon-o-chevron-left' : 'heroicon-o-chevron-right';
@endphp

<div
    x-data="{

        step: null,

        init: function () {
            this.$watch('step', () => this.updateQueryString())
        
            this.step = this.getSteps()[{{ $getStartStep() }} - 1]
        },

        nextStep: function () {
            let nextStepIndex = this.getStepIndex(this.step) + 1

            if (nextStepIndex >= this.getSteps().length) {
                return
            }

            this.step = this.getSteps()[nextStepIndex]

            this.autofocusFields()
            this.scrollToTop()
        },

        previousStep: function () {
            let previousStepIndex = this.getStepIndex(this.step) - 1

            if (previousStepIndex < 0) {
                return
            }

            this.step = this.getSteps()[previousStepIndex]

            this.autofocusFields()
            this.scrollToTop()
        },

        scrollToTop: function () {
            this.$el.scrollIntoView({ behavior: 'smooth', block: 'start' })
        },

        autofocusFields: function () {
            $nextTick(() => this.$refs[`step-${this.step}`].querySelector('[autofocus]')?.focus())
        },

        getStepIndex: function (step) {
            return this.getSteps().findIndex((indexedStep) => indexedStep === step)
        },

        getSteps: function () {
            return JSON.parse(this.$refs.stepsData.value)
        },

        isFirstStep: function () {
            return this.getStepIndex(this.step) <= 0
        },

        isLastStep: function () {
            return (this.getStepIndex(this.step) + 1) >= this.getSteps().length
        },

        isStepAccessible: function(step, index) {
            return @js($isSkippable()) || (this.getStepIndex(step) > index)
        },

        updateQueryString: function () {
            if (! @js($isStepPersistedInQueryString())) {
                return
            }
            
            const url = new URL(window.location.href)
            url.searchParams.set(@js($getStepQueryStringKey()), this.step)

            history.pushState(null, document.title, url.toString())
        },
        
    }"
    x-on:next-wizard-step.window="if ($event.detail.statePath === '{{ $getStatePath() }}') nextStep()"
    x-cloak
    {!! $getId() ? "id=\"{$getId()}\"" : null !!}
    {{ $attributes->merge($getExtraAttributes())->class(['filament-forms-wizard-component grid gap-y-6']) }}
    {{ $getExtraAlpineAttributeBag() }}
>
    <input
        type="hidden"
        value='{{
            collect($getChildComponentContainer()->getComponents())
                ->filter(static fn (\Filament\Forms\Components\Wizard\Step $step): bool => ! $step->isHidden())
                ->map(static fn (\Filament\Forms\Components\Wizard\Step $step) => $step->getId())
                ->values()
                ->toJson()
        }}'
        x-ref="stepsData"
    />  

    
    <ol
        {!! $getLabel() ? 'aria-label="' . $getLabel() . '"' : null !!}
        role="list"
        @class([
            'justify-center bg-white rounded-xl overflow-hidden divide-y md:flex md:divide-y-0',
            'dark:bg-gray-800 dark:border-gray-700 dark:divide-gray-700' => config('forms.dark_mode'),
        ])
    >
        @foreach ($getChildComponentContainer()->getComponents() as $step)
            <li class="relative overflow-hidden group md:w-32">
                <button
                    type="button"
                    x-on:click="if (isStepAccessible(step, {{ $loop->index }})) step = '{{ $step->getId() }}'"
                    x-bind:aria-current="getStepIndex(step) === {{ $loop->index }} ? 'step' : null"
                    x-bind:class="{
                        'cursor-not-allowed pointer-events-none': ! isStepAccessible(step, {{ $loop->index }}),
                    }"
                    role="step"
                    class="flex items-center w-full h-full text-start"
                >

                <div
                    x-bind:class="getStepIndex(step) >= {{ $loop->index }} 
                        ? 'bg-primary-500'
                        : 'bg-gray-200'
                    "
                    class="absolute top-0 right-0 w-1 h-full -translate-y-4 bg-gray-300 md:w-full md:h-2 md:top-1/2 md:left-0 progress-bar"
                    aria-hidden="true"
                ></div>
                
                    <div class="flex flex-col items-center w-full gap-3 px-5 py-4 text-sm font-medium">
                        <div class="flex-shrink-0">
                            <div
                                x-bind:class="{
                                    'bg-primary-600': getStepIndex(step) > {{ $loop->index }},
                                    'border-2': getStepIndex(step) <= {{ $loop->index }},
                                    'border-primary-500 bg-primary-500 ': getStepIndex(step) === {{ $loop->index }},
                                    'bg-white @if (config('forms.dark_mode')) dark:border-gray-500 @endif': getStepIndex(step) < {{ $loop->index }},
                                }"
                                class="relative flex items-center justify-center w-10 h-10 rounded-full"
                            >
                                <x-heroicon-o-check
                                    x-show="getStepIndex(step) > {{ $loop->index }}"
                                    x-cloak
                                    class="w-5 h-5 text-white"
                                />

                                @if ($step->getIcon())
                                    <x-dynamic-component
                                        :component="$step->getIcon()"
                                        x-show="getStepIndex(step) <= {{ $loop->index }}"
                                        x-cloak
                                        x-bind:class="{
                                            'text-gray-500 @if (config('forms.dark_mode')) dark:text-gray-400 @endif': getStepIndex(step) !== {{ $loop->index }},
                                            'text-white': getStepIndex(step) === {{ $loop->index }},
                                        }"
                                        class="w-5 h-5"
                                    />
                                @else
                                    <span
                                        x-show="getStepIndex(step) <= {{ $loop->index }}"
                                        class="relative"
                                        x-bind:class="{
                                            'text-gray-500 @if (config('forms.dark_mode')) dark:text-gray-400 @endif': getStepIndex(step) !== {{ $loop->index }},
                                            'text-white': getStepIndex(step) === {{ $loop->index }},
                                        }"
                                    >
                                        {{ $loop->index + 1 }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="flex flex-col items-start justify-center text-center">
                            <div class="text-xs">
                                {{ $step->getLabel() }}
                            </div>

                            @if (filled($description = $step->getDescription()))
                                <div @class([
                                    'text-sm  font-medium text-gray-500',
                                    'dark:text-gray-400' => config('forms.dark_mode'),
                                ])>
                                    {{ $description }}
                                </div>
                            @endif
                        </div>
                    </div>
                </button>
            </li>
        @endforeach
    </ol>

    <div>
        @foreach ($getChildComponentContainer()->getComponents() as $step)
            {{ $step }}
        @endforeach
    </div>

    <div class="flex items-center justify-between">
        <div>
            <x-forms::button
                :icon="$previousArrowIcon"
                x-show="! isFirstStep()"
                x-cloak
                x-on:click="previousStep"
                color="secondary"
                size="sm"
            >
                {{ __('forms::components.wizard.buttons.previous_step.label') }}
            </x-forms::button>

            <div x-show="isFirstStep()">
                {{ $getCancelAction() }}
            </div>
        </div>

        <div>
            <x-forms::button
                :icon="$nextArrowIcon"
                icon-position="after"
                x-show="! isLastStep()"
                x-cloak
                x-on:click="$wire.dispatchFormEvent('wizard::nextStep', '{{ $getStatePath() }}', getStepIndex(step))"
                wire:loading.class.delay="opacity-70 cursor-wait"
                size="sm"
            >
                {{ __('forms::components.wizard.buttons.next_step.label') }}
            </x-forms::button>

            <div x-show="isLastStep()">
                {{ $getSubmitAction() }}
            </div>
        </div>
    </div>
</div>
