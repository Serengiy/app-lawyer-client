@extends('layouts.main')
@section('content')
        <div>
            <div class="justify-content-center mt-4" style="display: none" id="applicationAccepted">
                <div class="alert alert-success p-4 d-flex align-items-center justify-content-center" style="height: 300px" role="alert">
                    <h3 class="">Ваша заявка добавлена в очередь!</h3>
                </div>
            </div>
            <div class="tab-pane pt-5" id="newApplicationDiv">
                <div class="text-center pb-3">
                    <h1>Новая заявка</h1>
                </div>
                <form id="applicationForm" action='#' method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="text-center">
                            <h3>Описание</h3>
                        </div>
{{--                      ПОЛУЧЕНИЕ АЙДИ ЮЗЕРА       --}}
                        <input type="hidden" id="client_id" name="client_id" value="{{auth()->user()->id}}">
{{--                        --}}
                        <div class="">
                            <textarea rows="5" class="form-control" id="content" required name="content"></textarea>

                            @error('content')
                            <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="text-center">
                            <h3>Фотография</h3>
                        </div>
                        <div class="">
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image"   autofocus>
                            <div class="card text-center" id="uploadImage" style="display: none">
                                <div class="card-body">
                                    <div id="image_demo" style="width: 300px;"></div>
                                </div>
                                <div class="card-footer">
                                    <button id="btn-image-crop" type="button" class="crop_image btn border-primary">Crop</button>
                                </div>
                            </div>

                            <div class="card" id="crop_result" style="display: none">
                                <div class="card-body">
                                    <div style="width: 300px;">
                                        <img src="" alt="" id="crop_result_img">
                                    </div>
                                </div>
                            </div>

                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                            @enderror
                        </div>
                    </div>
                        <div class="row mb-3">
                            <div class="text-center">
                                <h3>Категория</h3>
                            </div>
                        <select class="form-select" id="category_id" name="category_id" aria-label="Default select example" required>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                            @error('category')
                            <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                            @enderror
                    </div>


                    <div class="row mb-0">
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" >
                                {{ __('Создать заявку') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection
