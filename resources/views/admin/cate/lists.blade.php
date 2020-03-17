@extends("admin.admin")
 @section('content')

            <ol class="breadcrumb">
                <li class="breadcrumb-item"> Home </li>
                <li class="breadcrumb-item"><a href=""> Total: ({{$data_list->total()}})  </a>
                </li>
               
              
            </ol>


        <div class="container-fluid">
            {!! Form::open(['method'=>'get']) !!}

               <div class="col-sm-10">
                                                <div class="form-group" style="display: none">
                                                    <label for="name">Search</label>
 {!! Form::text('search',@$search,['class'=> "form-control ", "placeholder"=>"Input..."  ]) !!}
  <button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-ban"></i> Search   </button>
                                                </div>
                                            </div>
            {!! Form::close()!!}


<div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-align-justify"></i> Categories management : ( {{$data_list->total()}} )
                                </div>
                                <div class="card-block">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>ID </th>
                                                <th>Name </th>
                                                  <th> Picture </th>
                                                <th> Created at   </th>
                                                <th> Status </th>
                                               
                                                <th> Option </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($data_list as $list):?>
                                            <tr>
                                                <td><?php echo $list['id'];?></td>
                                                <td>
                                                     <a href='/<?php echo $list['alias'];?>' target='_black'>
                                                        <?php echo $list['name'];?>
                                                    </a>
                                                            

                                                        </td>
                                                         <td>
                                                  
                                                       <img src='/public/upload/cate/<?php echo $list['picture'];?>' style='width: 200px'/>
                                                    
                                                            

                                                        </td>
                                                <td>
                                                    <small>Created at : {{$list['created_at']}}</small><br />
                                                    <small>Updated at : {{$list['updated_at']}}</small>
                                                </td>
                                                <td>
                                                    <?php if($list['status']=='1'):?>
                                                         <a class="badge badge-primary "> Enable </a>
                                                    <?php else:?>
                                                         <a class="badge badge-warning "> Disable   </a>
                                                    <?php endif;?>
                                                </td>
                                                
                                                <td>
                                                    <a class="btn btn-sm btn-success" href='/admin/cate/edit?id=<?php echo $list['id'];?>'><i class="fa fa-edit"></i> Edit </a><br /><br />
                                                    <a class="btn btn-sm btn-danger click_remove_cate" href='/admin/cate/remove?id=<?php echo $list['id'];?>&_token={{ csrf_token() }}'> <i class="fa fa-remove"></i> Remove  </a>
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
   