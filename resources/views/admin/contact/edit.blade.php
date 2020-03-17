@extends("admin.admin")
 @section('content')

            <ol class="breadcrumb">
                <li class="breadcrumb-item"> Trang chủ </li>
                 <li class="breadcrumb-item"><a href="/admin/contact/index"> Danh sách liên hệ   </a>
                <li class="breadcrumb-item"><a href="">Gửi mail đến:  {{$data['name']}}  </a>
                </li>
               
              
            </ol>


        <div class="container-fluid">
                    
           {!! Form::open(['method'=>'post','files'=>true,'url'=>DOMAIN_URL.'/admin/contact/edit?id='.$data['id']]) !!}

                   @if(count($errors)>0)

                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(!empty(session('success')))
                    <div class="alert alert-primary">
                            <ul>
                                <li>
                                        <p>{!!session('success')!!}</p>
                                </li>   
                                   
                                </ul>
                        </div>
                    @endif
            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Gửi mail : {{$data['name']}} - {{$data['email']}} </strong>
                                        <small>Form</small>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">

                                           
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <label for="name">Subject  </label>
 {!! Form::text('subject_mail',@$data['subject_mail'],['class'=>"form-control "]) !!}
      
                                                </div>
                                            </div>
                                          
                                            
                                              <div class="col-sm-10">

                                                <div class="form-group">
                                                  <label for="name"> Nội dung Mail </label>

{!! Form::textarea("content_mail",@$data['content_mail'],['class'=>'form-control','id'=>'description'])!!}
                                                
                                                </div>

                                            </div>

                                        </div>
                                       
                                    </div>
                                </div>

               
                            </div>

                             <div class="col-sm-12">
                                        
                                            <div class="card-footer">
                                               
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> SEND MAIL </button>
                                              
                                            </div>
                                        </div>

               
                            </div>
                    {!! Form::close() !!}

             </div>
    @endsection
    @section('script_js') 
        <script type="text/javascript">
          
            initEditor('description');
              //document.getElementById('multi_picture').addEventListener('change', handleFileSelectMulti, false);
        </script>
    @endsection