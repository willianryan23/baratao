<?php
include "../includes/banco.php";

if (!isset($_GET['id'])) {
    die("ID da unidade não informado.");
}

$id = intval($_GET['id']);

// Busca os dados atuais da unidade
$sql = "SELECT * FROM unidades WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows === 0) {
    die("Unidade não encontrada.");
}

$loja = $result->fetch_assoc();

// Se o formulário for enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $email = $_POST['email'];
    $numero = $_POST['numero'];
    $representante = $_POST['representante'];

    // Atualiza com ou sem imagem
    if (!empty($_FILES['imagem']['tmp_name'])) {
        $imagem = addslashes(file_get_contents($_FILES['imagem']['tmp_name']));
        $sqlUpdate = "UPDATE unidades 
                      SET nome='$nome', endereço='$endereco', email='$email', número='$numero', representante='$representante', imagem='$imagem'
                      WHERE id=$id";
    } else {
        $sqlUpdate = "UPDATE unidades 
                      SET nome='$nome', endereço='$endereco', email='$email', número='$numero', representante='$representante'
                      WHERE id=$id";
    }

    if ($conn->query($sqlUpdate)) {
        echo "<script>alert('Unidade atualizada com sucesso!'); location.href='unidades_adm.php';</script>";
    } else {
        echo "Erro ao atualizar: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include "../includes/head.php"; ?>
<body>
<?php include "navbar_adm.php"; ?>

<div class="container mt-4">
    <h2>Editar Unidade</h2>
    <form method="POST" enctype="multipart/form-data" class="border p-3 rounded bg-light">
        <div class="mb-2">
            <label>Nome da Loja:</label>
            <input type="text" name="nome" class="form-control" value="<?= htmlspecialchars($loja['nome']) ?>" required>
        </div>
        <div class="mb-2">
            <label>Endereço:</label>
            <input type="text" name="endereco" class="form-control" value="<?= htmlspecialchars($loja['endereço']) ?>" required>
        </div>
        <div class="mb-2">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($loja['email']) ?>" required>
        </div>
        <div class="mb-2">
            <label>Número:</label>
            <input type="text" name="numero" class="form-control" value="<?= htmlspecialchars($loja['número']) ?>" required>
        </div>
        <div class="mb-2">
            <label>Representante:</label>
            <input type="text" name="representante" class="form-control" value="<?= htmlspecialchars($loja['representante']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Imagem Atual:</label><br>
            <img src="data:image/jpeg;base64,<?= base64_encode($loja['imagem']) ?>" width="120" height="120" style="object-fit:cover; border-radius:6px;">
        </div>
        <div class="mb-3">
            <label>Nova Imagem (opcional):</label>
            <input type="file" name="imagem" class="form-control" accept="image/*">
        </div>
        <button type="submit" class="btn btn-success">Salvar Alterações</button>
        <a href="unidades_adm.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

</body>
</html>
