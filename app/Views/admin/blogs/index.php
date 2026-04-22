<?= view('admin_templates/upper_template') ?>
<?= view('admin_templates/header') ?>
<?= view('admin_templates/admin_sidebar') ?>

<main class="app-main">
    <div class="app-content-header py-5 border-bottom mb-4" style="background: linear-gradient(135deg, #f8faff 0%, #ffffff 100%);">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xl-11 mx-auto">
                    <div class="row align-items-center">
                        <div class="col">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-2 small fw-bold letter-spacing-1 text-uppercase">
                                    <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>" class="text-primary text-decoration-none opacity-75">CONTENT MANAGEMENT</a></li>
                                    <li class="breadcrumb-item active text-dark" aria-current="page">BLOGS</li>
                                </ol>
                            </nav>
                            <h1 class="fw-black m-0 text-dark display-5 letter-spacing-tight">Blog Insights</h1>
                            <div class="d-flex align-items-center mt-3">
                                <span class="badge bg-primary rounded-pill px-4 py-2 me-3 extra-small fw-black letter-spacing-1 shadow-sm"><?= count($blogs) ?> TOTAL POSTS</span>
                                <div class="vr me-3 opacity-25" style="height: 20px;"></div>
                                <p class="text-muted small mb-0 fw-medium">Create and manage premium articles for the Shivangani Tandon Academy community.</p>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('admin/blogs/create') ?>" class="btn btn-primary rounded-pill px-5 py-3 fw-black shadow-lg hover-lift">
                                <i class="bi bi-plus-lg me-2"></i> NEW ARTICLE
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content py-5 bg-light-subtle">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-11 mx-auto">
                    <?php if(session()->getFlashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show rounded-4 border-0 shadow-sm mb-4" role="alert">
                            <i class="bi bi-check-circle-fill me-2"></i> <?= session()->getFlashdata('success') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <?php if(empty($blogs)): ?>
                        <div class="card border-0 shadow-sm rounded-5 py-5 text-center bg-white">
                            <div class="card-body py-5">
                                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 100px; height: 100px;">
                                    <i class="bi bi-journal-text display-4 text-muted opacity-50"></i>
                                </div>
                                <h3 class="fw-black text-dark">No Blogs Published</h3>
                                <p class="text-muted fs-5">Your academy's news feed is empty. Start by sharing your first insight.</p>
                                <a href="<?= base_url('admin/blogs/create') ?>" class="btn btn-outline-primary rounded-pill px-4 py-2 fw-bold mt-3">Create First Post</a>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="card border-0 shadow-sm rounded-5 overflow-hidden bg-white">
                            <div class="table-responsive">
                                <table class="table align-middle mb-0" style="min-width: 1000px;">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="ps-5 py-4 extra-small fw-black text-muted text-uppercase letter-spacing-1" style="width: 45%;">Article Details</th>
                                            <th class="py-4 extra-small fw-black text-muted text-uppercase letter-spacing-1 text-center" style="width: 15%;">Author</th>
                                            <th class="py-4 extra-small fw-black text-muted text-uppercase letter-spacing-1 text-center" style="width: 15%;">Status</th>
                                            <th class="py-4 extra-small fw-black text-muted text-uppercase letter-spacing-1 text-center" style="width: 15%;">Date</th>
                                            <th class="pe-5 py-4 extra-small fw-black text-muted text-uppercase letter-spacing-1 text-end" style="width: 10%;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-top-0">
                                        <?php foreach($blogs as $blog): ?>
                                            <tr class="transition-all hover-row">
                                                <td class="ps-5 py-4">
                                                    <div class="d-flex align-items-center">
                                                        <div class="rounded-4 overflow-hidden me-3 shadow-sm" style="width: 80px; height: 60px;">
                                                            <img src="<?= $blog['image'] ? base_url($blog['image']) : base_url('public/images/homePageImages/NewsBlogs/blogimg.png') ?>" 
                                                                 class="w-100 h-100 object-cover" alt="Blog Image">
                                                        </div>
                                                        <div class="overflow-hidden">
                                                            <h6 class="fw-black text-dark mb-1 text-truncate" style="max-width: 300px;"><?= $blog['title'] ?></h6>
                                                            <p class="text-muted extra-small mb-0 text-truncate" style="max-width: 300px;">/blog/<?= $blog['slug'] ?></p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center py-4">
                                                    <div class="extra-small fw-bold text-dark bg-light rounded-pill px-3 py-1 d-inline-block">
                                                        <i class="bi bi-person-fill me-1"></i> <?= $blog['author'] ?>
                                                    </div>
                                                </td>
                                                <td class="text-center py-4">
                                                    <?php if($blog['status'] === 'published'): ?>
                                                        <span class="badge bg-success rounded-pill px-3 py-2 extra-small fw-black letter-spacing-1 text-uppercase shadow-sm">
                                                            PUBLISHED
                                                        </span>
                                                    <?php else: ?>
                                                        <span class="badge bg-secondary rounded-pill px-3 py-2 extra-small fw-black letter-spacing-1 text-uppercase shadow-sm">
                                                            DRAFT
                                                        </span>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-center py-4">
                                                    <div class="fw-black text-dark small mb-0"><?= date('d M, Y', strtotime($blog['created_at'])) ?></div>
                                                </td>
                                                <td class="pe-5 py-4 text-end">
                                                    <div class="d-flex justify-content-end gap-2">
                                                        <a href="<?= base_url('blog/'.$blog['slug']) ?>" target="_blank" class="btn btn-outline-info btn-sm rounded-circle p-2 hover-lift border-0 bg-light" title="View">
                                                            <i class="bi bi-eye-fill"></i>
                                                        </a>
                                                        <a href="<?= base_url('admin/blogs/edit/'.$blog['id']) ?>" class="btn btn-outline-primary btn-sm rounded-circle p-2 hover-lift border-0 bg-light" title="Edit">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </a>
                                                        <a href="<?= base_url('admin/blogs/delete/'.$blog['id']) ?>" class="btn btn-outline-danger btn-sm rounded-circle p-2 hover-lift border-0 bg-light" onclick="return confirm('Delete this blog post permanently?')" title="Delete">
                                                            <i class="bi bi-trash-fill"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>

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
    
    .transition-all { transition: all 0.3s ease; }
    .card { border: none !important; }
    .rounded-5 { border-radius: 2rem !important; }
    .shadow-lg { box-shadow: 0 20px 40px rgba(0,0,0,0.05) !important; }

    .hover-row:hover {
        background-color: rgba(87, 81, 225, 0.02);
    }

    .table thead th {
        border-top: none !important;
        border-bottom: 2px solid #f8f9fa !important;
    }

    .table tbody td {
        border-bottom: 1px solid #f8f9fa !important;
    }

    .btn-outline-primary:hover i, .btn-outline-danger:hover i, .btn-outline-info:hover i { 
        color: white !important; 
    }
</style>

<?= view('admin_templates/footer') ?>
<?= view('admin_templates/lower_template') ?>
