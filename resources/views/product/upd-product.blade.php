@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
    @if(session('info'))
    <div class="alert alert-danger">
        {{session('info')}}
    </div>
    @endif
<div class="col-md-5">
        <div class="card">
            <div class="card-header">               
                <span class="float-start">Edit Product</span>
            </div>
            <div class="card-body">
                <form action="{{ url("/admin/product/upd/{$product->id}") }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <table class="table table-sm">

                        <tr>
                            <td>
                                <label class="form-control">Category_name</label>
                            </td>
                            <td>
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @if($category->id == $product->category_id) selected @endif>
                                        {{ $category->name_eng }}
                                    </option>   
                                    @endforeach
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label class="form-control">Item_name</label>
                            </td>
                            <td>
                                <select name="item_id" class="form-control">
                                    @foreach($items as $item)
                                    <option value="{{ $item->id }}" @if($item->id == $product->item_id) selected @endif>
                                        {{ $item->name_eng }}
                                    </option>   
                                    @endforeach
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label class="form-control">Name_eng</label>
                            </td>
                            <td>
                                <input type="text" name="name_eng" class="form-control" value="{{ $product->name_eng }}">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label class="form-control">Name_unicode</label>
                            </td>
                            <td>
                                <input type="text" name="name_unicode" class="form-control" value="{{ $product->name_unicode }}">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label class="form-control">Old Photo1</label>
                            </td>
                            <td> <img src="{{ asset("images/$product->photo1") }} " width='50' height='50'></td>
                        </tr>

                        <tr>
                            <td>
                                <label class="form-control">Old Photo2</label>
                            </td>
                            <td> <img src="{{ asset("images/$product->photo2") }} " width='50' height='50'></td>
                        </tr>

                        <tr>
                            <td>
                                <label class="form-control">Old Photo3</label>
                            </td>
                            <td> <img src="{{ asset("images/$product->photo3") }} " width='50' height='50'></td>
                        </tr>

                        <tr>
                            <td>
                                <label class="form-control">Old Photo4</label>
                            </td>
                            <td> <img src="{{ asset("images/$product->photo4") }} " width='50' height='50'></td>
                        </tr>

                        <tr>
                            <td>
                                <label class="form-control">New Photo1</label>
                            </td>
                            <td>
                                <input type="file" name="photo1" class="form-control">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label class="form-control">New Photo2</label>
                            </td>
                            <td>
                                <input type="file" name="photo2" class="form-control">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label class="form-control">New Photo3</label>
                            </td>
                            <td>
                                <input type="file" name="photo3" class="form-control">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label class="form-control">New Photo4</label>
                            </td>
                            <td>
                                <input type="file" name="photo4" class="form-control">
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label class="form-control">Price</label>
                            </td>
                            <td>
                                <input type="number" name="price" class="form-control" value="{{ $product->price }}">
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label class="form-control">Qty</label>
                            </td>
                            <td>
                                <input type="number" name="qty" class="form-control" value="{{ $product->qty }}">
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <label class="form-control">Remark</label>
                            </td>
                            <td>
                                <input type="text" name="remark" class="form-control" value="{{ $product->remark }}">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input type="submit" value="Update" class="btn btn-primary btn-sm form-control">
                            </td>
                            
                        </tr>

                    </table>
                </form>
            </div>


        </div>
            
    </div>


</div> <!-- Row -->
</div> <!-- Container -->
@endsection

