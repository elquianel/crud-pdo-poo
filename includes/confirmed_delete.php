<main>
    <h2 class="mt-3">Excluir vaga</h2>

    <form method="post">
        <div class="form-group">
            <p>Você deseja realmente excluir a vaga <strong><?= $obVaga->title; ?>?</strong></p>
        </div>

        <div class="form-group">
            <a href="index.php">
                <button type="button" class="btn btn-success">Voltar</button>
            </a>
            <button type="submit" class="btn btn-danger" name="delete">Excluir</button>
        </div>
    </form>
</main>