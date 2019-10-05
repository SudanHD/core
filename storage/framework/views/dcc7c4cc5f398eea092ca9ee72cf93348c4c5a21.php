<?php
    $tableType = 'normal';
    if(isset($isDeletedRoles)) {
        $tableItems = $deletedRoleItems;
        $tableType = 'deleted';
    } else {
        $tableItems = $sortedRolesWithPermissionsAndUsers;
    }
?>

<div class="<?php echo e($rolesContainerClass); ?> <?php echo e($bootstrapCardClasses); ?>">
    <div class="<?php echo e($rolesContainerHeaderClass); ?>">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <span id="card_title">
                <?php if(isset($isDeletedRoles)): ?>
                    <?php echo trans('laravelroles::laravelroles.titles.roles-deleted-table'); ?>

                <?php else: ?>
                    <?php echo trans('laravelroles::laravelroles.titles.roles-table'); ?>

                <?php endif; ?>
            </span>
            <?php if(isset($isDeletedRoles)): ?>
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
                            <?php echo $__env->make('laravelroles::laravelroles.forms.destroy-all-roles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('laravelroles::laravelroles.forms.restore-all-roles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <?php if($deletedRoleItems->count() > 0): ?>
                    <div class="btn-group pull-right btn-group-xs">
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-ellipsis-v fa-fw" aria-hidden="true"></i>
                            <span class="sr-only">
                                <?php echo trans('laravelroles::laravelroles.titles.dropdown-menu-alt'); ?>

                            </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="<?php echo e(route('laravelroles::roles.create')); ?>">
                                <i class="fa fa-fw fa-plus" aria-hidden="true"></i>
                                <?php echo trans('laravelroles::laravelroles.buttons.create-new-role'); ?>

                            </a>
                            <a class="dropdown-item" href="<?php echo e(route('laravelroles::roles-deleted')); ?>">
                                <i class="fa fa-fw fa-trash-o" aria-hidden="true"></i>
                                <?php echo trans('laravelroles::laravelroles.buttons.show-deleted-roles'); ?>

                                <span class="badge-pill badge badge-danger">
                                    <?php echo e($deletedRoleItems->count()); ?>

                                </span>
                            </a>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="float-right">
                        <a class="btn btn-sm" href="<?php echo e(route('laravelroles::roles.create')); ?>">
                            <i class="fa fa-fw fa-plus" aria-hidden="true"></i>
                            <?php echo trans('laravelroles::laravelroles.buttons.create-new-role'); ?>

                        </a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="<?php echo e($rolesContainerBodyClass); ?>">
        <?php echo $__env->make('laravelroles::laravelroles.tables.role-items-table', ['tabletype' => $tableType, 'items' => $tableItems], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<?php /**PATH /home/o/obaaa/projects/SudanHD/vendor/jeremykenedy/laravel-roles/src/resources/views//laravelroles/tables/roles-table.blade.php ENDPATH**/ ?>