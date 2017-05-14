<?php

class Dropzone {

    public function __construct() {
        $this->PDO = new PDO('mysql:host=localhost;dbname=dropzone;charset=utf8', 'root', '');
    }

    private function RegistraBD($NOME_ARQUIVO, $NOME_UNICO, $EXTENSAO, $SIZE_KB) {
        $PDO = $this->PDO->prepare('INSERT INTO arquivos (nome_original, nome_unico, extensao, size_kb, data_upload) VALUES (:nome_original, :nome_unico, :extensao, :size_kb, :data_upload)');
        $PDO->bindParam(':nome_original', $NOME_ARQUIVO, PDO::PARAM_STR, 255);
        $PDO->bindParam(':nome_unico', $NOME_UNICO, PDO::PARAM_STR, 40);
        $PDO->bindParam(':extensao', $EXTENSAO, PDO::PARAM_STR, 4);
        $PDO->bindParam(':size_kb', $SIZE_KB, PDO::PARAM_INT, 7);
        $PDO->bindParam(':data_upload', date('Y-m-d h:i:s'), PDO::PARAM_STR);
        return $PDO->execute();
    }

    private function ValidaTamanho($SIZE_KB) {
        if ($SIZE_KB <= 2000) { // 2000 KILOBYTES EQUIVALEM A 2 MEGABYTES
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function DropUpload($Arquivo) {
        $NOME_ARQUIVO = explode(strrchr($Arquivo['name'], "."), $Arquivo['name'])[0]; //PEGA A OCORRENCIA 0 DO NOME DO ARQUIVO, [ELIMINA SOMENTE A ULTIMA EXTENSÃO]
        $NOME_UNICO = sha1(uniqid(microtime())); // GERA UM NOME UNICO PARA O ARQUIVO
        $EXTENSAO = strtolower(end(explode('.', $Arquivo['name']))); // PEGA SOMENTE A EXTENSAO
        $SIZE_KB = $Arquivo['size'] / 1000; // CONVERTE O VALOR DE BYTES PARA KILOBYTES

        if ($this->ValidaTamanho($SIZE_KB)) { // VE SE A IMAGEM E TEM O TAMANHO DE 2MB
            if (move_uploaded_file($Arquivo['tmp_name'], './upload/' . $NOME_UNICO)) { // EXECUTA SE CASO O ARQUIVO FOI MOVIDO COM SUCESSO PARA PASTA UPLOAD
                if ($this->RegistraBD($NOME_ARQUIVO, $NOME_UNICO, $EXTENSAO, $SIZE_KB)) {
                    return TRUE;
                } else {
                    unlink('./upload/' . $NOME_UNICO); //EXCLUI O ARQUIVO CASO NAO REGISTRE NO BANCO DE DADOS
                }
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

}
