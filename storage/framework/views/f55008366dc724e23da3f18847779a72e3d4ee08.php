<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-danger text-white">
            <h1 class="mb-0">Ištrinti studentai</h1>
        </div>
        <div class="card-body">
            <?php if(session('success')): ?>
                <div class="alert alert-success"><?php echo e(session('success')); ?></div>
            <?php endif; ?>

            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Vardas</th>
                        <th>Pavardė</th>
                        <th>Adresas</th>
                        <th>Miestas</th>
                        <th>Telefonas</th>
						<th>Grupė</th>
						<th>gim. data</th>
						<th>Asmens kodas</th>
                        <th>Veiksmai</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($student->name); ?></td>
                            <td><?php echo e($student->surname); ?></td>
                            <td><?php echo e($student->address); ?></td>
                            <td><?php echo e($student->city ? $student->city->name : 'Nenurodyta'); ?></td>
                            <td><?php echo e($student->phone); ?></td>
							<td><?php echo e($student->group->name); ?></td>
							<td><?php echo e($student->gim_data); ?></td>
							<td><?php echo e($student->asmens_kodas); ?></td>
                            <td>
                                <form action="<?php echo e(route('students.restore', $student->id)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-success btn-sm">Atkurti</button>
                                </form>

                                <form action="<?php echo e(route('students.forceDelete', $student->id)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Ar tikrai norite visiškai ištrinti?')">Ištrinti visam laikui</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            <?php echo e($students->links()); ?>


            <a href="<?php echo e(route('students.index')); ?>" class="btn btn-primary mt-3">Grįžti į studentų sąrašą</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crud\resources\views/students/trashed.blade.php ENDPATH**/ ?>