<?php
$respostas = null;
$html = "";
try{
    $database_file = 'Site/database/database.sqlite';
    $username = null;
    $password = null;
    $db = new PDO("sqlite:database.sqlite", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "SELECT * FROM questionario;";
    $respostas = $db->query($sql);

    if ($respostas->rowCount() == 0) {
        $html = "<tr><td colspan='5' class='text-center bg-info text-white'>Nenhuma resposta cadastrada :(</td></tr>";
    }else{

    while ($row = $respostas->fetch(PDO::FETCH_ASSOC)) {
        $html .= "<tr>
        <th scope='row'></th>
        <td>".$row->id."</td>
        <td>".$row->p1."</td>
        <td>".$row->p2."</td>
        <td>".$row->p3."</td>
        <td>".$row->p4."</td>
        <td>".$row->p5."</td>
      </tr>";
    }
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Respostas</title>
</head>
<body>
    <div>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>