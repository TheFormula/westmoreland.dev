<!doctype html>
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Admin Box - AngularJS theme</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,700,600,400' rel='stylesheet' type='text/css'>

        <!-- Include Jquery in the vendor folder -->
        <script src="dist/js/jquery.min.js"></script>

        <!-- Theme's own CSS file -->
        <link rel="stylesheet" href="dist/css/main.css">

    </head>
    <body data-ng-app="app" id="app" data-custom-background="" data-off-canvas-nav="" data-ng-controller="AdminAppCtrl">

        @yield('content')

        <!--Uncomment for deployment using Grunt-->
        {{ Form::token() }}
        <script type="text/javascript" src="dist/js/app.js"></script>
        <script>
            $(document).ready(function() {
                $.get("/get-projects", {

                }).done(function(data) {
                    $('#jobs-section').html(data);
                })

                $(document).on('click', '#projects', function() {
                    $.get("/get-projects", {
                        '_token' : $('[name="_token"]').val()
                    }).done(function(data) {
                        $('#jobs-section').html(data);
                    })
                });

                $(document).on('click', '#contacts', function() {
                    $.get().done()
                });

                $(document).on('click', '#aboutus', function() {
                    $.get().done()
                });

            });
        </script>

    </body>
</html>