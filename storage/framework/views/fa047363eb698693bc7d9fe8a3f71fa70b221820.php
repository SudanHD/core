<?php echo Form::open([
    'route' => ['laravelblocker::blocker.destroy', $blockedItem->id],
    'method' => 'DELETE',
    'accept-charset' => 'UTF-8',
    'data-toggle' => 'tooltip',
    'title' => trans('laravelblocker::laravelblocker.tooltips.delete')
]); ?>

    <?php echo Form::hidden("_method", "DELETE"); ?>

    <?php echo csrf_field(); ?>

    <button class="btn btn-danger btn-sm btn-block" type="button" style="width: 100%;" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Blocked Item" data-message="<?php echo trans("laravelblocker::laravelblocker.modals.delete_blocked_message", ["blocked" => $blockedItem->value]); ?>">
        <?php echo trans("laravelblocker::laravelblocker.buttons.delete"); ?>

    </button>
<?php echo Form::close(); ?>

<?php /**PATH /home/o/obaaa/projects/SudanHD/vendor/jeremykenedy/laravel-blocker/src/resources/views//forms/delete-sm.blade.php ENDPATH**/ ?>