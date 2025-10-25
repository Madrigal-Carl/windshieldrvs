<div wire:ignore id="view-map" class="w-full h-[420px] rounded-xl shadow-md relative" x-data="initMapComponent()"
    x-init="initMap()" x-on:refresh-map.window="refreshMap()"></div>

@push('scripts')
    <script>
        function initMapComponent() {
            return {
                map: null,
                markers: [],

                initMap() {
                    this.$nextTick(() => {
                        const container = document.getElementById('view-map');
                        if (!container) return;

                        // Avoid reinitializing the same map
                        if (this.map) {
                            this.refreshMap();
                            return;
                        }

                        this.map = L.map(container, {
                            center: [13.4513, 121.8397],
                            zoom: 13,
                            zoomSnap: 0.1,
                            zoomDelta: 0.5,
                            zoomControl: false,

                            minZoom: 10,
                            maxZoom: 18,

                            maxBounds: [
                                [13.10, 121.70],
                                [13.65, 122.15],
                            ],
                            maxBoundsViscosity: 1.0,
                        });


                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '&copy; OpenStreetMap contributors'
                        }).addTo(this.map);

                        // Icons setup
                        const baseIcons = {
                            'very-low': '{{ asset('images/location-icon/location-very-low.png') }}',
                            low: '{{ asset('images/location-icon/location-low.png') }}',
                            medium: '{{ asset('images/location-icon/location-medium.png') }}',
                            high: '{{ asset('images/location-icon/location-high.png') }}',
                            'very-high': '{{ asset('images/location-icon/location-very-high.png') }}',
                        };

                        // Helper for formatting severity text
                        const formatSeverity = s => s
                            .split('-')
                            .map(w => w.charAt(0).toUpperCase() + w.slice(1))
                            .join(' ');

                        // Create pins
                        const pins = @json($pins);
                        pins.forEach(pin => {
                            const severity = pin.severity.toLowerCase();
                            const iconUrl = baseIcons[severity] || baseIcons.low;

                            const icon = L.icon({
                                iconUrl,
                                iconSize: [28, 40],
                                iconAnchor: [14, 38],
                            });

                            const marker = L.marker([pin.latitude, pin.longitude], {
                                    icon
                                })
                                .addTo(this.map)
                                .bindPopup(`<strong>Severity:</strong> ${formatSeverity(pin.severity)}`);

                            // Store for dynamic scaling
                            this.markers.push({
                                marker,
                                iconUrl,
                                baseSize: [28, 40]
                            });
                        });

                        // Handle zoom scaling
                        this.map.on('zoom', () => {
                            const zoom = this.map.getZoom();
                            const scale = Math.max(0.5, Math.min(zoom / 13, 2)); // scale factor

                            this.markers.forEach(({
                                marker,
                                iconUrl,
                                baseSize
                            }) => {
                                const newSize = [baseSize[0] * scale, baseSize[1] * scale];
                                const newAnchor = [newSize[0] / 2, newSize[1]];
                                marker.setIcon(L.icon({
                                    iconUrl,
                                    iconSize: newSize,
                                    iconAnchor: newAnchor,
                                }));
                            });
                        });

                        setTimeout(() => this.refreshMap(), 400);
                    });
                },

                refreshMap() {
                    if (!this.map) return;
                    const center = this.map.getCenter();
                    this.map.invalidateSize();
                    this.map.panTo(center, {
                        animate: false
                    });
                }
            }
        }

        // Auto-reinitialize when Livewire updates
        document.addEventListener('livewire:load', function() {
            function tryInitMap() {
                const container = document.getElementById('view-map');
                if (!container) return false;

                if (container.__x && container.__x.$data && typeof container.__x.$data.initMap === 'function') {
                    try {
                        container.__x.$data.initMap();
                    } catch (e) {}
                    return true;
                }
                return false;
            }

            tryInitMap();

            Livewire.hook('afterDomUpdate', () => {
                let attempts = 0;
                const interval = setInterval(() => {
                    attempts++;
                    if (tryInitMap() || attempts > 6) clearInterval(interval);
                }, 250);
            });
        });
    </script>
@endpush
