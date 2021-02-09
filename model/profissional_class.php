<?php
    class profissional
    {
        private $nome;
        private $email;
        private $senha;
        private $nascimento;
        private $endereco;
        private $numero;
        private $cidade;
        private $profissao;

        public function profissional($nome, $email, $senha, $nascimento, $endereco, $numero, $cidade, $profissao)
        {
            $this -> nome = $nome;
            $this -> email = $email;
            $this -> senha = $senha;
            $this -> nascimento = $nascimento;
            $this -> endereco = $endereco;
            $this -> numero = $numero;
            $this -> cidade = $cidade;
            $this -> profissao = $profissao;
        }

        public function setNome($nome)
        {
            $this -> nome = $nome;
        }

        public function getNome()
        {
            return $this -> nome;
        }

        public function setEmail($email)
        {
            $this -> email = $email;
        }

        public function getEmail()
        {
            return $this -> email;
        }

        public function setSenha($senha)
        {
            $this -> senha = $senha;
        }

        public function getSenha()
        {
            return $this -> senha;
        }

        public function setNasc($nascimento)
        {
            $this -> nascimento = $nascimento;
        }

        public function getNasc()
        {
            return $this -> nascimento;
        }

        public function setEnd($endereco)
        {
            $this -> endereco = $endereco;
        }

        public function getEnd()
        {
            return $this -> endereco;
        }

        public function setNumber($numero)
        {
            $this -> numero = $numero;
        }

        public function getNumber()
        {
            return $this -> numero;
        }

        public function setCity($cidade)
        {
            $this -> cidade = $cidade;
        }

        public function getCity()
        {
            return $this -> cidade;
        }

        public function setJob($profissao)
        {
            $this -> profissao = $profissao;
        }

        public function getJob()
        {
            return $this -> profissao;
        }
        
    }  
    
?>