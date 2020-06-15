<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  

    <title>{{ config('app.name', '') }}</title>

</head>
<body>
<div class="container">


    <a href="https://github.com/kawax/google-sheets-project">GitHub</a>

    <h1>Google Sheets for Laravel Demo</h1>

    {{--    <a href="{{ route('login') }}" class="btn btn-primary">Login with Google</a>--}}


    <div class="row">
        <div class="col-sm">
            <form action="{{ url('/post') }}" method="post">
                
                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" type="text" class="form-control" id="name" required>
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <input name="message" type="text" class="form-control" id="message" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <div class="col-sm">
            <div class="list-group mt-3">
                @foreach($personalData as $post)
                    <div class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ data_get($post, 'firstName') }}</h5>
                        </div>
                        <p class="mb-1">
                            {{ data_get($post, 'message') }}
                        </p>
                        <small>
                            {{ data_get($post, 'created_at') }} {{ config('app.timezone') }}
                        </small>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


</body>
</html>
