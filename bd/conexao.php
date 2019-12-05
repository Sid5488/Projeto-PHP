<?php
    function conexaoMysql() {
        $host = (string) "localhost";
        $user = (string) "root";
        $password = (string) "bcd127";
        $database = (string) "tbl_identificacao";

        // Estabele conexão com o BD
        $conexao = mysqli_connect($host, $user, $password, $database);
        
        return $conexao;
    }
?> 