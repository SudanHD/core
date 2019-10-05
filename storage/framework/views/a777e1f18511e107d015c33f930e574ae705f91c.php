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
        $btnSubmitText = trans('laravelroles::laravelroles.modals.btnConfirm');
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
                <button class="btn btn-outline pull-left float-left" type="button" data-dismiss="modal" >
                    <i class="fa fa-fw fa-close" aria-hidden="true"></i>
                    <?php echo trans('laravelroles::laravelroles.modals.btnCancel'); ?>

                </button>
                <button class="btn btn-<?php echo e($modalClass); ?> pull-right" id="confirm" type="button" >
                    <i class="fa <?php echo e($actionBtnIcon); ?>" aria-hidden="true"></i>
                    <?php echo e($btnSubmitText); ?>

                </button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/o/obaaa/projects/SudanHD/vendor/jeremykenedy/laravel-roles/src/resources/views//laravelroles/modals/confirm-modal.blade.php ENDPATH**/ ?>