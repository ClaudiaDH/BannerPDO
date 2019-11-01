<?php 
    include_once("config/conexao.php");
    $db = conectarBanco();

    $query = $db->query('SELECT * FROM cursos');

    $cursos = $query->fetchAll(PDO::FETCH_ASSOC);

    //puxar as info do aluno que quero persquisar no banco
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        echo "voce deve passar um id";
        exit;
    }

    $query = $db->prepare('SELECT * from alunos where id=?');
    $query->execute([$id]);
    $aluno = $query->fetch(PDO::FETCH_ASSOC);
    //var_dump($aluno);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Banner com PDO</title>
</head>
<body>
    <form action="cadastroAluno.php" method="post">
        <h2>Nome Aluno</h2>
        <input type="text" name="nomeAluno" value=<?php echo $aluno['nome']; ?>>
        <h2>RA do Aluno</h2>
        <input type="text" name="raAluno" value=<?php echo $aluno['ra']; ?> disabled>
        <!--Criar um select com as info que tem no banco-->
        <h2>Cursos Disponiveis</h2>
        <select name="curso">
            <!--Deixar o option dinamico de acordo com o que eu tenho cadastrado no banco-->
            <?php foreach($cursos as $curso){?>
                <?php if($curso["id"] == $aluno["curso_id"]){?>
                <option selected value="<?= $curso['id']; ?>"><?php echo $curso['nome']; ?>
                    <?php $curso["nome"]?>
                </option>
                <?php }?>
            <?php }?>

            <option value= <?php echo $curso["id"];?>>
            <?php echo $curso["nome"];?>
            </option>
        </select>
        <button type='submit'>Cadastrar</button>
    </form>
</body>
</html>