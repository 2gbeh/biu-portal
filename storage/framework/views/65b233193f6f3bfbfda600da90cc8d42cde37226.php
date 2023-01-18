<?php $attributes = $attributes->exceptProps([
    'p' => [
        [
            [
                'col' => 4,
                'type' => 'search',
                'label' => 'Username',
                'name' => 'username',
                'placeholder' => 'Enter username',
                'datalist' => $_SERVER,
                'constraint' => 'required', // autofocus|required|readonly|disabled|multiple
            ],
            [
                'col' => 4,
                'type' => 'file',
                'label' => 'Passport',
                'name' => 'photo',
                'accept' => 'image/*',
                'constraint' => 'required multiple',
            ],
            [
                'col' => 4,
                'type' => 'select',
                'label' => 'Gender',
                'name' => 'sex',
                'value' => 'REQUEST_METHOD',
                'options' => $_SERVER,
                'constraint' => 'required',
            ],
        ],
        [
            [
                'type' => 'textarea',
                'label' => 'Address',
                'name' => 'address',
                'placeholder' => 'Home address',
                'constraint' => 'required',
            ],
        ],
    ],
]); ?>
<?php foreach (array_filter(([
    'p' => [
        [
            [
                'col' => 4,
                'type' => 'search',
                'label' => 'Username',
                'name' => 'username',
                'placeholder' => 'Enter username',
                'datalist' => $_SERVER,
                'constraint' => 'required', // autofocus|required|readonly|disabled|multiple
            ],
            [
                'col' => 4,
                'type' => 'file',
                'label' => 'Passport',
                'name' => 'photo',
                'accept' => 'image/*',
                'constraint' => 'required multiple',
            ],
            [
                'col' => 4,
                'type' => 'select',
                'label' => 'Gender',
                'name' => 'sex',
                'value' => 'REQUEST_METHOD',
                'options' => $_SERVER,
                'constraint' => 'required',
            ],
        ],
        [
            [
                'type' => 'textarea',
                'label' => 'Address',
                'name' => 'address',
                'placeholder' => 'Home address',
                'constraint' => 'required',
            ],
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

<?php $__env->startPush('styles'); ?>
    <link href="<?php echo e(asset('assets/minible/libs/select2/css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts_'); ?>
    <script src="<?php echo e(asset('assets/minible/libs/select2/js/select2.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php
$setDefaults = function (array $item) {
    $b = '<b class="text-danger">*</b> ';

    if (isset($item['label'])) {
        $item['label'] = $item['label'][0] == '*' ? $b . substr($item['label'], 1) : $item['label'];
    }
    $item['col'] = isset($item['col']) ? 'col-md-' . $item['col'] : 'col-lg-12';
    $item['type'] = $item['type'] ?? 'text';
    $item['id'] = $item['id'] ?? $item['name'];
    $item['value'] = $item['value'] ?? old($item['name']);
    $item['placeholder_'] = $item['type'] == 'select' && isset($item['placeholder']) ? $item['placeholder'] : '-- select --';
    $item['placeholder'] = $item['placeholder'] ?? '';
    $item['constraint'] = $item['constraint'] ?? '';
    $item['accept'] = $item['accept'] ?? '*.*';
    $item['min'] = $item['min'] ?? 0;
    $item['max'] = $item['max'] ?? null;
    $item['step'] = $item['step'] ?? 1;
    $item['rows'] = $item['rows'] ?? 4;

    return $item;
};

$isMultiple = function (array $item) {
    return strpos($item['constraint'], 'multiple') !== false;
};

$isSelected = function (string $value, string $selected = null) {
    return $value == $selected ? 'selected="selected"' : '';
};
?>

<?php $__currentLoopData = $p; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="row">
        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $item = $setDefaults($item_); ?>

            <div class="<?php echo e($item['col']); ?>">
                <div class="mb-3">
                    <?php if(isset($item['label'])): ?>
                        <?php if(!in_array($item['type'], ['checkbox', 'radio'])): ?>
                            <label class="form-label control-label" for="<?php echo e($item['id']); ?>">
                                <?php echo $item['label']; ?>

                            </label>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php switch($item['type']):
                        case ('checkbox'): ?>
                            <input class="form-check-input" type="checkbox" id="<?php echo e($item['id']); ?>" name="<?php echo e($item['name']); ?>"
                                value="<?php echo e($value); ?>" <?php echo e($item['constraint']); ?> /> &nbsp;

                            <label class="form-check-label fw-normal" for="<?php echo e($item['id']); ?>">
                                <?php echo $item['label']; ?>

                            </label>
                        <?php break; ?>

                        <?php case ('radio'): ?>
                            <input class="form-check-input" type="radio" id="<?php echo e($item['id']); ?>" name="<?php echo e($item['name']); ?>"
                                <?php echo e($item['constraint']); ?> /> &nbsp;

                            <label class="form-check-label fw-normal" for="<?php echo e($item['id']); ?>">
                                value="<?php echo e($value); ?>" <?php echo $item['label']; ?>

                            </label>
                        <?php break; ?>

                        <?php case ('file'): ?>
                            <input class="form-control" type="file" id="<?php echo e($item['id']); ?>" name="<?php echo e($item['name']); ?>"
                                accept="<?php echo e($item['accept']); ?>" <?php echo e($item['constraint']); ?> />
                        <?php break; ?>

                        <?php case ('select'): ?>
                            <select class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'form-select form-control select2',
                                'select2-multiple' => $isMultiple($item),
                            ]) ?>" id="<?php echo e($item['id'] ?? $item['name']); ?>"
                                name="<?php echo e($item['name']); ?>" <?php echo e($item['constraint']); ?>>

                                <option value="" disabled selected hidden><?php echo e($item['placeholder_']); ?></option>

                                <?php $__currentLoopData = $item['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $text): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(!is_null($text)): ?>
                                        <option value="<?php echo e($value); ?>" <?php echo e($isSelected($value, $item['value'])); ?>>
                                            <?php echo e($text); ?>

                                        </option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        <?php break; ?>

                        <?php case ('textarea'): ?>
                            <textarea class="form-control" id="<?php echo e($item['id']); ?>" name="<?php echo e($item['name']); ?>"
                                placeholder="<?php echo e($item['placeholder']); ?>" rows="<?php echo e($item['rows']); ?>" <?php echo e($item['constraint']); ?>><?php echo e($item['value']); ?></textarea>
                        <?php break; ?>

                        <?php default: ?>
                            <?php if(isset($item['datalist'])): ?>
                                <input class="form-control" type="<?php echo e($item['type']); ?>" id="<?php echo e($item['id']); ?>"
                                    name="<?php echo e($item['name']); ?>" value="<?php echo e($item['value']); ?>"
                                    placeholder="<?php echo e($item['placeholder']); ?>" list="dl-<?php echo e($item['name']); ?>"
                                    <?php echo e($item['constraint']); ?> />

                                <datalist id="dl-<?php echo e($item['name']); ?>">
                                    <?php $__currentLoopData = $item['datalist']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(!is_null($value)): ?>
                                            <option value="<?php echo e($value); ?>">
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </datalist>
                            <?php else: ?>
                                <input class="form-control" type="<?php echo e($item['type']); ?>" id="<?php echo e($item['id']); ?>"
                                    name="<?php echo e($item['name']); ?>" value="<?php echo e($item['value']); ?>"
                                    placeholder="<?php echo e($item['placeholder']); ?>" min="<?php echo e($item['min']); ?>"
                                    max="<?php echo e($item['max']); ?>" step="<?php echo e($item['step']); ?>" <?php echo e($item['constraint']); ?> />
                            <?php endif; ?>
                    <?php endswitch; ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/components/form/controls.blade.php ENDPATH**/ ?>