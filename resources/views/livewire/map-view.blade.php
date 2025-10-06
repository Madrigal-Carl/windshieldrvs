<div wire:ignore id="view-map" class="w-full h-[600px] rounded-xl shadow-md relative" x-data="initMapComponent()"
    x-init="initMap()" x-on:refresh-map.window="initMap()"></div>

@push('scripts')
    <script>
        function initMapComponent() {
            return {
                map: null,
                initMap() {
                    this.$nextTick(() => {
                        const container = document.getElementById('view-map');

                        if (this.map) {
                            setTimeout(() => this.map.invalidateSize(), 200);
                            return;
                        }

                        this.map = L.map(container).setView([13.4513, 121.8397], 13.2);
                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '&copy; OpenStreetMap contributors'
                        }).addTo(this.map);

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

                        const pins = @json($pins);
                        pins.forEach(pin => {
                            const icon = icons[pin.severity] || icons.low;
                            L.marker([pin.latitude, pin.longitude], {
                                    icon
                                })
                                .addTo(this.map)
                                .bindPopup(`<strong>Severity:</strong> ${pin.severity}`);
                        });

                        setTimeout(() => this.map.invalidateSize(), 400);
                    });
                }
            }
        }

        // Add colored pin filters
        const style = document.createElement('style');
        style.innerHTML = `
        .leaflet-marker-icon.low-pin { filter: hue-rotate(90deg) saturate(1.5); }
        .leaflet-marker-icon.moderate-pin { filter: hue-rotate(20deg) saturate(1.5); }
        .leaflet-marker-icon.high-pin { filter: hue-rotate(-30deg) saturate(2); }
    `;
        document.head.appendChild(style);
    </script>
@endpush
