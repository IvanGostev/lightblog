@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper" style="min-height: 1302.4px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('admin.tag.create') }}" class="btn btn-block btn-light">Add</a>
                                <br>
                                <h3 class="card-title">Теги</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">ID</th>
{{--                                        <th style="width: 10px">IMG</th>--}}
                                        <th style="width: 40px">Название</th>
                                        <th style="width: 40px"></th>
                                        <th style="width: 40px"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tags as $tag)
                                        <tr>
                                            <td style="color: black">{{$tag->id}}</td>
{{--                                            <td>{{$tag->img}}</td>--}}
                                            <td>{{$tag->title}}</td>

                                               <td> <a class="btn btn-info btn-sm" href="{{route('admin.tag.edit', $tag->id)}}">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Редактировать
                                                </a>
                                            </td>

                                            <td>
                                                <form action="{{ route('admin.tag.destroy', $tag->id) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm"> <i class="fas fa-trash">
                                                        </i> Удалить</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->

                        </div>
                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
