<!--begin::Third Party Plugin(OverlayScrollbars)-->
<script src="{{ url('admin/js/overlayscrollbars.browser.es6.min.js') }}"></script>
<!--end::Third Party Plugin(OverlayScrollbars)-->

<!--begin::Required Plugin(popperjs for Bootstrap 5)-->
<script src="{{ url('admin/js/popper.min.js') }}"></script>
<!--end::Required Plugin(popperjs for Bootstrap 5)-->

<!--begin::Required Plugin(Bootstrap 5)-->
<script src="{{ url('admin/js/bootstrap.min.js') }}"></script>
<!--end::Required Plugin(Bootstrap 5)-->

<!--begin::Required Plugin(AdminLTE)-->
<script src="{{ asset('admin/js/adminlte.js') }}"></script>
<!--end::Required Plugin(AdminLTE)-->

<!--begin::OverlayScrollbars Configure-->
<script>
    const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper"
    const Default = {
        scrollbarTheme: "os-theme-light",
        scrollbarAutoHide: "leave",
        scrollbarClickScroll: true
    }
    document.addEventListener("DOMContentLoaded", function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER)
        if (
            sidebarWrapper &&
            OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined
        ) {
            OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                scrollbars: {
                    theme: Default.scrollbarTheme,
                    autoHide: Default.scrollbarAutoHide,
                    clickScroll: Default.scrollbarClickScroll
                }
            })
        }
    })
</script> 
<!--end::OverlayScrollbars Configure-->

<!-- Image path runtime fix -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Find the link tag for the main AdminLTE CSS file.
        const cssLink = document.querySelector('link[href*="css/adminlte.css"]');
        if (!cssLink) {
            return; // Exit if the link isn't found
        }

        // Extract the base path from the CSS href.
        // e.g., from "../css/adminlte.css", we get "../"
        // e.g., from "./css/adminlte.css", we get "./"
        const cssHref = cssLink.getAttribute('href');
        const deploymentPath = cssHref.slice(0, cssHref.indexOf('css/adminlte.css'));

        // Find all images with absolute paths and fix them.
        document.querySelectorAll('img[src^="/assets/"]').forEach(img => {
            const originalSrc = img.getAttribute('src');
            if (originalSrc) {
                const relativeSrc = originalSrc.slice(1); // Remove leading '/'
                img.src = deploymentPath + relativeSrc;
            }
        });
    });
</script> 
<!-- OPTIONAL SCRIPTS --> 

<!-- sortablejs -->
<script src="{{ url('admin/js/Sortable.min.js') }}"></script>
<!-- sortablejs -->

<script>
    new Sortable(document.querySelector('.connectedSortable'), {
        group: 'shared',
        handle: '.card-header'
    })

    const cardHeaders = document.querySelectorAll(
        '.connectedSortable .card-header'
    )
    cardHeaders.forEach(cardHeader => {
        cardHeader.style.cursor = 'move'
    })

</script> 
<!-- apexcharts -->
<script src="{{ url('admin/js/apexcharts.min.js') }}"></script>
<!-- ChartJS -->
<script>
    // NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
    // IT'S ALL JUST JUNK FOR DEMO
    // ++++++++++++++++++++++++++++++++++++++++++

    const sales_chart_options = {
        series: [
            {
                name: 'Digital Goods',
                data: [28, 48, 40, 19, 86, 27, 90]
            },
            {
                name: 'Electronics',
                data: [65, 59, 80, 81, 56, 55, 40]
            }
        ],
        chart: {
            height: 300,
            type: 'area',
            toolbar: {
                show: false
            }
        },
        legend: {
            show: false
        },
        colors: ['#0d6efd', '#20c997'],
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        xaxis: {
            type: 'datetime',
            categories: [
                '2023-01-01',
                '2023-02-01',
                '2023-03-01',
                '2023-04-01',
                '2023-05-01',
                '2023-06-01',
                '2023-07-01'
            ]
        },
        tooltip: {
            x: {
                format: 'MMMM yyyy'
            }
        }
    }

    const sales_chart = new ApexCharts(
        document.querySelector('#revenue-chart'),
        sales_chart_options
    )
    sales_chart.render()

</script> 
<!-- jsvectormap -->
<script src="{{ url('admin/js/jsvectormap.min.js') }}"></script>
<script src="{{ url('admin/js/world.js') }}"></script>
<!-- jsvectormap -->
<script>
    // World map by jsVectorMap
    new jsVectorMap({
        selector: '#world-map',
        map: 'world'
    });

    // Sparkline charts
    const option_sparkline1 = {
        series: [
            {
                data: [1000, 1200, 920, 927, 931, 1027, 819, 930, 1021]
            }
        ],
        chart: {
            type: 'area',
            height: 50,
            sparkline: {
                enabled: true
            }
        },
        stroke: {
            curve: 'straight'
        },
        fill: {
            opacity: 0.3
        },
        yaxis: {
            min: 0
        },
        colors: ['#DCE6EC']
    }

    const sparkline1 = new ApexCharts(
        document.querySelector('#sparkline-1'),
        option_sparkline1
    )
    sparkline1.render()

    const option_sparkline2 = {
        series: [
            {
                data: [515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921]
            }
        ],
        chart: {
            type: 'area',
            height: 50,
            sparkline: {
                enabled: true
            }
        },
        stroke: {
            curve: 'straight'
        },
        fill: {
            opacity: 0.3
        },
        yaxis: {
            min: 0
        },
        colors: ['#DCE6EC']
    }

    const sparkline2 = new ApexCharts(
        document.querySelector('#sparkline-2'),
        option_sparkline2
    )
    sparkline2.render()

    const option_sparkline3 = {
        series: [
            {
                data: [15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21]
            }
        ],
        chart: {
            type: 'area',
            height: 50,
            sparkline: {
                enabled: true
            }
        },
        stroke: {
            curve: 'straight'
        },
        fill: {
            opacity: 0.3
        },
        yaxis: {
            min: 0
        },
        colors: ['#DCE6EC']
    }

    const sparkline3 = new ApexCharts(
        document.querySelector('#sparkline-3'),
        option_sparkline3
    )
    sparkline3.render()
</script>

<!-- jQuery -->
<script src="{{ url('admin/js/jquery-3.7.1.min.js') }}"></script>

<!-- Custom Script -->
<script src="{{ url('admin/js/custom.js') }}"></script>
