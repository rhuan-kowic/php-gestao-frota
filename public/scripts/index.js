const tableBody = document.getElementById("table-vehicles-body");
const createVehicleForm = document.getElementById("form-create-vehicle");
async function getVehicles() {
  try {
    const result = await fetch("http://localhost:8000/api.php");
    const vehicles = await result.json();
    return vehicles;
  } catch (err) {
    console.error("Falha na comunicação com a API: ", err);
    return null;
  }
}

function clearTableVehicles() {
  tableBody.innerHTML = "";
}

async function renderVehicles() {
  const vehicles = await getVehicles();

  clearTableVehicles();

  if (!vehicles || vehicles.length === 0) {
    tableBody.innerHTML = `
      <tr>
        <td colspan="5" class="text-center py-4 text-white">
          <i class="bi bi-inbox fs-2 d-block mb-2 text-white"></i>
          Nenhum veículo encontrado no banco de dados.
        </td>
      </tr>`;
    return;
  }

  vehicles.forEach((vehicle) => {
    const tr = document.createElement("tr");

    let badgeColor = "bg-secondary";
    let statusText = vehicle.status.toLowerCase();

    if (statusText === "disponível" || statusText === "em operação")
      badgeColor = "bg-success";
    if (statusText === "em manutenção") badgeColor = "bg-warning text-white";
    if (statusText === "inativo") badgeColor = "bg-danger";

    tr.innerHTML = `
      <td>${vehicle.id}</td>
      <td>${vehicle.name}</td>
      <td>${vehicle.type}</td>
      <td>
        <span class="badge ${badgeColor}">
          ${vehicle.status}
        </span>
      </td>
      <td class="text-center">
        <button class="btn btn-sm btn-outline-primary me-1" title="Editar" onclick="editar(${vehicle.id})">
          <i class="bi bi-pencil-square"></i>
        </button>
        <button class="btn btn-sm btn-outline-danger" title="Excluir" onclick="deletar(${vehicle.id})">
          <i class="bi bi-trash"></i>
        </button>
      </td>
    `;

    tableBody.appendChild(tr);
  });
}

createVehicleForm.addEventListener("submit", async (e) => {
  e.preventDefault();

  const formData = new FormData(createVehicleForm);
  const data = Object.fromEntries(formData.entries());

  try {
    const response = await fetch("http://localhost:8000/api.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    });

    if (response.ok) {
      createVehicleForm.reset();
      const modal = bootstrap.Modal.getInstance(
        document.getElementById("modalCreateVehicle"),
      );
      modal.hide();
      renderVehicles();
    } else {
      console.error("Erro ao criar veículo: ", response.statusText);
    }
  } catch (err) {
    console.error("Falha na comunicação com a API: ", err);
  }
});

renderVehicles();
