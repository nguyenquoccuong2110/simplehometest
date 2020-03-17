@extends("admin.admin")
 @section('content')

            <ol class="breadcrumb">
                <li class="breadcrumb-item"> Home</li>
                <li class="breadcrumb-item"><a href="/admin/news/lists"> News list   </a>
                </li>
                 <li class="breadcrumb-item"><a href=""> Detail  </a>
                </li>
              
            </ol>


        <div class="container-fluid">
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
           {!! Form::open(['method'=>'post','files'=>true,'url'=>DOMAIN_URL.'/admin/news/edit?id='.$data['id']]) !!}
                  
            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Information  </strong>
                                        <small>Form</small>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">

                                           
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <label for="name">Name  </label>
 {!! Form::text('name',@$data['name'],['class'=>!empty($error['name'])? "form-control  is-invalid":"form-control ", "placeholder"=>"Nhập..."  ]) !!}
    <span style="color:red">*</span>
                                                    
                                                  
                                                </div>
                                            </div>
                                          
                                          
                                            <div class="col-sm-10">

                                             <div class="form-group row">
                                                <div class='col-sm-3'>
                                                    <label for="name"> Status  </label>
                                                </div>
                                                <div class='col-sm-9'>
                                                    <div class="radio">
                                                            <label>
 {!! Form::radio('status','1', (($data['status']=='1')? true : false) ) !!} Enable
                                                            </label>
                                                     </div>
                                                    <div class="radio">
                                                            <label>
 {!! Form::radio('status','2', (($data['status']=='2')? true : false) ) !!} Disable
                                                            </label>
                                                     </div>
                                                </div>
                                                   
                                                </div>

                                            </div>

                                            
                                             
                                                <div class="col-sm-10">

                                                <div class="form-group">
                                                  <label for="name"> Description  </label>


                                                  <textarea  id='description'  name="description"  name="textarea-input" rows="9" class="form-control {{ (!empty($error['description'])) ? 'is-invalid':'' }}" >{{@$data['description']}}</textarea>
                                                   <span style="color:red">*</span>
                                                 
                                                </div>

                                            </div>

                                              <div class="col-sm-10">

                                                <div class="form-group">
                                                  <label for="name"> Content </label>

 {!! Form::textarea("content",@$data['content'],['class'=>'form-control','id'=>'contents'])!!}
                                                 
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
                                                <strong>Picture </strong>
                                                <small>Form</small>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-sm-10">

                                                        <div class="form-group">
                                                            <label for="name"> Picture </label>
      {!! Form::file('picture',['class'=>'load_banner form-control is-invalid','accept'=>'image/*','id'=>'picture_name']) !!}
                                                        

                                                  
                                                      <span style="color:red">*</span>
                                                <div class="detail_picture">
                                                    
                                                    <img src='/public/upload/news/{{$data["picture"]}}'/>
                                                </div>
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
                                                            <input type="text" class="form-control"  name="seo_title" id="name" placeholder="Nhập.. " value="{{@$data['seo_title']}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name"> Description  </label>
                                                            <input type="text" class="form-control"  name="seo_description" id="name" placeholder="Nhập.. " value="{{@$data['seo_description']}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name"> Keyword </label>
                                                            <input type="text" class="form-control"  name="seo_keyword" id="name" placeholder="Nhập.. " value="{{@$data['seo_keyword']}}">
                                                        </div>
                                                       

                                                    </div>
                                                    
                                                    

                                                </div>
                                               
                                            </div>
                                            <div class="card-footer">
                                               
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> SAVE </button>
                                                <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> RESET</button>
                                            </div>
                                        </div>

               
                            </div>
                    {!! Form::close() !!}

             </div>
    @endsection
    @section('script_js') 
        <script type="text/javascript">
            document.getElementById('picture_name').addEventListener('change', handleFileSelect, false);
        //    document.getElementById('banner_name').addEventListener('change', handleFileSelectBanner, false);
            initEditor('contents');
          //  document.getElementById('galaxy_name').addEventListener('change', handleFileSelectMulti, false);
        </script>
    @endsection