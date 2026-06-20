<link rel="stylesheet" href="./assets/styles/index.css">

<body>
    <header>
        <?php require "navbar.php"; ?>
    </header>

    <main class="dashboard">

        <h1>Painel de Controle</h1>

        <div class="dashboard-grid">

            <aside class="aside-climate">
                <h2>Clima</h2>
                <p>☀️ 28°C</p>
                <p>Condição: Ensolarado</p>
            </aside>

            <section class="vehicles-list">

                <div class="section-header">
                    <h2>Veículos</h2>
                    <button class="btn-add">
                        + Adicionar Veículo
                    </button>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Tipo</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>CAM-01</td>
                            <td>Truck</td>
                            <td>Em Operação</td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>ESC-05</td>
                            <td>Escavadeira</td>
                            <td>Em Manutenção</td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td>PER-02</td>
                            <td>Perfuratriz</td>
                            <td>Disponível</td>
                        </tr>
                    </tbody>
                </table>

            </section>

        </div>

    </main>

    <?php require "footer.php"; ?>
</body>