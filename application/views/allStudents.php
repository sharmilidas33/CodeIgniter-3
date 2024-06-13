<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Students</title>
</head>
<body>
<?php if ($this->session->flashdata('message')) {
        echo $this->session->flashdata('message');
    }
    ?>
    <table border="1">
    <?php if($allStudents->num_rows()>0) :
        foreach($allStudents->result() as $student):
        ?>
        <tr>
            <td>
                <?php echo $student->id?>
            </td>
            <td>
                <?php echo $student->fullname?>
            </td>
            <td>
                <?php echo $student->age?>
            </td>
            <td>
                <?php echo $student->email?>
            </td>
            <td>
                <?php echo $student->password?>
            </td>
            <td>
                <?php echo $student->date?>
            </td>
            <td>
                <a href="<?= site_url(uri: 'crud/editStudent/'.$student->id)?>">Edit</a>
            </td>
            <td>
            <a href="<?= site_url(uri: 'crud/deleteStudent')?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
       <?php else: ?> 
        Student's doesn't exist.
        <?php endif;?>
       </table>
</body>
</html>
