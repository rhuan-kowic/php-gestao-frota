<div class="modal fade" id="modalUpdateVehicle" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-dark text-light border-info">

      <div class="modal-header border-info">
        <h5 class="modal-title">Atualizar Status do Veículo</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form id="form-update-vehicle">
          <input type="hidden" id="update-id" name="id">

          <div class="mb-3">
            <label for="update-name" class="form-label">Veículo</label>
            <input type="text" class="form-control bg-dark text-secondary border-secondary" id="update-name" disabled>
          </div>

          <div class="mb-3">
            <label for="update-status" class="form-label">Novo Status</label>
            <select class="form-select bg-dark text-light border-secondary" id="update-status" name="status" required>
              <option value="" disabled>Selecione o novo status...</option>
              <option value="Disponível">Disponível</option>
              <option value="Em Operação">Em Operação</option>
              <option value="Em Manutenção">Em Manutenção</option>
              <option value="Inativo">Inativo</option>
            </select>
          </div>

          <div class="text-end mt-4">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-info">Atualizar</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>