<div class="table-responsive blocked-table">
    <table class="table table-sm table-striped data-table">
        <caption id="blocked_count">
            <?php echo trans_choice('laravelblocker::laravelblocker.blocked-table.caption', 1, ['blockedcount' => $blocked->count()]); ?>

        </caption>
        <thead class="thead">
            <tr>
                <th scope="col">
                    <?php echo trans('laravelblocker::laravelblocker.blocked-table.id'); ?>

                </th>
                <th scope="col">
                    <?php echo trans('laravelblocker::laravelblocker.blocked-table.type'); ?>

                </th>
                <th scope="col">
                    <?php echo trans('laravelblocker::laravelblocker.blocked-table.value'); ?>

                </th>
                <th scope="col" class="hidden-xs">
                    <?php echo trans('laravelblocker::laravelblocker.blocked-table.note'); ?>

                </th>
                <th scope="col" class="hidden-xs hidden-sm">
                    <?php echo trans('laravelblocker::laravelblocker.blocked-table.userId'); ?>

                </th>
                <th scope="col" class="hidden-xs hidden-sm hidden-md">
                    <?php echo trans('laravelblocker::laravelblocker.blocked-table.createdAt'); ?>

                </th>
                <th scope="col" class="hidden-xs hidden-sm hidden-md">
                    <?php echo trans('laravelblocker::laravelblocker.blocked-table.updatedAt'); ?>

                </th>
                <?php if($tabletype == 'deleted'): ?>
                    <th scope="col" class="hidden-xs hidden-sm">
                        <?php echo trans('laravelblocker::laravelblocker.blocked-table.deletedAt'); ?>

                    </th>
                <?php endif; ?>
                <th class="no-search no-sort" colspan="3">
                    <?php echo trans('laravelblocker::laravelblocker.blocked-table.actions'); ?>

                </th>
            </tr>
        </thead>
        <tbody class="blocked-table-body">
            <?php if($blocked->count() > 0): ?>
                <?php $__currentLoopData = $blocked; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blockedItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <?php echo $blockedItem->id; ?>

                        </td>
                        <td>
                            <?php echo $blockedItem->blockedType->slug; ?>

                        </td>
                        <td>
                            <?php echo $blockedItem->value; ?>

                        </td>
                        <td class="hidden-xs">
                            <?php echo $blockedItem->note; ?>

                        </td>
                        <td class="hidden-xs hidden-sm">
                            <?php if($blockedItem->userId): ?>
                                <?php echo $blockedItem->userId; ?>

                            <?php else: ?>
                                <span class="disabled">
                                    <?php echo trans('laravelblocker::laravelblocker.none'); ?>

                                </span>
                            <?php endif; ?>
                        </td>
                        <td class="hidden-xs hidden-sm hidden-md">
                            <?php echo $blockedItem->created_at->format('m/d/Y H:ia'); ?>

                        </td>
                        <td class="hidden-xs hidden-sm hidden-md">
                            <?php echo $blockedItem->updated_at->format('m/d/Y H:ia'); ?>

                        </td>
                        <?php if($tabletype == 'deleted'): ?>
                            <td class="hidden-xs hidden-sm">
                                <?php echo $blockedItem->deleted_at->format('m/d/Y H:ia'); ?>

                            </td>
                        <?php endif; ?>
                        <?php if($tabletype == 'normal'): ?>
                            <td>
                                <a class="btn btn-sm btn-info btn-block text-white" href="/blocker/<?php echo e($blockedItem->id); ?>" data-toggle="tooltip" title="<?php echo e(trans("laravelblocker::laravelblocker.tooltips.show")); ?>">
                                    <?php echo trans("laravelblocker::laravelblocker.buttons.show"); ?>

                                </a>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-warning btn-block text-white" href="/blocker/<?php echo e($blockedItem->id); ?>/edit" data-toggle="tooltip" title="<?php echo e(trans("laravelblocker::laravelblocker.tooltips.edit")); ?>">
                                    <?php echo trans("laravelblocker::laravelblocker.buttons.edit"); ?>

                                </a>
                            </td>
                            <td>
                                <?php echo $__env->make('laravelblocker::forms.delete-sm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </td>
                        <?php endif; ?>
                        <?php if($tabletype == 'deleted'): ?>
                            <td>
                                <a class="btn btn-sm btn-info btn-block text-white" href="/blocker-deleted/<?php echo e($blockedItem->id); ?>" data-toggle="tooltip" title="<?php echo e(trans("laravelblocker::laravelblocker.tooltips.show")); ?>">
                                    <?php echo trans("laravelblocker::laravelblocker.buttons.show"); ?>

                                </a>
                            </td>
                            <td>
                                <?php echo $__env->make('laravelblocker::forms.restore-item', ['restoreType' => 'small'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </td>
                            <td>
                                <?php echo $__env->make('laravelblocker::forms.destroy-sm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <tr>
                    <td><?php echo trans("laravelblocker::laravelblocker.blocked-table.none"); ?></td>
                    <td></td>
                    <td class="hidden-xs"></td>
                    <td class="hidden-xs"></td>
                    <td class="hidden-xs"></td>
                    <td class="hidden-sm hidden-xs"></td>
                    <td class="hidden-sm hidden-xs hidden-md"></td>
                    <td class="hidden-sm hidden-xs hidden-md"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            <?php endif; ?>
        </tbody>
        <?php if(config('laravelblocker.enableSearchBlocked')): ?>
            <tbody id="search_results"></tbody>
        <?php endif; ?>
    </table>
    <?php if(config('laravelblocker.blockerPaginationEnabled')): ?>
        <div id="blocked_pagination">
            <?php echo e($blocked->links()); ?>

        </div>
    <?php endif; ?>
</div>
<?php /**PATH /home/o/obaaa/projects/SudanHD/vendor/jeremykenedy/laravel-blocker/src/resources/views//partials/blocked-items-table.blade.php ENDPATH**/ ?>