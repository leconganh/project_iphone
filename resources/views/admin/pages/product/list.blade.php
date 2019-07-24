@extends('admin.layouts.master')

@section('title')
    Danh sách loại sản phẩm
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Loại sản phẩm</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Thông tin</th>
                        <th>Trạng thái</th>
                        <th>Danh mục</th>
                        <th>Loại sản phẩm</th>
                        <th>Tuỳ chọn </th>
                    </tr>
                    </thead>
                    <tbody id="product-crud">
                    @foreach($product as $key => $value)
                        <tr>
                            <td>{{$value->id}}</td>
                            <td>{{$value->name}}</td>
                            <td>
                                <b>Số lượng</b> : {{$value->quantity}}
                                <br>
                                <b>Đơn giá</b> : {{$value->price}}
                                <br>
                                <b>Khuyến mại</b> : {{$value->promotional}}
                                <img src="images/upload/product/{{$value->image}}" width="200px" height="200px" alt="">
                            </td>
                            <td>@if($value->status == 1)
                                    {{"Còn hàng "}}
                                @else
                                    {{"hết hàng "}}
                                @endif
                            </td>
                            <td>{{$value->Categories->name}}</td>
                            <td>{{$value->ProductTypes->name}}</td>
                            <td>
                                <button class="btn btn-primary editProductType" title="{{ $value->name }}"data-toggle="modal" data-target="#edit" type="button" data-id = "{{$value->id}}"><i class="fas fa-edit" ></i></button>
                                <button class="btn btn-danger deleteProductType" title="{{ $value->name }}"data-toggle="modal" data-target="#delete" type="button" data-id = "{{$value->id}}"><i class="fas fa-trash-alt" ></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa loại sản phẩm : <span class="title"></span>
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" style="margin: 5px">
                        <div class="col-lg-12">
                            <form role="form" action="" id="ProductTypeForm" method="post">
                                <fieldset class="form-group">
                                    <label>Tên</label>
                                    <input class="form-control name" name="name" placeholder="Nhập tên sản phẩm">
                                    <div class="error"
                                         style="color: red ; font-size: 1rem;width:100%; margin-top: 10px"></div>
                                </fieldset>
                                <div class="form-group">
                                    <label>Thư mục sản phẩm</label>
                                    <select class="form-control idCategory" name="idCategory">

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Trạng thái </label>
                                    <select class="form-control status" name="status">
                                        <option value="1" class="ht">Hiển Thị</option>
                                        <option value="0" class="kht">Không Hiển Thị</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success updateProductType">Save</button>
                    <button class="btn btn-secondary thoat" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- delete Modal-->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xóa ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style="margin-left: 183px;">
                    <button type="button" class="btn btn-success xoa">Có</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
                    <div>
                    </div>
                </div>
            </div>
@endsection
