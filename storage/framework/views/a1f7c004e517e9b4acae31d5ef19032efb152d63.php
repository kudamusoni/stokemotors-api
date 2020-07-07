<?php $__env->startSection('content'); ?>
    <section id="one" class="wrapper style2">
        <div class="inner">
            <h2 class="title">Enquiries</h2>
            <?php $__currentLoopData = $enquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <table>
                    
                    <tr></tr>
                </table>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Kuda Musoni\Documents\Code\stokemotors-api\resources\views/enquiry.blade.php ENDPATH**/ ?>