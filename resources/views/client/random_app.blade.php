@extends('layouts.main')
@section('content')
    <div>
        <h1 class="text-center">Рандомная заявка от каждого клиента в любом статусе</h1>
    </div>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Номер Заявки</th>
                <th scope="col">Имя</th>
                <th scope="col">Категория</th>
                <th scope="col">Статус</th>
            </tr>
            </thead>
            <tbody>
            @foreach($applications as $application)
                <tr>
                    <th scope="row">{{$application->id}}</th>
                    <td>{{$application->client->first_name}}</td>
                    <td>{{$application->category['title']}}</td>
                    <td>{{$application->statusName()}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
