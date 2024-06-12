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
                                <h3 class="card-title">Комментарии</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px; ">ID</th>
                                        <th>Text</th>
                                        <th style="width: 40px"></th>
                                        <th style="width: 40px"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($comments as $comment)

                                        <tr style="background-image: url('{{ asset("storage/" . $comment->banner)}}') ">
                                            <td style="color: black;">{{$comment->id}}</td>
                                            <td>
                                                <p style="border-radius: 5px; opacity: 0.8; background: black; padding: 5px; display: -webkit-box;
                                                   -webkit-line-clamp: 7;
                                                   -webkit-box-orient: vertical;
                                                   overflow: hidden; color: white!important;">{{$comment->text}}</p>
                                            </td>
                                            <td>

                                                <a class="btn btn-dark" href="{{ route('admin.comment.accepted', $comment->id) }}">{{$comment->status == 0 ? "Активировать" : 'Деактивировать'}}</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.comment.destroy', $comment->id) }}"
                                                      method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fas fa-trash">
                                                        </i> Удалить
                                                    </button>
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
