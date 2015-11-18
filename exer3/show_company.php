<?php
include_once('src/FileReader.php');
$file_reader = new FileReader('funcionarios.txt');
$company = $file_reader->readCompany();
$workers = $file_reader->readWorkers();
?>

<h1><?= $company['name'] ?></h1>
<p><?= $company['address'] ?></p>

<table>
    <tr>
        <th>Nome</th>
        <th>Data de admissão</th>
        <th>Cargo</th>
        <th>Salário</th>
    </tr>

    <?php
        foreach ($workers as $worker) {
            echo "<tr>";
            foreach ($worker as $data) {
                echo "<td>{$data}</td>";
            }
            echo "</tr>";
        }
    ?>


</table>