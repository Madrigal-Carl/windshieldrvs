<div class="bg-white rounded-xl shadow-md overflow-hidden p-8">
    <h3 class="font-semibold text-primary mb-6">
        {{ $question }}
        @if ($subtitle)
            <span class="italic">({{ $subtitle }})</span>
        @endif
    </h3>

    @php
        $hasImages = collect($options)->contains(function ($opt) {
            return !empty($opt['image']);
        });
    @endphp

    @if ($hasImages)
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-stretch">
            @foreach ($options as $option)
                <div class="relative h-full">
                    <input type="radio" id="{{ $option['value'] }}" name="{{ $model }}"
                        value="{{ $option['value'] }}" wire:model.live="value" class="hidden peer">

                    <label for="{{ $option['value'] }}"
                        class="flex flex-col justify-center items-center h-full cursor-pointer rounded-lg border border-gray-200 p-4 hover:border-secondary peer-checked:border-secondary peer-checked:ring-2 peer-checked:ring-secondary transition-all">
                        <img src="{{ $option['image'] }}" alt="{{ $option['label'] }}"
                            class="w-auto h-32 object-cover rounded-md mb-2">
                        <span
                            class="text-sm text-gray-700 font-medium text-center mb-auto">{{ $option['label'] }}</span>
                    </label>
                </div>
            @endforeach
        </div>
    @else
        <div class="flex flex-col space-y-3">
            @foreach ($options as $option)
                <div class="flex items-start select-none">
                    <input id="{{ $option['value'] }}" name="{{ $model }}" type="radio"
                        wire:model.live="value" value="{{ $option['value'] }}" class="hidden peer">
                    <label for="{{ $option['value'] }}"
                        class="outer w-5 h-5 shrink-0 rounded-full border-2 flex items-center justify-center border-black/50 mr-3 p-0.5 cursor-pointer">
                        <span
                            class="inner w-full h-full rounded-full bg-secondary opacity-0 transform scale-100 transition-all duration-500 peer-checked:opacity-100"></span>
                    </label>
                    <span class="text-gray-700 text-sm leading-tight">{{ $option['label'] }}</span>
                </div>
            @endforeach
        </div>
    @endif
</div>
