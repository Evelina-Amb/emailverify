<?php $__env->startSection('title', 'Pridėti studentą'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2>Pridėti studentą</h2>

        <form action="<?php echo e(route('students.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="mb-3">
                <label for="name" class="form-label">Vardas</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="surname" class="form-label">Pavardė</label>
                <input type="text" name="surname" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Adresas</label>
                <input type="text" name="address" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Telefonas</label>
                <input type="text" name="phone" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="city_id" class="form-label">Miestas</label>
                <select name="city_id" class="form-control">
                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($city->id); ?>"><?php echo e($city->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
			
			<div class="mb-3">
    <label for="grupe_id" class="form-label">Grupė</label>
    <select name="grupe_id" class="form-control">
        <option value="">-- Pasirinkite grupę --</option>
        <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($group->id); ?>"><?php echo e($group->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>

<div class="mb-3">
    <label for="gim_data" class="form-label">Gimimo data</label>
    <input type="date" name="gim_data" class="form-control">
</div>


            <button type="submit" class="btn btn-success">Pridėti</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crud\resources\views/students/create.blade.php ENDPATH**/ ?>