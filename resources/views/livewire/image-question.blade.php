<div class="bg-white rounded-xl shadow-md overflow-hidden p-8">
    <h3 class="font-semibold text-primary mb-6">
        {{ $question }}
        @if ($subtitle)
            <span class="italic">({{ $subtitle }})</span>
        @endif
    </h3>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-stretch">
        @foreach ($options as $option)
            <div class="relative h-full">
                <input type="radio" id="{{ $option['value'] }}" name="{{ $model }}" value="{{ $option['value'] }}"
                    wire:model="value" class="hidden peer">

                <label for="{{ $option['value'] }}"
                    class="flex flex-col h-full cursor-pointer rounded-lg border border-gray-200 p-4 hover:border-secondary peer-checked:border-secondary peer-checked:ring-2 peer-checked:ring-secondary transition-all">
                    <img src="{{ $option['image'] }}" alt="{{ $option['label'] }}"
                        class="w-full h-32 object-cover rounded-md mb-2">
                    <span class="text-sm text-gray-700 font-medium text-center mb-auto">{{ $option['label'] }}</span>
                </label>
            </div>
        @endforeach
    </div>
</div>
