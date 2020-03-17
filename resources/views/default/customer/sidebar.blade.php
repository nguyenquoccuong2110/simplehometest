							@if(Auth::check())
								<p class="info_cus_ac">
								Bạn đã là thành viên của chúng tôi, vui lòng chọn chức năng mà bạn muốn thực hiện (Lưu ý chỉ có 
							  đăng ký thành viên của chúng tôi mới thực hiện được những tiện ích này !)
							</p>
								<ul class="morebtn">
									<li>
										<a href="/thong-tin-ca-nhan" class="btn btn-langer">
											Thông tin cá nhân 
										</a>
									</li>
									<li>
										<a href="/lich-su-don-hang" class="btn btn-langer">
											Lịch sử mua hàng  
										</a>
									</li>
									<li>
										<a href="/mat-khau" class="btn btn-langer">
											Thay đổi mật khẩu   
										</a>
									</li>
									<li>
										<a href="/thoat" class="btn btn-langer">
											Thoát 
										</a>
									</li>
								</ul>
							@else
							<h2 class="cus_title">Khách hàng mới</h2>
							<p class="info_cus_ac" style="text-align: center;">
								Tạo tài khoản có nhiều lợi ích: đặt hàng nhanh hơn, cập nhật thông tin nhanh chóng, theo dõi đơn đặt hàng và hơn thế nữa...<br />
								Hãy đăng ký thành viên để chúng tôi phục vụ bạn tốt nhất !
							</p>
							<br />
							<ul class="morebtn" style="display: none">
									<li>
										<a href="/dang-nhap" class="btn btn-langer">
											Đăng nhập 
										</a>
									</li>
									<li>
										<a href="/dang-ky" class="btn btn-langer btn_dk">
											Đăng ký  
										</a>
									</li>
							</ul>
							<ul class="">
									<li>
										<p>	Đăng ký bằng </p>
										<a href="/socialite-redirect-facebook" >
										
											<img src='/public/default/general/images/facebook.png' style="width:60%" /> 
										</a>
									</li>
									<li>
										<p>	Đăng ký bằng </p>
										<a href="/socialite-redirect-google" >
										
											<img src='/public/default/general/images/google.png' style="width:60%"/> 
										</a>
									</li>
								</ul>
							@endif