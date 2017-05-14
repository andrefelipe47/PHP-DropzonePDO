<?php

if (!empty($_FILES['dropzone'])) {
    include './php/classUpload.php';
    $Dropzone = new Dropzone();
    $Dropzone->DropUpload($_FILES['dropzone']);
}