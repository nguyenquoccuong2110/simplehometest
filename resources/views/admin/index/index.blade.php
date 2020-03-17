@extends("admin.admin")
 @section('content')

            <ol class="breadcrumb">
                <li class="breadcrumb-item"> Home </li>
                <li class="breadcrumb-item"><a href="">General Infomation </a>
                </li>
               
              
            </ol>


        <div class="container-fluid">
                    
           {!!Form::open(['method'=>'post','files'=>true])!!}
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
                                        <strong>General</strong>
                                        <small>Form</small>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-10">

                                                <div class="form-group">
                                                    <label for="name">LOGO</label>
        {!! Form::file('logo',['class'=>'form-control','accept'=>"image/*",'id'=>'picture_name'])!!}
                                              
                                                  <div class="detail_picture">
                                                        <img src='/public/upload/news/logo.png?={{date("Ymdhis")}}' />
                                                  </div>
                                                    <span style='color:red'>*</span>
                                                </div>

                                            </div>
                                             <div class="col-sm-10">

                                                <div class="form-group">
                                                    <label for="name">Picture </label>
        {!! Form::file('picture',['class'=>'form-control','accept'=>"image/*",'id'=>'banner_name'])!!}
                                              
                                                  <div class="detail_banner">
                                                        <img src='/public/upload/news/{{@$data['picture']}}?={{date("Ymdhis")}}' style="width: 100px" />
                                                  </div>
                                                    <span style='color:red'>*</span>
                                                </div>

                                            </div>
                                            <div class="col-sm-10">

                                                <div class="form-group">
                                                    <label for="name"> SITE  </label>
        {!! Form::text('sitename',@$data['sitename'],['class'=>'form-control'])!!}
                                                  
                                                    <span style='color:red'>*</span>
                                                </div>

                                            </div>
                                            <div class="col-sm-10">

                                                <div class="form-group">
                                                    <label for="name">Name  </label>
         {!! Form::text('name',@$data['name'],['class'=>'form-control'])!!}
                                                     <span style='color:red'>*</span>
                                                </div>

                                            </div>
                                            <div class="col-sm-10">

                                                <div class="form-group">
                                                    <label for="name"> Description </label>
        {!! Form::textarea('description',@$data['description'],['class'=>'form-control'])!!}
                                              
                                                   <span style='color:red'>*</span>
                                                  
                                                </div>

                                            </div>
                                            <div class="col-sm-10">

                                           <div class="form-group">
                                                    <label for="name"> Email  </label>
        {!! Form::text('email',@$data['email'],['class'=>'form-control'])!!}
                                                   
                                                     <span style='color:red'>*</span>
                                                   
                                                </div>

                                            </div>
                                            <div class="col-sm-10">

                                                <div class="form-group">

                                                    <label for="name"> Tell </label>
        {!! Form::text('phone',@$data['phone'],['class'=>'form-control'])!!}
                                                
                                                     <span style='color:red'>*</span>
                                                   
                                                </div>

                                            </div>
                                               <div class="col-sm-10">

                                                <div class="form-group">

                                                    <label for="name"> Fax </label>
        {!! Form::text('fax',@$data['fax'],['class'=>'form-control'])!!}
                                                
                                                     <span style='color:red'>*</span>
                                                   
                                                </div>

                                            </div>
                                             <div class="col-sm-10">

                                                <div class="form-group">

                                                    <label for="name"> Factory </label>
        {!! Form::text('factory',@$data['factory'],['class'=>'form-control'])!!}
                                                
                                                     <span style='color:red'>*</span>
                                                   
                                                </div>

                                            </div>
                                           
                                            <div class="col-sm-10">

                                                <div class="form-group">
                                                    <label for="name"> Address </label>
        {!! Form::text('address',@$data['address'],['class'=>'form-control'])!!}
                                                   
                                                     <span style='color:red'>*</span>
                                                    
                                                </div>

                                            </div>
                                            
                                               <div class="col-sm-10">

                                                <div class="form-group">
                                                    <label for="name"> Main Product 1 </label>
        {!! Form::text('mainproduct1',@$data['mainproduct1'],['class'=>'form-control'])!!}
                                                   
                                                     <span style='color:red'>*</span>
                                                    
                                                </div>

                                            </div>
                                            


                                               <div class="col-sm-10">

                                                <div class="form-group">
                                                    <label for="name">  Main Product 2 </label>
        {!! Form::text('mainproduct2',@$data['mainproduct2'],['class'=>'form-control'])!!}
                                                   
                                                     <span style='color:red'>*</span>
                                                    
                                                </div>

                                            </div>
                                            

                                               <div class="col-sm-10">

                                                <div class="form-group">
                                                    <label for="name">  Main Product 3 </label>
        {!! Form::text('mainproduct3',@$data['mainproduct3'],['class'=>'form-control'])!!}
                                                   
                                                     <span style='color:red'>*</span>
                                                    
                                                </div>

                                            </div>
                                            
                                        </div>
                                       
                                    </div>
                                </div>

               
                            </div>

                             <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>Social Network  </strong>
                                                <small>Form</small>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-sm-10">

                                                        <div class="form-group">
                                                            <label for="name"> Facebook  </label>

        {!! Form::text('facebook',@$data['facebook'],['class'=>'form-control'])!!}                                                    
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name"> Youtube  </label>
        {!! Form::text('youtube',@$data['youtube'],['class'=>'form-control'])!!}     
                                                          
                                                        </div>
                                                         <div class="form-group">
                                                            <label for="name"> Google  </label>
        {!! Form::text('google',@$data['google'],['class'=>'form-control'])!!}     
                                                          
                                                        </div>
                                                       
                                                        <div class="form-group">
                                                            <label for="name"> Skype  </label>
        {!! Form::text('skype',@$data['skype'],['class'=>'form-control'])!!}   
                                                           
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name"> Twitter  </label>
        {!! Form::text('twitter',@$data['twitter'],['class'=>'form-control'])!!}   
                                                           
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name"> pinterest  </label>
        {!! Form::text('pinterest',@$data['pinterest'],['class'=>'form-control'])!!}   
                                                           
                                                        </div>
                                                       

                                                    </div>
                                                    
                                                    

                                                </div>
                                               
                                            </div>
                                        </div>

               
                            </div>
                            
                           
                             <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>SEO  </strong>
                                                <small>Form</small>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-sm-10">

                                                        <div class="form-group">
                                                            <label for="name"> Title  </label>
        {!! Form::text('seo_title',@$data['seo_title'],['class'=>'form-control'])!!}  
                                                            
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name"> Description  </label>
         {!! Form::textarea('seo_description',@$data['seo_description'],['class'=>'form-control'])!!}  

                                                          
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name"> Keyword </label>
        {!! Form::textarea('seo_keyword',@$data['seo_keyword'],['class'=>'form-control'])!!} 
                                                         
                                                        </div>
                                                       

                                                    </div>
                                                    
                                                    

                                                </div>
                                               
                                            </div>
                                            <div class="card-footer">
                                                <input type='hidden' name='_token' value='{{ csrf_token()}}' />
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> SAVE </button>
                                                <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> RESET </button>
                                            </div>
                                        </div>

               
                            </div>
                   {!!Form::close()!!}

             </div>
    @endsection

     @section('script_js') 
        <script type="text/javascript">
            document.getElementById('picture_name').addEventListener('change', handleFileSelect, false);
            document.getElementById('banner_name').addEventListener('change', handleFileSelectBanner, false);
           // initEditor('description');
              //document.getElementById('multi_picture').addEventListener('change', handleFileSelectMulti, false);
        </script>
    @endsection