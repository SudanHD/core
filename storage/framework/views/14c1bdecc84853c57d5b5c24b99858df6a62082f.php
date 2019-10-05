<?php $__env->startSection(config('roles.titleExtended')); ?>
    <?php echo trans('laravelroles::laravelroles.titles.dashboard'); ?>

<?php $__env->stopSection(); ?>

<?php
    switch (config('roles.bootstapVersion')) {
        case '3':
            $rolesContainerClass = 'panel';
            $rolesContainerHeaderClass = 'panel-heading';
            $rolesContainerBodyClass = 'panel-body padding-0';
            break;
        case '4':
        default:
            $rolesContainerClass = 'card';
            $rolesContainerHeaderClass = 'card-header';
            $rolesContainerBodyClass = 'card-body p-0';
            break;
    }

    $bootstrapCardClasses = (is_null(config('roles.bootstrapCardClasses')) ? '' : config('roles.bootstrapCardClasses'));

    /*
    $totalUserItems = count($sortedRolesWithPermissionsAndUsers);
    $modulus = $totalUserItems % 3;
    if($modulus == 0) {
        $cardColClass = 'col-sm-6 col-md-4';
    } elseif($modulus == 1) {
        $cardColClass = 'col-sm-6 col-md-3';
    } elseif($modulus == 2) {
        $cardColClass = 'col-sm-6 col-md-4';
    } else {
        $cardColClass = 'col-sm-6';
    }
    */
?>

<?php $__env->startSection(config('roles.bladePlacementCss')); ?>
    <?php if(config('roles.enabledDatatablesJs')): ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(config('roles.datatablesCssCDN')); ?>">
    <?php endif; ?>
    <?php if(config('roles.enableFontAwesomeCDN')): ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(config('roles.fontAwesomeCDN')); ?>">
    <?php endif; ?>
    <?php echo $__env->make('laravelroles::laravelroles.partials.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('laravelroles::laravelroles.partials.bs-visibility-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('laravelroles::laravelroles.partials.flash-messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container-fluid">
        <div class="row">
            <?php echo $__env->make('laravelroles::laravelroles.cards.roles-card', ['items' => $sortedRolesWithPermissionsAndUsers], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('laravelroles::laravelroles.cards.permissions-card', ['items' => $sortedPermissionsRolesUsers], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <?php echo $__env->make('laravelroles::laravelroles.tables.roles-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>

        <div class="clearfix mb-4"></div>

        <div class="row">
            <div class="col-sm-12">
                <?php echo $__env->make('laravelroles::laravelroles.tables.permissions-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>

        <div class="clearfix mb-4"></div>

        <?php echo $__env->make('laravelroles::laravelroles.modals.confirm-modal',[
            'formTrigger' => 'confirmDelete',
            'modalClass' => 'danger',
            'actionBtnIcon' => 'fa-trash-o'
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection(config('roles.bladePlacementJs')); ?>
    <?php if(config('roles.enablejQueryCDN')): ?>
        <script type="text/javascript" src="<?php echo e(config('roles.JQueryCDN')); ?>"></script>
    <?php endif; ?>
    <?php echo $__env->make('laravelroles::laravelroles.scripts.confirm-modal', ['formTrigger' => '#confirmDelete'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(config('roles.enabledDatatablesJs')): ?>
        <?php echo $__env->make('laravelroles::laravelroles.scripts.datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php if(config('roles.tooltipsEnabled')): ?>
        <?php echo $__env->make('laravelroles::laravelroles.scripts.tooltips', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->yieldContent('inline_template_linked_css'); ?>
<?php echo $__env->yieldContent('inline_footer_scripts'); ?>

<?php echo $__env->make(config('roles.bladeExtended'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/o/obaaa/projects/SudanHD/vendor/jeremykenedy/laravel-roles/src/resources/views//laravelroles/crud/dashboard.blade.php ENDPATH**/ ?>