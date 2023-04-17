<main>
    <section>
        <a href="index.php">
            <button class="btn btn-success">Voltar</button>
        </a>
    </section>

    <h2 class="mt-3"><?= TITLE; ?></h2>

    <form method="post">
        <div class="form-group">
            <label for="">Título</label>
            <input type="text" name="title" class="form-control" value="<?= ($obVaga->title); ?>">
        </div>

        <div class="form-group">
            <label for="">Descrição</label>
            <textarea name="description" cols="30" rows="5" class="form-control"><?= $obVaga->description; ?></textarea>
        </div>

        <div class="form-group">
            <label for="">Status</label>
            <div>
                <div class="form-check form-check-inline">
                    <label class="form-control">
                        <input type="radio" name="status" value="Y" checked> Ativo
                    </label>
                </div>

                <div class="form-check form-check-inline">
                    <label class="form-control">
                        <input type="radio" name="status" value="N" <?= $obVaga->status == 'N' ? 'checked' : ''; ?>> Inativo
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
    </form>
</main>