<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <title>Edit user details</title>
    </head>
    <body>
    <!-- <?php echo validation_errors(); ?> -->
        <div class="container" style="margin-top:30px;">
        <?php foreach($user as $user){ ?>
            <form method="post">
            <div class="form-group">
                <label for="forName">Name</label>
                <input type="text" name="name" value="<?php echo $user->name ?>" class="form-control" id="forName">
                <?php  if(form_error('name')){ 
                        echo "<span style='color:red; font-size:14px;'>".form_error('name')."</span>";
                    } 
                ?>
            </div>
            <div class="form-group">
                <label for="forUsername">Username</label>
                <input type="text" name="username" value="<?php echo $user->username ?>" class="form-control" id="forUsername">
                <?php  if(form_error('username')){ 
                        echo "<span style='color:red; font-size:14px;'>".form_error('username')."</span>";
                    } 
                ?>
            </div>
            <div class="form-group">
                <label for="forEmail">Email address</label>
                <input type="email" name="email" value="<?php echo $user->email ?>" class="form-control" id="forEmail" aria-describedby="emailHelp">
                <?php  if(form_error('email')){ 
                        echo "<span style='color:red; font-size:14px;'>".form_error('email')."</span>";
                    } 
                ?>
            </div>
            <div class="form-group">
                <label for="forContact">Contact no</label>
                <input type="tel" name="contact" value="<?php echo $user->contact ?>" class="form-control" id="forContact" min="10" max="10">
                <?php  if(form_error('contact')){ 
                        echo "<span style='color:red; font-size:14px;'>".form_error('contact')."</span>";
                    } 
                ?>
            </div>
            <div class="form-group">
                <label for="forTextarea">Address</label>
                <textarea class="form-control" name="address" id="forTextarea" rows="2"><?php echo $user->address ?></textarea>
                <?php  if(form_error('address')){ 
                        echo "<span style='color:red; font-size:14px;'>".form_error('address')."</span>";
                    } 
                ?>
            </div>
            <input type="submit" class="btn btn-primary" name="update" value="Update"/>
            </form>
            <?php } ?>
        </div>
    </body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</html>