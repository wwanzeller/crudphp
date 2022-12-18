<main>

    
    <h2 class="mt-3">Excluir Vaga</h2>

    <form action="" method="post">
        <p>Você deseja realmente excluir a vaga abaixo?</p>
        <div class="form-group mb-3">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" name="titulo" id="titulo" value="<?=$obVaga->titulo?>">
        </div>
        <div class="form-group">
            <a href="index.php"><button type="button" class="btn btn-success btn-lg">Cancelar</button></a>
            <button type="submit" class="btn btn-danger btn-lg" name="excluir">Excluir</button>
        </div>
    </form>
    
</main>