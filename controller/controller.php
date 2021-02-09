<?php
    include '../model/profissional_class.php';
    include '../dao/contatodao_class.php';

    $p = new profissional($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['dataNasc'], $_POST['end'], $_POST['numero'], $_POST['cidade'], $_POST['funcao']);

    $c = new ContatoDAO();

    $c -> cadastrarContato($p);
?>