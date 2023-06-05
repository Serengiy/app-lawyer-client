
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
