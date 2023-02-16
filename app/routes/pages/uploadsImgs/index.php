<?php
use App\Image\Editimg;

$imagePost = isset($_FILES['photos']) ? $_FILES['photos'] : null;

if($imagePost !== null){
    if(sizeof($imagePost['tmp_name']) > 3){
        echo "Máximo de upload por vez: 3";
    }else{
        for($i = 0; $i < sizeof($imagePost['tmp_name']); $i++){
            $editimg = new Editimg($imagePost['tmp_name'][$i], 'img/logo.png');
            $editimg->save('uploads/'.time().'.jpg');
            sleep(1);
        }
        echo "Upload Completo.";
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
        <input name="photos[]" id="photos" type="file"  multiple placeholder="Selecione as fotos..." accept="image/png,image/jpeg" />

        <button type="submit">
          Cadastrar
        </button>
      </form>
</body>
</html>