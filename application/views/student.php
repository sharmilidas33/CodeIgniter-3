<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Student</title>
</head>
<body>
    <h1>CRUD Student</h1>
    <?php if ($this->session->flashdata('message')) {
        echo $this->session->flashdata('message');
    }
    ?>
    <?php echo form_open('crud/newUser'); ?>
    
    <p>
        <?php
            echo form_label('Full Name:', 'fullname');
            echo form_input(array(
                'name' => 'fullname',
                'id' => 'fullname',
                'class' => 'form-control',
                'value' => set_value('fullname')
            ));
        ?>
    </p>

    <p>
        <?php
            echo form_label('Age:', 'age');
            echo form_input(array(
                'name' => 'age',
                'id' => 'age',
                'type' => 'number',
                'class' => 'form-control',
                'value' => set_value('age')
            ));
        ?>
    </p>

    <p>
        <?php
            echo form_label('Email:', 'email');
            echo form_input(array(
                'name' => 'email',
                'id' => 'email',
                'type' => 'email',
                'class' => 'form-control',
                'value' => set_value('email')
            ));
        ?>
    </p>

    <p>
        <?php
            echo form_label('Password:', 'password');
            echo form_password(array(
                'name' => 'password',
                'id' => 'password',
                'class' => 'form-control',
                'value' => set_value('password')
            ));
        ?>
    </p>

    <p>
        <?php
            echo form_label('Date:', 'date');
            echo form_input(array(
                'name' => 'date',
                'id' => 'date',
                'type' => 'datetime-local',
                'class' => 'form-control',
                'value' => set_value('date')
            ));
        ?>
    </p>

    <p>
        <?php
            echo form_submit(array(
                'name' => 'submit',
                'value' => 'Create User',
                'class' => 'btn btn-primary'
            ));
        ?>
    </p>

    <?php echo form_close(); ?>
</body>
</html>
