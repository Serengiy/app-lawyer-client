@extends('layouts.main')

@section('content')
    <!-- Modal -->
    <div class="modal fade" id="myModalApl" tabindex="-1" aria-labelledby="myModalApl" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h3 id="modalTitle"></h3>
                </div>
                <div class="modal-body text-center">
                    <div class="p-3">
                        <h5>Клиент:</h5>
                        <p id="modalClient"></p>
                    </div>
                    <div class="p-3">
                        <h5>Содержание:</h5>
                        <p id="modalContent"></p>
                    </div>
                    <div class="p-3">
                        <h5>Фото:</h5>
                            <img class="w-100" id="modalImage" src="" alt="picture">
                    </div>
                    <div class="p-3" id="dropCommentArea">
                        <h5>Коммент: </h5>
                        <p id="modalComment"></p>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
    {{--    modal end --}}

{{--    Content  --}}
    <div>
        <h3>Активные заявления</h3>
        @if($applications->count()>0)
        <table class="table mt-3">
            <thead>
            <tr>
                <th scope="col">Номер Заявки</th>
                <th scope="col">Клиент</th>
                <th scope="col">Категория</th>
                <th scope="col">Содержание</th>

            </tr>
            </thead>
            <tbody>
            @foreach($applications as $application)
                <tr id="application_{{$application->id}}">
                    <th scope="row">{{$application->id}}</th>
                    <td>{{$application->client->first_name}}</td>
                    <td>{{$application->category['title']}}</td>
                    <td><a href="#" class="openAplModal" id="{{$application->id}}">{{$application->content}}</a></td>

                    <input type="hidden" id="appId_{{$application->id}}" value="{{$application->id}}">
                    <input type="hidden" id="appName_{{$application->id}}" value="{{$application->client->first_name}}">
                    <input type="hidden" id="appContent_{{$application->id}}" value="{{$application->content}}">
                    <input type="hidden" id="appCategory_{{$application->id}}" value="{{$application->category['title']}}}}">
                    <input type="hidden" id="appImage_{{$application->id}}" value="{{asset('storage/'.$application->picture_url)}}">
                </tr>
            @endforeach
            </tbody>
        </table>
        @else
            <h2 class="text-center p-5">На данный момент нет активных заявлений</h2>
        @endif
    </div>
    <div class="mt-4">
        <h3>Отработанные заявления</h3>
        @if($complited_applications->count()>0)
            <table class="table mt-3">
                <thead>
                <tr>
                    <th scope="col">Номер Заявки</th>
                    <th scope="col">Клиент</th>
                    <th scope="col">Категория</th>
                    <th scope="col">Содержание</th>

                </tr>
                </thead>
                <tbody>
                @foreach($complited_applications as $application)
                    <tr id="application_{{$application->id}}">
                        <th scope="row">{{$application->id}}</th>
                        <td>{{$application->client->first_name}}</td>
                        <td><a href="#" class="openAplModal" id="{{$application->id}}">{{$application->content}}</a></td>
                        <td>{{$application->category['title']}}</td>

                        <input type="hidden" id="appId_{{$application->id}}" value="{{$application->id}}">
                        <input type="hidden" id="appName_{{$application->id}}" value="{{$application->client->first_name}}">
                        <input type="hidden" id="appContent_{{$application->id}}" value="{{$application->content}}">
                        <input type="hidden" id="appComment_{{$application->id}}" value="{{$application->comment}}">
                        <input type="hidden" id="appCategory_{{$application->id}}" value="{{$application->category['title']}}}}">
                        <input type="hidden" id="appImage_{{$application->id}}" value="{{asset('storage/'.$application->picture_url)}}">
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <h2 class="text-center p-5">На данный момент нет завершенных заявлений</h2>
        @endif
    </div>

@endsection
