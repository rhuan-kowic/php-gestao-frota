<div class="modal fade" id="modalCreateVehicle" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-dark text-light border-info">

      <div class="modal-header border-info">
        <h5 class="modal-title">Cadastrar Novo Veículo</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form id="form-create-vehicle">
          <div class="mb-3">
            <label for="name" class="form-label">Nome (Placa/Identificador)</label>
            <input type="text" class="form-control bg-dark text-light border-secondary" id="name" name="name" required>
          </div>

          <div class="mb-3">
            <label for="type" class="form-label">Tipo</label>
            <select class="form-select bg-dark text-light border-secondary" id="type" name="type" required>
              <option value="" disabled selected>Selecione o tipo...</option>
              <option value="Caminhão Fora de Estrada">Caminhão Fora de Estrada</option>
              <option value="Caminhão Basculante">Caminhão Basculante</option>
              <option value="Caminhão Pipa">Caminhão Pipa</option>
              <option value="Caminhão Comboio">Caminhão Comboio</option>
              <option value="Escavadeira Hidráulica">Escavadeira Hidráulica</option>
              <option value="Pá Carregadeira">Pá Carregadeira</option>
              <option value="Retroescavadeira">Retroescavadeira</option>
              <option value="Perfuratriz">Perfuratriz</option>
              <option value="Trator de Esteira">Trator de Esteira</option>
              <option value="Motoniveladora">Motoniveladora</option>
              <option value="Rolo Compactador">Rolo Compactador</option>
              <option value="Caminhonete">Caminhonete</option>
              <option value="Veículo de Apoio">Veículo de Apoio</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="status" class="form-label">Status Inicial</label>
            <select class="form-select bg-dark text-light border-secondary" id="status" name="status" required>
              <option value="Disponível">Disponível</option>
              <option value="Em Operação">Em Operação</option>
              <option value="Em Manutenção">Em Manutenção</option>
              <option value="Inativo">Inativo</option>
            </select>
          </div>
          <div class="text-end mt-4">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-info">Salvar Veículo</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>