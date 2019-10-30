<?php

    //receber a info pegas do post e depois criar uma nova conexao para salvar dentro da tabela dos cursos
$nomeAluno = $_POST['nomeAluno'];
$raAluno = $_POST['raAluno'];
$cursoId =$_POST['curso'];

//criar conexao com o banco de dados para jogar as info
$host = 'mysql:host=localhost;dbname=escola;port=3307';
$user = 'root';
$pass = '';

$db = new PDO($host, $user, $pass);

//nao usa o query para fazer insercao dentro de banco de dados.
//no php é recomendado colocar as colunas
//nome das colunas igual ao banco de dados
//? ? ? preparando o conjunto da quert, como ela ira funcionar, valores so passa depois de terminar de fechar a query
//quando tem poucos dados para aparecer.
//$query = $db->prepare('INSERT INTO alunos (nome, ra, curso_id) values(?,?,?) ');
//outra forma
$query = $db->prepare('INSERT INTO alunos (nome, ra, curso_id) values(:nome, :ra, :curso_id) ');
//Dar um feedback para o usuario se funcionou ou nao
//$resultado = $query->execute([$nomeAluno,$raAluno,$cursoId]);
//quando tem muitos dados para preencher
$resultado = $query->execute([
    "nome" => $nomeAluno,
    "ra" => $raAluno,
    "cursos_id" => $cursoId
    ]);

var_dump($resultado);
?>