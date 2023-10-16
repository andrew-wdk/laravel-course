<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Secret Santa</title>


         <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <style>

        </style>
    </head>
    <body>
        <div class="m-auto d-flex justify-content-center">
            <img class="w-25" src="<?php echo url('images\secret-santa.jpg') ?>" alt="santa logo">
        </div>
        <div class="d-flex justify-content-center">
            <div class="w-100">
                <div class="w-25 m-auto">
                    <input type="text" id="name" name="my_name" class="form-control" placeholder="Enter your name here">
                </div>
                <br>
                <div class="w-25 m-auto">
                    <button type="button" class="m-auto btn btn-primary" id="submit"> Send </button>
                </div>
            </div>
        </div>

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
    </body>
</html>