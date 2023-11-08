<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forget Password</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <div class=" container mt-5 ">
    <div class="col-8 offset-2">
      <div class="card border-light mb-3">
        <div class=" card-header">
          <h4>Forget Password</h4>
        </div>
        <form action="send_link.php" method="post">
          <div class="card-body">
            <div class="">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
          </div>
          <div class="card-footer bg-transparent border-secondary">
            <div>
              <a href="login.php" class="btn text-primary">Login</a>
            </div>
            <div class="col-1 offset-11 mt-2 mb-2">
              <button type="submit" class="btn btn-primary" name="btnSend">Send</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>