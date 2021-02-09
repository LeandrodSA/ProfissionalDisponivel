<?php
    require '../persistence/conection_bd_class.php';

    class ContatoDAO
    {
        private $conn = null;

        public function ContatoDAO()
        {
            $this -> conn = connectBD::getInstance();
        }

        public function cadastrarContato($c)
        {
            $stat = $this -> conn -> prepare("INSERT INTO contato (nome, email, senha, dataNasc, endereco, numero, cidade, funcao) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            try
            {
                $stat->execute([$c -> getNome(), $c -> getEmail(), md5($c -> getSenha()), $c -> getNasc(), $c -> getEnd(), $c -> getNumber(), $c -> getCity(), $c -> getJob()]);
                    
                header('location: ../view/cadastro_completo.php');
                
            }
            catch(PDOException $e)
            {
                return "Erro ao cadastrar Contato! " . $e;
            }
        }

        
        public function pesquisaContato(){            
            $p = $_POST['pesquisa'];
            $c = $_POST['cidade'];
            $stat = $this -> conn -> query("SELECT * FROM contato WHERE funcao LIKE '%$p%' && cidade LIKE '%$c%'");
            
            if($stat -> rowCount() > 0)
            {
                while($row = $stat->fetch(PDO::FETCH_ASSOC))
                {
                    echo "<div class='row' style='padding-left:5%; padding-botton:1%; color:#11f; font-weight: bold;'><div class='col-md-2'>" . "<img class='card-img' src='../img/avatar.jpg'></div>" . "<div class='col-md-10'>Nome: " . $row["nome"] . "<br>Email: " . $row['email'] . "<br>Função: " . $row['funcao'] . "<br>Cidade: " . $row['cidade']. "</div></div><br>";
                }
                
            }
            else
            {
                echo  "<div class='display-4'style='text-align:center;'> Nenhum contato encontrado com a função <div style='color:#f00;'>" . $p . "</div>" . " na cidade <div style='color:#f00;'>" . $c . "</div></div>";
            }
           
           
        }
        
        public function contato()
        {
            $subclass = 'active';
            $stat = $this -> conn -> query("SELECT * FROM contato");
            
            while($row = $stat->fetch(PDO::FETCH_ASSOC))
            {
                echo "<div class='carousel-item $subclass'>
                        <div class='row' style='padding-left:5%; padding-botton:1%; text-align:center; color:#11f; font-weight: bold;'>
                            <div class='col-md-2'>
                                <img class='card-img' src='../img/avatar.jpg' style='margin-left: 100%;'>
                            </div>
                            <div class='col-md-10'>
                                Nome: " . $row["nome"] . 
                                "<br>Email: " . $row['email'] . 
                                "<br>Função: " . $row['funcao'] . 
                                "<br>Cidade: " . $row['cidade']. "
                            </div>
                        </div>
                    </div>";
                    $subclass='';
            }
        }
        
        public function login()
        {
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            
            if((isset($email) && (isset($senha)) && ($email != "") && ($senha != "")))
            {
                
                $stat = $this -> conn -> prepare("SELECT * FROM contato WHERE email LIKE ? AND senha LIKE ?");
                
                $stat -> bindParam(1, $email);
                $stat -> bindParam(2, $senha);
                
                $stat -> execute();
                $resultado = $stat -> fetchAll();
                
                $logodo = false;
                
                foreach($resultado as $item)
                {
                    $logodo = true;
                    session_start();
                    $_SESSION['nome'] = $item['nome'];
                    $_SESSION['email'] = $item['email'];
                    $_SESSION['dataNasc'] = $item['dataNasc'];
                    $_SESSION['endereco'] = $item['endereco'];
                    $_SESSION['numero'] = $item['numero'];
                    $_SESSION['cidade'] = $item['cidade'];
                    $_SESSION['funcao'] = $item['funcao'];
                }
                
                if($logodo)
                {
                    header('location: ../view/contato.php');
                }
                else
                {
                    $_SESSION['loginErro'] = "Usuario ou senha invalido";
                    header('location: ../view/login.php');
                }
            }
            else
            {
                $_SESSION['loginErro'] = "Usuario ou senha invalido";
                header('location: ../view/login.php');
            }
        }
        
        
        public function botaoSair(){
           
        }
    }
?>
