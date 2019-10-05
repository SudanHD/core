<?php $__env->startSection(config('laravelblocker.laravelBlockerTitleExtended')); ?>
    <?php echo trans('laravelblocker::laravelblocker.titles.show-blocked'); ?>

<?php $__env->stopSection(); ?>

<?php
    switch (config('laravelblocker.blockerBootstapVersion')) {
        case '4':
            $containerClass = 'card';
            $containerHeaderClass = 'card-header bg-warning text-white';
            $containerBodyClass = 'card-body';
            break;
        case '3':
        default:
            $containerClass = 'panel panel-warning';
            $containerHeaderClass = 'panel-heading';
            $containerBodyClass = 'panel-body';
    }
    $blockerBootstrapCardClasses = (is_null(config('laravelblocker.blockerBootstrapCardClasses')) ? '' : config('laravelblocker.blockerBootstrapCardClasses'));
?>

<?php $__env->startSection(config('laravelblocker.blockerBladePlacementCss')); ?>
    <?php if(config('laravelblocker.enabledDatatablesJs')): ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(config('laravelblocker.datatablesCssCDN')); ?>">
    <?php endif; ?>
    <?php if(config('laravelblocker.blockerEnableFontAwesomeCDN')): ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(config('laravelblocker.blockerFontAwesomeCDN')); ?>">
    <?php endif; ?>
    <?php echo $__env->make('laravelblocker::partials.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('laravelblocker::partials.bs-visibility-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('laravelblocker::partials.flash-messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="<?php echo e($containerClass); ?> <?php echo e($blockerBootstrapCardClasses); ?>">
                    <div class="<?php echo e($containerHeaderClass); ?>">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                <?php echo trans('laravelblocker::laravelblocker.blocked-items-title'); ?>

                            </span>
                            <div class="btn-group pull-right btn-group-xs">
                                <button type="button" class="btn btn-warning text-white dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v fa-fw" aria-hidden="true"></i>
                                    <span class="sr-only">
                                        <?php echo trans('laravelblocker::laravelblocker.users-menu-alt'); ?>

                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="<?php echo e(route('laravelblocker::blocker.create')); ?>">
                                        <i class="fa fa-fw fa-plus" aria-hidden="true"></i>
                                        <?php echo trans('laravelblocker::laravelblocker.buttons.create-new-blocked'); ?>

                                    </a>
                                    <?php if($deletedBlockedItems->count() > 0): ?>
                                        <a class="dropdown-item" href="<?php echo e(url('/blocker-deleted')); ?>">
                                            <i class="fa fa-fw fa-trash-o" aria-hidden="true"></i>
                                            <?php echo trans('laravelblocker::laravelblocker.buttons.show-deleted-blocked'); ?>

                                            <span class="badge-pill badge badge-warning">
                                                <?php echo e($deletedBlockedItems->count()); ?>

                                            </span>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="<?php echo e($containerBodyClass); ?>">
                        <?php if(config('laravelblocker.enableSearchBlocked')): ?>
                            <?php echo $__env->make('laravelblocker::forms.search-blocked', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>

                        <?php echo $__env->make('laravelblocker::partials.blocked-items-table', ['tabletype' => 'normal'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('laravelblocker::modals.confirm-modal',[
        'formTrigger' => 'confirmDelete',
        'modalClass' => 'danger',
        'actionBtnIcon' => 'fa-trash-o'
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection(config('laravelblocker.blockerBladePlacementJs')); ?>
    <?php if(config('laravelblocker.enablejQueryCDN')): ?>
        <script type="text/javascript" src="<?php echo e(config('laravelblocker.JQueryCDN')); ?>"></script>
    <?php endif; ?>
    <?php if(config('laravelblocker.enabledDatatablesJs')): ?>
        <?php echo $__env->make('laravelblocker::scripts.datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php echo $__env->make('laravelblocker::scripts.confirm-modal', ['formTrigger' => '#confirmDelete'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(config('laravelblocker.tooltipsEnabled')): ?>
        <?php echo $__env->make('laravelblocker::scripts.tooltips', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php if(config('laravelblocker.enableSearchBlocked')): ?>
        <?php echo $__env->make('laravelblocker::scripts.search-blocked', ['searchtype' => 'normal'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->yieldContent('inline_template_linked_css'); ?>
<?php echo $__env->yieldContent('inline_footer_scripts'); ?>

<?php echo $__env->make(config('laravelblocker.laravelBlockerBladeExtended'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/o/obaaa/projects/SudanHD/vendor/jeremykenedy/laravel-blocker/src/resources/views//laravelblocker/index.blade.php ENDPATH**/ ?>