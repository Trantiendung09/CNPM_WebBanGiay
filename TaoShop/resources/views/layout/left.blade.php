<div class="col-sm-3">
	<div class="left-sidebar">
		<h2>Sản Phẩm Theo Hãng</h2>
		<div class="panel-group category-products" id="accordian">
			<!--category-productsr-->
			@foreach($category as $ca)
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordian" href="#{{$ca->id}}">
							<span class="badge pull-right"><i class="fa fa-plus"></i></span>
							{{$ca->name}}
						</a>
					</h4>
				</div>
				<div id="{{$ca->id}}" class="panel-collapse collapse">
					<div class="panel-body">
						<ul class="dmm">
							<?php

							$b = [" "];
							$k = 0;
							?>
							@foreach($ca->products as $p)
							<?php
							$x = count($b);
							for ($i = 0; $i <= $x - 1; $i++) {
								if ($b[$i] != $p->brand->name) {
									$k = $k + 1;
								}
							}
							if ($k == $x) {
								$b[$x] = $p->brand->name;
							}
							$k = 0;
							?>
							@endforeach
							@foreach($b as $c)
							<li><a class="menu" data-loai="{{$ca->id}}" data-hang="{{$c}}" href="{{route('menu_vip',['loai'=>$ca->id, 'hang'=>$c])}}">{{$c}}</a></li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
			@endforeach
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title"><a href="#"></a></h4>
				</div>
			</div>
		</div>
		<!--/category-products-->

		<div class="brands_products">
			<!--brands_products-->
			<h2>Thương Hiệu</h2>
			<div class="brands-name">
				<ul class="nav nav-pills nav-stacked">
					@foreach($brands as $brand)
					<li><a href="#"> <span class="pull-right">({{$brandss[$brand->id]}})</span>{{$brand->name}}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
		<!--/brands_products-->

		<!-- <div class="price-range"> -->
		<!--price-range-->
		<!-- <h2>Price Range</h2>
			<div class="well text-center">
				<input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2"><br />
				<b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
			</div>
		</div> -->
		<div>
			<h2>Lọc theo giá </h2>
			<form action="{{route('locgia')}}" method="get">
			@csrf
				<div id="slider-range" style="height:20px;"></div>
				<input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
				<input type="hidden" name="price_start" id="price_start">
				<input type="hidden" name="price_end" id="price_end" >
				<br>
				<input type="submit" name="filter-price" value="lọc giá" class="btn btn-sm btn-default">
			</form>
			<!--/price-range-->
		</div>
		<br>
		<div class="shipping text-center">
			<!--shipping-->
			<img src="{{('public/fontend/images/home/shipping.jpg')}}" alt="" />
		</div>
		<!--/shipping-->

	</div>

</div>