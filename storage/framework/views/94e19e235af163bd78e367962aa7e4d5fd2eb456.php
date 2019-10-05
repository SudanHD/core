<div class="col-sm-6 mb-4 d-flex">
    <div class="card">
        <div class="card-header bg-default">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <span id="card_title">
                    <?php echo trans('laravelroles::laravelroles.titles.permissions-card'); ?>

                </span>
                <span class="badge badge-pill badge-dark">
                    <?php echo e(count($items)); ?>

                </span>
            </div>
        </div>
        <div class="flex-fill">
            <ul class="list-group list-group-flush">
                <?php if(count($items) != 0): ?>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li id="accordion_permissions_<?php echo e($itemKey); ?>" class="list-group-item accordion <?php if($item['roles']->count() > 0 || $item['users']->count() > 0): ?> list-group-item-action accordion-item collapsed <?php endif; ?>" data-toggle="collapse" href="#collapse_permissions_<?php echo e($itemKey); ?>">

                            <div class="d-flex justify-content-between align-items-center" <?php if($item['roles']->count() > 0 || $item['users']->count() > 0): ?> data-toggle="tooltip" title="<?php echo e(trans("laravelroles::laravelroles.tooltips.show-hide")); ?>" <?php endif; ?>>
                                <span class="badge badge-default permission-name">
                                    <?php echo e($item['permission']->name); ?>

                                </span>
                                <div>
                                    <span class="badge badge-primary badge-pill">
                                        <?php echo trans_choice('laravelroles::laravelroles.cards.roles-count', count($item['roles']), ['count' => count($item['roles'])]); ?>

                                    </span>
                                    <span class="badge badge-secondary badge-pill">
                                        <?php echo trans_choice('laravelroles::laravelroles.cards.users-count', count($item['users']), ['count' => count($item['users'])]); ?>

                                    </span>
                                </div>
                            </div>


                            <?php if($item['roles']->count() > 0 || $item['users']->count() > 0): ?>
                                <div id="collapse_permissions_<?php echo e($itemKey); ?>" class="collapse" data-parent="#accordion_permissions_<?php echo e($itemKey); ?>" >
                                    <?php if($item['roles']->count() > 0): ?>
                                        <table class="table table-striped table-sm mt-3">
                                            <caption>
                                                <?php echo trans('laravelroles::laravelroles.cards.permissions-card.permissions-table-roles-caption', ['permission' => $item['permission']->name]); ?>

                                            </caption>
                                            <thead>
                                                <tr>
                                                    <th><?php echo trans('laravelroles::laravelroles.cards.permissions-card.role-id'); ?></th>
                                                    <th><?php echo trans('laravelroles::laravelroles.cards.permissions-card.role-name'); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $item['roles']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemUserKey => $itemRole): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($itemRole->id); ?></td>
                                                        <td><?php echo e($itemRole->name); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    <?php endif; ?>
                                    <?php if($item['users']->count() > 0): ?>
                                        <table class="table table-striped table-sm">
                                            <caption>
                                                <?php echo trans('laravelroles::laravelroles.cards.permissions-card.permissions-table-users-caption', ['permission' => $item['permission']->name]); ?>

                                            </caption>
                                            <thead>
                                                <tr>
                                                    <th><?php echo trans('laravelroles::laravelroles.cards.role-card.user-id'); ?></th>
                                                    <th><?php echo trans('laravelroles::laravelroles.cards.role-card.user-name'); ?></th>
                                                    <th><?php echo trans('laravelroles::laravelroles.cards.role-card.user-email'); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $item['users']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemUserKey => $itemRole): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($itemRole->id); ?></td>
                                                        <td><?php echo e($itemRole->name); ?></td>
                                                        <td><?php echo e($itemRole->email); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <li class="list-group-item">
                        <?php echo trans('laravelroles::laravelroles.cards.none-count'); ?>

                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>
<?php /**PATH /home/o/obaaa/projects/SudanHD/vendor/jeremykenedy/laravel-roles/src/resources/views//laravelroles/cards/permissions-card.blade.php ENDPATH**/ ?>