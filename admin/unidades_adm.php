<?php
include "../includes/banco.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $email = $_POST['email'];
    $numero = $_POST['numero'];
    $representante = $_POST['representante'];

    // Lê a imagem binária e escapa para armazenar no BLOB
    $imagem = addslashes(file_get_contents($_FILES['imagem']['tmp_name']));

    $sql = "INSERT INTO unidades (nome, imagem, endereço, email, número, representante)
            VALUES ('$nome', '$imagem', '$endereco', '$email', '$numero', '$representante')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Unidade cadastrada com sucesso!'); location.href='unidades_adm.php';</script>";
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include "../includes/head.php"; ?>
<body>
<?php include "navbar_adm.php"; ?>

<div class="container mt-4">
    <h2>Gerenciar Unidades</h2>
    <form method="POST" enctype="multipart/form-data" class="border p-3 rounded bg-light mb-4">
        <div class="mb-2">
            <label>Nome da Loja:</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>Endereço:</label>
            <input type="text" name="endereco" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>Número:</label>
            <input type="text" name="numero" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>Representante:</label>
            <input type="text" name="representante" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Imagem:</label>
            <input type="file" name="imagem" class="form-control" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-success">Cadastrar Loja</button>
    </form>

    <h3>Unidades Cadastradas</h3>
    <table class="table table-striped align-middle">
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Número</th>
                <th>Representante</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $conn->query("SELECT * FROM unidades ORDER BY id DESC");
            while ($row = $result->fetch_assoc()):
                $img = 'data:image/jpeg;base64,' . base64_encode($row['imagem']);
            ?>
            <tr>
                <td><img src="<?= $img ?>" width="60" height="60" style="object-fit:cover; border-radius:6px;"></td>
                <td><?= htmlspecialchars($row['nome']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['número']) ?></td>
                <td><?= htmlspecialchars($row['representante']) ?></td>
                <td>
                    <a href="editar_unidade.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="deletar_unidade.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger"
                       onclick="return confirm('Deseja realmente excluir esta unidade?')">Excluir</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
