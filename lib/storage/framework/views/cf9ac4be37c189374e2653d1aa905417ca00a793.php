
<?php $__env->startSection('title','Chi Tiết Sản Phẩm'); ?>
<?php $__env->startSection('main'); ?>
	<div id="wrap-inner">
		<div id="product-info">
			<div class="clearfix"></div>
			<h3><?php echo e($item->prod_name); ?></h3>
			<div class="row">
				<div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center">
					<img width="250px" src="<?php echo e(asset('lib/storage/app/avatar/'.$item->prod_img)); ?>">
				</div>
				<div id="product-details" class="col-xs-12 col-sm-12 col-md-9">
					<p>Giá: <span class="price"><?php echo e(number_format($item->prod_price)); ?> VND</span></p>
					<p>Bảo hành: <?php echo e($item->prod_warranty); ?></p> 
					<p>Phụ kiện: <?php echo e($item->prod_accessories); ?></p>
					<p>Tình trạng: <?php echo e($item->prod_condition); ?></p>
					<p>Khuyến mại: <?php echo e($item->prod_promotion); ?></p>
					<p>Còn hàng: <?php if($item->prod_status == 1): ?> Còn hàng <?php else: ?> Hết hàng <?php endif; ?></p>
					<form action="<?php echo e(asset('/save-cart')); ?>" method="POST">
						<input name="qty" type="hidden" value="1"/>
						<input name="prod_id_hidden" type="hidden" value="<?php echo e($item->prod_id); ?>"/>
						<button type="submit" class="form-control btn btn-danger">Đặt Hàng Online</button>
						<?php echo csrf_field(); ?>
					</form>
					<style>
						.btn-danger{
							cursor: pointer;
							line-height: 46px;
							font-size: 22px;
							background: -webkit-linear-gradient(#fe0000, #d10000);
							background: -moz-linear-gradient(#fe0000, #d10000);
						}
					</style>
				</div>
			</div>							
		</div>
		<div id="product-detail">
			<h3>Chi tiết sản phẩm</h3>
			<p class="text-justify"><?php echo $item->prod_description; ?></p>
		</div>
		<div id="comment">
			<h3>Bình luận</h3>
			<div class="col-md-9 comment">
				<form method="post">
					<div class="form-group">
						<label for="email">Email:</label>
						<input required type="email" class="form-control" id="email" name="email">
					</div>
					<div class="form-group">
						<label for="name">Tên:</label>
						<input required type="text" class="form-control" id="name" name="name">
					</div>
					<div class="form-group">
						<label for="cm">Bình luận:</label>
						<textarea required rows="10" id="cm" class="form-control" name="content"></textarea>
					</div>
					<div class="form-group text-right">
						<button type="submit" class="btn btn-default">Gửi</button>
					</div>
					<?php echo csrf_field(); ?>
				</form>
			</div>
		</div>
		<div id="comment-list">
			<?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<ul>
				<li class="com-title">
					<?php echo e($comment->com_name); ?>

					<br>
					<span><?php echo e(date('d/m/Y H:i',strtotime($comment->created_at))); ?></span>	
				</li>
				<li class="com-details">
				<?php echo e($comment->com_content); ?>

				</li>
			</ul>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>					
<?php $__env->stopSection(); ?>			
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\lib\resources\views/frontend/details.blade.php ENDPATH**/ ?>