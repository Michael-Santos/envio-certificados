<?php

include 'env.php';
include 'enviar.php';

$delimitador = ',';
$cerca = '"';

$f = fopen($arquivoCsv, 'r');
if ($f) {

    $cabecalho = fgetcsv($f, 0, $delimitador);

    while (!feof($f)) {

        $linha = fgetcsv($f, 0, $delimitador, $cerca);
        if (!$linha) {
            continue;
        }

        $registro = array_combine($cabecalho, $linha);

        if (!(file_exists("Certificados/" . utf8_encode($registro["Nome"]) . ".pdf")))
          echo "Não foi encontrado correspondência para o arquivo: " . "Certificados/" . $registro["Nome"] . ".pdf";
        else {
          echo enviarCertificado(utf8_encode($registro["Nome"]), utf8_encode($registro["Email"]), "Certificados/" . utf8_encode($registro["Nome"]) . ".pdf");
          
          //echo utf8_encode($registro["Nome"]) . ",". utf8_encode($registro["Email"]) . ",". "Certificados/" . utf8_encode($registro["Nome"]) . ".pdf<br/>";

        }
    }
    fclose($f);

}
