
		<div style="width: 924px; height: 610px; background: url('URLemail.png') repeat-x;margin: auto;">
			<div style="width: 746px; margin-top:18px;float: left;margin-left: 88px">
				<div style="width: 100%; height: 138px; float: left;">
					<div style="width: 271px; height: 180px;margin-top: 8px;margin-left: 28px;background: url('http://tinhdauthanhtoan.com/public/upload/banner/logo.png')no-repeat"></div>
				</div>
				<div style="width: 100%; height: 3px; background: #f98632;float: left;"></div>
				<div style="width: 100%;float: left;background: #fff;">
					<div style="width: 100%;height: 35px;float: left;padding-left: 18px;">
						<a href="#" style="font: bold 16pt Tahoma;color: #04439a;text-decoration: none;line-height: 41px;cursor: default">Dear: {{$Payment['name']}} </a>
					</div>
					<div style="width: 100%;float: left;">
						<table style="background:#fbeaea;width: 100%;float: left;height: 100%;padding-left: 20px;border-right: 1px solid #DDD;">
						
							<tbody style="width: 100%;height: 100%;">
								<tr>
									<td colspan="2" style="font: bold 13pt Tahoma;color: #fc3b07;text-align: left;">Thông tin người mua</td>
								</tr>
								<tr>
									<td style="font: normal 10pt Tahoma;color: #000;height: 20px;width: 100%;float: left">Họ và tên:</td>
									<td style="width: 60%"><a style="font: bold 10pt Tahoma;color: #000;text-align: left;">{{$Payment['name']}}</a></td>
								</tr>
								<tr>
									<td style="font: normal 10pt Tahoma;color: #000;height: 20px;">Email:</td>
									<td><a style="font: normal 10pt Tahoma;color: #047cae;text-align: left;">{{$Payment['email']}}</a></td>
								</tr>
								<tr>
									<td style="font: normal 10pt Tahoma;color: #000;height: 20px;">Điện Thoại:</td>
									<td><a style="font: normal 10pt Tahoma;color: #000;text-align: left;">{{$Payment['phone']}}</a></td>
								</tr>
								<tr>
									<td style="font: normal 10pt Tahoma;color: #000;height: 20px;">Địa Chỉ:</td>
									<td><a style="font: normal 10pt Tahoma;color: #000;text-align: left;">{{$Payment['address']}}</a></td>
								</tr>
							
								
								<tr>
									<td style="font: normal 10pt Tahoma;color: #000;height: 20px;">Ghi chú:</td>
									<td><a style="font: normal 10pt Tahoma;color: #000;text-align: left;">{{$Payment['note']}}</a></td>
								</tr>
								
							</tbody>
						</table>
											
					</div>
					<div  style="margin-top: 10px;float: left;width: 100%;">
						<table style="width: 96%;margin-left: 10px;border: 1px solid #DDD; border-spacing: 0;">
							<tr style=" border-spacing: 0;background: #f9f9f9">   
								<th style="font: bold 12pt Tahoma;color: #0349ab;padding: 3px;">Mã </th>
								<th style="font: bold 12pt Tahoma;color: #0349ab">Hình ảnh-Tên sản phẩm</th>
								<th style="font: bold 12pt Tahoma;color: #0349ab">Giá bán</th>
								<th style="font: bold 12pt Tahoma;color: #0349ab">Số lượng</th>
								
								<th style="font: bold 12pt Tahoma;color: #0349ab">Thành tiền</th>								
							</tr>
							 @foreach($product as $p)
							<tr style="vertical-align: inherit;text-align: center;">   

								<td >{{$p['product']['id']}}</td>
								<td style="padding: 5px;">
									<img width="30%" height="100%" style="float: left;" src="http://{{$_SERVER['SERVER_NAME']}}/public/upload/product/small/{{$p['product']['picture']}}" />
									<span style="float: left;width: 70%;height: 100%;font: bold 10pt Tahoma;color: #6c6a6a;">
										{{$p['product']['name']}}
									</span>
								</td>
								<td style="font: normal 12pt Tahoma;color: red;">{{App\MrData::toPrice($p['product']['price'])}}</td>
								<td>{{$p['limited']}}</td>
							
								<td style="font: normal 12pt Tahoma;color: red;">
										{{App\MrData::toPrice($p['product']['price']*$p['limited'])}}

								</td>	
															
							</tr>
							@endforeach	
						</table>
					</div>
					<div style="margin-top: 5px;margin-left: 10px;float: left;width: 100%;">
						<a style="font: normal 12pt Tahoma;color: #9fa1a2">Thông tin xem tại <span style="font: normal 12pt Tahoma;color: #5095b8">http://<?php echo $_SERVER['SERVER_NAME'];?></span> </a>
					</div>
					<div style="margin-top: 5px;margin-left: 10px;float: left;">
						<a style="font: normal 12pt Tahoma;color: #166a96">Cheers</a>
					</div>
				</div>
				<div style="text-align: center;width: 100%;"><a style="font: normal 10pt Tahoma;color: #fff"> &#169; 2018.All Right Reseved</a></div>
			</div>
			
		</div>
