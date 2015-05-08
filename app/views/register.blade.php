<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Registration</title>
    </head>
    <body>
        {{ Form::open(array('url' => 'index.php/register_action')) }}

            <p>Fullname :</p>

            <p>{{ Form::text('fullname') }}</p>

            <p>Email :</p>

            <p>{{ Form::text('email') }}</p>

             <p>Username :</p>

            <p>{{ Form::text('username') }}</p>

            <p>Password :</p>

            <p>{{ Form::password('password') }}</p>

            <p>Confirm Password :</p>

            <p>{{ Form::password('cpassword') }}</p>

            <p>{{ Form::submit('Submit') }}</p>

        {{ Form::close() }}
    </body>
</html>