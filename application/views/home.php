<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeIgniter 3</title>
</head>
<body>
    <h1>Welcome in URL helper!</h1>
    <!-- <a href="<?php /*echo site_url('Home/anotherMethod');*/ ?>">Go to the Home's another method</a> -->
    
    <?php 
        // echo form_open('home/login', ['class' => 'myform']); 
        // $arr= array('name' => 'myname', 'value' => 'name', 'class' => 'one');
        // echo form_input($arr);

        // $options= array('choose'=>'one','two'=>'three');
        // echo form_dropdown('mydropdown', $options, 'choose', ['class' => 'myclass']);

        // echo form_textarea(['name' => 'myTextArea', 'placeholder' => 'write here', 'rows' => 11, 'cols' => 10]);

        // echo form_submit(data:'mysubmit', value: 'My First Form');
        // echo form_close(); 
    ?>

    <?php // echo validation_errors(); ?>
    <?php
        //echo form_open_multipart(
          //  action: 'home/user'
        //);
    ?>
    <!-- <input type="text" name="name" placeholder="Enter your name">
    <input type="text" name="email" placeholder="Enter your email">
    <input type="password" name="password" placeholder="Enter your password">
    <input type="password" name="confirm_password" placeholder="Confirm your password">
    <button type="submit" name="submit">Submit</button> -->

    <?php
        //echo form_close();

    ?>

    <!-- <?php // if (isset($allUser) && !empty($allUser)): ?>
        <table>
            <?php // foreach($allUser->result() as $user): ?>
                <tr>
                    <td>//<?php echo $user->id; ?></td>
                    <td>//<?php echo $user->fullname; ?></td>
                    <td>//<?php echo $user->age; ?></td>
                    <td>//<?php echo $user->email; ?></td>
                    <td>//<?php echo $user->password; ?></td>
                    <td>//<?php echo $user->date; ?></td> -->
                <!-- </tr> -->
            <!-- <?php // endforeach; ?>
        </table> -->
    <?php //else: ?>
        <!-- <p>No users found.</p> -->
    <?php //endif; ?> 


</body>
</html>