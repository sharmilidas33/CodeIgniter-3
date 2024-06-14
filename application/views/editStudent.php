<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
</head>
<body>
    <h1>Edit Student</h1>
    <?php if ($this->session->flashdata('message')) {
        echo $this->session->flashdata('message');
    }
    ?>
    <?php echo form_open('crud/updateStudent'); 
    echo form_hidden('id', $studentRecord[0]['id']);
    ?>
    <p>
        <?php
            echo form_label('Full Name:', 'fullname');
            echo form_input(array(
                'name' => 'fullname',
                'id' => 'fullname',
                'class' => 'form-control',
                'value' => $studentRecord[0]['fullname']
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
                'value' => $studentRecord[0]['age']
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
                'value' => $studentRecord[0]['email']
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
                'value' => $studentRecord[0]['password']
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
                'value' => date('Y-m-d\TH:i', strtotime($studentRecord[0]['date']))
            ));
        ?>
    </p>

    <p>
        <?php
            echo form_submit(array(
                'name' => 'submit',
                'value' => 'Update',
                'class' => 'btn btn-primary'
            ));
        ?>
    </p>

    <?php echo form_close(); ?>
</body>
</html>
