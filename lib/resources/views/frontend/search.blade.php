@extends('frontend.master')
@section('title','Trang Chủ')
@section('main')
	<div id="wrap-inner">
		<div class="products">
			<h3>Tìm kiếm với từ khóa: <span>{{$keyword}}</span></h3>
			<div class="product-list row">
			@foreach($items as $item)
				<div class="product-item col-md-3 col-sm-6 col-xs-12">
					<a href="#"><img src="{{asset('lib/storage/app/avatar/'.$item->prod_img)}}" class="img-thumbnail"></a>
					<p><a href="#">{{$item->prod_name}}</a></p>
					<p class="price">{{number_format($item->prod_price)}} VND</p>	  
					<div class="marsk">
						<a href="#">Xem chi tiết</a>
					</div>                                    
				</div>
			@endforeach
			</div>                	                	
		</div>
	</div>

@stop

					
					