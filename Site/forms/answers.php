<?php
$respostas = null;
$html = "";
try{
    $db = new PDO("sqlite:../../database.sqlite");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "SELECT * FROM questionario;";
    $respostas = $db->query($sql);

    while ($row = $respostas->fetch(PDO::FETCH_ASSOC)) {
        $html .= "<tr>
        <th scope='row'>".$row['id']."</th>
        <td>".$row['nome']."</td>
        <td>".$row['email']."</td>
        <td>".$row['p1']."</td>
        <td>".$row['p2']."</td>
        <td>".$row['p3']."</td>
        <td>".$row['p4']."</td>
        <td>".$row['p5']."</td>
        </tr>";
    }

  }catch(PDOException $e){
    echo $e->getMessage();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Respostas</title>
</head>
<body>
    <div>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Já conhecia a série</th>
                <th scope="col">Pelas info. do site você endendeu a história?</th>
                <th scope="col">Experiência do uso do site</th>
                <th scope="col">Compraria os livros</th>
                <th scope="col">Propostas de Melhoramento</th>
            </tr>
            </thead>
            <tbody>
                <?php
                echo $html;
                ?>
            </tbody>
        </table>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>