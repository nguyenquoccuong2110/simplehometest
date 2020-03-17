@extends("admin.admin")
 @section('content')

            <ol class="breadcrumb">
                <li class="breadcrumb-item"> Trang chủ </li>
                <li class="breadcrumb-item"><a href="/admin/customer/lists"> danh sách  người dùng      </a>
                </li>
               
                <li class="breadcrumb-item"><a href=""> {{$data['name']}}     </a>
                </li>
               
            </ol>


        <div class="container-fluid">
                    @if(count($errors)>0)
                        <div class='alert alert-danger'>
                            <ul>
                                    @foreach($errors->all() as $error)
                                        <li>
                                                {{$error}}
                                        </li>
                                    @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(!empty(session('success')))
                    <div class='alert alert-primary'>
                                {{session('success')}}
                        </div>
                    @endif

           {!! Form::open(['method'=>'post','files'=>true,'url'=>DOMAIN_URL.'/admin/customer/edit?id='.$data['id']]) !!}
                   
            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Thông tin      </strong>
                                        <small>Form</small>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">

                                           
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <label for="name">Họ và Tên  </label>
 {!! Form::text('name',@$data['name'],['class'=>"form-control ", "placeholder"=>""  ]) !!}
    <span style="color:red">*</span>
                                                    
                                                   
                                                </div>
                                            </div>
                                          
                                            
                                           <div class="col-sm-10">
                                                <div class="form-group">
                                                    <label for="name">Email </label>
 {!! Form::text('email',@$data['email'],['class'=>"form-control ", "placeholder"=>""  ]) !!}
    <span style="color:red">*</span>
                                                    
                                                   
                                                </div>
                                            </div>

                                             <div class="col-sm-10">
                                                <div class="form-group">
                                                    <label for="name">Số điện thoại  </label>
 {!! Form::text('phone',@$data['phone'],['class'=>"form-control ", "placeholder"=>""  ]) !!}
    <span style="color:red">*</span>
                                                    
                                                   
                                                </div>
                                            </div>


                                             <div class="col-sm-10">
                                                <div class="form-group">
                                                    <label for="name">Địa chỉ  </label>
 {!! Form::text('address',@$data['address'],['class'=>"form-control ", "placeholder"=>""  ]) !!}
    
                                                    
                                                   
                                                </div>
                                            </div>

                                              <div class="col-sm-10">
                                                <div class="form-group">
                                                    <label for="name">Phân quyển  </label>
 {!! Form::select('role',$roles,@$data['role'],['class'=>"form-control ", "placeholder"=>""  ]) !!}
    
                                                    
                                                   
                                                </div>
                                            </div>



                                             


                                        </div>
                                       
                                    </div>
                                </div>

               
                            </div>

                            

                             <div class="col-sm-12">
                                    <div class="card">
                                    <div class="card-header">
                                        <strong>Thông tin đăng nhập    </strong>
                                        <small>Form</small>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <label for="name">Username </label>
 {!! Form::text('username',@$data['username'],['class'=>"form-control ", "placeholder"=>""  ]) !!}
    
                                                    
                                                   
                                                </div>
                                            </div>

                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <label for="name">Mật khẩu </label>
 {!! Form::password('password',['class'=>"form-control ", "placeholder"=>""  ]) !!}
    
                                                    
                                                   
                                                </div>
                                            </div>
                                             <div class="col-sm-10">
                                                <div class="form-group">
                                                    <label for="name">Nhập lại mật khẩu  </label>
 {!! Form::password('password_confirmation',['class'=>"form-control ", "placeholder"=>""  ]) !!}
    
                                                    
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>    
                                            <div class="card-footer">
                                               
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> LƯU </button>
                                                <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> LÀM LẠI </button>
                                            </div>
                                        </div>
                                    </div>
               
                            </div>
                    {!! Form::close() !!}

             </div>
    @endsection
    @section('script_js') 
        <script type="text/javascript">
             document.getElementById('banner_name').addEventListener('change', handleFileSelectBanner, false);
        </script>
    @endsection