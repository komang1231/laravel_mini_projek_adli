import * as bootstrap from 'bootstrap';
let selectedForm = null;

const deleteButtons = document.querySelectorAll(".btn-delete");
const confirmDelete = document.getElementById("confirmDelete");
const barangName = document.getElementById("deleteBarangName");

const deleteModal = new bootstrap.Modal(
    document.getElementById("deleteModal")
);

// Aktifkan semua tooltip
const tooltipTriggerList = document.querySelectorAll(
    '[data-bs-toggle="tooltip"]'
);

tooltipTriggerList.forEach(element => {
    new bootstrap.Tooltip(element);
});

deleteButtons.forEach(button => {

    button.addEventListener("click", function () {

        selectedForm = this.closest("form");

        barangName.textContent = this.dataset.barang;

        deleteModal.show();

    });

});

confirmDelete.addEventListener("click", () => {

    if (selectedForm) {

        selectedForm.submit();

    }

});

const successToast = document.getElementById("successToast");

if (successToast) {

    const toast = new bootstrap.Toast(successToast, {

        delay: 3000

    });

    toast.show();

}

const hargaInput = document.getElementById("harga");

if (hargaInput) {

    hargaInput.addEventListener("input", function () {

        let angka = this.value.replace(/\D/g, "");

        this.value = new Intl.NumberFormat("id-ID").format(angka);

    });

}

const form = document.querySelector("form");

if (form && hargaInput) {

    form.addEventListener("submit", function () {

        hargaInput.value = hargaInput.value.replace(/\./g, "");

    });

}