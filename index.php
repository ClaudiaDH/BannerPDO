<?php 
    $host = 'mysql:host=localhost;dbname=escola;port=3307';
    $user = 'root';
    $pass = '';

    $db = new PDO($host, $user, $pass);

    $query = $db->query('SELECT * from cursos');

    $cursos = $query->fetchAll(PDO::FETCH_ASSOC);



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
        <input type="text" name="nomeAluno">
        <h2>RA do Aluno</h2>
        <input type="text" name="raAluno">
        <!--Criar um select com as info que tem no banco-->
        <h2>Cursos Disponiveis</h2>
        <select name="curso">
            <!--Deixar o option dinamico de acordo com o que eu tenho cadastrado no banco-->
            <?php foreach($cursos as $curso){?>
                <option value="<?= $curso['id']; ?>"><?php echo $curso['nome']; ?></option>
            <?php }?>
        </select>
        <button type='submit'>Cadastrar</button>
    </form>
</body>
</html>