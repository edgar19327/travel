@extends('layouts.adminMenu')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">State</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($name as $sate)
                            <tr>
                                <th scope="row">{{$sate->state->id}}</th>
                                <td>{{$sate->name}}</td>
                                <td class="text-center">
                                    <a href="#" class="view"><i class="far fa-eye"></i></a>
                                    <a href="#" class="edit"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="#" class="delate"><i class="far fa-trash-alt"></i></a>

                                </td>




                            </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection