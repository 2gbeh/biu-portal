<?php $attributes = $attributes->exceptProps([
    'p' => (object) [
        'title' => 'Column Chart',
        'id' => 'x-chart-column',
        'data' => [
            'title' => 'Monthly Inflation in Argentina, 2002',
            'x_label' => 'Month',
            'x_value' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            'y_label' => 'Inflation',
            'y_value' => [2.3, 3.1, 4.0, 10.1, 4.0, 3.6, 3.2, 2.3, 1.4, 0.8, 0.5, 0.2],
        ],
    ],
]); ?>
<?php foreach (array_filter(([
    'p' => (object) [
        'title' => 'Column Chart',
        'id' => 'x-chart-column',
        'data' => [
            'title' => 'Monthly Inflation in Argentina, 2002',
            'x_label' => 'Month',
            'x_value' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            'y_label' => 'Inflation',
            'y_value' => [2.3, 3.1, 4.0, 10.1, 4.0, 3.6, 3.2, 2.3, 1.4, 0.8, 0.5, 0.2],
        ],
    ],
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
$p->data['y_total'] = array_sum($p->data['y_value']);
?>

<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-4 fw-normal"><?php echo e($p->title); ?></h4>

        <div id="<?php echo e($p->id); ?>" class="apex-charts" dir="ltr"></div>
    </div>
</div>

<?php $__env->startPush('scripts_'); ?>
    <script src="<?php echo e(asset('assets/minible/libs/apexcharts/apexcharts.min.js')); ?>"></script>
    <script type="text/javascript">
        let chartColumnSettings = {
            series: [{
                name: <?php echo e(Js::from($p->data['y_label'])); ?>,
                data: <?php echo e(Js::from($p->data['y_value'])); ?>

            }],
            chart: {
                height: 350,
                type: 'bar',
            },
            plotOptions: {
                bar: {
                    borderRadius: 10,
                    dataLabels: {
                        position: 'top', // top, center, bottom
                    },
                }
            },
            dataLabels: {
                enabled: true,
                formatter: function(val) {
                    let ave = (val * 100) / <?php echo e(Js::from($p->data['y_total'])); ?>;
                    return `${Math.round(ave)}%`;
                },
                offsetY: -20,
                style: {
                    fontSize: '12px',
                    colors: ["#304758"]
                }
            },

            xaxis: {
                categories: <?php echo e(Js::from($p->data['x_value'])); ?>,
                position: 'top',
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                },
                crosshairs: {
                    fill: {
                        type: 'gradient',
                        gradient: {
                            colorFrom: '#e11',
                            colorTo: '#BED1E6',
                            stops: [0, 100],
                            opacityFrom: 0.4,
                            opacityTo: 0.5,
                        }
                    }
                },
                tooltip: {
                    enabled: true,
                }
            },
            yaxis: {
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false,
                },
                labels: {
                    show: false,
                    formatter: function(val) {
                        return val.toLocaleString();
                    }
                }

            },
            title: {
                text: <?php echo e(Js::from($p->data['title'])); ?>,
                floating: true,
                offsetY: 330,
                align: 'center',
                style: {
                    color: '#444',
                }
            }
        };

        let chartColumn = new ApexCharts(document.querySelector('#' + <?php echo e(Js::from($p->id)); ?>), chartColumnSettings);
        chartColumn.render();
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/components/chart-column.blade.php ENDPATH**/ ?>