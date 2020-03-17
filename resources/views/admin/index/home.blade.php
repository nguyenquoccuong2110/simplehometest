@extends("admin.admin")
 @section('content')

            <ol class="breadcrumb">
                <li class="breadcrumb-item"> Trang chủ </li>
                <li class="breadcrumb-item"><a href="">Thiệt lập trang chủ  </a>
                </li>
               
              
            </ol>


        <div class="container-fluid">
                    
          {!!Form::open(['method'=>'post','files'=>true])!!}
                    @if(!empty($success))
                    <div class="col-sm-12 col-md-12">
                            <div class="card card-inverse card-primary text-center">
                                <div class="card-block">
                                    <blockquote class="card-blockquote">
                                        <p>Cập nhật thông tin thành công. </p>
                                       
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    @endif
            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Thiệt lập trang chủ </strong>
                                        <small>Form</small>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-sm-10">

                                                <div class="form-group">
                                                    <label for="name">Tên  </label>
             <input type="text" class="form-control {{ (!empty($error['name1'])) ? 'is-invalid':'' }}"  name="name1" id="name" placeholder="Nhập.. " value="{{@$data['name1']}}"  />
                                                    @if(!empty($error['name1']))
                                                    <div class="invalid-feedback">
                                                        {{@$error['name1']}}
                                                    </div>
                                                    @endif
                                                </div>

                                            </div>
                                            
                                              <div class="col-sm-10">

                                                <div class="form-group">
                                                  <label for="name"> Mô tả </label>


                                                  <textarea  id='description1'  name="description1"  name="textarea-input" rows="9" class="form-control {{ (!empty($error['description1'])) ? 'is-invalid':'' }}" placeholder="Content..">{{@$data['description1']}}</textarea>
                                                   <span style="color:red">*</span>
                                                 
                                                </div>

                                            </div>
                                               <div class="col-sm-10">

                                                      
                                                        <div class="form-group">
                                                            <label for="name"> Hình ảnh    </label>
      {!! Form::file('picture',['class'=>' form-control is-invalid','accept'=>'image/*','id'=>'picture1']) !!}
                                                        

                                                    @if(!empty($error['picture1']))
                                                    <div class="invalid-feedback">
                                                        {{@$error['picture1']}}
                                                    </div>
                                                    @endif
                                                      <span style="color:red">*</span>
                                                <div class="detail_banner">
                                                        <img src="/public/upload/banner/{{@$data['picture1']}}" />

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
                                        <strong> Dự án  </strong>
                                        <small>Form</small>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-sm-10">

                                                <div class="form-group">
                                                    <label for="name">Tên  </label>
             <input type="text" class="form-control {{ (!empty($error['name2'])) ? 'is-invalid':'' }}"  name="name2" id="name" placeholder="Nhập.. " value="{{@$data['name2']}}"  />
                                                    @if(!empty($error['name2']))
                                                    <div class="invalid-feedback">
                                                        {{@$error['name2']}}
                                                    </div>
                                                    @endif
                                                </div>

                                            </div>
                                            
                                              <div class="col-sm-10">

                                                <div class="form-group">
                                                  <label for="name"> Mô tả </label>


                                                  <textarea  id='description2'  name="description2"  name="textarea-input" rows="9" class="form-control {{ (!empty($error['description2'])) ? 'is-invalid':'' }}" placeholder="Content..">{{@$data['description2']}}</textarea>
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
                                        <strong>Thiệt lập trang chủ </strong>
                                        <small>Form</small>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-sm-10">

                                                <div class="form-group">
                                                    <label for="name">Tên  </label>
             <input type="text" class="form-control {{ (!empty($error['name3'])) ? 'is-invalid':'' }}"  name="name3" id="name" placeholder="Nhập.. " value="{{@$data['name3']}}"  />
                                                    @if(!empty($error['name3']))
                                                    <div class="invalid-feedback">
                                                        {{@$error['name3']}}
                                                    </div>
                                                    @endif
                                                </div>

                                            </div>
                                            
                                              <div class="col-sm-10">

                                                <div class="form-group">
                                                  <label for="name"> Mô tả </label>


                                                  <textarea  id='description3'  name="description3"  name="textarea-input" rows="9" class="form-control {{ (!empty($error['description3'])) ? 'is-invalid':'' }}" placeholder="Content..">{{@$data['description3']}}</textarea>
                                                   <span style="color:red">*</span>
                                                 
                                                </div>

                                            </div>
                                               <div class="col-sm-10">

                                                      
                                                        <div class="form-group">
                                                            <label for="name"> Hình ảnh    </label>
      {!! Form::file('pictureother',['class'=>' form-control is-invalid','accept'=>'image/*','id'=>'picture3']) !!}
                                                        

                                                    @if(!empty($error['picture3']))
                                                    <div class="invalid-feedback">
                                                        {{@$error['picture3']}}
                                                    </div>
                                                    @endif
                                                      <span style="color:red">*</span>
                                                <div class="detail_picture">
                                                     <img src="/public/upload/banner/{{@$data['picture3']}}" />
                                                </div>
                                                        </div>
                                                       

                                                    </div>
                                                    

                                        </div>
                                       
                                    </div>
                                </div>

               
                            </div>

                             <div class="col-sm-12">
                                        <div class="card">
                                            
                                            <div class="card-body">
                                              
                                               
                                            </div>
                                            <div class="card-footer">
                                                <input type='hidden' name='_token' value='{{ csrf_token()}}' />
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> LƯU </button>
                                                <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> LÀM LẠI </button>
                                            </div>
                                        </div>

               
                            </div>
                    {!!Form::close()!!}

             </div>
    @endsection
    @section("script_js")
        <script type="text/javascript">
             document.getElementById('picture1').addEventListener('change', handleFileSelectBanner, false);
             document.getElementById('picture3').addEventListener('change', handleFileSelect, false);
            initEditor("description1");
            initEditor("description2");
            initEditor("description3");
        </script>
    @endsection 