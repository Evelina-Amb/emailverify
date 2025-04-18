<?php $__env->startSection('title', 'Redaguoti studentą'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2>Redaguoti studentą</h2>

        <form action="<?php echo e(route('students.update', $student->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <div class="mb-3">
        <label for="name" class="form-label">Vardas</label>
        <input type="text" name="name" class="form-control" value="<?php echo e(old('name', $student->name)); ?>" required>
    </div>

    <div class="mb-3">
        <label for="surname" class="form-label">Pavardė</label>
        <input type="text" name="surname" class="form-control" value="<?php echo e(old('surname', $student->surname)); ?>" required>
    </div>

    <div class="mb-3">
        <label for="address" class="form-label">Adresas</label>
        <input type="text" name="address" class="form-control" value="<?php echo e(old('address', $student->address)); ?>" required>
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">Telefonas</label>
        <input type="text" name="phone" class="form-control" value="<?php echo e(old('phone', $student->phone)); ?>" required>
    </div>

    <div class="mb-3">
        <label for="city_id" class="form-label">Miestas</label>
        <select name="city_id" class="form-control">
            <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($city->id); ?>" <?php echo e(old('city_id', $student->city_id) == $city->id ? 'selected' : ''); ?>>
                    <?php echo e($city->name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
	
	<div class="mb-3">
    <label for="grupe_id" class="form-label">Grupė</label>
    <select name="grupe_id" class="form-control">
        <option value="">-- Pasirinkite grupę --</option>
        <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($group->id); ?>" <?php echo e(old('grupe_id', $student->grupe_id) == $group->id ? 'selected' : ''); ?>>
                <?php echo e($group->name); ?>

            </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>

<div class="mb-3">
    <label for="gim_data" class="form-label">Gimimo data</label>
    <input type="date" name="gim_data" class="form-control" value="<?php echo e(old('gim_data', $student->gim_data)); ?>">
</div>


    <button type="submit" class="btn btn-primary">Išsaugoti</button>
</form>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crud\resources\views/students/edit.blade.php ENDPATH**/ ?>