@extends('layouts.main')

@section('content')
    {{--    Alert--}}
    <div class="alert alert-success" style="display: none" role="alert" id="changeSuccess">
    </div>
{{--    End alert  --}}
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h3>Принять в звявление</h3>
                    <p class="text-danger">*После подтверждения звявление будет перенесно раздел "Мои заявления"</p>
                </div>
                <div class="modal-body text-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <button id="confirmApplication" type="button" class="btn btn-primary">Принять</button>
                </div>
            </div>
        </div>
    </div>
{{--    modal end --}}

    <!-- Application Modal -->
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
                        <h5>Телефон:</h5>
                        <p id="modalClientPhone"></p>
                    </div>
                    <div class="p-3">
                        <h5>Содержание:</h5>
                        <p id="modalContent"></p>
                    </div>
                    <div class="p-3">
                        <h5>Фото:</h5>
                        <img class="w-100" id="modalImage" src="" alt="picture">
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
    {{--    modal end --}}
<div>
{{--    ФИЛЬТРЫ       --}}
    <div class="row">
        <h4 class="col-3">Фильтр</h4>
        <div class="col-3 filter-btns" style="display: none">
            <button class="btn btn-warning"  id="cleanFilter">Очистить фильтр</button>
        </div>
        <div class="col-3 filter-btns" style="display: none">
            <button class="btn btn-primary" type="submit" id="confirmFilter">Применить фильтр</button>
        </div>
    </div>
        <form action="" id="filterForm">
        <nav class="row mt-4 p-2 rounded" style="background: lightgray" id="filterBar">
            <div class="col-3">
                <p>Категория:</p>
                <select class="form-select col-3" aria-label="Default select example" id="categoryIdInput" name="category_id">
                    <option selected disabled>Выберете категорию</option>
                @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
            </div>
            <div class="col-3">
                <p>С конкретной даты:</p>
                <input class="form-control" type="date" id="dateFromInput" name="date_from">
            </div>
            <div class="col-3">
                <p>По конкретную дату:</p>
                <input class="form-control" type="date" id="dateToInput" name="date_to">
            </div>
            <div class="col-3">
                <p>Содержание:</p>
                <input class="form-control" type="text" id="emailInput" name="content">
            </div>
        </nav>
        </form>
</div>

{{--Спрятанный инпут для получения айди юриста--}}
    <input type="hidden" value="{{auth()->user()->id}}" id="lawyer_id">
{{--    Список доступных заявлений--}}
    <div id="applicationTable">
        <div class="mt-3">
            <h1>Все новые заявления</h1>
            <div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Категория</th>
                        <th scope="col">Содержание</th>
                        <th scope="col">Принять в обработку</th>
                        <th scope="col">Дата публикации</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($applications as $application)
                        <tr id="application_{{$application->id}}">
                            <td>{{$application->category->title}}</td>
                            <td><a href="#" class="openAplModal" id="{{$application->id}}">{{$application->content}}</a></td>
                            <td><a id="{{$application->id}}" href="#" class="openModal" >Принять в обработку</a></td>
                            <td>{{$application->created_at->format('d-m-y')}}</td>

                            <input type="hidden" id="appId_{{$application->id}}" value="{{$application->id}}">
                            <input type="hidden" id="appName_{{$application->id}}" value="{{$application->client->first_name}}">
                            <input type="hidden" id="appContent_{{$application->id}}" value="{{$application->content}}">
                            <input type="hidden" id="appPhone_{{$application->id}}" value="{{$application->client->phone}}">
                            <input type="hidden" id="appCategory_{{$application->id}}" value="{{$application->category['title']}}}}">
                            <input type="hidden" id="appImage_{{$application->id}}" value="{{asset('storage/'.$application->picture_url)}}">
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
