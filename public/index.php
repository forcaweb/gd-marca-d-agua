<?php

require_once '../vendor/autoload.php';

use App\Image\Editimg;

header('Content-Type: text/html; charset=utf-8; Access-Control-Allow-Origin: *;');

$imagePost = isset($_FILES['photos']) ? $_FILES['photos'] : null;

if($imagePost !== null){
    if(sizeof($imagePost['tmp_name']) > 3){
        echo "Máximo de upload por vez: 3";
    }else{
        for($i = 0; $i < sizeof($imagePost['tmp_name']); $i++){
            $editimg = new Editimg($imagePost['tmp_name'][$i], __DIR__.'/img/logo.png');
            $editimg->save(__DIR__.'/uploads/'.time().'.jpg');
            sleep(1);
        }
    }
    
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>uploads</title>
</head>
<body>
<h2>Adicionar Foto</h2>
      <form method="POST" encType="multipart/form-data" action="">
        <label>Fotos do anunciante:</label>
        <input name="photos[]" id="photos" type="file"  multiple placeholder="Selecione as fotos..." />

        <button type="submit">
          Cadastrar
        </button>
      </form>
      <?php
?>
</body>
</html>