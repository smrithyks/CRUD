<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insurance Policy Details Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 600px;
            margin-top: 50px;
            padding: 30px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        h3 {
            text-align: center;
            margin-bottom: 30px;
            background-color: #50C878;
        }

        .form-label {
            font-weight: 500;
        }

        button {
            width: 100%;
        }
    </style>
</head>
<body>

    <div class="container">
        <h3>Insurance Policy Details Form</h3>
        <form action="<?php echo site_url('dashboard/add_policies'); ?>" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="shortname" class="form-label">Short Name:</label>
                <input type="text" class="form-control" id="shortname" name="shortname" readonly>
            </div>

            <button type="button" class="btn btn-primary" onclick="generateShortName()">Generate Short Name</button>


            <div class="mb-3">
                <label for="policy_no" class="form-label">Policy Number:</label>
                <input type="text" class="form-control" id="policy_no" name="policy_no" required>
            </div>

            <div class="mb-3">
                <label for="pin_tm" class="form-label">PIN/TM:</label>
                <input type="text" class="form-control" id="pin_tm" name="pin_tm" required>
            </div>

            <div class="mb-3">
                <label for="due_date" class="form-label">Due Date:</label>
                <input type="date" class="form-control" id="due_date" name="due_date" required>
            </div>

            <div class="mb-3">
                <label for="risk_date" class="form-label">Risk Date:</label>
                <input type="date" class="form-control" id="risk_date" name="risk_date" required>
            </div>

            <div class="mb-3">
                <label for="cbo" class="form-label">CBO:</label>
                <input type="text" class="form-control" id="cbo" name="cbo" required>
            </div>

            <div class="mb-3">
                <label for="adjust_date" class="form-label">Adjust Date:</label>
                <input type="date" class="form-control" id="adjust_date" name="adjust_date" required>
            </div>

            <div class="mb-3">
                <label for="premium_amount" class="form-label">Premium Amount:</label>
                <input type="number" class="form-control" id="premium_amount" name="premium_amount" step="0.01" required>
            </div>

            <div class="mb-3">
                <label for="commission" class="form-label">Commission:</label>
                <input type="number" class="form-control" id="commission" name="commission" step="0.01" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script>
        function generateShortName() {
            var fullName = document.getElementById('name').value;
            var nameParts = fullName.split(" ");
            var shortName = nameParts[0];
            for (var i = 1; i < nameParts.length; i++) {
                var initial = nameParts[i].charAt(0).toUpperCase(); 
                shortName += " " + initial + "."; 
            }

            document.getElementById('shortname').value = shortName;
        }
    </script>

    </body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-a"></script>
