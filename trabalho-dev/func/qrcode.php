<?php
require './phpqrcode/qrlib.php';

function qrcode ($id){
// Informação a ser codificada no QR Code

$data = "https://desenvolvimentno.000webhostapp.com/trabalho-dev/cartao.php?indice=$id";


// Caminho e nome do arquivo que irá conter o QR Code
$file = "assets/qrcodes/qr$id.png";
// Tamanho e nível de correção do QR Code
$size = 10;
$level = 'H';

// Gera o QR Code e salva no arquivo
QRcode::png($data, $file, $size, $level);
return $file;
}