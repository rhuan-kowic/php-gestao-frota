<head>
  <link rel="stylesheet" href="./assets/styles/index.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" defer></script>
  <script src="./scripts/index.js" defer></script>
</head>

<body class="d-flex flex-column min-vh-100">
  <header>
    <?php require "navbar.php"; ?>
  </header>
  <main class="container-fluid py-4 px-3 flex-grow-1">
    <h1 class="mb-4 text-info">Painel de Controle</h1>
    <div class="row g-4">
      <aside class="col-12 col-xl-2">
        <div class="card bg-dark text-light border-info h-100">
          <div class="card-body">
            <h2 class="h5">Clima</h2>
            <p class="mb-1">☀️ 28°C</p>
            <p class="mb-0">Condição: Ensolarado</p>
          </div>
        </div>
      </aside>

      <section class="col-12 col-xl-10">
        <div class="card bg-dark text-light border-info">
          <div class="card-body">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-3">
              <h2 class="h5 mb-0">Veículos</h2>
              <button class="btn btn-info">
                + Adicionar Veículo
              </button>
            </div>

            <div class="table-responsive">
              <table class="table table-dark table-hover align-middle mb-0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Status</th>
                    <th class="text-center">Ações</th>
                  </tr>
                </thead>

                <tbody id="table-vehicles-body">
                </tbody>

              </table>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>
  <?php require "footer.php"; ?>

</body>