<?php

namespace App\Image;

class Editimg{
    private $image;
    private $watermarker;
    private $type;

    public function __construct($files, $watermark){
    // Carregar imagem
    $this->image = imagecreatefromstring(file_get_contents($files));
    $this->watermarker = imagecreatefromstring(file_get_contents($watermark));

    // tamanho da logo
    $waterwidth = imagesx($this->watermarker);
    $waterheight = imagesy($this->watermarker);

    // tamanho da image
    $imagewidth = imagesx($this->image);
    $imageheight = imagesy($this->image);

    // posição da logo na imagem
    $positionX = ($imagewidth / 2) - ($waterwidth  / 2);
    $positionY = ($imageheight / 2) - ($waterheight  / 2);

    imagecopy($this->image, $this->watermarker,(int)$positionX,(int)$positionY,0,0,$waterwidth,$waterheight);
    $info = pathinfo($files);
    $this->type = $info['extension'] == 'jpg' ? 'jpeg' : $info['extension'];
    }

    public function save($localfile, $qualiity = 100){
        $this->output($localfile, $qualiity);
    }

    public function print($qualiity = 100){
        header('Content-Type: image/'.$this->type);
        $this->output(null, $qualiity);
    }

    public function output($localfile, $qualiity){
        switch ($this->type) {
            case 'jpeg':
                imagejpeg($this->image, $localfile, $qualiity);
                break;

            case 'png':
                imagepng($this->image, $localfile, $qualiity);
                break;
        }
    }
}