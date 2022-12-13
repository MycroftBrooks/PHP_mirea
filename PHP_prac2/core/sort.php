<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quick Sort</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php
    function quick_sort($array)
    {
        if (count($array) < 2) {
            return $array;
        }
        $target = $array[0];
        $less = array();
        $equal = array($target);
        $greater = array();
        for ($i = 1; $i < count($array); $i++) {
            $elem = $array[$i];
            if ($elem > $target) {
                $greater[] = $elem;
            } elseif ($elem < $target) {
                $less[] = $elem;
            } else {
                $equal[] = $elem;
            }
        }
        $less = quick_sort($less);
        $greater = quick_sort($greater);
        return array_merge($less, $equal, $greater);
    }

    function print_array($array): void
    {
        echo "<pre>[";
        echo implode(", ", $array);
        echo "]</pre>";
    }

    if (isset($_GET['array'])) {
        $array = explode(",", $_GET["array"]);
        echo "<p>Original array:</p>";
        print_array($array);
        $array = quick_sort($array);
        echo "<p>Sorted array:</p>";
        print_array($array);
    } 
    else {
        echo "
        <div class='d-flex flex-column min-vh-100 justify-content-center align-items-center'>
            <form action='/sort.php' method='GET'>
                <div class='mb-3'>
                    <label for='arrayInput' class='form-label'>Array</label>
                    <input name='array' type='text' class='form-control' id='arrayInput' aria-describedby='arrayHelp'>
                    <div id='arrayHelp' class='form-text'>Input array</div>
                </div>
                <button type='submit' class='btn btn-primary'>Sort array</button>
            </form>
        </div>
        ";
    }
    ?>
</body>
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quick Sort</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php
    function quick_sort($array)
    {
        if (count($array) < 2) {
            return $array;
        }
        $target = $array[0];
        $less = array();
        $equal = array($target);
        $greater = array();
        for ($i = 1; $i < count($array); $i++) {
            $elem = $array[$i];
            if ($elem > $target) {
                $greater[] = $elem;
            } elseif ($elem < $target) {
                $less[] = $elem;
            } else {
                $equal[] = $elem;
            }
        }
        $less = quick_sort($less);
        $greater = quick_sort($greater);
        return array_merge($less, $equal, $greater);
    }

    function print_array($array): void
    {
        echo "<pre>[";
        echo implode(", ", $array);
        echo "]</pre>";
    }

    if (isset($_GET['array'])) {
        $array = explode(",", $_GET["array"]);
        echo "<p>Original array:</p>";
        print_array($array);
        $array = quick_sort($array);
        echo "<p>Sorted array:</p>";
        print_array($array);
    } 
    else {
        echo "
        <div class='d-flex flex-column min-vh-100 justify-content-center align-items-center'>
            <form action='/sort.php' method='GET'>
                <div class='mb-3'>
                    <label for='arrayInput' class='form-label'>Array</label>
                    <input name='array' type='text' class='form-control' id='arrayInput' aria-describedby='arrayHelp'>
                    <div id='arrayHelp' class='form-text'>Input array</div>
                </div>
                <button type='submit' class='btn btn-primary'>Sort array</button>
            </form>
        </div>
        ";
    }
    ?>
</body>
>>>>>>> 93eba0bef07027c850456fac15b20b554e24344e
</html>