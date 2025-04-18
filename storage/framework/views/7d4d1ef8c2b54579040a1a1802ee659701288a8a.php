<?php $__env->startSection('title', 'Studentų sąrašas'); ?>


<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Studentų sąrašas</h2>
        <a href="<?php echo e(route('students.create')); ?>" class="btn btn-success">Pridėti studentą</a>
        <a href="<?php echo e(route('students.trashed')); ?>" class="btn btn-success">Rodyti pašalintus</a>
       
    </div>


    <table class="table table-striped">
        <thead>
            <tr>
                <th>Vardas</th>
                <th>Pavardė</th>
                <th>Adresas</th>
				<th>Tel.</th>
                <th>Miestas</th>
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
                <td><?php echo e($student->phone); ?></td>
                <td><?php echo e($student->city->name); ?></td>
				<td><?php echo e($student->group->name); ?></td>
				<td><?php echo e($student->gim_data); ?></td>
				<td><?php echo e($student->asmens_kodas); ?></td>


                <td>
                        <a href="<?php echo e(route('students.edit', $student->id)); ?>" class="btn btn-primary btn-sm">Redaguoti</a>
                        <form action="<?php echo e(route('students.destroy', $student->id)); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm">Ištrinti</button>
                        </form>
                    </td>
               
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </tbody>
    </table>


    <?php echo e($students->links()); ?> <!-- Pagination -->
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crud\resources\views/students/index.blade.php ENDPATH**/ ?>