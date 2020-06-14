@extends('layouts.admin')
@section('title', 'Craft List')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Works</h2>
        </div>
        <div class="row">
            
            <div class="col-md-8">
                <form action="{{ action('Admin\ArtController@index') }}" method="get">
                    <div class="form-group row">
                        <div class="col-md-2">
                            {{ csrf_field() }}
                        
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-art col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-black">
                        <thead>
                            <tr>
                                
                                <th width="20%">craft</th>
                                <th width="50%">contents</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $art)
                                <tr>
                                    <th>{{ $art->id }}</th>
                                    <td>{{ \Str::limit($art->title, 100) }}</td>
                                    <td>{{ \Str::limit($art->body, 250) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection