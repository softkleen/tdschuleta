<?php 
include 'acesso_com.php';
include_once '../class/produto.php';
include_once '../class/tipo.php';



?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <title>Produto - Atualiza</title>
</head>
<body>
<?php include "menu_adm.php";?>

<main class="container my-4">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            
            <h2 class="breadcrumb text-danger d-flex align-items-center">
                <a href="produtos_lista.php" class="me-2">
                    <button class="btn btn-danger">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                </a>
                Atualizando Produto
            </h2>

            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="produtos_atualiza.php" method="post" 
                          name="form_insere" enctype="multipart/form-data"
                          id="form_insere">

                        <!-- ID oculto -->
                        <input type="hidden" name="id" id="id" value="<?=$prod['id']?>">

                        <!-- Tipo -->
                        <div class="mb-3">
                            <label for="id_tipo" class="form-label">Tipo:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-list-task"></i></span>
                                <select name="id_tipo" id="id_tipo" class="form-select" required>
                                    <  
                                        <option value="" >
                                            
                                        </option>
                           
                                </select>
                            </div>
                        </div>

                        <!-- Destaque -->
                        <div class="mb-3">
                            <label class="form-label">Destaque:</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" 
                                    name="destaque" id="destaque_s" value="1" 
                                    >
                                <label class="form-check-label" for="destaque_s">Sim</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" 
                                    name="destaque" id="destaque_n" value="0" 
                                    >
                                <label class="form-check-label" for="destaque_n">Não</label>
                            </div>
                        </div>

                        <!-- Descrição -->
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-egg-fried"></i></span>
                                <input type="text" name="descricao" id="descricao" 
                                    class="form-control" maxlength="100"
                                    value="">
                            </div>
                        </div>

                        <!-- Resumo -->
                        <div class="mb-3">
                            <label for="resumo" class="form-label">Resumo:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-card-text"></i></span>
                                <textarea name="resumo" id="resumo" rows="5"
                                    class="form-control"></textarea>
                            </div>
                        </div>

                        <!-- Valor -->
                        <div class="mb-3">
                            <label for="valor" class="form-label">Valor:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-tag"></i></span>
                                <input type="number" name="valor" id="valor" 
                                    class="form-control" required min="0" step="0.01"
                                    value="">
                            </div>
                        </div>

                        <!-- Imagem Atual -->
                        <div class="mb-3">
                            <label class="form-label">Imagem Atual:</label><br>
                            <img src="../images/produtos/" 
                                 alt="Imagem Atual" class="img-fluid mb-2" style="max-height:150px;">
                            <input type="hidden" name="imagem_atual" id="imagem_atual" value="<?=$prod['imagem']; ?>">
                        </div>

                        <!-- Imagem Nova -->
                        <div class="mb-3">
                            <label for="imagemfile" class="form-label">Nova Imagem:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-image"></i></span>
                                <input type="file" name="imagemfile" id="imagemfile" 
                                    class="form-control" accept="image/*">
                            </div>
                            <img src="" id="imagem" class="img-fluid mt-2" style="display:none; max-height:150px;">
                        </div>

                        <!-- Botão -->
                        <div class="d-grid">
                            <input type="submit" name="atualizar" id="atualizar" 
                                   class="btn btn-danger w-100" value="Atualizar">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</main>

<!-- Script para preview da imagem -->
<script>
document.getElementById("imagemfile").onchange = function(){
    var reader = new FileReader();
    if(this.files[0].size > 512000){
        alert("A imagem deve ter no máximo 500KB");
        this.value = "";
        return false;
    }
    if(this.files[0].type.indexOf("image") == -1){
        alert("Formato inválido! Escolha uma imagem.");
        this.value = "";
        return false;
    }
    reader.onload = function(e){
        let img = document.getElementById("imagem");
        img.src = e.target.result;
        img.style.display = "block";
    }
    reader.readAsDataURL(this.files[0]);
}    
</script>
</body>
</html>