@if (session('success'))
    <div class="toast-container position-fixed top-0 end-0 p-3">

        <div id="successToast" class="toast align-items-center text-bg-success border-0" role="alert">

            <div class="d-flex">

                <div class="toast-body">

                    <i class="bi bi-check-circle-fill me-2"></i>

                    {{ session('success') }}

                </div>

                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast">
                </button>

            </div>

        </div>

    </div>
@endif
