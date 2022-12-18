<main>

    <section>
        <a href="index.php">
            <button class="btn btn-success">Voltar</button>
        </a>
    </section>

    <h2 class="mt-3"><?=TITLE?></h2>

    <form action="" method="post">
        <div class="form-group mb-3">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" name="titulo" id="titulo" value="<?=$obVaga->titulo?>">
        </div>

        <div class="form-group mb-3">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" name="descricao" id="descricao" rows="5"><?=$obVaga->descricao?></textarea>
        </div>

        <div class="form-group mb-3">
            <label>Status</label>
            <div>
                <div class="form-check form-check-inline p-0">
                    <label class="form-control">
                        <input type="radio" name="ativo" value="s" checked>Ativo
                    </label>
                </div>
                
                <div class="form-check form-check-inline p-0">
                    <label class="form-control">
                        <input type="radio" name="ativo" value="n" <?=$obVaga->ativo == 'n' ? 'checked' : ''?>> Inativo
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success btn-lg">Enviar</button>
        </div>
    </form>
    
</main>