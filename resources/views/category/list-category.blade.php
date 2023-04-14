@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
    @if(session('info'))
    <div class="alert alert-danger">
        {{session('info')}}
    </div>
    @endif
<div class="col-md-4">

        <div class="card">
            <div class="card-header">               
                <span class="float-start">Add New Category</span>
            </div>
            <div class="card-body">
                <form action="{{ url("/admin/category/add" )}}" method="post" enctype="multipart/form-data">
                    @csrf 

                    <table class="table table-sm">
                        <tr>
                            <td>
                                <label class="form-control">Name_eng</label>
                            </td>
                            <td>
                                <input type="text" name="name_eng" class="form-control">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label class="form-control">Name_unicode</label>
                            </td>
                            <td>
                                <input type="text" name="name_unicode" class="form-control">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label class="form-control">Photo</label>
                            </td>
                            <td>
                                <input type="file" name="photo" class="form-control">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label class="form-control">Remark</label>
                            </td>
                            <td>
                                <input type="text" name="remark" class="form-control">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input type="submit" value="Add" class="btn btn-primary btn-sm form-control">
                            </td>
                            
                        </tr>
                    </table>
                </form>
            </div>


        </div>
            
    </div>



<div class="col-md-6">
         <div class="card">
         <div class="card-header">Category List</div>

         <div class="card-body">
            <table class="table table-primary table-sm">
                        <tr>
                            <th>No</th>
                            <th>Name_eng</th>
                            <th>Name_unicode</th>
                            <th>Photo</th>
                            <th>Remark</th>
                            <th>Delete</th>
                            <th>Update</th>
                        </tr>

                        @foreach($categories as $category)
                        <tr>

                            <td> {{ $category->id }}</td>
                            <td> {{ $category->name_eng }}</td>
                            <td> {{ $category->name_unicode }}</td>

                            <td> 
                                <img width="50px" height="50px" src="{{ asset("images/$category->photo") }}"> 
                            </td>

                            <td> {{ $category->remark }}</td>

                            <td> 
                                <a href="{{ url("/admin/category/del/{$category->id}")}}" class="btn btn-danger btn-sm">
                                Delete
                                </a>
                            </td>

                            <td> 
                                <a href="{{ url("/admin/category/upd/{$category->id}")}}" class="btn btn-warning btn-sm">
                                Update
                                </a>
                            </td>
                        </tr>
                        @endforeach

                        
                            
                            

                            
                        

                 </table>
                   
         </div>
         </div>
</div> <!-- col -->
</div> <!-- Row -->
</div> <!-- Container -->
@endsection

