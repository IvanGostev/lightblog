@extends('admin.layouts.main')
@section('content')


    <div class="content-wrapper" style="min-height: 1345.6px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Редактирование поста</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.post.update', $post->id) }}" enctype="multipart/form-data" method="post">
                                @csrf
                                @method('patch')
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Название</label>
                                                <input type="text" name="title" class="form-control"
                                                       placeholder="Enter ..." value="{{$post->title}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- textarea -->
                                            <div class="form-group">
                                                <!-- <label for="customFile">Custom File</label> -->
                                                <div style="height: 100px">
                                                    <img id="blah" alt="your image" width="100" height="100" src="{{ asset('storage/' . $post->img) }}">
                                                </div>

                                                <br>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile"
                                                           name="img"
                                                           onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">

                                                    <label class="custom-file-label" for="customFile">Выбрать фотографию</label>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- textarea -->
                                            <div class="form-group">
                                                <label>Текст</label>
                                                <textarea id="summernote2" required="" class="form-control" rows="15"
                                                          name="text">{{$post->text}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <link rel="stylesheet"
                                          href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">
                                    <script
                                        src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>

                                    <div class="row">

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Теги</label>
                                                <select name="tags[]" id="m-s1" multiple>
                                                    @foreach($tags as $tag)
                                                        <option {{in_array($tag->id, $oldTags, true) ? 'selected' : ''}} value="{{$tag->id}}">{{$tag->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Изменить</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->


                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->

                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <script>
        new MultiSelectTag('m-s1')

    </script>
    <style>
        .mult-select-tag ul li {
            padding: 0.5rem;
            border-radius: 0.25rem;
            cursor: pointer;
            color: black !important;
        }
    </style>
@endsection
