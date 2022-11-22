<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <title>Edit user details</title>
    </head>
    <body>
        <div class="container" style="margin-top:30px;" id="userData">

            <form method="post" id="updateForm">
                <input type="hidden" name="id" id="id" value="">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="" class="form-control">
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="" class="form-control">
            </div>

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" id="email" value="" class="form-control" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
                <label for="contact">Contact no</label>
                <input type="tel" name="contact" id="contact" value="" class="form-control" min="10" max="10">
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" name="address" id="address" rows="2"></textarea>
            </div>
            <input type="submit" class="btn btn-primary" name="update" id="update" value="Update"/>
            </form>
        </div>
    </body>
    <script>
     $(document).ready(function() {
            getUser();   
        });
        
        function getUser(){
            //getting user data
            $.ajax({
                type: "post",
                url: "getUserById", 
                data: {
                   id: getUrlParameter('id')
                },
                success: function(response) {
                    let data = JSON.parse(response);
                    // console.log(typeof(data));
                   console.log(data);
                    if (data["response"] == "success") {
                        $('#id').val(data["userData"]["id"]),
                        $('#name').val(data["userData"]["name"]),
                        $('#username').val(data["userData"]["username"]),
                        $('#email').val(data["userData"]["email"]),
                        $('#contact').val(data["userData"]["contact"]),
                        $('#address').val(data["userData"]["address"])
                    }
                },
                error: function(xhr){
                    console.log("error");
                }
                });
        }

        //updating user data
        $('#updateForm').submit(function(e){
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: 'update',
                data: {
                    id: $('#id').val(),
                    name: $("#name").val(),
                    username: $("#username").val(),
                    email: $("#email").val(),
                    contact: $("#contact").val(),
                    address: $("#address").val()
                },
                success: function(response){
                    let data = JSON.parse(response);
                    if(data['response'] == "error"){
                        console.log(data['message']);
                    }
                },
                error: function(response){
                    let data = JSON.parse(response);
                    if(data['response'] == "error"){
                        console.log(data['message']);
                    }
                }
            });
        });
    
    //to get the url get parameters for update id
    var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
        return false;
    };
</script>
</html>