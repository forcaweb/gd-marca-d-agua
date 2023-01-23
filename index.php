<?php

require_once __DIR__.'/vendor/autoload.php';

use App\Image\Editimg;

$editimg = new Editimg('https://images.ecycle.com.br/wp-content/uploads/2021/05/20195924/o-que-e-paisagem.jpg', __DIR__.'/img/logo.png');

//$editimg->print();

$editimg->save(__DIR__.'/uploads/'.time().'.jpg');