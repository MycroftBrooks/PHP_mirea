<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Coffee House | Вакансии</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <style>
        body{
            background: #f7f0f0
        }
    </style>
</head>

<body>
<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            <span class="fs-4">Coffee</span>
        </a>

        <ul class="nav nav-pills">
            <li class="nav-item"><a href="index.html" class="nav-link active" aria-current="page">Главная</a></li>
            <li class="nav-item"><a href="menu.php" class="nav-link">Меню</a></li>
            <li class="nav-item"><a href="vacancy.php" class="nav-link">Вакансии</a></li>
            <li class="nav-item"><a href="about.html" class="nav-link">О нас</a></li>
            <li class="nav-item"><a href="/admin/admin.php" class="nav-link">Админка</a></li>
        </ul>
    </header>
</div>
  <div class="container">
    <div class="row">
      <?php
      $mysqli = new mysqli("db", "mysql", "123456", "app_db");
      $result = $mysqli->query("SELECT * FROM vacancy");
      foreach ($result as $row) {
        echo "
          <div class='col'>
            <div class='card' style='width: 18rem;'>
              <div class='card-body'>
                <h5 class='card-title'>{$row["name"]}</h5>
                <h6 class='card-subtitle mb-2 text-muted'>{$row['salary']}</h6>
              </div>
            </div>
          </div>
          ";
      }
      ?>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>