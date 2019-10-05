<?php $__env->startSection('template_title'); ?>
    <?php echo trans('usersmanagement.showing-all-users'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_linked_css'); ?>
    <?php if(config('usersmanagement.enabledDatatablesJs')): ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(config('usersmanagement.datatablesCssCDN')); ?>">
    <?php endif; ?>
    <style type="text/css" media="screen">
        .users-table {
            border: 0;
        }
        .users-table tr td:first-child {
            padding-left: 15px;
        }
        .users-table tr td:last-child {
            padding-right: 15px;
        }
        .users-table.table-responsive,
        .users-table.table-responsive table {
            margin-bottom: 0;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">

                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <?php echo trans('usersmanagement.showing-all-users'); ?>

                            </span>

                            <div class="btn-group pull-right btn-group-xs">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v fa-fw" aria-hidden="true"></i>
                                    <span class="sr-only">
                                        <?php echo trans('usersmanagement.users-menu-alt'); ?>

                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="/users/create">
                                        <i class="fa fa-fw fa-user-plus" aria-hidden="true"></i>
                                        <?php echo trans('usersmanagement.buttons.create-new'); ?>

                                    </a>
                                    <a class="dropdown-item" href="/users/deleted">
                                        <i class="fa fa-fw fa-group" aria-hidden="true"></i>
                                        <?php echo trans('usersmanagement.show-deleted-users'); ?>

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <?php if(config('usersmanagement.enableSearchUsers')): ?>
                            <?php echo $__env->make('partials.search-users-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>

                        <div class="table-responsive users-table">
                            <table class="table table-striped table-sm data-table">
                                <caption id="user_count">
                                    <?php echo e(trans_choice('usersmanagement.users-table.caption', 1, ['userscount' => $users->count()])); ?>

                                </caption>
                                <thead class="thead">
                                    <tr>
                                        <th><?php echo trans('usersmanagement.users-table.id'); ?></th>
                                        <th><?php echo trans('usersmanagement.users-table.name'); ?></th>
                                        <th class="hidden-xs"><?php echo trans('usersmanagement.users-table.email'); ?></th>
                                        <th class="hidden-xs"><?php echo trans('usersmanagement.users-table.fname'); ?></th>
                                        <th class="hidden-xs"><?php echo trans('usersmanagement.users-table.lname'); ?></th>
                                        <th><?php echo trans('usersmanagement.users-table.role'); ?></th>
                                        <th class="hidden-sm hidden-xs hidden-md"><?php echo trans('usersmanagement.users-table.created'); ?></th>
                                        <th class="hidden-sm hidden-xs hidden-md"><?php echo trans('usersmanagement.users-table.updated'); ?></th>
                                        <th><?php echo trans('usersmanagement.users-table.actions'); ?></th>
                                        <th class="no-search no-sort"></th>
                                        <th class="no-search no-sort"></th>
                                    </tr>
                                </thead>
                                <tbody id="users_table">
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($user->id); ?></td>
                                            <td><?php echo e($user->name); ?></td>
                                            <td class="hidden-xs"><a href="mailto:<?php echo e($user->email); ?>" title="email <?php echo e($user->email); ?>"><?php echo e($user->email); ?></a></td>
                                            <td class="hidden-xs"><?php echo e($user->first_name); ?></td>
                                            <td class="hidden-xs"><?php echo e($user->last_name); ?></td>
                                            <td>
                                                <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($user_role->name == 'User'): ?>
                                                        <?php $badgeClass = 'primary' ?>
                                                    <?php elseif($user_role->name == 'Admin'): ?>
                                                        <?php $badgeClass = 'warning' ?>
                                                    <?php elseif($user_role->name == 'Unverified'): ?>
                                                        <?php $badgeClass = 'danger' ?>
                                                    <?php else: ?>
                                                        <?php $badgeClass = 'default' ?>
                                                    <?php endif; ?>
                                                    <span class="badge badge-<?php echo e($badgeClass); ?>"><?php echo e($user_role->name); ?></span>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </td>
                                            <td class="hidden-sm hidden-xs hidden-md"><?php echo e($user->created_at); ?></td>
                                            <td class="hidden-sm hidden-xs hidden-md"><?php echo e($user->updated_at); ?></td>
                                            <td>
                                                <?php echo Form::open(array('url' => 'users/' . $user->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')); ?>

                                                    <?php echo Form::hidden('_method', 'DELETE'); ?>

                                                    <?php echo Form::button(trans('usersmanagement.buttons.delete'), array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete User', 'data-message' => 'Are you sure you want to delete this user ?')); ?>

                                                <?php echo Form::close(); ?>

                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-success btn-block" href="<?php echo e(URL::to('users/' . $user->id)); ?>" data-toggle="tooltip" title="Show">
                                                    <?php echo trans('usersmanagement.buttons.show'); ?>

                                                </a>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-info btn-block" href="<?php echo e(URL::to('users/' . $user->id . '/edit')); ?>" data-toggle="tooltip" title="Edit">
                                                    <?php echo trans('usersmanagement.buttons.edit'); ?>

                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <tbody id="search_results"></tbody>
                                <?php if(config('usersmanagement.enableSearchUsers')): ?>
                                    <tbody id="search_results"></tbody>
                                <?php endif; ?>

                            </table>

                            <?php if(config('usersmanagement.enablePagination')): ?>
                                <?php echo e($users->links()); ?>

                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('modals.modal-delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
    <?php if((count($users) > config('usersmanagement.datatablesJsStartCount')) && config('usersmanagement.enabledDatatablesJs')): ?>
        <?php echo $__env->make('scripts.datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php echo $__env->make('scripts.delete-modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('scripts.save-modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(config('usersmanagement.tooltipsEnabled')): ?>
        <?php echo $__env->make('scripts.tooltips', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php if(config('usersmanagement.enableSearchUsers')): ?>
        <?php echo $__env->make('scripts.search-users', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/o/obaaa/projects/SudanHD/resources/views/usersmanagement/show-users.blade.php ENDPATH**/ ?>