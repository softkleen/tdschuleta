<?php 
include_once "class/db.php"; // teste ok

$pdo = getConnection(); // ok
$tipo_lista = $pdo->query("select * from tipos");
$tipos = $tipo_lista->fetchAll();

?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
          <a href="index.html" class="navbar-brand">
            <img
              src="images/logo-chuleta.png"
              alt="Logotipo chuleta quente"
              width="190"
            />
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#menupublico"
            aria-controls="menupublico"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="menupublico">
            <ul class="navbar-nav ms-auto mb-2 mb-md-0">
              <li class="nav-item">
                <a href="/index.php" class="nav-link active" aria-current="page">
                  <i class="bi bi-house-door-fill"></i>&nbsp;HOME
                </a>
              </li>
              <li class="nav-item">
                <a href="#destaques" class="nav-link">DESTAQUES</a>
              </li>
              <li class="nav-item">
                <a href="#produtos" class="nav-link">PRODUTOS</a>
              </li>
              <li class="nav-item dropdown">
                <a
                  href="#"
                  class="nav-link dropdown-toggle"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  TIPOS
                </a>
                <ul class="dropdown-menu dropdown-menu-dark">
                  <?php foreach ($tipos as $tipo):?>
                    <li><a href="produtos_por_tipo.php?tipo_id=<?=$tipo['id']?>" class="dropdown-item"><?=$tipo['rotulo']?></a></li>
                  <?php endforeach;?> 
                </ul>
              </li>
              <li class="nav-item">
                <a href="#contato" class="nav-link">CONTATO</a>
              </li>
  
              <li class="nav-item">
                <form action="produtos_busca.php" method="get" class="d-flex" role="search">
                  <input
                    type="search"
                    class="form-control me-2"
                    placeholder="Buscar produto"
                    aria-label="Search"
                    name="buscar"
                    required
                  />
                  <button class="btn btn-outline-light">
                    <i class="bi bi-search"></i>
                  </button>
                </form>
              </li>
              <li class="nav-item">
                <a href="admin/index.php" class="nav-link">
                  <i class="bi bi-person-fill"></i>&nbsp;ADMIN/CLIENTE
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
