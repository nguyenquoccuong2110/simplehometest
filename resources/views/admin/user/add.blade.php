@extends("admin.admin")
 @section('content')

            <ol class="breadcrumb">
                <li class="breadcrumb-item"> Home  </li>
                <li class="breadcrumb-item"><a href=""> Add a new user     </a>
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

           {!! Form::open(['method'=>'post','files'=>true,'url'=>DOMAIN_URL.'/admin/customer/add']) !!}
                   
            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Information   </strong>
                                        <small>Form</small>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">

                                           
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <label for="name">Name  </label>
 {!! Form::text('name',@$data['name'],['class'=>"form-control ", "placeholder"=>""  ]) !!}
    <span style="color:red">*</span>
                                                    
                                                   
                                                </div>
                                            </div>
                                          
                                  


                                        </div>
                                       
                                    </div>
                                </div>

               
                            </div>

                            

                             <div class="col-sm-12">
                                    <div class="card">
                                    <div class="card-header">
                                        <strong>Info login  </strong>
                                        <small>Form</small>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <label for="name">Username </label>
 {!! Form::text('email',@$data['email'],['class'=>"form-control ", "placeholder"=>""  ]) !!}
    
                                                    
                                                   
                                                </div>
                                            </div>

                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <label for="name">Password</label>
 {!! Form::password('password',['class'=>"form-control ", "placeholder"=>""  ]) !!}
    
                                                    
                                                   
                                                </div>
                                            </div>
                                             <div class="col-sm-10">
                                                <div class="form-group">
                                                    <label for="name">Password Confirmation </label>
 {!! Form::password('password_confirmation',['class'=>"form-control ", "placeholder"=>""  ]) !!}
    
                                                    
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>    
                                            <div class="card-footer">
                                               
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> SAVE </button>
                                                <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> RESET </button>
                                            </div>
                                        </div>
                                    </div>
               
                            </div>
                    {!! Form::close() !!}

             </div>
    @endsection
    @section('script_js') 
       
    @endsection