<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h2 {
            background-color: #50C878;
            color: #FFFFFF;
            padding: 15px;
            text-align: center;
        }

        a {
            text-decoration: none;
            color: #007BFF;
            padding: 10px;
        }

        a:hover {
            color: #0056b3;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            display: inline;
            margin-right: 20px;
        }

        ul li a {
            padding: 8px 16px;
            background-color: #28a745;
            color: white;
            border-radius: 5px;
        }

        ul li a:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h2>Welcome, <?php echo $this->session->userdata('username'); ?></h2> 
    <a href="<?php echo site_url('auth/logout'); ?>" style="float: right;">Logout</a>   
    <br>

    <ul>
        <li><a href="<?php echo site_url('dashboard/add_data'); ?>">Add Data</a></li>
        <li><a href="<?php echo site_url('dashboard/edit_data'); ?>">Edit Data</a></li>
        <li><a href="<?php echo site_url('dashboard/upload_file'); ?>">Upload File</a></li>
    </ul>
</body>
</html>
