<?php
    session_start();
    if(isset($_SESSION['nome'])){
?>
<!doctype html>
<html lang="br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    
     <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="/your-path-to-fontawesome/css/brands.css" rel="stylesheet">
    <link href="/your-path-to-fontawesome/css/solid.css" rel="stylesheet">

    <title>Profissional</title>
  </head>
  <body>
    
    <nav>
      <ul class="nav justify-content-center">
        <li class="nav-item">
          <a class="nav-link active" href="contato.php">Home</a>
        </li>
      </ul>
      
        <div class="row">
            <div class="col-md-6" style="color:#1ff; text-align:left;">
                  <?php
                        echo "Bem Vindo: " . $_SESSION['nome'];
                  ?>
            </div>
            
            <div class="col-md-6 " style="text-align:right;">
                <a href="login.php">Sair</a>
           </div>
        </div>
    </nav>

    <section>      
      <div class="col-md-12" style="text-align:center;">
        <h1 class="display-4 text-font">Minha Pagina</h1>
      </div>
      
      
    <table style="width:30%; margin:auto;" border="4%">
            <?php
                echo "<tr style='color:#11f; font-weight: bold;'>
                     <td>Nome:<br> "  .
                    "Email:<br> " .
                    "Aniversario:<br> "  .
                    "Endereço:<br> "  .
                    "Numero:<br> " .
                    "Cidade:<br> " .
                    "Especialidade: " .
                    "</td>" 
                    .
                    "<td>" . 
                          $_SESSION['nome'] . "<br>" . 
                          $_SESSION['email'] . "<br>" .
                          implode('/',array_reverse(explode('-',$_SESSION['dataNasc']))) . "<br>" .
                          $_SESSION['endereco'] . "<br>" .
                          $_SESSION['numero'] . "<br>" . 
                          $_SESSION['cidade'] . "<br>" . 
                          $_SESSION['funcao'] .
                    "</td></tr>";
            ?>
        </table>
            
    </div>
   
      <footer class="text-font">  
        <h6 class="h-conf1">Author: Leandro Alves</h6>
        <h6 class="h-conf2">Email: big.foot.rpg@gmail.com</h6>
        <a href="https://www.facebook.com/leandro.silviera"><img class="img-icon" src="../img/face.png"></a>
      </footer>
    </section>
    
    <?php
        }
        else
        {
            header('location:login.php');
        }
    ?>
   
    