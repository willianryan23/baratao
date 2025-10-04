<?php

    include "banco.php";
    //verificando de os dados via POST estão chegando
    if ($_POST){
        //testa os dados do vetor
        //var_dump($_POST);
        $descricao = $_POST['descricao'];
        $preco_unitario = $_POST['preco_unitario'];
        $estoque = $_POST['estoque'];
        $id = $_POST['id'];

        //salvar no BD
        $sql = "UPDATE produtos
            SET descricao = '$descricao', preco_unitario = $preco_unitario, estoque = $estoque
            WHERE id = $id;";

        //executa a consulta SQL
        $conexao->query($sql);
        ?>
<script>
alert("Alterção realizada com sucesso");
location.href = "produtos.php";
</script>

<?php

    }

?>
<!doctype html>
<html lang="pt-br">

<?php
include "head.php";
?>

<body>

    <!-- início da minha navbar -->

    <?php
    include "menu.php";
    ?>

    <!-- fim da minha navbar -->

    <div class="container">
        <h1 class="text-center">Mercadinho do Carlão</h1>
        <h2>Editar Produtos</h2>
        <!-- ? envia os dados via POST para o mesmo arquivo -->
        <?php 
        // recuperar os dados usados no select
        $id = $_GET["id"]; //variavel de pesquisa por id quando clicado em editar
        $sql = "SELECT * FROM produtos WHERE id=$id;"; //modelo de pesquisa
        $sql = $conexao->query($sql); //realizar a consulta (query significa consulta)
        $linha = $sql->fetch_assoc();
        //var_dump($linha);
        $descricao = $linha['descricao'];
        $preco_unitario = $linha['preco_unitario'];
        $estoque = $linha['estoque'];
        ?>
        <form action="?" method="post">
            <input type="hidden"   name="id" value="<?php echo"$id" ?>">
            Descrição
            <input type="text" name="descricao" class="form-control" placeholder="Digite a descrição do produto"
                required autocomplete="off" value="<?php echo "$descricao" ?>">
            Preço Unitário
            <input type="text" name="preco_unitario" class="form-control" placeholder="Digite o preço do produto"
                required autocomplete="off" value="<?php echo "$preco_unitario" ?>">
            Estoque
            <input type="text" name="estoque" class="form-control" placeholder="Digite a quantidade de produtos"
                required autocomplete="off" value="<?php echo "$estoque" ?>">
            <input type="submit" value="alterar" class="btn btn-primary mt-2">
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
</body>

</html>