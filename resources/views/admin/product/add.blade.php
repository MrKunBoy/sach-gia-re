@extends('admin.main')

@section('content')


    <form action="" method="POST">
        <div class="form-group row d-flex justify-content-center" style="margin-top: 20px" ;>
            <input type="text" name="key" class="col-sm-6" placeholder="Tìm kiếm ...">
            <span class="col-sm-2">
                <button class="btn btn-info" name="action" value="search_all" type="submit">Tìm kiếm</button>
            </span>
        </div>
        <?php
        $ma_sach = mt_rand();
        echo '<input type="hidden" name="ma_sach" value="'.$ma_sach.'">';
        ?>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputNamePro">Tên sách</label>
                        <input type="text" name="name" class="form-control" id="inputNamePro"
                               placeholder="Nhập tên sách">
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Danh mục</label>
                        <select class="form-control select2" name="menu_id">
                            {!! \App\Helpers\Helper::showMenuOptionAdd($menus) !!}

                        </select>
                    </div>
                </div>
                <!-- /.col -->
            </div>


            <div class="form-group">
                <label for="">Trạng thái</label>
                <select name="active" class="form-control m-bot15">
                    <option value="1">Hoạt động</option>
                    <option value="0">Không hoạt động</option>
                </select>
            </div>


        </div>
        <!-- /.card-body -->

        {{--        start vinabook.com--------------------------------------}}
        <div class="form-group" style="display: flex;">
            <label class="label_top">vinabook.com</label>
            <hr class="hr_top"/>
        </div>
        <div class="input-group col-lg-4 m-bot15" style="margin-left: 15px">
            <input type="text" name="key_vina" class="form-control">
            <button class="btn btn-info" name="action" value="search_vinabook" type="submit"><i class="fa fa-search"></i>
            </button>
        </div>
        <div class="form-control item-bottom">
            @if(isset($search_all_vina))
                @foreach($search_all_vina as $key => $pro_s_all)
                    <div id="product_{{$pro_s_all->id}}" class="product_all">
                        <div class="product_add" style="cursor: pointer;">
                            <img src="{{$pro_s_all->thumb}}" width="20px"/>
                            <span class="text-product">{{$pro_s_all->name}}</span>
                            <del class="text-product">{{$pro_s_all->price_sale}}</del>
                            <span class="text-product">{{$pro_s_all->price}}</span>
                            <span class="text-product">vinabook.com</span>
                        </div>
                        <div id="parent">
                            <input name="vina_{{$key}}" type="hidden" value="{{$pro_s_all->id}}">
                            <i id="hide_{{$pro_s_all->id}}" style="color:red; font-size:20px" class="fa fa-times"></i>
                        </div>
                    </div>
                    <script language="javascript">
                        document.getElementById("hide_{{$pro_s_all->id}}").onclick = function () {
                            var child = document.getElementById("product_{{$pro_s_all->id}}");
                            child.parentNode.removeChild(child);
                        };
                    </script>
                @endforeach
            @endif


        </div>
        {{--        end vinabook.com--}}
        {{--        fahasha--}}
        <div class="form-group" style="display: flex;">
            <label class="label_top">salabookz.com</label>
            <hr class="hr_top"/>
        </div>
        <div class="input-group col-lg-4 m-bot15" style="margin-left: 15px">
            <input type="text" name="key_sala" class="form-control">
            <button class="btn btn-info" name="action" value="search_salabookz" type="submit"><i class="fa fa-search"></i>
            </button>
        </div>
        <div class="form-control item-bottom">

            @if(isset($search_all_sala))
                @foreach($search_all_sala as $key => $pro_s_all)
                    <div id="product_{{$pro_s_all->id}}" class="product_all">
                        <div class="product_add" style="cursor: pointer;">
                            <img src="{{$pro_s_all->thumb}}" width="20px"/>
                            <span class="text-product">{{$pro_s_all->name}}</span>
                            <del class="text-product">{{$pro_s_all->price_sale}}</del>
                            <span class="text-product">{{$pro_s_all->price}}</span>
                            <span class="text-product">salabookz.com</span>
                        </div>
                        <div id="parent">
                            <input name="sala_{{$key}}" type="hidden" value="{{$pro_s_all->id}}">
                            <i id="hide_{{$pro_s_all->id}}" style="color:red; font-size:20px" class="fa fa-times"></i>
                        </div>
                    </div>
                    <script language="javascript">
                        document.getElementById("hide_{{$pro_s_all->id}}").onclick = function () {
                            var child = document.getElementById("product_{{$pro_s_all->id}}");
                            child.parentNode.removeChild(child);
                        };
                    </script>
                @endforeach
            @endif

        </div>

        <div class="card-footer">
            <button type="submit" name="action" value="save" class="btn btn-primary">Lưu</button>
        </div>
        @csrf
    </form>

@endsection

