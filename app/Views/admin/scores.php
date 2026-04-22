<?= view('admin_templates/upper_template') ?>
<?= view('admin_templates/header') ?>
<?= view('admin_templates/admin_sidebar') ?>

<main class="app-main">
    <!-- Premium Header -->
    <div class="app-content-header py-5">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="display-5 fw-bold text-dark mb-1">Real Results Gallery</h1>
                    <p class="text-muted lead mb-0">Manage success stories and student result images.</p>
                </div>
                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <button class="btn btn-primary btn-lg rounded-pill px-4 shadow-sm fw-bold" data-bs-toggle="modal" data-bs-target="#imageUploadModal">
                        <i class="bi bi-cloud-upload me-2"></i> Upload Images
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Gallery Content -->
    <div class="app-content pb-5">
        <div class="container-fluid">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-4">
                <div id="galleryContainer" class="row g-4">
                    <!-- Loading State -->
                    <div id="loadingState" class="col-12 text-center py-5">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-3 text-muted">Fetching your results...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Upload Modal -->
<div class="modal fade" id="imageUploadModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header bg-primary text-white border-0 py-3">
                <h5 class="modal-title fw-bold">Upload Multiple Images</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <div class="upload-zone rounded-4 border-2 border-dashed p-5 text-center mb-4 transition-all" id="dropZone">
                    <i class="bi bi-images display-4 text-muted mb-3 d-block"></i>
                    <p class="text-muted mb-4">Click to select or drag and drop images here</p>
                    <input type="file" id="imageInput" class="form-control d-none" multiple accept="image/*" onchange="handleImagePreview(event)">
                    <button class="btn btn-outline-primary rounded-pill px-4 fw-bold" onclick="document.getElementById('imageInput').click()">
                        Select Files
                    </button>
                </div>
                <div class="row g-3" id="imagePreview"></div>
            </div>
            <div class="modal-footer bg-light border-0 py-3">
                <button class="btn btn-light rounded-pill px-4 fw-bold" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-success rounded-pill px-4 fw-bold" onclick="uploadImages()">
                    <i class="bi bi-check2-circle me-1"></i> Start Upload
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow rounded-4">
            <div class="modal-body p-4 text-center">
                <div class="text-danger mb-3">
                    <i class="bi bi-exclamation-triangle display-4"></i>
                </div>
                <h4 class="fw-bold mb-2">Delete Image?</h4>
                <p class="text-muted mb-4">This action cannot be undone. This image will be removed from the public website.</p>
                <input type="hidden" id="deleteId">
                <div class="d-flex gap-2 justify-content-center">
                    <button class="btn btn-light rounded-pill px-4 fw-bold" data-bs-dismiss="modal">Keep it</button>
                    <button class="btn btn-danger rounded-pill px-4 fw-bold" onclick="confirmDelete()">Yes, Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .app-main {
        background-color: #f8fafc !important;
    }

    .gallery-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: default;
    }

    .gallery-card:hover {
        transform: translateY(-8px);
    }

    .gallery-image-wrapper {
        position: relative;
        overflow: hidden;
        border-radius: 1rem;
        aspect-ratio: 4/5;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .gallery-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .gallery-card:hover .gallery-image-wrapper img {
        transform: scale(1.1);
    }

    .gallery-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, transparent 60%);
        opacity: 0;
        transition: opacity 0.3s ease;
        display: flex;
        align-items: flex-end;
        justify-content: flex-end;
        padding: 1rem;
    }

    .gallery-card:hover .gallery-overlay {
        opacity: 1;
    }

    .upload-zone {
        border-color: #cbd5e1 !important;
        background: #f8fafc;
    }

    .upload-zone:hover, .upload-zone.dragover {
        border-color: #6366f1 !important;
        background: #f1f5f9;
    }

    .transition-all { transition: all 0.2s ease-in-out; }

    .preview-card {
        position: relative;
        border-radius: 0.75rem;
        overflow: hidden;
        aspect-ratio: 1;
    }

    .preview-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", loaddemorequest);

    function loaddemorequest() {
        const container = document.getElementById("galleryContainer");
        const loading = document.getElementById("loadingState");
        
        loading.style.display = "block";

        fetch("<?= base_url('api/scores') ?>")
            .then(res => res.json())
            .then(response => {
                const data = response.data || [];
                loading.style.display = "none";
                
                // Keep the loading state hidden, remove old items
                Array.from(container.children).forEach(child => {
                    if(child.id !== 'loadingState') child.remove();
                });

                if (data.length > 0) {
                    data.forEach((item, index) => {
                        const col = document.createElement("div");
                        col.className = "col-6 col-sm-4 col-md-3 col-xl-2 gallery-card";
                        col.innerHTML = `
                            <div class="gallery-image-wrapper">
                                <img src="<?= base_url('public/images/talent/RealResult_talent/') ?>${item.image}" alt="Result">
                                <div class="gallery-overlay">
                                    <button class="btn btn-danger btn-sm rounded-circle shadow" onclick="openDeleteModal(${item.id})">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </div>
                        `;
                        container.appendChild(col);
                    });
                } else {
                    container.innerHTML += `
                        <div class="col-12 text-center py-5">
                            <i class="bi bi-image text-muted display-1"></i>
                            <p class="mt-3 text-muted">No results found. Start by uploading some!</p>
                        </div>
                    `;
                }
            })
            .catch(err => {
                loading.style.display = "none";
                container.innerHTML += `<div class="col-12 text-center text-danger py-5">Failed to load gallery</div>`;
                console.error(err);
            });
    }

    function openDeleteModal(id) {
        document.getElementById("deleteId").value = id;
        new bootstrap.Modal(document.getElementById('deleteModal')).show();
    }

    function confirmDelete() {
        const id = document.getElementById("deleteId").value;
        fetch(`<?= base_url('api/scores') ?>/${id}`, { method: 'DELETE' })
            .then(res => res.json())
            .then(resp => {
                showToast(resp.message, true);
                bootstrap.Modal.getInstance(document.getElementById('deleteModal')).hide();
                loaddemorequest();
            });
    }

    function uploadImages() {
        const input = document.getElementById("imageInput");
        const files = input.files;

        if (files.length === 0) {
            showToast("Please select images to upload", false);
            return;
        }

        const formData = new FormData();
        Array.from(files).forEach(file => formData.append("images[]", file));

        fetch("<?= base_url('api/upload-scores') ?>", { method: "POST", body: formData })
            .then(res => res.json())
            .then(response => {
                showToast(response.message || "Upload successful!", true);
                input.value = "";
                document.getElementById("imagePreview").innerHTML = "";
                bootstrap.Modal.getInstance(document.getElementById('imageUploadModal')).hide();
                loaddemorequest();
            })
            .catch(err => {
                console.error(err);
                showToast("Upload failed", false);
            });
    }

    function handleImagePreview(event) {
        const preview = document.getElementById("imagePreview");
        preview.innerHTML = "";
        const files = event.target.files;

        Array.from(files).forEach(file => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const col = document.createElement("div");
                col.className = "col-3";
                col.innerHTML = `
                    <div class="preview-card shadow-sm border">
                        <img src="${e.target.result}">
                    </div>
                `;
                preview.appendChild(col);
            };
            reader.readAsDataURL(file);
        });
    }
</script>

<?= view('admin_templates/footer') ?>
<?= view('admin_templates/lower_template') ?>