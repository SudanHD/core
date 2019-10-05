<?php $__env->startSection('template_title'); ?>
  <?php echo trans('usersmanagement.showing-user', ['name' => $user->name]); ?>

<?php $__env->stopSection(); ?>

<?php
  $levelAmount = trans('usersmanagement.labelUserLevel');
  if ($user->level() >= 2) {
    $levelAmount = trans('usersmanagement.labelUserLevels');
  }
?>

<?php $__env->startSection('content'); ?>

  <div class="container">
    <div class="row">
      <div class="col-lg-10 offset-lg-1">

        <div class="card">

          <div class="card-header text-white <?php if($user->activated == 1): ?> bg-success <?php else: ?> bg-danger <?php endif; ?>">
            <div style="display: flex; justify-content: space-between; align-items: center;">
              <?php echo trans('usersmanagement.showing-user-title', ['name' => $user->name]); ?>

              <div class="float-right">
                <a href="<?php echo e(route('users')); ?>" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('usersmanagement.tooltips.back-users')); ?>">
                  <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                  <?php echo trans('usersmanagement.buttons.back-to-users'); ?>

                </a>
              </div>
            </div>
          </div>

          <div class="card-body">

            <div class="row">
              <div class="col-sm-4 offset-sm-2 col-md-2 offset-md-3">
                <img src="<?php if($user->profile && $user->profile->avatar_status == 1): ?> <?php echo e($user->profile->avatar); ?> <?php else: ?> <?php echo e(Gravatar::get($user->email)); ?> <?php endif; ?>" alt="<?php echo e($user->name); ?>" class="rounded-circle center-block mb-3 mt-4 user-image">
              </div>
              <div class="col-sm-4 col-md-6">
                <h4 class="text-muted margin-top-sm-1 text-center text-left-tablet">
                  <?php echo e($user->name); ?>

                </h4>
                <p class="text-center text-left-tablet">
                  <strong>
                    <?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>

                  </strong>
                  <?php if($user->email): ?>
                    <br />
                    <span class="text-center" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('usersmanagement.tooltips.email-user', ['user' => $user->email])); ?>">
                      <?php echo e(Html::mailto($user->email, $user->email)); ?>

                    </span>
                  <?php endif; ?>
                </p>
                <?php if($user->profile): ?>
                  <div class="text-center text-left-tablet mb-4">
                    <a href="<?php echo e(url('/profile/'.$user->name)); ?>" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('usersmanagement.viewProfile')); ?>">
                      <i class="fa fa-eye fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md"> <?php echo e(trans('usersmanagement.viewProfile')); ?></span>
                    </a>
                    <a href="/users/<?php echo e($user->id); ?>/edit" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('usersmanagement.editUser')); ?>">
                      <i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md"> <?php echo e(trans('usersmanagement.editUser')); ?> </span>
                    </a>
                    <?php echo Form::open(array('url' => 'users/' . $user->id, 'class' => 'form-inline', 'data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => trans('usersmanagement.deleteUser'))); ?>

                      <?php echo Form::hidden('_method', 'DELETE'); ?>

                      <?php echo Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md">' . trans('usersmanagement.deleteUser') . '</span>' , array('class' => 'btn btn-danger btn-sm','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete User', 'data-message' => 'Are you sure you want to delete this user?')); ?>

                    <?php echo Form::close(); ?>

                  </div>
                <?php endif; ?>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <?php if($user->name): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('usersmanagement.labelUserName')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($user->name); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($user->email): ?>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                <?php echo e(trans('usersmanagement.labelEmail')); ?>

              </strong>
            </div>

            <div class="col-sm-7">
              <span data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('usersmanagement.tooltips.email-user', ['user' => $user->email])); ?>">
                <?php echo e(HTML::mailto($user->email, $user->email)); ?>

              </span>
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($user->first_name): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('usersmanagement.labelFirstName')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($user->first_name); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($user->last_name): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('usersmanagement.labelLastName')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($user->last_name); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                <?php echo e(trans('usersmanagement.labelRole')); ?>

              </strong>
            </div>

            <div class="col-sm-7">
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
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                <?php echo e(trans('usersmanagement.labelStatus')); ?>

              </strong>
            </div>

            <div class="col-sm-7">
              <?php if($user->activated == 1): ?>
                <span class="badge badge-success">
                  Activated
                </span>
              <?php else: ?>
                <span class="badge badge-danger">
                  Not-Activated
                </span>
              <?php endif; ?>
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                <?php echo e(trans('usersmanagement.labelAccessLevel')); ?> <?php echo e($levelAmount); ?>:
              </strong>
            </div>

            <div class="col-sm-7">

              <?php if($user->level() >= 5): ?>
                <span class="badge badge-primary margin-half margin-left-0">5</span>
              <?php endif; ?>

              <?php if($user->level() >= 4): ?>
                 <span class="badge badge-info margin-half margin-left-0">4</span>
              <?php endif; ?>

              <?php if($user->level() >= 3): ?>
                <span class="badge badge-success margin-half margin-left-0">3</span>
              <?php endif; ?>

              <?php if($user->level() >= 2): ?>
                <span class="badge badge-warning margin-half margin-left-0">2</span>
              <?php endif; ?>

              <?php if($user->level() >= 1): ?>
                <span class="badge badge-default margin-half margin-left-0">1</span>
              <?php endif; ?>

            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                <?php echo e(trans('usersmanagement.labelPermissions')); ?>

              </strong>
            </div>

            <div class="col-sm-7">
              <?php if($user->canViewUsers()): ?>
                <span class="badge badge-primary margin-half margin-left-0">
                  <?php echo e(trans('permsandroles.permissionView')); ?>

                </span>
              <?php endif; ?>

              <?php if($user->canCreateUsers()): ?>
                <span class="badge badge-info margin-half margin-left-0">
                  <?php echo e(trans('permsandroles.permissionCreate')); ?>

                </span>
              <?php endif; ?>

              <?php if($user->canEditUsers()): ?>
                <span class="badge badge-warning margin-half margin-left-0">
                  <?php echo e(trans('permsandroles.permissionEdit')); ?>

                </span>
              <?php endif; ?>

              <?php if($user->canDeleteUsers()): ?>
                <span class="badge badge-danger margin-half margin-left-0">
                  <?php echo e(trans('permsandroles.permissionDelete')); ?>

                </span>
              <?php endif; ?>
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <?php if($user->created_at): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('usersmanagement.labelCreatedAt')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($user->created_at); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($user->updated_at): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('usersmanagement.labelUpdatedAt')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($user->updated_at); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($user->signup_ip_address): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('usersmanagement.labelIpEmail')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  <?php echo e($user->signup_ip_address); ?>

                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($user->signup_confirmation_ip_address): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('usersmanagement.labelIpConfirm')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  <?php echo e($user->signup_confirmation_ip_address); ?>

                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($user->signup_sm_ip_address): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('usersmanagement.labelIpSocial')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  <?php echo e($user->signup_sm_ip_address); ?>

                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($user->admin_ip_address): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('usersmanagement.labelIpAdmin')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  <?php echo e($user->admin_ip_address); ?>

                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($user->updated_ip_address): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('usersmanagement.labelIpUpdate')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  <?php echo e($user->updated_ip_address); ?>

                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

          </div>

        </div>
      </div>
    </div>
  </div>

  <?php echo $__env->make('modals.modal-delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
  <?php echo $__env->make('scripts.delete-modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php if(config('usersmanagement.tooltipsEnabled')): ?>
    <?php echo $__env->make('scripts.tooltips', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/o/obaaa/projects/SudanHD/resources/views/usersmanagement/show-user.blade.php ENDPATH**/ ?>