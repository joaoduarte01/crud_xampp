<?php
include "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add"])) {
    $titulo = $_POST["titulo"];
    $genero = $_POST["genero"];
    $ano = $_POST["ano"];
    $id_autor = $_POST["id_autor"];

    if ($ano > 1500 && $ano <= date("Y")) {
        $sql = "INSERT INTO livros (titulo, genero, ano_publicacao, id_autor)
                VALUES ('$titulo', '$genero', $ano, $id_autor)";
        $conn->query($sql);
    } else {
        echo "Ano inválido!";
    }
}

$result = $conn->query("SELECT livros.*, autores.nome AS autor FROM livros 
                        JOIN autores ON livros.id_autor = autores.id_autor");
?>

<h2>Cadastro de Livros</h2>
<form method="post">
    <input type="text" name="titulo" placeholder="Título" required>
    <input type="text" name="genero" placeholder="Gênero">
    <input type="number" name="ano" placeholder="Ano" required>
    <select name="id_autor">
        <?php
        $autores = $conn->query("SELECT * FROM autores");
        while ($a = $autores->fetch_assoc()) {
            echo "<option value='{$a['id_autor']}'>{$a['nome']}</option>";
        }
        ?>
    </select>
    <button type="submit" name="add">Salvar</button>
</form>

<h2>Livros</h2>
<table border="1">
    <tr><th>ID</th><th>Título</th><th>Gênero</th><th>Ano</th><th>Autor</th></tr>
    <?php while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id_livro']}</td>
                <td>{$row['titulo']}</td>
                <td>{$row['genero']}</td>
                <td>{$row['ano_publicacao']}</td>
                <td>{$row['autor']}</td>
              </tr>";
    } ?>
</table>
