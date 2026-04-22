<?= view('admin_templates/upper_template') ?>
<?= view('admin_templates/header') ?>
<?= view('admin_templates/admin_sidebar') ?>

<!-- Rich Text Editor -->
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

<main class="app-main">
    <div class="app-content-header py-5 border-bottom mb-4" style="background: linear-gradient(135deg, #f8faff 0%, #ffffff 100%);">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xl-9 mx-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-2 small fw-bold letter-spacing-1 text-uppercase">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/blogs') ?>" class="text-primary text-decoration-none opacity-75">BLOGS</a></li>
                            <li class="breadcrumb-item active text-dark" aria-current="page">CREATE NEW ARTICLE</li>
                        </ol>
                    </nav>
                    <h1 class="fw-black m-0 text-dark display-5 letter-spacing-tight">Compose Insight</h1>
                    <p class="text-muted mt-2 fw-medium">Share your expertise and latest academy news with the world.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content py-5 bg-light-subtle">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-9 mx-auto">
                    <?php if(session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show rounded-4 border-0 shadow-sm mb-4" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i> <?= session()->getFlashdata('error') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('admin/blogs/store') ?>" method="POST" enctype="multipart/form-data">
                        <div class="row g-4">
                            <!-- Left Column: Main Content -->
                            <div class="col-lg-8">
                                <div class="card border-0 shadow-sm rounded-5 p-5 bg-white mb-4">
                                    <div class="mb-4">
                                        <label class="form-label extra-small fw-black text-muted text-uppercase letter-spacing-1">Article Title</label>
                                        <input type="text" name="title" class="form-control form-control-lg border-0 bg-light rounded-4 px-4 py-3 fw-bold fs-4 shadow-none" placeholder="Enter a catchy title..." required>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label extra-small fw-black text-muted text-uppercase letter-spacing-1">Content</label>
                                        <textarea name="content" id="editor" class="form-control border-0 bg-light rounded-4 px-4 py-3 fw-medium"></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column: Settings & Sidebar -->
                            <div class="col-lg-4">
                                <div class="card border-0 shadow-sm rounded-5 p-4 bg-white mb-4">
                                    <h5 class="fw-black text-dark mb-4 extra-small text-uppercase letter-spacing-1">Publishing Settings</h5>
                                    
                                    <div class="mb-4">
                                        <label class="form-label extra-small fw-black text-muted text-uppercase letter-spacing-1">Featured Image</label>
                                        <div class="image-upload-wrapper bg-light rounded-4 p-4 text-center border-dashed border-2 border-muted border-opacity-25" style="cursor: pointer;" onclick="document.getElementById('imageInput').click()">
                                            <i class="bi bi-image display-6 text-muted opacity-50 mb-2"></i>
                                            <p class="small text-muted mb-0 fw-bold">Click to upload header image</p>
                                            <input type="file" name="image" id="imageInput" class="d-none" accept="image/*" onchange="previewImage(this)">
                                            <img id="imagePreview" class="w-100 rounded-4 mt-3 d-none shadow-sm" alt="Preview">
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label extra-small fw-black text-muted text-uppercase letter-spacing-1">Author Name</label>
                                        <input type="text" name="author" class="form-control border-0 bg-light rounded-4 px-4 py-2 fw-bold" value="Admin" required>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label extra-small fw-black text-muted text-uppercase letter-spacing-1">Status</label>
                                        <select name="status" class="form-select border-0 bg-light rounded-4 px-4 py-2 fw-bold shadow-none">
                                            <option value="published">Published</option>
                                            <option value="draft">Draft</option>
                                        </select>
                                    </div>

                                    <hr class="my-4 opacity-10">

                                    <button type="submit" class="btn btn-primary rounded-pill w-100 py-3 fw-black shadow-lg hover-lift">
                                        PUBLISH ARTICLE <i class="bi bi-send-fill ms-2"></i>
                                    </button>
                                    
                                    <a href="<?= base_url('admin/blogs') ?>" class="btn btn-light rounded-pill w-100 py-3 fw-bold mt-3 text-muted">
                                        Discard
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|', 'undo', 'redo'],
            placeholder: 'Share the knowledge...'
        })
        .catch(error => {
            console.error(error);
        });

    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('imagePreview');
                preview.src = e.target.result;
                preview.classList.remove('d-none');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;900&display=swap');
    
    body { font-family: 'Outfit', sans-serif; background-color: #f0f2f5; }
    .app-main { background-color: #f0f2f5; }

    .fw-black { font-weight: 900; }
    .letter-spacing-1 { letter-spacing: 1.5px; }
    .letter-spacing-tight { letter-spacing: -1.5px; }
    .extra-small { font-size: 0.7rem; }
    
    .hover-lift { transition: transform 0.2s cubic-bezier(0.34, 1.56, 0.64, 1); }
    .hover-lift:hover { transform: translateY(-3px); }
    
    .card { border: none !important; }
    .rounded-5 { border-radius: 2rem !important; }
    .shadow-lg { box-shadow: 0 20px 40px rgba(0,0,0,0.05) !important; }

    .ck-editor__editable_inline {
        min-height: 400px;
        background-color: #f8f9fa !important;
        border: none !important;
        padding: 0 20px !important;
        font-family: 'Outfit', sans-serif !important;
        font-size: 1.1rem !important;
        color: #333 !important;
    }
    
    .ck.ck-editor__main>.ck-editor__editable:not(.ck-focused) {
        background-color: #f8f9fa !important;
    }

    .ck.ck-toolbar {
        background-color: #ffffff !important;
        border: none !important;
        border-bottom: 1px solid #f0f0f0 !important;
        padding: 10px !important;
        border-radius: 1.5rem 1.5rem 0 0 !important;
    }

    .form-control:focus, .form-select:focus {
        background-color: #e9ecef !important;
        box-shadow: none !important;
    }

    .border-dashed { border-style: dashed !important; }
</style>

<?= view('admin_templates/footer') ?>
<?= view('admin_templates/lower_template') ?>
