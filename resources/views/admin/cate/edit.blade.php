@extends("admin.admin")
 @section('content')

            <ol class="breadcrumb">
                <li class="breadcrumb-item"> Home </li>
                 <li class="breadcrumb-item"><a href="/admin/cate/lists"> Cate list </a>
                <li class="breadcrumb-item"><a href=""> {{$data['name']}}  </a>
                </li>
               
              
            </ol>


        <div class="container-fluid">
                    
           {!! Form::open(['method'=>'post','files'=>true,'url'=>DOMAIN_URL.'/admin/cate/edit?id='.$data['id']]) !!}

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
                                        <strong>Edit : {{$data['name']}} </strong>
                                        <small>Form</small>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">

                                           
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <label for="name">Name   </label>
 {!! Form::text('name',@$data['name'],['class'=>"form-control "]) !!}
    <span style="color:red">*</span>
                                                  
                                                </div>
                                            </div>
                                             <div class="col-sm-10">
                                               <div class="form-group">
                                                    <label for="name">Picture</label>
        {!! Form::file('picture',['class'=>'form-control','accept'=>"image/*",'id'=>'picture_name'])!!}
                                              
                                                  <div class="detail_picture">
                                                       <img src='/public/upload/cate/big/{{$data["picture"]}}' />
                                                  </div>
                                                    <span style='color:red'>*</span>
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
                                                    <label for="name"> Order By </label>
{!! Form::number("position",@$data['position'],[ 'class'=> 'form-control' ])!!}
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
 {!! Form::text('seo_title',@$data['seo_title'],['class'=>"form-control "]) !!}
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name"> Description  </label>
   {!! Form::textarea('seo_description',@$data['seo_description'],['class'=>"form-control "]) !!}
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name"> Keyword </label>
  {!! Form::textarea('seo_keyword',@$data['seo_keyword'],['class'=>"form-control "]) !!}
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
            document.getElementById('banner_name').addEventListener('change', handleFileSelectBanner, false);
            initEditor('description');
              //document.getElementById('multi_picture').addEventListener('change', handleFileSelectMulti, false);
        </script>
    @endsection