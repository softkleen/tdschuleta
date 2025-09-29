<?php 
include_once "class/produto.php";
$produto = new Produto();
$produtos = $produto->listar(1); // 1 - retorna apenas o produtos em destaque / vazio - retorna todos
$linhas = count($produtos);
?>

<section>
    <!-- Mostrar se a consulta retornar vazio -->
<?php if($linhas == 0){ ?>
    <h2 class="alert alert-danger">Não há produtos em destaque</h2>
<?php }?>
<?php if($linhas > 0){?>
        <h2 class="alert alert-danger">Destaques</h2>
        <div class="row">
          <?php foreach($produtos as $prod):?>
            <!-- Card produto -->
            <div class="col-sm-6 col-md-4 mb-4">
            <div class="card">
              <img
                src="images/produtos/<?=$prod['imagem']?>"
                alt="<?=$prod['descricao']?>"
                class="card-img-top"
              />
              <div class="card-body bg-success text-white">
                <h3 class="card-title text-white">
                  <strong><i><?=$prod['descricao']?></i> </strong>
                </h3>
                <p class="text-warning"><strong><?=$prod['rotulo']?></strong></p>
                <p class="card-text text-start">
                    <?=mb_strimwidth($prod['resumo'],0,42,'...')?>
                </p>
                <button class="btn btn-default disabled" role="button" style="cursor: default;" >
                    <?="R$ ".number_format($prod['valor'],2,',','.')?>
                </button>
                <a href="detalhes_produto.php?id=<?=$prod['id']?>" class="btn btn-primary float-end">
                  <span class="d-nome d-sm-inline">Saiba mais</span>
                  <i class="bi bi-eye"></i>
                </a>
              </div>
            </div>
          </div>
          <!-- Final Card Produto -->
           <?php endforeach?>
        </div> <!-- final da row-->
<?php }?>
</section>