<?php
    if (!isset($actionBtnIcon)) {
        $actionBtnIcon = null;
    } else {
        $actionBtnIcon = $actionBtnIcon . ' fa-fw';
    }
    if (!isset($modalClass)) {
        $modalClass = null;
    }
    if (!isset($btnSubmitText)) {
        $btnSubmitText = trans('laravelblocker::laravelblocker.modals.btnConfirm');
    }
?>
<div class="modal fade modal-<?php echo e($modalClass); ?>" id="<?php echo e($formTrigger); ?>" role="dialog" aria-labelledby="<?php echo e($formTrigger); ?>Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header <?php echo e($modalClass); ?>">
                <h5 class="modal-title">
                    Confirm
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p>
                    Are you sure?
                </p>
            </div>
            <div class="modal-footer">
                <?php echo Form::button('<i class="fa fa-fw fa-close" aria-hidden="true"></i> ' . trans('laravelblocker::laravelblocker.modals.btnCancel'), array('class' => 'btn btn-outline pull-left btn-flat', 'type' => 'button', 'data-dismiss' => 'modal' )); ?>

                <?php echo Form::button('<i class="fa ' . $actionBtnIcon . '" aria-hidden="true"></i> ' . $btnSubmitText, array('class' => 'btn btn-' . $modalClass . ' pull-right btn-flat', 'type' => 'button', 'id' => 'confirm' )); ?>

            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/o/obaaa/projects/SudanHD/vendor/jeremykenedy/laravel-blocker/src/resources/views//modals/confirm-modal.blade.php ENDPATH**/ ?>