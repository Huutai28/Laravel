
<?php $__env->startSection('title','Thêm Sản Phẩm'); ?>
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
					<div class="panel-heading">Thêm sản phẩm</div>
					<div class="panel-body">
						<?php echo $__env->make('errors.note', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						<form method="post" action="" enctype="multipart/form-data">
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-8">
									<div class="form-group" >
										<label>Tên sản phẩm</label>
										<input required type="text" name="name" class="form-control">
									</div>
									<div class="form-group" >
										<label>Giá sản phẩm</label>
										<input required type="number" name="price" class="form-control">
									</div>
									<div class="form-group" >
										<label>Ảnh sản phẩm</label>
										<input required id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)" accept="image/*">
					                    <img id="avatar" class="thumbnail" width="300px" src="img/new_seo-10-512.png">
									</div>
									<div class="form-group" >
										<label>Phụ kiện</label>
										<input required type="text" name="accessories" class="form-control">
									</div>
									<div class="form-group" >
										<label>Bảo hành</label>
										<input required type="text" name="warranty" class="form-control">
									</div>
									<div class="form-group" >
										<label>Khuyến mãi</label>
										<input required type="text" name="promotion" class="form-control">
									</div>
									<div class="form-group" >
										<label>Tình trạng</label>
										<input required type="text" name="condition" class="form-control">
									</div>
									<div class="form-group" >
										<label>Trạng thái</label>
										<select required name="status" class="form-control">
											<option value="1">Còn hàng</option>
											<option value="0">Hết hàng</option>
					                    </select>
									</div>
									<div class="form-group" >
										<label>Miêu tả</label>
										<textarea class="ckeditor" required name="description"></textarea>
										<script type="text/javascript">
											var editor= CKEDITOR.replace('description',{
											language:'vi',
											filebrowerImageBrowseUrl:'../../editor/ckfinder/ckfinder.html?Type=Images',
											filebrowerFlashBrowseUrl:'../../editor/ckfinder/ckfinder.html?Type=Flash',
											filebrowerImageUploadUrl:'../../editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
											filebrowerFlashUploadUrl:'../../editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash' ,
											});
										</script>
									</div>
									<div class="form-group" >
										<label>Danh mục</label>
										<select required name="cate" class="form-control">
											<?php $__currentLoopData = $catelist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($cate->cate_id); ?>"><?php echo e($cate->cate_name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					                    </select>
									</div>
									<div class="form-group" >
										<label>Sản phẩm nổi bật</label><br>
										Có: <input type="radio" name="featured" value="1">
										Không: <input type="radio" checked name="featured" value="0">
									</div>
									<input type="submit" name="submit" value="Thêm mới" class="btn btn-primary">
									<a href="#" class="btn btn-danger">Hủy bỏ</a>
								</div>
							</div>
							<?php echo csrf_field(); ?>
						</form>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\lib\resources\views/backend/addproduct.blade.php ENDPATH**/ ?>