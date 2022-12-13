<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Coffee House | Редактирование</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Coffe House</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupporteddContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="menu.php">Меню</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="vacancy.php">Вакансии</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">О нас</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/admin/admin.php">Админка</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
    if (isset($_GET['type']) && isset($_GET['id'])) {
        $type = $_GET['type'];
        $id = $_GET['id'];
        $mysqli = new mysqli("db", "mysql", "123456", "app_db");
        $result = $mysqli->query("SELECT * FROM $type WHERE id = $id");
        $result = $result->fetch_assoc();
        switch ($type) {
            case 'product':
                echo "
                    <div class='d-flex flex-column min-vh-100 justify-content-center align-items-center'>
                        <form action='/admin/crud/update.php' method='GET'>
                            <div class='mb-3'>
                                <label for='name' class='form-label'>Product name</label>
                                <input name='name' type='text' class='form-control' id='name' placeholder='Capuccino' value={$result['name']}>
                            </div>
                            <div class='mb-3'>
                                <label for='price' class='form-label'>Product price</label>
                                <input name='price' type='number' class='form-control' id='price' placeholder='119' value={$result['price']}>
                            </div>
                            <input type='hidden' name='id' value='$id'>
                            <input type='hidden' name='type' value='$type'>
                            <button type='submit' class='btn btn-primary'>Change</button>
                        </form>
                    </div>
                ";
                break;
            case 'vacancy':
                echo "
                        <div class='d-flex flex-column min-vh-100 justify-content-center align-items-center'>
                            <form action='/admin/crud/update.php' method='GET'>
                                <div class='mb-3'>
                                    <label for='name' class='form-label'>Vacancy name</label>
                                    <input name='name' type='text' class='form-control' id='name' placeholder='Capuccino' value={$result['name']}>
                                </div>
                                <div class='mb-3'>
                                    <label for='salary' class='form-label'>Vacancy salary</label>
                                    <input name='salary' type='number' class='form-control' id='price' placeholder='20000' value={$result['salary']}>
                                </div>
                                <input type='hidden' name='id' value='$id'>
                                <input type='hidden' name='type' value='$type'>
                                <button type='submit' class='btn btn-primary'>Change</button>
                            </form>
                        </div>
                    ";
                break;
        }
    } else {
        echo "Bad request";
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>