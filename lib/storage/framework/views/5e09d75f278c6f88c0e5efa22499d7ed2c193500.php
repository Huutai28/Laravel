
<?php $__env->startSection('title','Danh Sách Sản Phẩm'); ?>
<?php $__env->startSection('main'); ?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sản phẩm</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách sản phẩm</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<a href="<?php echo e(asset('admin/product/add')); ?>" class="btn btn-primary">Thêm sản phẩm</a>
								<table id="sampleTable" class="table table-bordered" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th width="30%">Tên Sản phẩm</th>
											<th>Giá sản phẩm</th>
											<th width="20%">Ảnh sản phẩm</th>
											<th>Danh mục</th>
											<th>Tùy chọn</th>
										</tr>
									</thead>
									<tbody>
										<?php $__currentLoopData = $prodlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr>
											<td><?php echo e($prod->prod_id); ?></td>
											<td><?php echo e($prod->prod_name); ?></td>
											<td><?php echo e(number_format($prod->prod_price)); ?> VND</td>
											<td>
												<img width="200px" src="<?php echo e(asset('lib/storage/app/avatar/'.$prod->prod_img)); ?>" class="thumbnail">
											</td>
											<td><?php echo e($prod->cate_name); ?></td>
											<td>
												<a href="<?php echo e(asset('admin/product/edit/'.$prod->prod_id)); ?>" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<a href="<?php echo e(asset('admin/product/delete/'.$prod->prod_id)); ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>
										</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</tbody>
								</table>							
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
	
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\lib\resources\views/backend/product.blade.php ENDPATH**/ ?>