<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <title>View user</title>
    </head>
    <body>
        <div class="container" style="margin-top:30px;">
        <?php 
            if($user == null){
                echo "<div style='text-align:center; margin-top:50px;'>No user data available.</div>";
                exit;
            }
        ?>
            <table class="table table-dark">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($user as $row){
                    ?>
                        <tr>
                            <th scope="row"><?php echo $row->id ?></th>
                            <td><?php echo $row->name ?></td>
                            <td><?php echo $row->username ?></td>
                            <td><?php echo $row->email ?></td>
                            <td><?php echo $row->contact ?></td>
                            <td><?php echo $row->address ?></td>
                            <td><button type="button" class="btn btn-danger" onclick="delete_user(<?php echo $row->id ?>)">Delete</button></a></td>
                            <td><a href='update?id="<?php echo $row->id ?>"'><button type="button" class="btn btn-warning">Edit</button></a></td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script>
    function delete_user(id){
        console.log(id);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "delete?id=" + id, true);
        xmlhttp.setRequestHeader(
          "Content-Type",
          "application/x-www-form-urlencoded"
        );
        xmlhttp.send();
        xmlhttp.onreadystatechange = function () {
          if (this.readyState == 4 && this.status == 200) {
            window.location.reload();
          }
        };
    }
</script>
</html>