<?php
    $tableType = 'normal';
    if(isset($isDeletedPermissions)) {
        $tableItems = $deletedPermissions;
        $tableType = 'deleted';
    } else {
        $tableItems = $sortedPermissionsRolesUsers;
    }
?>

<div class="<?php echo e($rolesContainerClass); ?> <?php echo e($bootstrapCardClasses); ?>">
    <div class="<?php echo e($rolesContainerHeaderClass); ?>">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <span id="card_title">
                <?php if(isset($isDeletedPermissions)): ?>
                    <?php echo trans('laravelroles::laravelroles.titles.permissions-deleted-table'); ?>

                <?php else: ?>
                    <?php echo trans('laravelroles::laravelroles.titles.permissions-table'); ?>

                <?php endif; ?>
            </span>
            <?php if(isset($isDeletedPermissions)): ?>
                <div class="pull-right">
                    <div class="btn-group pull-right btn-group-xs">
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-ellipsis-v fa-fw" aria-hidden="true"></i>
                            <span class="sr-only">
                                <?php echo trans('laravelroles::laravelroles.titles.dropdown-menu-alt'); ?>

                            </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="<?php echo e(route('laravelroles::roles.index')); ?>" class="dropdown-item mb-1">
                                <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                <?php echo trans('laravelroles::laravelroles.buttons.back-to-roles-dashboard'); ?>

                            </a>
                            <hr class="mt-0 mb-0">
                            <?php echo $__env->make('laravelroles::laravelroles.forms.destroy-all-permissions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('laravelroles::laravelroles.forms.restore-all-permissions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <?php if($deletedPermissionsItems->count() > 0): ?>
                    <div class="btn-group pull-right btn-group-xs">
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-ellipsis-v fa-fw" aria-hidden="true"></i>
                            <span class="sr-only">
                                <?php echo trans('laravelroles::laravelroles.dropdown-menu-alt'); ?>

                            </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="<?php echo e(route('laravelroles::permissions.create')); ?>">
                                <i class="fa fa-fw fa-plus" aria-hidden="true"></i>
                                <?php echo trans('laravelroles::laravelroles.buttons.create-new-permission'); ?>

                            </a>
                            <a class="dropdown-item" href="<?php echo e(route('laravelroles::permissions-deleted')); ?>">
                                <i class="fa fa-fw fa-trash-o" aria-hidden="true"></i>
                                <?php echo trans('laravelroles::laravelroles.buttons.show-deleted-permissions'); ?>

                                <span class="badge-pill badge badge-danger">
                                    <?php echo e($deletedPermissionsItems->count()); ?>

                                </span>
                            </a>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="float-right">
                        <a class="btn btn-sm" href="<?php echo e(route('laravelroles::permissions.create')); ?>">
                            <i class="fa fa-fw fa-plus" aria-hidden="true"></i>
                            <?php echo trans('laravelroles::laravelroles.buttons.create-new-permission'); ?>

                        </a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="<?php echo e($rolesContainerBodyClass); ?>">
        <?php echo $__env->make('laravelroles::laravelroles.tables.permission-items-table', ['tabletype' => $tableType, 'items' => $tableItems], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<?php /**PATH /home/o/obaaa/projects/SudanHD/vendor/jeremykenedy/laravel-roles/src/resources/views//laravelroles/tables/permissions-table.blade.php ENDPATH**/ ?>