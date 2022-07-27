//[custom Javascript]
//Project:	Aero - Responsive Bootstrap 4 Template
//Version:  1.0
//Last change:  15/12/2019
//Primary use:	Aero - Responsive Bootstrap 4 Template
//should be included in all pages. It controls some layout
//[custom Javascript]
//Project:	Aero - Responsive Bootstrap 4 Template
//Version:  1.0
//Last change:  15/12/2019
//Primary use:	Aero - Responsive Bootstrap 4 Template
//should be included in all pages. It controls some layout
$(function () {
    "use strict";
    initSparkline();
    initC3Chart();
});

function initSparkline() {
    $(".sparkline").each(function () {
        var $this = $(this);
        $this.sparkline("html", $this.data());
    });
}

setTimeout(function () {
    "use strict";
    var mapData = {
        US: 298,
        SA: 200,
        AU: 760,
        IN: 2000000,
        GB: 120,
    };
    if ($("#world-map-markers").length > 0) {
        $("#world-map-markers").vectorMap({
            map: "world_mill_en",
            backgroundColor: "transparent",
            borderColor: "#fff",
            borderOpacity: 0.25,
            borderWidth: 0,
            color: "#e6e6e6",
            regionStyle: {
                initial: {
                    fill: "#f4f4f4",
                },
            },

            markerStyle: {
                initial: {
                    r: 5,
                    fill: "#fff",
                    "fill-opacity": 1,
                    stroke: "#000",
                    "stroke-width": 1,
                    "stroke-opacity": 0.4,
                },
            },

            markers: [
                {
                    latLng: [21.0, 78.0],
                    name: "هند : 350",
                },
                {
                    latLng: [-33.0, 151.0],
                    name: "استرالیا : 250",
                },
                {
                    latLng: [36.77, -119.41],
                    name: "امریکا : 250",
                },
                {
                    latLng: [55.37, -3.41],
                    name: "انگلستان   : 250",
                },
                {
                    latLng: [25.2, 55.27],
                    name: "امارات متحده عربی : 250",
                },
            ],

            series: {
                regions: [
                    {
                        values: {
                            US: "#49c5b6",
                            SA: "#667add",
                            AU: "#50d38a",
                            IN: "#60bafd",
                            GB: "#ff758e",
                        },
                        attribute: "fill",
                    },
                ],
            },
            hoverOpacity: null,
            normalizeFunction: "linear",
            zoomOnScroll: false,
            scaleColors: ["#000000", "#000000"],
            selectedColor: "#000000",
            selectedRegions: [],
            enableZoom: false,
            hoverColor: "#fff",
        });
    }
}, 800);
