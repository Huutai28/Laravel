
<?php $__env->startSection('title','Giỏ Hàng'); ?>
<?php $__env->startSection('main'); ?>
<script type="text/javascript">
	function updateCart(qty, rowId){
		$.get(
			'<?php echo e(asset('/update-cart')); ?>',
			{qty:qty, rowId:rowId},
			function(){
				location.reload();
			}
		);
	}
</script>
	<div id="wrap-inner">
		<div id="list-cart">
			<h3>Giỏ hàng</h3>
				<table class="table table-bordered .table-responsive text-center">
					<tr class="active">
						<td width="11.111%">Ảnh mô tả</td>
						<td width="22.222%">Tên sản phẩm</td>
						<td width="22.222%">Số lượng</td>
						<td width="16.6665%">Đơn giá</td>
						<td width="16.6665%">Thành tiền</td>
						<td width="11.112%">Xóa</td>
					</tr>
					<?php $__currentLoopData = $content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><a href="<?php echo e(asset('detail/'.$value->id.'/'.$value->options->slug.'.html')); ?>"><img class="img-responsive" width="80" src="<?php echo e(asset('lib/storage/app/avatar/'.$value->options->image)); ?>"></a></td>
						<td><a href="<?php echo e(asset('detail/'.$value->id.'/'.$value->options->slug.'.html')); ?>"><?php echo e($value->name); ?></a></td>					
						<td>
							<div class="form-group">
								<input class="form-control" name="qty" type="number" value="<?php echo e($value->qty); ?>" onchange="updateCart(this.value,'<?php echo e($value->rowId); ?>')">
							</div>
						</td>
						<td><span class="price"><?php echo e(number_format($value->price)); ?> VND</span></td>
						<td><span class="price"><?php echo e(number_format($value->price * $value->qty)); ?> VND</span></td>
						<td><a href="<?php echo e(asset('/delete-cart/'.$value->rowId)); ?>">Xóa</a></td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</table>
				<div class="row" id="total-price">
					<div class="col-md-6 col-sm-12 col-xs-12">										
							Tổng thanh toán: <span class="total-price"><?php echo e($total); ?> VND</span>
																									
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<a href="<?php echo e(asset('/')); ?>" class="my-btn btn">Mua tiếp</a>
						<a href="#" class="my-btn btn">Xóa giỏ hàng</a>
					</div>
				</div>
		</div>

		<div id="xac-nhan">
			<h3>Xác nhận mua hàng</h3>
			<form>
				<div class="form-group">
					<label for="email">Email address:</label>
					<input required type="email" class="form-control" id="email" name="email">
				</div>
				<div class="form-group">
					<label for="name">Họ và tên:</label>
					<input required type="text" class="form-control" id="name" name="name">
				</div>
				<div class="form-group">
					<label for="phone">Số điện thoại:</label>
					<input required type="number" class="form-control" id="phone" name="phone">
				</div>
				<div class="form-group">
					<label for="add">Địa chỉ:</label>
					<input required type="text" class="form-control" id="add" name="add">
				</div>
				<div class="form-group text-right">
					<button type="submit" class="btn btn-default">Thực hiện đơn hàng</button>
				</div>
			</form>
		</div>
	</div>
<?php $__env->stopSection(); ?>	
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\lib\resources\views/frontend/cart.blade.php ENDPATH**/ ?>