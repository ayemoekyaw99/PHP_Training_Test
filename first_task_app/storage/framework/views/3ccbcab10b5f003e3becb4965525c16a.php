<?php $__env->startSection('content'); ?>
    <div class="container mt-3">
        <div class="col-6 offset-4">
            <div class=" mt-3">
                <?php if(session('status')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="text-center"><?php echo e(session('status')); ?></span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>
            </div>
            <div class="card">
                <div class="card-header">
                    New Task
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('tasks#create')); ?>" method="POST" class="">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Task</label>
                            <div class="col-12">
                                <input type="text" name="name" id="task-name" class="form-control" value="<?php echo e(old('task')); ?>">
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-light">
                                    <i class="fa fa-btn fa-plus"></i>Add Task
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php if(count($tasks) > 0): ?>
            <div class="card mt-3">
                <div class="card-header">
                    Current Tasks
                </div>
                <div class="card-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>Task</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="table-text">
                                    <div><?php echo e($task->name); ?></div>
                                </td>
                                <!-- Task Delete Button -->
                                <td>
                                    <form action="<?php echo e(route('task#delete',$task->id)); ?>" method="">
                                    <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash"></i>Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Apache24\htdocs\Laravel_Training_Test\first_task_app\resources\views/tasks.blade.php ENDPATH**/ ?>