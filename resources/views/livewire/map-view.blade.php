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
                            'very-low': L.icon({
                                iconUrl: '{{ asset('images/location-icon/location-very-low.png') }}',
                                iconSize: [28, 40],
                                className: 'very-low-pin'
                            }),
                            low: L.icon({
                                iconUrl: '{{ asset('images/location-icon/location-low.png') }}',
                                iconSize: [28, 40],
                                className: 'low-pin'
                            }),
                            moderate: L.icon({
                                iconUrl: '{{ asset('images/location-icon/location-medium.png') }}',
                                iconSize: [28, 40],
                                className: 'moderate-pin'
                            }),
                            high: L.icon({
                                iconUrl: '{{ asset('images/location-icon/location-high.png') }}',
                                iconSize: [28, 40],
                                className: 'high-pin'
                            }),
                            'very-high': L.icon({
                                iconUrl: '{{ asset('images/location-icon/location-very-high.png') }}',
                                iconSize: [28, 40],
                                className: 'very-high-pin'
                            }),
                        };

                        // helper function to prettify severity text
                        function formatSeverity(severity) {
                            return severity
                                .split('-')
                                .map(word => word.charAt(0).toUpperCase() + word.slice(1))
                                .join(' ');
                        }

                        const pins = @json($pins);
                        pins.forEach(pin => {
                            const icon = icons[pin.severity.toLowerCase()] || icons.low;
                            const formattedSeverity = formatSeverity(pin.severity);

                            L.marker([pin.latitude, pin.longitude], {
                                    icon
                                })
                                .addTo(this.map)
                                .bindPopup(`<strong>Severity:</strong> ${formattedSeverity}`)
                                .on('mouseover', function() {
                                    this.openPopup();
                                })
                                .on('mouseout', function() {
                                    this.closePopup();
                                });
                        });

                        setTimeout(() => this.map.invalidateSize(), 400);
                    });
                }
            }
        }
    </script>
@endpush
