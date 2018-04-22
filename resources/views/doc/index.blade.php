@extends('admin.app')

@section('html-header-title')
    {{ trans('message.editor') }}
@endsection

@section('content-header-title')
    資料画面
@endsection

@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">編集</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="documentTile">タイトル</label>
                            <input type="text" class="form-control" id="documentTile" placeholder="pro">
                        </div>
                        <div class="form-group">
                            <label for="documentBody">本文</label>
                            <textarea class="form-control" id="documentBody"></textarea>
                        </div>
                        <button type="submit" class="btn btn-default">保存</button>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('documentBody');
    </script>
@endsection
