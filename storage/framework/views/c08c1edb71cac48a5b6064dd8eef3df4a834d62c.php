<script>
    $(function() {
        var searchBlockFormContainer = $('#search_blocked_form');
        var cardTitle = $('#card_title');
        var blockedTableBody = $('.blocked-table-body');
        var resultsContainer = $('#search_results');
        var blockedCount = $('#blocked_count');
        var clearSearchTrigger = $('.clear-search');
        var searchform = $('#search_blocked');
        var searchformInput = $('#blocked_search_box');
        var userPagination = $('#user_pagination');
        var searchSubmit = $('#search_trigger');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        searchBlockFormContainer.show();
        searchform.submit(function(e) {
            e.preventDefault();
            resultsContainer.html('');
            blockedTableBody.hide();
            clearSearchTrigger.show();
            var noResulsHtml = '<tr>' +
                                '<td><?php echo trans("laravelblocker::laravelblocker.search.no-results"); ?></td>' +
                                '<td></td>' +
                                '<td class="hidden-xs"></td>' +
                                '<td class="hidden-xs"></td>' +
                                '<td class="hidden-xs"></td>' +
                                '<td class="hidden-sm hidden-xs"></td>' +
                                '<td class="hidden-sm hidden-xs hidden-md"></td>' +
                                '<td class="hidden-sm hidden-xs hidden-md"></td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '</tr>';

            <?php if($searchtype == 'normal'): ?>
                var searchUrl = "<?php echo e(route('laravelblocker::search-blocked')); ?>";
            <?php endif; ?>
            <?php if($searchtype == 'deleted'): ?>
                var searchUrl = "<?php echo e(route('laravelblocker::search-blocked-deleted')); ?>";
            <?php endif; ?>

            $.ajax({
                type:'POST',
                url: searchUrl,
                data: searchform.serialize(),
                success: function (result) {
                    var jsonData = JSON.parse(result);
                    if (jsonData.length != 0) {
                        $.each(jsonData, function(index, val) {
                            var rolesHtml = '';
                            var roleClass = '';


                            <?php if($searchtype == 'normal'): ?>
                                var showCellHtml = '<a class="btn btn-sm btn-success btn-block" href="blocker/' + val.id + '" data-toggle="tooltip" title="<?php echo e(trans("laravelblocker::laravelblocker.tooltips.show")); ?>"><?php echo trans("laravelblocker::laravelblocker.buttons.show"); ?></a>';
                                var editCellHtml = '<a class="btn btn-sm btn-info btn-block" href="blocker/' + val.id + '/edit" data-toggle="tooltip" title="<?php echo e(trans("laravelblocker::laravelblocker.tooltips.edit")); ?>"><?php echo trans("laravelblocker::laravelblocker.buttons.edit"); ?></a>';
                                var deleteCellHtml = '<form method="POST" action="/blocker/'+ val.id +'" accept-charset="UTF-8" data-toggle="tooltip" title="Delete Blocked Item">' +
                                        '<?php echo Form::hidden("_method", "DELETE"); ?>' +
                                        '<?php echo csrf_field(); ?>' +
                                        '<button class="btn btn-danger btn-sm" type="button" style="width: 100%;" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Blocked Item" data-message="<?php echo trans("laravelblocker::laravelblocker.modals.delete_blocked_message", ["blocked" => "'+val.name+'"]); ?>">' +
                                            '<?php echo trans("laravelblocker::laravelblocker.buttons.delete"); ?>' +
                                        '</button>' +
                                    '</form>';
                            <?php endif; ?>
                            <?php if($searchtype == 'deleted'): ?>
                                var showCellHtml    ='Show';
                                var editCellHtml    ='Restore';
                                var deleteCellHtml  ='Destroy';
                            <?php endif; ?>

                            var userId = val.userId;
                            if (!userId) {
                                userId = "<span class='disabled'>";
                                    userId += "<?php echo trans('laravelblocker::laravelblocker.none'); ?>";
                               userId += "</span>";
                            };

                            resultsContainer.append('<tr>' +
                                '<td>' + val.id + '</td>' +
                                '<td>' + val.type + '</td>' +
                                '<td>' + val.value + '</td>' +
                                '<td class="hidden-xs">' + val.note + '</td>' +
                                '<td class="hidden-xs hidden-sm">' + userId + '</td>' +
                                '<td class="hidden-xs hidden-sm hidden-md">' + val.created_at + '</td>' +
                                '<td class="hidden-xs hidden-sm hidden-md">' + val.updated_at + '</td>' +
                                <?php if($searchtype == 'deleted'): ?>
                                    '<td class="hidden-xs hidden-sm">' + val.deleted_at + '</td>' +
                                <?php endif; ?>
                                '<td>' + showCellHtml + '</td>' +
                                '<td>' + editCellHtml + '</td>' +
                                '<td>' + deleteCellHtml + '</td>' +
                            '</tr>');
                        });
                    } else {
                        resultsContainer.append(noResulsHtml);
                    };
                    blockedCount.html(jsonData.length + " <?php echo trans('laravelblocker::laravelblocker.search.found-footer'); ?>");
                    userPagination.hide();
                    <?php if($searchtype == 'normal'): ?>
                        cardTitle.html("<?php echo trans('laravelblocker::laravelblocker.search.title'); ?>");
                    <?php endif; ?>
                    <?php if($searchtype == 'deleted'): ?>
                        cardTitle.html("<?php echo trans('laravelblocker::laravelblocker.search.title-deleted'); ?>");
                    <?php endif; ?>
                },
                error: function (response, status, error) {
                    if (response.status === 422) {
                        resultsContainer.append(noResulsHtml);
                        blockedCount.html(0 + " <?php echo trans('laravelblocker::laravelblocker.search.found-footer'); ?>");
                        userPagination.hide();
                        <?php if($searchtype == 'normal'): ?>
                            cardTitle.html("<?php echo trans('laravelblocker::laravelblocker.search.title'); ?>");
                        <?php endif; ?>
                        <?php if($searchtype == 'deleted'): ?>
                            cardTitle.html("<?php echo trans('laravelblocker::laravelblocker.search.title-deleted'); ?>");
                        <?php endif; ?>
                    };
                },
            });
        });
        searchSubmit.click(function(event) {
            event.preventDefault();
            searchform.submit();
        });
        searchformInput.keyup(function(event) {
            if ($('#blocked_search_box').val() != '') {
                clearSearchTrigger.show();
            } else {
                clearSearchTrigger.hide();
                resultsContainer.html('');
                blockedTableBody.show();
                <?php if($searchtype == 'normal'): ?>
                    cardTitle.html("<?php echo trans('laravelblocker::laravelblocker.blocked-items-title'); ?>");
                <?php endif; ?>
                <?php if($searchtype == 'deleted'): ?>
                    cardTitle.html("<?php echo trans('laravelblocker::laravelblocker.blocked-items-deleted-title'); ?>");
                <?php endif; ?>
                userPagination.show();
                blockedCount.html("<?php echo trans_choice('laravelblocker::laravelblocker.blocked-table.caption', 1, ['blockedcount' => $blocked->count()]); ?>");
            };
        });
        clearSearchTrigger.click(function(e) {
            e.preventDefault();
            clearSearchTrigger.hide();
            blockedTableBody.show();
            resultsContainer.html('');
            searchformInput.val('');
            <?php if($searchtype == 'normal'): ?>
                cardTitle.html("<?php echo trans('laravelblocker::laravelblocker.blocked-items-title'); ?>");
            <?php endif; ?>
            <?php if($searchtype == 'deleted'): ?>
                cardTitle.html("<?php echo trans('laravelblocker::laravelblocker.blocked-items-deleted-title'); ?>");
            <?php endif; ?>
            userPagination.show();
            blockedCount.html("<?php echo trans_choice('laravelblocker::laravelblocker.blocked-table.caption', 1, ['blockedcount' => $blocked->count()]); ?>");
        });
    });
</script>
<?php /**PATH /home/o/obaaa/projects/SudanHD/vendor/jeremykenedy/laravel-blocker/src/resources/views//scripts/search-blocked.blade.php ENDPATH**/ ?>