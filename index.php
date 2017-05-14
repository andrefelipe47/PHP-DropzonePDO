<!DOCTYPE html>
<!--
Desenvolvido por André Felipe
github.com/andrefelipe47
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Dropzone JS - PHP PDO + PHP OO</title>
        <!-- FOLHA DE ESTILOS DO SITE + BOOTSTRAP -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <!-- DROPZONE JS DEPENDENCIAS -->
        <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="assets/js/dropzone.js"></script>
        <!-- PARAMETROS DO DROPZONE -->
        <script type="text/javascript">
            Dropzone.options.dropzoneupload = {
                paramName: "dropzone",
                dictDefaultMessage: "Arraste e solte os seus arquivos aqui, ou clique para seleciona-los..."
            };
        </script>
        <!-- GOOGLE FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="header-box">
                <h1>[PHP] DROPZONE JS + PDO Orientado a Objetos</h1>
            </div>
            <div class="container-box">
                <form action="upload.php" class="dropzone" id="dropzoneupload" method="post" enctype="multipart/form-data"></form>
            </div>
            <div class="footer-box">
                <p>Desenvolvido por <a href="https://github.com/andrefelipe47">André Felipe</a> | Veja a documentação no <a href="https://github.com/andrefelipe47/PHP-PDO-SQL-Dropzone">GitHub</a></p>
            </div>
        </div>
    </body>
</html>