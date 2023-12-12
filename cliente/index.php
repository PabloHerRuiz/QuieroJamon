<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST">
        <input type="text" name="nombre" id="nombre">
        <input type="submit" value="Ojala te toque el jamon"></input>
    </form>
    <?php
// echo $_SERVER['DOCUMENT_ROOT'];
    use GuzzleHttp\Client;

    require_once 'vendor/autoload.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST["nombre"])) {
            $nombre = $_POST["nombre"];
            $client = new Client();
            $response = $client->request('GET', 'http://cartero/apiCorreo.php?nombre=' . $nombre);
            echo $response->getBody();
        } else {
            echo "No has introducido ningun nombre";
        }
    }

    ?>
</body>

</html>