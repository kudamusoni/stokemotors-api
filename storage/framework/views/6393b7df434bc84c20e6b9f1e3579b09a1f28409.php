<?php $__env->startSection('content'); ?>
    <section id="one" class="wrapper style2">
        <div class="inner">
            <h2 style="text-decoration: underline; color: #202839">All Vehicles</h2>
            <div class="grid-style">
                <?php $__currentLoopData = $vehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div>
                        <div class="box" style="height: 100%">
                            <div class="image fit">
                                <img src="<?php echo e($item['main_image']['url']); ?>" alt="" />
                            </div>
                            <div class="content">
                                <header class="align-center">
                                    <p>mattis elementum sapien pretium tellus</p>
                                    <h2 style="height: 70px"><?php echo e($item['make']['name'] . " " .
                                        $item['model']['name'] . " " .
                                        $item['edition']['name']); ?></h2>
                                </header>
                                <p style="overflow: hidden; height:85px">
                                    Cras aliquet urna ut sapien tincidunt, quis malesuada elit facilisis.
                                    Vestibulum sit amet tortor velit. Nam elementum nibh a libero pharetra elementum.
                                    Maecenas feugiat ex purus, quis volutpat lacus placerat malesuada.
                                </p>
                                <footer class="align-center">
                                    <a href="/vehicles/info/<?php echo e($item['id']); ?>" class="button alt">Learn More</a>
                                </footer>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <h3>
                <?php echo e($vehicles->links("pagination::bootstrap-4")); ?>

            </h3>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Kuda Musoni\Documents\Code\stokemotors-api\resources\views/vehicle.blade.php ENDPATH**/ ?>