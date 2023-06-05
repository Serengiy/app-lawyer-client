@extends('layouts.main')

@section('content')
    {{--    Alert--}}
    <div class="alert alert-success" style="display: none" role="alert" id="changeSuccess">

    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h3>Изменение статуса заявления</h3>
                </div>
                <div class="modal-body text-center">
                        <textarea name="comment" id="comment" rows="5" class="form-control" placeholder="Комментарий"></textarea>
                </div>

                <div class="modal-footer text-center">
                    <p class="text-danger">*После подтверждения звявление будет перенесно в список завершенных</p>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <button id="confirmStatusChange" type="button" class="btn btn-primary">Подтвердить завершение</button>
                </div>

            </div>
        </div>
    </div>
{{--    Modal end --}}

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Номер Заявки</th>
            <th scope="col">Содержание</th>
            <th scope="col">Категория</th>
            <th scope="col">Статус</th>
            <th scope="col">Изменить статус</th>

        </tr>
        </thead>
        <tbody>
        @foreach($applications as $application)
                <tr>
                    <th scope="row">{{$application->id}}</th>
                    <td>{{$application->content}}</td>
                    <td>{{$application->category['title']}}</td>
                    <td id="status_{{$application->id}}">{{$application->statusName()}}</td>
                    @if($application->status != 2)
                        <td>
                            <button id="{{$application->id}}" type="button" class="btn btn-primary openModal">
                                Проблема решена
                            </button>
                        </td>
                    @endif
                </tr>
        @endforeach
        </tbody>
    </table>
@endsection
