<?php $__env->startSection('template_title'); ?>
  Log Information
<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_linked_css'); ?>

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

  <div class="container-fluid logs-container">
    <div class="row">

      <div class="col-sm-3 col-md-2 sidebar">
        <h4><span class="fa fa-fw fa-file-code-o" aria-hidden="true"></span> Log Files</h4>
        <div class="list-group">
          <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="?l=<?php echo e(base64_encode($file)); ?>" class="list-group-item <?php if($current_file == $file): ?> llv-active <?php endif; ?>">
              <?php echo e($file); ?>

              <?php if($current_file == $file): ?>
                <span class="badge pull-right">
                  <?php echo e(count($logs)); ?>

                </span>
              <?php endif; ?>
            </a>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>

      <div class="col-sm-9 col-md-10 table-container">
        <?php if($logs === null): ?>
          <div>
            Log file >50M, please download it.
          </div>
        <?php else: ?>
        <table id="table-log" class="table table-sm table-striped">
          <thead>
            <tr>
              <th>Level</th>
              <th>Context</th>
              <th>Date</th>
              <th>Content</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td class="text-<?php echo e($log['level_class']); ?>"><span class="glyphicon glyphicon-<?php echo e($log['level_img']); ?>-sign" aria-hidden="true"></span> &nbsp;<?php echo e($log['level']); ?></td>
              <td class="text"><?php echo e($log['context']); ?></td>
              <td class="date"><?php echo e($log['date']); ?></td>
              <td class="text">
                <?php if($log['stack']): ?> <a class="pull-right expand btn btn-default btn-xs" data-display="stack<?php echo e($key); ?>"><span class="glyphicon glyphicon-search"></span></a><?php endif; ?>
                <?php echo e($log['text']); ?>

                <?php if(isset($log['in_file'])): ?> <br /><?php echo e($log['in_file']); ?><?php endif; ?>
                <?php if($log['stack']): ?> <div class="stack" id="stack<?php echo e($key); ?>" style="display: none; white-space: pre-wrap;"><?php echo e(trim($log['stack'])); ?></div><?php endif; ?>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
        <?php endif; ?>
        <div>
          <?php if($current_file): ?>
            <a href="?dl=<?php echo e(base64_encode($current_file)); ?>" class="btn btn-link">
              <i class="fa fa-download" aria-hidden="true"></i>
              Download file
            </a>
            -
            <a id="delete-log" data-toggle="modal" data-target="#confirmDelete" data-href="?del=<?php echo e(base64_encode($current_file)); ?>" data-title="Delete Log File" data-message="Are you sure you want to delete log file?" class="btn btn-link">
              <i class="fa fa-trash-o" aria-hidden="true"></i>
              Delete file
            </a>
            <?php if(count($files) > 1): ?>
              -

              <a id="delete-all-log" data-toggle="modal" data-target="#confirmDelete" data-href="?delall=true" data-title="Delete All Log Files" data-message="Are you sure you want to delete all log files?" class="btn btn-link">
                <i class="fa fa-trash" aria-hidden="true"></i>
                Delete all files
              </a>

            <?php endif; ?>
          <?php endif; ?>
        </div>
      </div>

    </div>
  </div>

  <?php echo $__env->make('modals.modal-delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

  <?php echo $__env->make('scripts.datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <script>
    $(document).ready(function(){
      $('#table-log').DataTable({
        "order": [ 1, 'desc' ],
        "stateSave": true,
        "stateSaveCallback": function (settings, data) {
          window.localStorage.setItem("datatable", JSON.stringify(data));
        },
        "stateLoadCallback": function (settings) {
          var data = JSON.parse(window.localStorage.getItem("datatable"));
          if (data) data.start = 0;
          return data;
        }
      });

      $('.table-container').on('click', '.expand', function(){
        $('#' + $(this).data('display')).toggle();
      });

      // Delete Logs Modal
      $('#confirmDelete').on('show.bs.modal', function (e) {
        var message = $(e.relatedTarget).attr('data-message');
        var title = $(e.relatedTarget).attr('data-title');
        var href = $(e.relatedTarget).attr('data-href');
        $(this).find('.modal-body p').text(message);
        $(this).find('.modal-title').text(title);
        $(this).find('.modal-footer #confirm').data('href', href);
      });
      $('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
        window.location = $(this).data('href');
      });

    });
  </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/o/obaaa/projects/SudanHD/resources/views/vendor/laravel-log-viewer/log.blade.php ENDPATH**/ ?>