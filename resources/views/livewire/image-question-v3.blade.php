<div class="bg-white rounded-xl shadow-md overflow-hidden p-8 text-sm md:text-base">
    <h3 class="font-semibold text-primary mb-6">
        {{ $question }}
        @if ($subtitle)
            <span class="italic">({{ $subtitle }})</span>
        @endif
    </h3>

    <div class="grid grid-cols-1 gap-2">
        @foreach ($options as $option)
            <div class="flex flex-col items-center space-y-4 p-4 w-full">
                @if (!empty($option['image']))
                    <img src="{{ $option['image'] }}" alt="{{ $option['label'] }}"
                        class="w-full md:w-2/3 h-30 md:h-42 object-cover rounded-md">
                @endif
                <div class="flex flex-col md:flex-row items-center justify-start gap-2 md:gap-6 w-full">
                    <div class="relative w-20">
                        <div class="relative">
                            <input type="number" min="0" wire:model.live="counts.{{ $option['value'] }}"
                                class="peer text-gray-700 border-b border-gray-300 focus:outline-none w-18 bg-transparent text-center" />
                            <span
                                class="absolute left-1/2 bottom-0 h-[2px] w-0 bg-primary transition-all duration-300 ease-out peer-focus:w-full peer-focus:left-0 peer-focus:h-[3px] rounded-full">
                            </span>
                        </div>
                    </div>
                    <span
                        class="text-xs md:text-sm md:text-justify text-gray-700 font-medium">{{ $option['label'] }}</span>
                </div>
            </div>
        @endforeach
    </div>
</div>
