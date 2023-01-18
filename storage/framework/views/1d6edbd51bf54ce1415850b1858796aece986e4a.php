<?php $attributes = $attributes->exceptProps([
    'p' => (object) [
        'item' => 'action-td',
        'data' => [['href' => '#!'], ['href' => '#!']],
    ],
]); ?>
<?php foreach (array_filter(([
    'p' => (object) [
        'item' => 'action-td',
        'data' => [['href' => '#!'], ['href' => '#!']],
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
$p = is_array($p) ? (object) $p : $p;
?>

<?php switch($p->item):
    case ('image'): ?>
        <td>
            <img src="<?php echo e(asset($p->data ?? 'images/avatar.png')); ?>" alt="" class="avatar-xs rounded-circle me-2">
        </td>
    <?php break; ?>

    <?php case ('avatar'): ?>
        <td>
            <div class="avatar-xs d-inline-block me-2">
                <div class="avatar-title bg-soft-primary rounded-circle text-primary">
                    <i class="mdi mdi-account-circle m-0"></i>
                </div>
            </div>
        </td>
    <?php break; ?>

    <?php case ('email'): ?>
        <?php
            $p->data_f = strpos($p->data, '@') != false && strpos($p->data, '.') != false ? 'mailto:' . strtolower($p->data) : '#!';
        ?>
        <td>
            <a href="<?php echo e($p->data_f); ?>" target="_new" title="Email">
                <?php echo strtolower($p->data); ?>

            </a>
        </td>
    <?php break; ?>

    <?php case ('tel'): ?>
        <?php
            $p->data_f = str_replace(' ', '', $p->data);
            $p->data_f = str_replace('(', '', $p->data_f);
            $p->data_f = str_replace(')', '', $p->data_f);
        ?>
        <td>
            <a href="tel:<?php echo e($p->data_f); ?>" target="_new" title="Tel">
                <?php echo $p->data; ?>

            </a>
        </td>
    <?php break; ?>

    <?php case ('link'): ?>
        <td>
            <a href="<?php echo e($p->data); ?>" target="_new">
                <?php echo e($p->data); ?>

            </a>
        </td>
    <?php break; ?>

    <?php case ('badge'): ?>
        <td>
            <span class="badge bg-soft-<?php echo e($p->data['color'] ?? 'secondary'); ?> font-size-12" role="button">
                <?php echo $p->data['text'] ?? $p->data; ?>

            </span>
        </td>
    <?php break; ?>

    <?php case ('datetime'): ?>
        <td class="text-muted font-size-12">
            <?php echo date('D, M j, Y <\b\\r> H:i A', strtotime($p->data)); ?>

        </td>
    <?php break; ?>

    <?php case ('checkbox-th'): ?>
        <th scope="col" style="width: 50px;">
            <div class="form-check font-size-16">
                <input type="checkbox" class="form-check-input" name="<?php echo e($p->data['name']); ?>" id="<?php echo e($p->data['id']); ?>" />
            </div>
        </th>
    <?php break; ?>

    <?php case ('checkbox-td'): ?>
        <th scope="row">
            <div class="form-check font-size-16">
                <input type="checkbox" class="form-check-input" name="<?php echo e($p->data['name']); ?>" id="<?php echo e($p->data['id']); ?>" />
            </div>
        </th>
    <?php break; ?>

    <?php case ('knob'): ?>
        <td>
            <ul class="list-inline mb-0">
                <li class="list-inline-item">
                    <div class="form-check form-switch form-switch-lg">
                        <input type="checkbox" class="form-check-input" id="customSwitchsizelg" checked />
                        <label class="form-check-label" for="customSwitchsizelg"></label>
                    </div>
                </li>
            </ul>
        </td>
    <?php break; ?>

    <?php case ('switch'): ?>
        <?php
            $p->id = $p->data['id'] ?? 'square-switch';
            $p->on = $p->data['on'] ?? 'On';
            $p->off = $p->data['off'] ?? 'Off';
            $p->title = "{$p->on} / {$p->off}";
            $p->checked = isset($p->data['checked']) && $p->data['checked'] == true ? 'checked' : '';
        ?>

        <td>
            <ul class="list-inline mb-0">
                <li class="list-inline-item">
                    <div class="square-switch" title="<?php echo e($p->title); ?>">
                        <input type="checkbox" id="<?php echo e($p->id); ?>" switch="bool" <?php echo e($p->checked); ?> />
                        <label for="<?php echo e($p->id); ?>" data-on-label="<?php echo e($p->on); ?>"
                            data-off-label="<?php echo e($p->off); ?>"></label>
                    </div>
                </li>
            </ul>
        </td>
    <?php break; ?>

    <?php case ('action-th'): ?>
        <th scope="col" style="width: 200px;"><?php echo e($p->data ?? 'Action'); ?></th>
    <?php break; ?>

    <?php case ('action-td'): ?>
        <td>
            <ul class="list-inline mb-0">
                <li class="list-inline-item" title="Edit">
                    <a href="#!" class="px-2 text-primary">
                        <i class="fas fa-pen-square font-size-14"></i>
                    </a>
                </li>
                <li class="list-inline-item" title="Delete">
                    <a href="#!" class="px-2 text-danger">
                        <i class="fas fa-times-circle font-size-14"></i>
                    </a>
                </li>
            </ul>
        </td>
    <?php break; ?>

    <?php case ('action-td-del'): ?>
        <td>
            <ul class="list-inline mb-0">
                <li class="list-inline-item" title="Delete">
                    <a href="#!" class="px-2 text-danger">
                        <i class="fas fa-times-circle font-size-14"></i>
                    </a>
                </li>
            </ul>
        </td>
    <?php break; ?>
    
    <?php case ('action-td-ddl'): ?>
        <td>
            <ul class="list-inline mb-0">
                <li class="list-inline-item">
                    <a href="javascript:void(0);" class="px-2 text-primary"><i class="uil uil-pen font-size-18"></i></a>
                </li>
                <li class="list-inline-item">
                    <a href="javascript:void(0);" class="px-2 text-danger"><i class="uil uil-trash-alt font-size-18"></i></a>
                </li>
                <li class="list-inline-item dropdown">
                    <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true">
                        <i class="uil uil-ellipsis-v"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else
                            here</a>
                    </div>
                </li>
            </ul>
        </td>
    <?php break; ?>

    <?php default: ?>
<?php endswitch; ?>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/components/table/item.blade.php ENDPATH**/ ?>