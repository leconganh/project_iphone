@extends('admin.layouts.master')

@section('title')
    Danh sách danh mục sản phẩm
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">Thư mục sản phẩm </h6>
            <button class="btn btn-dark float-right add" data-toggle="modal" data-target="#add-category" type="button"
                    data-id=""><i class="fas fa-plus-circle"></i></button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th></th>
                        <th>Tên không dấu</th>
                        <th>Trạng thái</th>
                        <th>Tuỳ chọn</th>
                    </tr>
                    </thead>
                    <tbody id="category-crud">

                    </tbody>
                </table>
            </div>
            {{ $category->links()}}
        </div>
    </div>
    <div class="modal fade" id="add-category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm thư mục: <span class="title"></span></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" style="margin: 5px">
                        <div class="col-lg-12">
                            <form role="form" id="form-Add" action="" method="post">
                                @csrf
                                <fieldset class="form-group">
                                    <label>Tên</label>
                                    <input class="form-control name-category" name="name"
                                           placeholder="Nhập tên danh mục">
                                    <div class="error"
                                         style="color: red ; font-size: 1rem;width:100%; margin-top: 10px"></div>
                                </fieldset>
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select class="form-control name-status" name="status">
                                        <option value="1">Hiển Thị</option>
                                        <option value="0"> Không Hiển Thị</option>
                                    </select>
                                </div>
                                <input type="submit" class="btn btn-success " value="Thêm ">
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
                    <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa thư mục: <span class="title"></span></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" style="margin: 5px">
                        <div class="col-lg-12">
                            <form role="form" action="" id="categoryForm" method="post">
                                <input type="hidden" name="id" class="id-category">
                                <fieldset class="form-group">
                                    <label>Tên</label>
                                    <input class="form-control name" name="name" placeholder="Nhập tên thư mục ">
                                    <div class="error"
                                         style="color: red ; font-size: 1rem;width:100%; margin-top: 10px"></div>
                                </fieldset>
                                <div class="form-group">
                                    <label>Trạng thái </label>
                                    <select class="form-control status" name="status">
                                        <option value=1 class="ht">Hiển Thị</option>
                                        <option value=0 class="kht">Không Hiển Thị</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success update">Lưu</button>
                    <button class="btn btn-secondary thoat" type="button" data-dismiss="modal">Thoát</button>
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
