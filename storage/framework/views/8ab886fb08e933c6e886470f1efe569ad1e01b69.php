<?php $__env->startSection('template_title'); ?>
    Showing Themes
<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_linked_css'); ?>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    <style type="text/css" media="screen">
        .themes-table {
            border: 0;
        }
        .themes-table tr td:first-child {
            padding-left: 15px;
        }
        .themes-table tr td:last-child {
            padding-right: 15px;
        }
        .themes-table.table-responsive,
        .themes-table.table-responsive table {
            margin-bottom: 0;
        }

    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-12">

                <?php echo e(trans('themes.themesTitle')); ?> <strong><?php echo e(count($themes)); ?></strong> <?php echo e(trans('themes.themes')); ?>


                <a href="/themes/create" class="btn btn-outline-secondary btn-sm pull-right mb-2">
                    <i class="fa fa-fw fa-plus" aria-hidden="true"></i>
                    <?php echo e(trans('themes.btnAddTheme')); ?>

                </a>

                <div class="table-responsive themes-table">
                    <table class="table table-striped table-sm data-table">
                        <thead class="thead-dark">
                            <tr>
                                
                                <th><?php echo e(trans('themes.themesStatus')); ?></th>
                                <th><?php echo e(trans('themes.themesUsers')); ?></th>
                                <th><?php echo e(trans('themes.themesName')); ?></th>
                                <th class="hidden-xs hidden-sm hidden-md"><?php echo e(trans('themes.themesLink')); ?></th>
                                <th><?php echo e(trans('themes.themesActions')); ?></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $themes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aTheme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $themeStatus = [
                                        'name'  => trans('themes.statusDisabled'),
                                        'class' => 'danger'
                                    ];
                                    if($aTheme->status == 1) {
                                        $themeStatus = [
                                            'name'  => trans('themes.statusEnabled'),
                                            'class' => 'success'
                                        ];
                                    }

                                    $themeUsers = 0;
                                    $themeCountClass = 'primary';
                                    foreach($users as $user) {
                                        if($user->profile && $user->profile->theme_id === $aTheme->id) {
                                           $themeUsers += 1;
                                        }
                                    }
                                    if($themeUsers === 1) {
                                        $themeCountClass = 'info';
                                    } elseif($themeUsers >= 2) {
                                        $themeCountClass = 'warning';
                                    } elseif($themeUsers === 5) {
                                        $themeCountClass = 'success';
                                    } elseif($themeUsers === 10) {
                                        $themeCountClass = 'danger';
                                    }
                                ?>
                                <tr>
                                    
                                    <td>
                                        <span class="label label-<?php echo e($themeStatus['class']); ?>">
                                            <?php echo e($themeStatus['name']); ?>

                                        </span>
                                    </td>
                                    <td>
                                        <span class="label label-<?php echo e($themeCountClass); ?>" style="margin-left: 6px">
                                            <?php echo e($themeUsers); ?>

                                        </span>
                                    </td>
                                    <td><?php echo e($aTheme->name); ?></td>
                                    <td class="hidden-xs hidden-sm hidden-md">
                                        <a href="<?php echo e($aTheme->link); ?>" target="_blank" data-toggle="tooltip" title="Go to Link">
                                            <?php echo e($aTheme->link); ?>

                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-success btn-block" href="<?php echo e(URL::to('themes/' . $aTheme->id)); ?>" data-toggle="tooltip" title="<?php echo e(trans('themes.themesBtnShow')); ?>">
                                            <i class="fa fa-eye fa-fw" aria-hidden="true"></i>
                                            <span class="sr-only"><?php echo e(trans('themes.themesBtnShow')); ?></span>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-info btn-block" href="<?php echo e(URL::to('themes/' . $aTheme->id . '/edit')); ?>" data-toggle="tooltip" title="<?php echo e(trans('themes.themesBtnEdit')); ?>">
                                            <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
                                            <span class="sr-only"><?php echo e(trans('themes.themesBtnEdit')); ?></span>
                                        </a>
                                    </td>
                                    <td>
                                        <?php echo Form::open(array('url' => 'themes/' . $aTheme->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete Theme')); ?>

                                            <?php echo Form::hidden('_method', 'DELETE'); ?>

                                            <?php echo Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> <span class="sr-only">Delete Theme</span>', array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => trans('themes.confirmDeleteHdr'), 'data-message' => trans('themes.confirmDelete'))); ?>

                                        <?php echo Form::close(); ?>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <?php echo $__env->make('modals.modal-delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

    <?php if(count($themes) > 50): ?>
        <?php echo $__env->make('scripts.datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php echo $__env->make('scripts.delete-modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('scripts.save-modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('scripts.tooltips', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/o/obaaa/projects/SudanHD/resources/views/themesmanagement/show-themes.blade.php ENDPATH**/ ?>