<div wire:ignore id="view-map" class="w-full h-[600px] rounded-xl shadow-md relative"></div>

@push('scripts')
    <script>
        document.addEventListener('livewire:init', () => {
            const map = L.map('view-map').setView([13.4400, 121.8750], 12.8);

            // Add map tiles
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            // Define custom pin icons by severity
            const icons = {
                low: L.icon({
                    iconUrl: 'https://cdn-icons-png.flaticon.com/512/684/684908.png',
                    iconSize: [30, 30],
                    className: 'low-pin'
                }),
                moderate: L.icon({
                    iconUrl: 'https://cdn-icons-png.flaticon.com/512/684/684908.png',
                    iconSize: [30, 30],
                    className: 'moderate-pin'
                }),
                high: L.icon({
                    iconUrl: 'https://cdn-icons-png.flaticon.com/512/684/684908.png',
                    iconSize: [30, 30],
                    className: 'high-pin'
                }),
            };

            // Add pins from backend
            const pins = @json($pins);

            pins.forEach(pin => {
                const icon = icons[pin.severity] || icons.low;
                const marker = L.marker([pin.latitude, pin.longitude], {
                        icon: icon
                    })
                    .addTo(map)
                    .bindPopup(`<strong>Severity:</strong> ${pin.severity}`);
            });

            // Add colored pin styles
            const style = document.createElement('style');
            style.innerHTML = `
                .leaflet-marker-icon.low-pin {
                    filter: hue-rotate(90deg) saturate(1.5); /* green */
                }
                .leaflet-marker-icon.moderate-pin {
                    filter: hue-rotate(20deg) saturate(1.5); /* orange */
                }
                .leaflet-marker-icon.high-pin {
                    filter: hue-rotate(-30deg) saturate(2); /* red */
                }
            `;
            document.head.appendChild(style);
        });
    </script>
@endpush
