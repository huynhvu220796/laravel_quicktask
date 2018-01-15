<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ trans('messages.title_html') }}</title>
        {!! Html::style(asset('css/style.css')) !!}
        {!! Html::style(mix('/css/app.css')) !!}
        {!! Html::script(mix('/js/app.js'))  !!}
    </head>

    <body>
        <div class="container">
            <nav class="navbar navbar-default"></nav>
        </div>
        <div class="inner col-sm-8">
            @yield('content') 
        </div>
    </body>
</html>
