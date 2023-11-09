<?php
// Parâmetros de conexão ao PostgreSQL
$host = "10.0.0.104";
$port = "5432"; // Porta padrão do PostgreSQL
$dbname = "meu_banco_de_dados";
$user = "meu_usuario";
$password = "1234";

// Conectar ao banco de dados PostgreSQL
$connection = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$connection) {
    die("Erro de conexão com o banco de dados: " . pg_last_error());
}

// Recuperar dados do banco de dados
$query = "SELECT * FROM tabela_moedas";
$result = pg_query($connection, $query);

if (!$result) {
    die("Erro na consulta: " . pg_last_error());
}

$data = array();
// Exibir os dados na página
while ($row = pg_fetch_assoc($result)) {
    $data[]= array(
        'moeda'=>$row['moeda'],
        'valor'=>$row['valor']
    );
}

$json_data = json_encode($data);
echo $json_data;

// Fechar a conexão
pg_close($connection);
?>