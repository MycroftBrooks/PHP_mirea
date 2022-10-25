<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Цены</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Переключатель навигации">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="index.html">Главная</a>
            </li>
              <li class="nav-item">
                <a class="nav-link" href="afisha.php">Афиша</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="price.php">Цены</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html">Информация</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
<h1 class="text-center">Цены на билеты в кино:</h1>
<table class="table">
    <tr>
        <th scope="col">Название фильма:</th>
        <th scope="col">Цена:</th>
    </tr>
<?php
$mysqli = new mysqli("my-sql", "user", "password", "appDB");
$result = $mysqli->query("SELECT film, price FROM afisha");
foreach ($result as $row){
    echo "<tr><td>{$row['film']}</td><td>{$row['price']}</td></tr>";
}
?>
</table>
</body>
</html>