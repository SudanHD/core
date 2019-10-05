<?php $__env->startSection('template_title'); ?>
    <?php echo e(trans('profile.templateTitle')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card border-0">
                    <div class="card-body p-0">
                        <?php if($user->profile): ?>
                            <?php if(Auth::user()->id == $user->id): ?>
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-sm-4 col-md-3 profile-sidebar text-white rounded-left-sm-up">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link active" data-toggle="pill" href=".edit-profile-tab" role="tab" aria-controls="edit-profile-tab" aria-selected="true">
                                                <?php echo e(trans('profile.editProfileTitle')); ?>

                                            </a>
                                            <a class="nav-link" data-toggle="pill" href=".edit-settings-tab" role="tab" aria-controls="edit-settings-tab" aria-selected="false">
                                                <?php echo e(trans('profile.editAccountTitle')); ?>

                                            </a>
                                            <a class="nav-link" data-toggle="pill" href=".edit-account-tab" role="tab" aria-controls="edit-settings-tab" aria-selected="false">
                                                <?php echo e(trans('profile.editAccountAdminTitle')); ?>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-8 col-md-9">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active edit-profile-tab" role="tabpanel" aria-labelledby="edit-profile-tab">
                                                <div class="row mb-1">
                                                    <div class="col-sm-12">
                                                        <div id="avatar_container">
                                                            <div class="collapseOne card-collapse collapse <?php if($user->profile->avatar_status == 0): ?> show <?php endif; ?>">
                                                                <div class="card-body">
                                                                    <img src="<?php echo e(Gravatar::get($user->email)); ?>" alt="<?php echo e($user->name); ?>" class="user-avatar">
                                                                </div>
                                                            </div>
                                                            <div class="collapseTwo card-collapse collapse <?php if($user->profile->avatar_status == 1): ?> show <?php endif; ?>">
                                                                <div class="card-body">
                                                                    <div class="dz-preview"></div>
                                                                    <?php echo Form::open(array('route' => 'avatar.upload', 'method' => 'POST', 'name' => 'avatarDropzone','id' => 'avatarDropzone', 'class' => 'form single-dropzone dropzone single', 'files' => true)); ?>

                                                                        <img id="user_selected_avatar" class="user-avatar" src="<?php if($user->profile->avatar != NULL): ?> <?php echo e($user->profile->avatar); ?> <?php endif; ?>" alt="<?php echo e($user->name); ?>">
                                                                    <?php echo Form::close(); ?>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php echo Form::model($user->profile, ['method' => 'PATCH', 'route' => ['profile.update', $user->name], 'id' => 'user_profile_form', 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data']); ?>

                                                    <?php echo e(csrf_field()); ?>

                                                    <div class="row">
                                                        <div class="col-10 offset-1 col-sm-10 offset-sm-1 mb-1">
                                                            <div class="row" data-toggle="buttons">
                                                                <div class="col-6 col-xs-6 right-btn-container">
                                                                    <label class="btn btn-primary <?php if($user->profile->avatar_status == 0): ?> active <?php endif; ?> btn-block btn-sm" data-toggle="collapse" data-target=".collapseOne:not(.show), .collapseTwo.show">
                                                                        <input type="radio" name="avatar_status" id="option1" autocomplete="off" value="0" <?php if($user->profile->avatar_status == 0): ?> checked <?php endif; ?>> Use Gravatar
                                                                    </label>
                                                                </div>
                                                                <div class="col-6 col-xs-6 left-btn-container">
                                                                    <label class="btn btn-primary <?php if($user->profile->avatar_status == 1): ?> active <?php endif; ?> btn-block btn-sm" data-toggle="collapse" data-target=".collapseOne.show, .collapseTwo:not(.show)">
                                                                        <input type="radio" name="avatar_status" id="option2" autocomplete="off" value="1" <?php if($user->profile->avatar_status == 1): ?> checked <?php endif; ?>> Use My Image
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-feedback <?php echo e($errors->has('theme') ? ' has-error ' : ''); ?>">
                                                        <?php echo Form::label('theme_id', trans('profile.label-theme') , array('class' => 'col-12 control-label'));; ?>

                                                        <div class="col-12">
                                                            <select class="form-control" name="theme_id" id="theme_id">
                                                                <?php if($themes->count()): ?>
                                                                    <?php $__currentLoopData = $themes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                      <option value="<?php echo e($theme->id); ?>"<?php echo e($currentTheme->id == $theme->id ? 'selected="selected"' : ''); ?>><?php echo e($theme->name); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endif; ?>
                                                            </select>
                                                            <span class="glyphicon <?php echo e($errors->has('theme') ? ' glyphicon-asterisk ' : ' '); ?> form-control-feedback" aria-hidden="true"></span>
                                                            <?php if($errors->has('theme')): ?>
                                                                <span class="help-block">
                                                                    <strong><?php echo e($errors->first('theme')); ?></strong>
                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-feedback <?php echo e($errors->has('location') ? ' has-error ' : ''); ?>">
                                                        <?php echo Form::label('location', trans('profile.label-location') , array('class' => 'col-12 control-label'));; ?>

                                                        <div class="col-12">
                                                            <?php echo Form::text('location', old('location'), array('id' => 'location', 'class' => 'form-control', 'placeholder' => trans('profile.ph-location'))); ?>

                                                            <span class="glyphicon <?php echo e($errors->has('location') ? ' glyphicon-asterisk ' : ' glyphicon-pencil '); ?> form-control-feedback" aria-hidden="true"></span>
                                                            <?php if($errors->has('location')): ?>
                                                                <span class="help-block">
                                                                    <strong><?php echo e($errors->first('location')); ?></strong>
                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-feedback <?php echo e($errors->has('bio') ? ' has-error ' : ''); ?>">
                                                        <?php echo Form::label('bio', trans('profile.label-bio') , array('class' => 'col-12 control-label'));; ?>

                                                        <div class="col-12">
                                                            <?php echo Form::textarea('bio', old('bio'), array('id' => 'bio', 'class' => 'form-control', 'placeholder' => trans('profile.ph-bio'))); ?>

                                                            <span class="glyphicon glyphicon-pencil form-control-feedback" aria-hidden="true"></span>
                                                            <?php if($errors->has('bio')): ?>
                                                                <span class="help-block">
                                                                    <strong><?php echo e($errors->first('bio')); ?></strong>
                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-feedback <?php echo e($errors->has('twitter_username') ? ' has-error ' : ''); ?>">
                                                        <?php echo Form::label('twitter_username', trans('profile.label-twitter_username') , array('class' => 'col-12 control-label'));; ?>

                                                        <div class="col-12">
                                                            <?php echo Form::text('twitter_username', old('twitter_username'), array('id' => 'twitter_username', 'class' => 'form-control', 'placeholder' => trans('profile.ph-twitter_username'))); ?>

                                                            <span class="glyphicon glyphicon-pencil form-control-feedback" aria-hidden="true"></span>
                                                            <?php if($errors->has('twitter_username')): ?>
                                                                <span class="help-block">
                                                                    <strong><?php echo e($errors->first('twitter_username')); ?></strong>
                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="margin-bottom-2 form-group has-feedback <?php echo e($errors->has('github_username') ? ' has-error ' : ''); ?>">
                                                        <?php echo Form::label('github_username', trans('profile.label-github_username') , array('class' => 'col-12 control-label'));; ?>

                                                        <div class="col-12">
                                                            <?php echo Form::text('github_username', old('github_username'), array('id' => 'github_username', 'class' => 'form-control', 'placeholder' => trans('profile.ph-github_username'))); ?>

                                                            <span class="glyphicon glyphicon-pencil form-control-feedback" aria-hidden="true"></span>
                                                            <?php if($errors->has('github_username')): ?>
                                                                <span class="help-block">
                                                                    <strong><?php echo e($errors->first('github_username')); ?></strong>
                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group margin-bottom-2">
                                                        <div class="col-12">
                                                            <?php echo Form::button(
                                                                '<i class="fa fa-fw fa-save" aria-hidden="true"></i> ' . trans('profile.submitButton'),
                                                                 array(
                                                                    'id'                => 'confirmFormSave',
                                                                    'class'             => 'btn btn-success disabled',
                                                                    'type'              => 'button',
                                                                    'data-target'       => '#confirmForm',
                                                                    'data-modalClass'   => 'modal-success',
                                                                    'data-toggle'       => 'modal',
                                                                    'data-title'        => trans('modals.edit_user__modal_text_confirm_title'),
                                                                    'data-message'      => trans('modals.edit_user__modal_text_confirm_message')
                                                            )); ?>


                                                        </div>
                                                    </div>
                                                <?php echo Form::close(); ?>

                                            </div>

                                            <div class="tab-pane fade edit-settings-tab" role="tabpanel" aria-labelledby="edit-settings-tab">
                                                <?php echo Form::model($user, array('action' => array('ProfilesController@updateUserAccount', $user->id), 'method' => 'PUT', 'id' => 'user_basics_form')); ?>


                                                    <?php echo csrf_field(); ?>


                                                    <div class="pt-4 pr-3 pl-2 form-group has-feedback row <?php echo e($errors->has('name') ? ' has-error ' : ''); ?>">
                                                        <?php echo Form::label('name', trans('forms.create_user_label_username'), array('class' => 'col-md-3 control-label'));; ?>

                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <?php echo Form::text('name', $user->name, array('id' => 'name', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_username'))); ?>

                                                                <div class="input-group-append">
                                                                    <label class="input-group-text" for="name">
                                                                        <i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_username')); ?>" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <?php if($errors->has('name')): ?>
                                                                <span class="help-block">
                                                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>

                                                    <div class="pr-3 pl-2 form-group has-feedback row <?php echo e($errors->has('email') ? ' has-error ' : ''); ?>">
                                                        <?php echo Form::label('email', trans('forms.create_user_label_email'), array('class' => 'col-md-3 control-label'));; ?>

                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <?php echo Form::text('email', $user->email, array('id' => 'email', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_email'))); ?>

                                                                <div class="input-group-append">
                                                                    <label for="email" class="input-group-text">
                                                                        <i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_email')); ?>" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <?php if($errors->has('email')): ?>
                                                                <span class="help-block">
                                                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>

                                                    <div class="pr-3 pl-2 form-group has-feedback row <?php echo e($errors->has('first_name') ? ' has-error ' : ''); ?>">
                                                        <?php echo Form::label('first_name', trans('forms.create_user_label_firstname'), array('class' => 'col-md-3 control-label'));; ?>

                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <?php echo Form::text('first_name', $user->first_name, array('id' => 'first_name', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_firstname'))); ?>

                                                                <div class="input-group-append">
                                                                    <label class="input-group-text" for="first_name">
                                                                        <i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_firstname')); ?>" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <?php if($errors->has('first_name')): ?>
                                                                <span class="help-block">
                                                                    <strong><?php echo e($errors->first('first_name')); ?></strong>
                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>

                                                    <div class="pr-3 pl-2 form-group has-feedback row <?php echo e($errors->has('last_name') ? ' has-error ' : ''); ?>">
                                                        <?php echo Form::label('last_name', trans('forms.create_user_label_lastname'), array('class' => 'col-md-3 control-label'));; ?>

                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <?php echo Form::text('last_name', $user->last_name, array('id' => 'last_name', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_lastname'))); ?>

                                                                <div class="input-group-append">
                                                                    <label class="input-group-text" for="last_name">
                                                                        <i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_lastname')); ?>" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <?php if($errors->has('last_name')): ?>
                                                                <span class="help-block">
                                                                    <strong><?php echo e($errors->first('last_name')); ?></strong>
                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-md-9 offset-md-3">
                                                            <?php echo Form::button(
                                                                '<i class="fa fa-fw fa-save" aria-hidden="true"></i> ' . trans('profile.submitProfileButton'),
                                                                 array(
                                                                    'class'             => 'btn btn-success disabled',
                                                                    'id'                => 'account_save_trigger',
                                                                    'disabled'          => true,
                                                                    'type'              => 'button',
                                                                    'data-submit'       => trans('profile.submitProfileButton'),
                                                                    'data-target'       => '#confirmForm',
                                                                    'data-modalClass'   => 'modal-success',
                                                                    'data-toggle'       => 'modal',
                                                                    'data-title'        => trans('modals.edit_user__modal_text_confirm_title'),
                                                                    'data-message'      => trans('modals.edit_user__modal_text_confirm_message')
                                                            )); ?>

                                                        </div>
                                                    </div>
                                                <?php echo Form::close(); ?>

                                            </div>

                                            <div class="tab-pane fade edit-account-tab" role="tabpanel" aria-labelledby="edit-account-tab">
                                                <ul class="account-admin-subnav nav nav-pills nav-justified margin-bottom-3 margin-top-1">
                                                    <li class="nav-item bg-info">
                                                        <a data-toggle="pill" href="#changepw" class="nav-link warning-pill-trigger text-white active" aria-selected="true">
                                                            <?php echo e(trans('profile.changePwPill')); ?>

                                                        </a>
                                                    </li>
                                                    <li class="nav-item bg-info">
                                                        <a data-toggle="pill" href="#deleteAccount" class="nav-link danger-pill-trigger text-white">
                                                            <?php echo e(trans('profile.deleteAccountPill')); ?>

                                                        </a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">

                                                    <div id="changepw" class="tab-pane fade show active">

                                                        <h3 class="margin-bottom-1 text-center text-warning">
                                                            <?php echo e(trans('profile.changePwTitle')); ?>

                                                        </h3>

                                                        <?php echo Form::model($user, array('action' => array('ProfilesController@updateUserPassword', $user->id), 'method' => 'PUT', 'autocomplete' => 'new-password')); ?>


                                                            <div class="pw-change-container margin-bottom-2">

                                                                <div class="form-group has-feedback row <?php echo e($errors->has('password') ? ' has-error ' : ''); ?>">
                                                                    <?php echo Form::label('password', trans('forms.create_user_label_password'), array('class' => 'col-md-3 control-label'));; ?>

                                                                    <div class="col-md-9">
                                                                        <?php echo Form::password('password', array('id' => 'password', 'class' => 'form-control ', 'placeholder' => trans('forms.create_user_ph_password'), 'autocomplete' => 'new-password')); ?>

                                                                        <?php if($errors->has('password')): ?>
                                                                            <span class="help-block">
                                                                                <strong><?php echo e($errors->first('password')); ?></strong>
                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group has-feedback row <?php echo e($errors->has('password_confirmation') ? ' has-error ' : ''); ?>">
                                                                    <?php echo Form::label('password_confirmation', trans('forms.create_user_label_pw_confirmation'), array('class' => 'col-md-3 control-label'));; ?>

                                                                    <div class="col-md-9">
                                                                        <?php echo Form::password('password_confirmation', array('id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_pw_confirmation'))); ?>

                                                                        <span id="pw_status"></span>
                                                                        <?php if($errors->has('password_confirmation')): ?>
                                                                            <span class="help-block">
                                                                                <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-md-9 offset-md-3">
                                                                    <?php echo Form::button(
                                                                        '<i class="fa fa-fw fa-save" aria-hidden="true"></i> ' . trans('profile.submitPWButton'),
                                                                         array(
                                                                            'class'             => 'btn btn-warning',
                                                                            'id'                => 'pw_save_trigger',
                                                                            'disabled'          => true,
                                                                            'type'              => 'button',
                                                                            'data-submit'       => trans('profile.submitButton'),
                                                                            'data-target'       => '#confirmForm',
                                                                            'data-modalClass'   => 'modal-warning',
                                                                            'data-toggle'       => 'modal',
                                                                            'data-title'        => trans('modals.edit_user__modal_text_confirm_title'),
                                                                            'data-message'      => trans('modals.edit_user__modal_text_confirm_message')
                                                                    )); ?>

                                                                </div>
                                                            </div>
                                                        <?php echo Form::close(); ?>


                                                    </div>

                                                    <div id="deleteAccount" class="tab-pane fade">
                                                        <h3 class="margin-bottom-1 text-center text-danger">
                                                            <?php echo e(trans('profile.deleteAccountTitle')); ?>

                                                        </h3>
                                                        <p class="margin-bottom-2 text-center">
                                                            <i class="fa fa-exclamation-triangle fa-fw" aria-hidden="true"></i>
                                                                <strong>Deleting</strong> your account is <u><strong>permanent</strong></u> and <u><strong>cannot</strong></u> be undone.
                                                            <i class="fa fa-exclamation-triangle fa-fw" aria-hidden="true"></i>
                                                        </p>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-6 offset-sm-3 margin-bottom-3 text-center">

                                                                <?php echo Form::model($user, array('action' => array('ProfilesController@deleteUserAccount', $user->id), 'method' => 'DELETE')); ?>


                                                                    <div class="btn-group btn-group-vertical margin-bottom-2 custom-checkbox-fa" data-toggle="buttons">
                                                                        <label class="btn no-shadow" for="checkConfirmDelete" >
                                                                            <input type="checkbox" name='checkConfirmDelete' id="checkConfirmDelete">
                                                                            <i class="fa fa-square-o fa-fw fa-2x"></i>
                                                                            <i class="fa fa-check-square-o fa-fw fa-2x"></i>
                                                                            <span class="margin-left-2"> Confirm Account Deletion</span>
                                                                        </label>
                                                                    </div>

                                                                    <?php echo Form::button(
                                                                        '<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> ' . trans('profile.deleteAccountBtn'),
                                                                        array(
                                                                            'class'             => 'btn btn-block btn-danger',
                                                                            'id'                => 'delete_account_trigger',
                                                                            'disabled'          => true,
                                                                            'type'              => 'button',
                                                                            'data-toggle'       => 'modal',
                                                                            'data-submit'       => trans('profile.deleteAccountBtnConfirm'),
                                                                            'data-target'       => '#confirmForm',
                                                                            'data-modalClass'   => 'modal-danger',
                                                                            'data-title'        => trans('profile.deleteAccountConfirmTitle'),
                                                                            'data-message'      => trans('profile.deleteAccountConfirmMsg')
                                                                        )
                                                                    ); ?>


                                                                <?php echo Form::close(); ?>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php else: ?>
                                <p><?php echo e(trans('profile.notYourProfile')); ?></p>
                            <?php endif; ?>
                        <?php else: ?>
                            <p><?php echo e(trans('profile.noProfileYet')); ?></p>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('modals.modal-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

    <?php echo $__env->make('scripts.form-modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if(config('settings.googleMapsAPIStatus')): ?>
        <?php echo $__env->make('scripts.gmaps-address-lookup-api3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php echo $__env->make('scripts.user-avatar-dz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script type="text/javascript">

        $('.dropdown-menu li a').click(function() {
            $('.dropdown-menu li').removeClass('active');
        });

        $('.profile-trigger').click(function() {
            $('.panel').alterClass('card-*', 'card-default');
        });

        $('.settings-trigger').click(function() {
            $('.panel').alterClass('card-*', 'card-info');
        });

        $('.admin-trigger').click(function() {
            $('.panel').alterClass('card-*', 'card-warning');
            $('.edit_account .nav-pills li, .edit_account .tab-pane').removeClass('active');
            $('#changepw')
                .addClass('active')
                .addClass('in');
            $('.change-pw').addClass('active');
        });

        $('.warning-pill-trigger').click(function() {
            $('.panel').alterClass('card-*', 'card-warning');
        });

        $('.danger-pill-trigger').click(function() {
            $('.panel').alterClass('card-*', 'card-danger');
        });

        $('#user_basics_form').on('keyup change', 'input, select, textarea', function(){
            $('#account_save_trigger').attr('disabled', false).removeClass('disabled').show();
        });

        $('#user_profile_form').on('keyup change', 'input, select, textarea', function(){
            $('#confirmFormSave').attr('disabled', false).removeClass('disabled').show();
        });

        $('#checkConfirmDelete').change(function() {
            var submitDelete = $('#delete_account_trigger');
            var self = $(this);

            if (self.is(':checked')) {
                submitDelete.attr('disabled', false);
            }
            else {
                submitDelete.attr('disabled', true);
            }
        });

        $("#password_confirmation").keyup(function() {
            checkPasswordMatch();
        });

        $("#password, #password_confirmation").keyup(function() {
            enableSubmitPWCheck();
        });

        $('#password, #password_confirmation').hidePassword(true);

        $('#password').password({
            shortPass: 'The password is too short',
            badPass: 'Weak - Try combining letters & numbers',
            goodPass: 'Medium - Try using special charecters',
            strongPass: 'Strong password',
            containsUsername: 'The password contains the username',
            enterPass: false,
            showPercent: false,
            showText: true,
            animate: true,
            animateSpeed: 50,
            username: false, // select the username field (selector or jQuery instance) for better password checks
            usernamePartialMatch: true,
            minimumLength: 6
        });

        function checkPasswordMatch() {
            var password = $("#password").val();
            var confirmPassword = $("#password_confirmation").val();
            if (password != confirmPassword) {
                $("#pw_status").html("Passwords do not match!");
            }
            else {
                $("#pw_status").html("Passwords match.");
            }
        }

        function enableSubmitPWCheck() {
            var password = $("#password").val();
            var confirmPassword = $("#password_confirmation").val();
            var submitChange = $('#pw_save_trigger');
            if (password != confirmPassword) {
                submitChange.attr('disabled', true);
            }
            else {
                submitChange.attr('disabled', false);
            }
        }

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/o/obaaa/projects/SudanHD/resources/views/profiles/edit.blade.php ENDPATH**/ ?>