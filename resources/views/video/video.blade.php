<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-2"></div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h1>
                            List of Videos under {{$genre->name}}
                            <a href="/genre/{{$genre->id}}/videos/create"><button class="btn btn-success" type="submit">Add video</button></a>

                        </h1>
                    </div>
                    @if(count($videos))

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Active</th>
                                    <th>Link</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($videos as $video)
                                <tr>
                                    <td>{{ $video->name }}</td>
                                    <td>{{ $video->description }}</td>
                                    <td>{{ $video->active }}</td>
                                    <td><a href="{{ $video->link }}">{{ $video->link }}</a></td>
                                    <td>
                                        <form action="/videos/{{$video->id}}/edit">
                                            <button type="submit" class="m-2"> Edit </button>
                                        </form>

                                        <form action="/videos/{{$video->id}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @endif

                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</body>
</html>
