@extends('frontend.master')
@section('title','Chi Tiết Sản Phẩm')
@section('main')
	<div id="wrap-inner">
		<div id="product-info">
			<div class="clearfix"></div>
			<h3>{{$item->prod_name}}</h3>
			<div class="row">
				<div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center">
					<img width="250px" src="{{asset('lib/storage/app/avatar/'.$item->prod_img)}}">
				</div>
				<div id="product-details" class="col-xs-12 col-sm-12 col-md-9">
					<p>Giá: <span class="price">{{number_format($item->prod_price)}} VND</span></p>
					<p>Bảo hành: {{$item->prod_warranty}}</p> 
					<p>Phụ kiện: {{$item->prod_accessories}}</p>
					<p>Tình trạng: {{$item->prod_condition}}</p>
					<p>Khuyến mại: {{$item->prod_promotion}}</p>
					<p>Còn hàng: @if($item->prod_status == 1) Còn hàng @else Hết hàng @endif</p>
					<form action="{{asset('/save-cart')}}" method="POST">
						<input name="qty" type="hidden" value="1"/>
						<input name="prod_id_hidden" type="hidden" value="{{$item->prod_id}}"/>
						<button type="submit" class="form-control btn btn-danger">Đặt Hàng Online</button>
						@csrf
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
			<p class="text-justify">{!!$item->prod_description!!}</p>
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
					@csrf
				</form>
			</div>
		</div>
		<div id="comment-list">
			@foreach($comments as $comment)
			<ul>
				<li class="com-title">
					{{$comment->com_name}}
					<br>
					<span>{{date('d/m/Y H:i',strtotime($comment->created_at))}}</span>	
				</li>
				<li class="com-details">
				{{$comment->com_content}}
				</li>
			</ul>
			@endforeach
		</div>
	</div>					
@stop			