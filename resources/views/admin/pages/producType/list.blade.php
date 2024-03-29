@extends('admin.layouts.master')

@section('title')
    Danh sách loại sản phẩm
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Loại sản phẩm</h6>
            <button class="btn btn-dark float-right add" data-toggle="modal" data-target="#add-productype" type="button"
                    data-id=""><i class="fas fa-plus-circle"></i></button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Tên không dấu </th>
                        <th>Thư mục sản phẩm </th>
                        <th>Trạng thái </th>
                        <th>Tuỳ chọn </th>
                    </tr>
                    </thead>
                    <tbody id="productType-crud">
                        
                    </tbody>
                </table>
            </div>
            {{ $productType->links()}}
        </div>
    </div>

    <div class="modal fade" id="add-productype" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm loại sản phẩm : <span class="title"></span></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" style="margin: 5px">
                        <div class="col-lg-12">
                            <form role="form" id="form-AddProduct-Type" action="" method="post">
                                @csrf
                                <fieldset class="form-group">
                                    <label>Tên</label>
                                    <input class="form-control name-productype" name="name"
                                           placeholder="Nhập tên loại sản phẩm">
                                    <div class="error"
                                         style="color: red ; font-size: 1rem;width:100%; margin-top: 10px"></div>
                                </fieldset>
                                <div class="form-group">
                                    <label>Thư mục sản phẩm </label>
                                    <select class="form-control" name="id_category">
                                        @foreach($category as $value)
                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select class="form-control status" name="status">
                                        <option value="1">Hiển Thị</option>
                                        <option value="0"> Không Hiển Thị</option>
                                    </select>
                                </div>
                                <input type="submit" class="btn btn-success " value="Thêm">
                                <button class="btn btn-secondary " type="reset" data-dismiss="modal">Làm mới</button>
                            </form>
                        </div>
                    </div>
                </div>
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
                                <input type="hidden" name="id" class="id-product-type">
                                <fieldset class="form-group">
                                    <label>Tên </label>
                                    <input class="form-control name" name="name" placeholder="Nhập tên loại sản phẩm ">
                                    <div class="error"
                                         style="color: red ; font-size: 1rem;width:100%; margin-top: 10px"></div>
                                </fieldset>
                                <div class="form-group">
                                    <label>Thư mục sản phẩm </label>
                                    <select class="form-control idCategory" name="id_category">

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Trạng thái </label>
                                    <select class="form-control status" name="status">
                                        <option value=1 >Hiển Thị</option>
                                        <option value=0 >Không Hiển Thị</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success updateProductType">Lưu </button>
                    <button class="btn btn-secondary thoat" type="button" data-dismiss="modal">Thoát </button>
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
