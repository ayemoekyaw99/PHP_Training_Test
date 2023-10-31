<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Age Calculator</title>
<link rel="stylesheet" href="./css/reset.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<?php
    date_default_timezone_set('Asia/Yangon');
    if (isset($_POST['calculate'])) {
            $birthdate = $_POST['birthdate'];
            $currentDate = date_create('today');
            $birthdate=date_create($birthdate);
            $age=date_diff($currentDate,$birthdate);
    }    
?>    

<div class="container mt-5">
        <div class="col-4 offset-4">
        <?php if (isset($age)) : ?>
                <div class="alert alert-primary" role="alert">
                <h5>your age is <?php echo $age->y ?> years,<?php echo $age->m ?> months and <?php echo $age->d ?> days</h5>
                </div>
            <?php endif ?>
        <div class="card">
            <div class="card-header"><h1>Age Calculator</h1></div>
            <div class="card-body">
                <form action="" method="post">
                    <label for="birthdate">Date of birth:</label>
                        <input type="date" id="birthdate" name="birthdate"  value="{{ old('birthdate'))}}" required>
                        <input type="submit" value="Calculate" class="btn btn-primary d-block col-12 mt-2" name="calculate">
                </form>
            </div>
        </div>
        </div>
</div>
</body>
</html>