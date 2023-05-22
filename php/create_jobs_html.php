<?php
    require './hr_navbar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create Job</title>
    <style>
        .btn {
            padding-right: 500px;
            padding-left: 500px;
        }
    </style>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body style="text-align: center">
    <!-- div for nav bar if needed -->
    <div>
        <h1 style="text-align: center">
            <b><i>Job Details</i></b>
        </h1>
    </div>
    <br /><br />
    <!-- Div for the rest of code  -->
    <div>
        <form style="padding-left: 500px" action="./hr_create_job_database.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Job Title</label>
                    <input required="" type="text" class="form-control" name="title" placeholder="eg: Developer" />
                </div>
                <div class="form-group col-md-6">
                    <label>Location </label>
                    <input  required=""type="text" class="form-control" name="location" placeholder="eg: Toronto, Ontario" />
                </div>
            </div>
            <div class="form-group col-md-6">
                <label>Salary</label>
                <input required="" type="text" class="form-control" name="salary" placeholder="eg: 40,000 CAD" />
            </div>
            <div class="form-group col-md-6">
                <label>Description </label>
                <input required="" type="text" class="form-control" name="description" placeholder="eg: As a Developer ...." />
            </div>
            <div class="form-group col-md-6">
                <label>Available Positons </label>
                <input required="" type="text" class="form-control" name="available_positions" placeholder="eg: 2" />
            </div>

            <br />
            <button type="submit" id="btn1" id="btn" class="btn btn-primary">Create</button>
            <br /><br />
            <!-- <button type="submit" id="btn2" id="btn" class="btn btn-secondary">
                <a href="hr_login.php" style="color: white;"> Go Back</a>
            </button> -->
        </form>
    </div>
</body>

</html>