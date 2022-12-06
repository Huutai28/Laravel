
<?php $__env->startSection('title','Trang Chủ'); ?>
<?php $__env->startSection('main'); ?>
	<div id="wrap-inner">
		<div class="products">
			<h3>Tìm kiếm với từ khóa: <span><?php echo e($keyword); ?></span></h3>
			<div class="product-list row">
			<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="product-item col-md-3 col-sm-6 col-xs-12">
					<a href="#"><img src="<?php echo e(asset('lib/storage/app/avatar/'.$item->prod_img)); ?>" class="img-thumbnail"></a>
					<p><a href="#"><?php echo e($item->prod_name); ?></a></p>
					<p class="price"><?php echo e(number_format($item->prod_price)); ?> VND</p>	  
					<div class="marsk">
						<a href="#">Xem chi tiết</a>
					</div>                                    
				</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>                	                	
		</div>
	</div>

<?php $__env->stopSection(); ?>

					
					
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\lib\resources\views/frontend/search.blade.php ENDPATH**/ ?>