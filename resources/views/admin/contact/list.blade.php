@extends("admin.admin")
 @section('content')

            <ol class="breadcrumb">
                <li class="breadcrumb-item"> Home  </li>
                <li class="breadcrumb-item"><a href=""> Contact  ({{$data_list->total()}})  </a>
                </li>
               
              
            </ol>


        <div class="container-fluid">
            {!! Form::open(['method'=>'get']) !!}

               <div class="col-sm-10">
                                                <div class="form-group">
                                                    <label for="name">Search </label>
 {!! Form::text('search',@$search,['class'=>!empty($error['name'])? "form-control  is-invalid":"form-control ", "placeholder"=>"Input ..."  ]) !!}
  <button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-ban"></i> Search  </button>
                                                </div>
                                            </div>
            {!! Form::close()!!}


<div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-align-justify"></i> Contact   ( {{$data_list->total()}} )
                                </div>
                                <div class="card-block">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>ID </th>
                                                <th>Name   </th>
                                                <th> Phone </th>
                                                <th> Email </th>
                                                <th> Subject </th>
                                                <th style="max-width:200px"> Content  </th>
                                                <th> Option </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($data_list as $list):?>
                                            <tr>
                                                <td><?php echo $list['id'];?></td>
                                                <td>
                                                    <?php echo $list['name'];?>
                                                 </td>   
                                                 <td>
                                                    <?php echo $list['phone'];?>
                                                 </td>  
                                                  <td>
                                                    <?php echo $list['email'];?>
                                                 </td>   
                                                  <td>
                                                    <?php echo $list['subject'];?>
                                                 </td>            
                                                  <td>
                                                    <?php echo $list['content'];?>
                                                 </td>   

                                                       
                                               
                                                <td>
                                                   
                                                    <a class="btn btn-sm btn-danger click_remove" href='/admin/contact/remove?id=<?php echo $list['id'];?>&_token={{ csrf_token() }}'> <i class="fa fa-remove"></i> Removed  </a>
                                                    <br />

                                                     <small>Created at : {{$list['created_at']}}</small><br />
                                                    <small>Updated at : {{$list['updated_at']}}</small>
                                                </td>

                                            </tr>
                                            
                                           <?php endforeach;?>
                                           
                                        </tbody>
                                    </table>
                                    <nav>
                                        {!! $data_list->appends(['search'=>$search])->render() !!}
                                       
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <!--/.col-->
                    </div>
     @endsection
    @section('script_js') 
      
    @endsection