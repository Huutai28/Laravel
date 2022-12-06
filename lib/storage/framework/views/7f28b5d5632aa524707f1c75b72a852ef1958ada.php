
<?php $__env->startSection('title','Danh Mục Sản Phẩm'); ?>
<?php $__env->startSection('main'); ?>
	<div id="wrap-inner">
		<div class="products">
			<h3><?php echo e($cateName->cate_name); ?></h3>
			<div class="product-list row">
				<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="product-item col-md-3 col-sm-6 col-xs-12">
					<a href="<?php echo e(asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')); ?>"><img src="<?php echo e(asset('lib/storage/app/avatar/'.$item->prod_img)); ?>" class="img-thumbnail"></a>
					<p><a href="<?php echo e(asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')); ?>"><?php echo e($item->prod_name); ?></a></p>
					<p class="price"><?php echo e(number_format($item->prod_price)); ?> VND</p>	  
					<div class="marsk">
						<a href="<?php echo e(asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')); ?>">Xem chi tiết</a>
					</div>                                    
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				
			</div>                	                	
		</div>

		<div id="pagination">
			<?php echo e($items->links()); ?>

		</div>
	</div>
	<style>
		.w-5{
			display: none;
		}
	</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\lib\resources\views/frontend/category.blade.php ENDPATH**/ ?>