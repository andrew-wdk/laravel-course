<!DOCTYPE html>
<html> 
    <head>
        <title>ava rewase scout</title>
        <meta charset="utf-8">
        <meta name="description" content="Free Web tutorials">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet", type="text/css"  href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div id="class" class="heading">
            <h1>ava rewase scout</h1>
            <h2>Log in page</h2>
            
        </div>
        <div id="forms" class="content">
            <form method="post" action="https://avarewasescout.com/login" enctype="multipart/form-data"> 
                <label for="email">Email:</label>
                <input id="email" type="email"name ="email" required>
                <label for="password">Password:</label>
                <input id="password" type="password"name = "password" required>
                <button type="submit"> sign in </button> 
                <!-- another method for the button -->
                <!-- <input type="submit" value="Sign in" style="background-color: green; color: white;"> -->
            </form>
            <p>Don't have an account? 
                  <!-to create registeration page-  -->
                <a href="not working yet">Sign up here</a>.
            </p>
        </div>
        <!-- how to get an event listener  -->
        <!-- <script>
             <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            document.getElementById('submit').addEventListener('click', function (e) {
                let name = document.getElementById('name').value;
                let token = "{{csrf_token()}}";
                $.ajax({
                    url: "{{ url('secret-santa') }}",
                    method: 'POST',
                    data: {name: name, _token: token },
                    success: function(data) {
                        window.alert(data);
                    },
                })
            });
        </script>
        </script> -->
    </body>

</html>
