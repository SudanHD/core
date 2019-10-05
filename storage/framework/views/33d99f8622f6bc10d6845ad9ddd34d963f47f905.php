<div class="col-sm-6 mb-4 d-flex">
    <div class="card">
        <div class="card-header bg-default">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <span id="card_title">
                    <?php echo trans('laravelroles::laravelroles.titles.roles-card'); ?>

                </span>
                <span class="badge badge-pill badge-dark">
                    <?php echo count($items); ?>

                </span>
            </div>
        </div>
        <div class="list-group-flush flex-fill">
            <ul class="list-group list-group-flush">
                <?php if(count($items) != 0): ?>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            if($item['role']['slug'] == 'user') {
                                $indRoleBadgeClass = 'badge-info text-white';
                                $indRoleTextClass = 'text-info';
                            } elseif($item['role']['slug'] == 'admin'){
                                $indRoleBadgeClass = 'badge-success';
                                $indRoleTextClass = 'text-success';
                            } elseif($item['role']['slug'] == 'unverified'){
                                $indRoleBadgeClass = 'badge-danger';
                                $indRoleTextClass = 'text-danger';
                            } else {
                                $indRoleBadgeClass = 'badge-secondary';
                                $indRoleTextClass = 'text-secondary';
                            }
                        ?>
                        <li id="accordion_roles_<?php echo e($itemKey); ?>" class="list-group-item accordion <?php if($item['users']->count() > 0 || $item['permissions']->count() > 0): ?> list-group-item-action accordion-item collapsed <?php endif; ?>" data-toggle="collapse" href="#collapse_roles_<?php echo e($itemKey); ?>">
                            <div class="d-flex justify-content-between align-items-center" <?php if($item['users']->count() > 0 || $item['permissions']->count() > 0): ?> data-toggle="tooltip" title="<?php echo e(trans("laravelroles::laravelroles.tooltips.show-hide")); ?>" <?php endif; ?>>
                                <span class="badge badge-default role-name">
                                    <?php echo trans('laravelroles::laravelroles.titles.role-card'); ?> <strong class="<?php echo e($indRoleTextClass); ?>"><?php echo e($item['role']->name); ?></strong>
                                </span>
                                <div>
                                    <span class="badge badge-light">
                                        <small>
                                            <?php echo e(trans('laravelroles::laravelroles.cards.level', ['level' => $item['role']->level])); ?>

                                        </small>
                                    </span>
                                    <span class="badge badge-pill <?php echo e($indRoleBadgeClass); ?>">
                                        <small>
                                            <?php echo trans_choice('laravelroles::laravelroles.cards.users-count', count($item['users']), ['count' => count($item['users'])]); ?>

                                        </small>
                                    </span>
                                    <span class="badge badge-secondary badge-pill">
                                        <small>
                                            <?php echo trans_choice('laravelroles::laravelroles.cards.permissions-count', count($item['permissions']), ['count' => count($item['permissions'])]); ?>

                                        </small>
                                    </span>
                                </div>
                            </div>
                            <?php if($item['users']->count() > 0 || $item['permissions']->count() > 0): ?>
                                <div id="collapse_roles_<?php echo e($itemKey); ?>" class="collapse" data-parent="#accordion_roles_<?php echo e($itemKey); ?>" >

                                    <?php if($item['users']->count() > 0): ?>
                                        <table class="table table-striped table-sm mt-3">
                                            <caption>
                                                <?php echo trans('laravelroles::laravelroles.cards.role-card.table-users-caption', ['role' => $item['role']->name]); ?>

                                            </caption>
                                            <thead>
                                                <tr>
                                                    <th><?php echo trans('laravelroles::laravelroles.cards.role-card.user-id'); ?></th>
                                                    <th><?php echo trans('laravelroles::laravelroles.cards.role-card.user-name'); ?></th>
                                                    <th><?php echo trans('laravelroles::laravelroles.cards.role-card.user-email'); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $item['users']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemUserKey => $itemUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($itemUser->id); ?></td>
                                                        <td><?php echo e($itemUser->name); ?></td>
                                                        <td><?php echo e($itemUser->email); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    <?php endif; ?>
                                    <?php if($item['permissions']->count() > 0): ?>
                                        <table class="table table-striped table-sm mt-3">
                                            <caption>
                                                <?php echo trans('laravelroles::laravelroles.cards.role-card.table-permissions-caption', ['role' => $item['role']->name]); ?>

                                            </caption>
                                            <thead>
                                                <tr>
                                                    <th><?php echo trans('laravelroles::laravelroles.cards.role-card.permissions-id'); ?></th>
                                                    <th><?php echo trans('laravelroles::laravelroles.cards.role-card.permissions-name'); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $item['permissions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemUserKey => $itemUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($itemUser->id); ?></td>
                                                        <td><?php echo e($itemUser->name); ?></td>
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
<?php /**PATH /home/o/obaaa/projects/SudanHD/vendor/jeremykenedy/laravel-roles/src/resources/views//laravelroles/cards/roles-card.blade.php ENDPATH**/ ?>