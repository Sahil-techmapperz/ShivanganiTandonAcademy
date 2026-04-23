<?= view('student_templates/upper_template') ?>
<?= view('student_templates/header') ?>
<?= view('student_templates/student_sidebar') ?>

<main class="app-main">
    <div class="app-content-header py-4 bg-white border-bottom">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item"><a href="<?= base_url('student/courses') ?>">My Courses</a></li>
                        <li class="breadcrumb-item active"><?= $course['name'] ?></li>
                    </ol>
                </nav>
                <h3 class="fw-bold m-0 text-dark"><?= $course['name'] ?></h3>
            </div>
            <div class="d-flex gap-2">
                <a href="<?= base_url('student/resources/'.$course['course_id']) ?>" class="btn btn-outline-primary btn-sm rounded-pill px-3">
                    <i class="bi bi-file-earmark-pdf me-1"></i> Resources
                </a>
                <button id="mark-complete-btn" onclick="markAsComplete()" class="btn btn-success btn-sm px-4 rounded-pill shadow-sm" <?= $course['progress'] >= 100 ? 'disabled' : '' ?>>
                    <?= $course['progress'] >= 100 ? 'Completed' : 'Mark as Complete' ?>
                </button>
            </div>
        </div>
    </div>

    <div class="app-content py-4">
        <div class="container-fluid">
            <div class="row">
                <!-- Assessment/Video Player Section -->
                <div class="col-lg-8">
                    <?php if(!empty($lessons)): ?>
                    <div class="card border-0 shadow-sm overflow-hidden mb-4 rounded-4 bg-white" style="min-height: 450px;">
                        <!-- Video Mode -->
                        <div id="video-mode">
                            <div class="ratio ratio-16x9 bg-black">
                                <div id="player"></div>
                            </div>
                        </div>

                        <!-- Assessment Mode -->
                        <div id="assessment-mode" class="p-5 d-none">
                            <div id="quiz-header" class="mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 id="assessment-title" class="fw-black mb-0">ASSESSMENT</h4>
                                    <span class="badge bg-danger-subtle text-danger px-3 py-2 rounded-pill extra-small fw-bold letter-spacing-1" id="assessment-badge">QUIZ</span>
                                </div>
                                <hr class="my-4 opacity-50">
                            </div>

                            <div id="assessment-content">
                                <div id="question-container" class="mb-4">
                                    <div class="d-flex mb-3">
                                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3 fw-black shadow-sm" style="width: 40px; height: 40px;" id="q-number">1</div>
                                        <h5 id="q-text" class="fw-bold text-dark mt-2"></h5>
                                    </div>
                                    <div id="options-container" class="ms-5 row g-3">
                                        <!-- Options injected here -->
                                    </div>
                                    <div id="text-container" class="ms-5 d-none">
                                        <textarea id="text-answer" class="form-control rounded-4 border-0 bg-light p-4" rows="5" placeholder="Enter your response here..."></textarea>
                                    </div>
                                    <div id="file-container" class="ms-5 d-none">
                                        <div class="bg-light p-5 rounded-5 border-dashed text-center">
                                            <i class="bi bi-file-earmark-arrow-up display-3 text-muted mb-3 d-block opacity-25"></i>
                                            <h6 class="fw-bold text-dark">UPLOAD SOLUTIONS PAPER</h6>
                                            <p class="text-muted extra-small mb-4">Please upload your completed exam in PDF or Image format.</p>
                                            <input type="file" id="exam-file" class="form-control bg-white border-0 rounded-pill shadow-sm" accept=".pdf,image/*">
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center border-top pt-4 mt-5">
                                    <div class="text-muted small">Question <span id="current-q">1</span> of <span id="total-q">0</span></div>
                                    <button id="next-btn" onclick="nextQuestion()" class="btn btn-primary rounded-pill px-5 py-2 fw-black shadow-lg">NEXT QUESTION</button>
                                </div>
                            </div>

                            <div id="assessment-completion" class="text-center py-5 d-none">
                                <div class="bg-success-subtle text-success d-inline-flex align-items-center justify-content-center rounded-circle p-4 mb-4" style="width: 100px; height: 100px;">
                                    <i class="bi bi-check-all display-3"></i>
                                </div>
                                <h3 class="fw-black text-dark">Assessment Submitted!</h3>
                                <p class="text-muted px-5">Your responses have been recorded and sent to the administrator for evaluation. You can track your results in the dashboard.</p>
                                <button onclick="location.reload()" class="btn btn-primary rounded-pill px-5 fw-bold mt-3">Back to Course</button>
                            </div>

                            <div id="submitted-container" class="py-2 d-none">
                                <!-- Status Card Injected via JS -->
                            </div>
                        </div>

                        <div id="meta-container" class="card-body p-4 bg-white border-top">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 id="video-title" class="fw-bold mb-0"><?= $lessons[0]['title'] ?></h5>
                                <span class="badge bg-light text-primary rounded-pill px-3 py-2">Premium Content</span>
                            </div>
                            <p id="video-desc" class="text-muted mb-0"><?= nl2br(preg_replace('!(https?://[^\s\x12-\x20\x7f-\xff]+)!', '<a href="$1" target="_blank" class="text-primary text-decoration-underline">$1</a>', esc($lessons[0]['description']))) ?></p>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="card border-0 shadow-sm rounded-4 p-5 text-center mb-4">
                        <div class="py-5">
                            <i class="bi bi-journal-x fs-1 text-muted d-block mb-3"></i>
                            <h4 class="fw-bold">No Content Available</h4>
                            <p class="text-muted">This course doesn't have any lessons or assessments published yet. Please check back later.</p>
                            <a href="<?= base_url('student/courses') ?>" class="btn btn-primary rounded-pill px-4">Back to My Courses</a>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Downloads & Resources Section -->
                    <?php if(!empty($lessons)): ?>
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
                        <div class="card-header bg-white py-3 border-bottom d-flex align-items-center">
                            <i class="bi bi-cloud-download text-primary me-2 h5 mb-0"></i>
                            <h6 class="fw-bold mb-0">Downloads & Resources</h6>
                        </div>
                        <div class="card-body p-0">
                            <div class="list-group list-group-flush" id="material-list">
                                <!-- Dynamic Materials Injection -->
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Syllabus / Lesson List Section -->
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100 bg-white">
                        <div class="card-header bg-white py-4 border-bottom-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="fw-bold mb-0">Course Content</h6>
                                <span class="text-muted small"><?= count($lessons) ?> Lessons</span>
                            </div>
                        </div>
                        <div class="list-group list-group-flush border-top" id="lesson-list">
                            <?php foreach($lessons as $index => $lesson): ?>
                                <?php 
                                    $lessonType = $lesson['type'] ?? 'video';
                                    $icon = 'bi-lock';
                                    if($index === 0) $icon = $lessonType === 'video' ? 'bi-play-circle-fill' : ($lessonType === 'quiz' ? 'bi-question-circle-fill' : 'bi-file-earmark-text-fill');
                                    else if($lessonType === 'quiz') $icon = 'bi-question-circle';
                                    else if($lessonType === 'exam') $icon = 'bi-file-earmark-text';
                                    else $icon = 'bi-play-circle'; // Default for video
                                ?>
                                <button type="button" 
                                        onclick="changeLesson(<?= $index ?>, this)" 
                                        class="list-group-item list-group-item-action p-3 border-0 d-flex justify-content-between align-items-center <?= $index === 0 ? 'active' : '' ?>">
                                    <div class="d-flex align-items-center">
                                        <div class="lesson-icon me-3">
                                            <i class="bi <?= $icon ?>"></i>
                                        </div>
                                        <div class="lesson-title-container">
                                            <span class="small fw-bold d-block"><?= $lesson['title'] ?></span>
                                            <?php if($lesson['is_completed']): ?>
                                                <span class="badge bg-success-subtle text-success extra-small rounded-pill mt-1">
                                                    <i class="bi bi-check-circle-fill me-1"></i> Completed
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <span class="text-muted extra-small d-block">
                                            <?php 
                                                if($lessonType === 'video') {
                                                    echo $lesson['duration'];
                                                } else {
                                                    $qCount = isset($lesson['questions']) ? count($lesson['questions']) : 0;
                                                    echo $qCount . ' ' . ($qCount == 1 ? 'Question' : 'Questions');
                                                }
                                            ?>
                                        </span>
                                        <?php if($index === 0): ?>
                                            <span class="badge bg-white text-primary rounded-pill mt-1 playing-badge" style="font-size: 10px;">Playing</span>
                                        <?php endif; ?>
                                    </div>
                                </button>
                            <?php endforeach; ?>
                        </div>
                        <?php if(!empty($lessons)): ?>
                        <div class="card-footer bg-light py-4 border-0 text-center mt-auto">
                            <div class="progress mb-2" style="height: 6px; border-radius: 10px; background: #e9ecef;">
                                <div id="progress-bar" class="progress-bar bg-success" style="width: <?= $course['progress'] ?>%"></div>
                            </div>
                            <span id="progress-text" class="text-muted small">You've completed <?= $course['progress'] ?>% of the course</span>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://www.youtube.com/iframe_api"></script>

<script>
    var lessons = <?= json_encode($lessons) ?>;
    var player;
    var currentLessonIndex = 0;
    
    // Assessment State
    var currentQuestionIndex = 0;
    var studentAnswers = [];
    
    function autoLink(text) {
        if (!text) return '';
        // Escape HTML first
        const div = document.createElement('div');
        div.textContent = text;
        let escaped = div.innerHTML;
        
        // Replace URLs
        const urlPattern = /(https?:\/\/[^\s]+)/g;
        let linked = escaped.replace(urlPattern, '<a href="$1" target="_blank" class="text-primary text-decoration-underline">$1</a>');
        
        // Preserve newlines
        return linked.replace(/\n/g, '<br>');
    }

    function onYouTubeIframeAPIReady() {
        if (lessons.length === 0) return;
        
        player = new YT.Player('player', {
            height: '100%',
            width: '100%',
            videoId: (lessons[0].type === 'video') ? (lessons[0].video_id || '') : '',
            playerVars: {
                'playsinline': 1,
                'rel': 0,
                'modestbranding': 1
            },
            events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
            }
        });
        
        // Initial setup for the first lesson if it's an assessment
        if (lessons[0].type !== 'video') {
            document.getElementById('video-mode').classList.add('d-none');
            document.getElementById('assessment-mode').classList.remove('d-none');
            loadAssessment(0);
        }
    }

    function onPlayerReady(event) {
        if (lessons.length > 0) {
            updateMaterialsList(0);
        }
    }

    function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.ENDED) {
            markAsComplete(true);
        }
    }

    function changeLesson(index, btn) {
        currentLessonIndex = index;
        const lesson = lessons[index];

        // Update UI Modes
        if (lesson.type === 'video') {
            document.getElementById('video-mode').classList.remove('d-none');
            document.getElementById('assessment-mode').classList.add('d-none');
            if(player && typeof player.loadVideoById === 'function') {
                player.loadVideoById(lesson.video_id);
            }
        } else {
            document.getElementById('video-mode').classList.add('d-none');
            document.getElementById('assessment-mode').classList.remove('d-none');
            loadAssessment(index);
        }

        // Update Meta
        document.getElementById('video-title').textContent = lesson.title;
        document.getElementById('video-desc').innerHTML = autoLink(lesson.description);

        // Button State
        const markBtn = document.getElementById('mark-complete-btn');
        markBtn.disabled = lesson.is_completed;
        markBtn.textContent = lesson.is_completed ? 'Completed' : (lesson.type === 'video' ? 'Mark as Complete' : 'Perform Assessment');

        // Update Materials
        updateMaterialsList(index);

        // Sidebar Cleanup
        const listItems = document.querySelectorAll('#lesson-list button');
        listItems.forEach(item => {
            item.classList.remove('active');
            const badg = item.querySelector('.playing-badge');
            if(badg) badg.remove();
        });
        btn.classList.add('active');
        btn.querySelector('.text-end').insertAdjacentHTML('beforeend', '<span class="badge bg-white text-primary rounded-pill mt-1 playing-badge" style="font-size: 10px;">Playing</span>');
    }

    function loadAssessment(lessonIndex) {
        currentQuestionIndex = 0;
        studentAnswers = [];
        const lesson = lessons[lessonIndex];
        const questions = lesson.questions || [];

        document.getElementById('assessment-title').textContent = lesson.title;
        document.getElementById('assessment-badge').textContent = lesson.type.toUpperCase();
        document.getElementById('total-q').textContent = questions.length;
        
        const contentCont = document.getElementById('assessment-content');
        const completionCont = document.getElementById('assessment-completion');
        const submittedCont = document.getElementById('submitted-container');

        contentCont.classList.add('d-none');
        completionCont.classList.add('d-none');
        submittedCont.classList.add('d-none');

        if (lesson.is_submitted) {
            const sub = lesson.submission;
            const statusClass = sub.status === 'graded' ? 'success' : 'warning';
            const statusIcon = sub.status === 'graded' ? 'bi-check-circle-fill' : 'bi-hourglass-split';
            
            submittedCont.innerHTML = `
                <div class="card border-0 shadow-sm rounded-5 overflow-hidden text-center p-5 bg-light bg-opacity-50 border">
                    <div class="mb-4">
                        <div class="bg-white rounded-circle d-inline-flex align-items-center justify-content-center shadow-sm mb-3" style="width: 80px; height: 80px;">
                            <i class="bi ${statusIcon} display-5 text-${statusClass}"></i>
                        </div>
                        <h4 class="fw-black text-dark">Assessment Already Submitted</h4>
                        <p class="text-muted">You have already submitted this assessment. Dual submissions are not permitted at this stage.</p>
                    </div>
                    
                    <div class="row justify-content-center g-3">
                        <div class="col-md-6">
                            <div class="p-4 bg-white rounded-4 border shadow-sm">
                                <div class="extra-small fw-black text-muted text-uppercase letter-spacing-1 mb-1">EVALUATION STATUS</div>
                                <span class="badge bg-${statusClass}-subtle text-${statusClass} rounded-pill px-3 py-2 fw-bold text-uppercase">
                                    ${sub.status}
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-4 bg-white rounded-4 border shadow-sm">
                                <div class="extra-small fw-black text-muted text-uppercase letter-spacing-1 mb-1">YOUR PERFORMANCE</div>
                                <div class="fw-black h4 mb-0 text-primary">
                                    ${sub.score !== null ? sub.score + '<span class="small ms-1">PTS</span>' : '<span class="text-muted opacity-50">Pending</span>'}
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-5 pt-4 border-top">
                        <p class="small text-muted fw-bold">Submission ID: <span class="text-dark">ASSESSMENT_${sub.id}</span></p>
                        <div class="text-muted extra-small">Recorded on ${new Date(sub.created_at).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' })}</div>
                    </div>
                </div>
            `;
            submittedCont.classList.remove('d-none');
            return;
        }

        contentCont.classList.remove('d-none');
        if (questions.length > 0) {
            renderQuestion();
        } else {
            contentCont.innerHTML = `
                <div class="text-center py-5">
                    <i class="bi bi-clipboard2-x display-4 text-muted opacity-25"></i>
                    <h5 class="text-muted mt-3">No questions defined for this assessment.</h5>
                    <p class="text-muted extra-small">Contact administrator to populate curriculum.</p>
                </div>
            `;
        }
    }

    function renderQuestion() {
        const questions = lessons[currentLessonIndex].questions;
        const q = questions[currentQuestionIndex];

        document.getElementById('q-number').textContent = currentQuestionIndex + 1;
        document.getElementById('current-q').textContent = currentQuestionIndex + 1;
        document.getElementById('q-text').textContent = q.question_text;
        
        const optionsCont = document.getElementById('options-container');
        const textCont = document.getElementById('text-container');
        const fileCont = document.getElementById('file-container');
        const nextBtn = document.getElementById('next-btn');
        const assessmentType = lessons[currentLessonIndex].type;

        // Hide all containers initially
        optionsCont.classList.add('d-none');
        textCont.classList.add('d-none');
        fileCont.classList.add('d-none');

        if (assessmentType === 'exam') {
            fileCont.classList.remove('d-none');
        } else if (q.question_type === 'mcq') {
            optionsCont.classList.remove('d-none');
            optionsCont.innerHTML = '';
            
            const options = JSON.parse(q.options || '[]');
            options.forEach((opt, i) => {
                const escapedOpt = opt.replace(/'/g, "\\'");
                const html = `
                    <div class="col-md-6">
                        <div class="option-card p-3 border rounded-4 bg-light cursor-pointer transition-all" onclick="selectOption(this, '${escapedOpt}')">
                            <div class="d-flex align-items-center">
                                <div class="bg-white rounded-circle me-3 border d-flex align-items-center justify-content-center shadow-sm letter-box" style="width: 25px; height: 25px;">${String.fromCharCode(65 + i)}</div>
                                <div class="fw-bold small text-dark opt-text">${opt}</div>
                            </div>
                        </div>
                    </div>
                `;
                optionsCont.insertAdjacentHTML('beforeend', html);
            });
        } else {
            textCont.classList.remove('d-none');
            document.getElementById('text-answer').value = '';
        }

        nextBtn.textContent = (currentQuestionIndex === questions.length - 1 || assessmentType === 'exam') ? 'SUBMIT ASSESSMENT' : 'NEXT QUESTION';
    }

    function selectOption(el, val) {
        const lesson = lessons[currentLessonIndex];
        const q = lesson.questions[currentQuestionIndex];
        
        // Remove selection from others
        document.querySelectorAll('.option-card').forEach(c => {
            c.classList.remove('bg-primary-subtle', 'border-primary', 'text-primary', 'selected');
            c.querySelector('.letter-box').classList.remove('bg-primary', 'text-white', 'border-primary');
            c.querySelector('.letter-box').innerHTML = c.querySelector('.letter-box').getAttribute('data-letter') || c.querySelector('.letter-box').innerHTML;
        });

        // Store original letter if not already stored
        if (!el.querySelector('.letter-box').getAttribute('data-letter')) {
            el.querySelector('.letter-box').setAttribute('data-letter', el.querySelector('.letter-box').innerHTML);
        }

        // Highlight selected
        el.classList.add('bg-primary-subtle', 'border-primary', 'text-primary', 'selected');
        el.querySelector('.letter-box').classList.add('bg-primary', 'text-white', 'border-primary');

        studentAnswers[currentQuestionIndex] = val;
    }

    function nextQuestion() {
        const lesson = lessons[currentLessonIndex];
        const questions = lesson.questions;
        const q = questions[currentQuestionIndex];
        
        if (lesson.type === 'exam') {
            submitAssessment();
            return;
        }

        if (q.question_type === 'text') {
            studentAnswers[currentQuestionIndex] = document.getElementById('text-answer').value;
        }

        if (!studentAnswers[currentQuestionIndex]) {
            alert('Please provide an answer before proceeding.');
            return;
        }

        if (currentQuestionIndex < questions.length - 1) {
            currentQuestionIndex++;
            renderQuestion();
        } else {
            submitAssessment();
        }
    }

    function submitAssessment() {
        const nextBtn = document.getElementById('next-btn');
        const originalText = nextBtn.innerHTML;
        nextBtn.disabled = true;
        nextBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> SUBMITTING...';

        const lesson = lessons[currentLessonIndex];
        const formData = new FormData();
        
        formData.append('course_id', '<?= $course['course_id'] ?>');
        formData.append('title', lesson.title);
        formData.append('type', lesson.type);

        if (lesson.type === 'exam') {
            const fileInput = document.getElementById('exam-file');
            if (fileInput.files.length === 0) {
                alert('Please upload your solution paper.');
                nextBtn.disabled = false;
                nextBtn.innerHTML = originalText;
                return;
            }
            formData.append('exam_file', fileInput.files[0]);
        } else {
            let formattedAnswers = "ASSESSMENT ANSWERS:\n\n";
            lesson.questions.forEach((q, i) => {
                formattedAnswers += `Q${i+1}: ${q.question_text}\nANSWER: ${studentAnswers[i]}\n\n`;
            });
            formData.append('answers', formattedAnswers);
        }

        $.ajax({
            url: '<?= base_url('student/submit-exam') ?>',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if(response.status === 'success') {
                    document.getElementById('assessment-content').classList.add('d-none');
                    document.getElementById('assessment-completion').classList.remove('d-none');
                    markAsComplete(true);
                } else {
                    alert(response.message);
                    nextBtn.disabled = false;
                    nextBtn.innerHTML = originalText;
                }
            }
        });
    }

    function updateMaterialsList(index) {
        const materialList = document.getElementById('material-list');
        const materials = lessons[index].materials || [];
        materialList.innerHTML = (materials.length === 0) ? '<div class="p-4 text-center text-muted small">No materials available for this lesson.</div>' : '';
        materials.forEach(item => {
            const icon = item.type === 'PDF' ? 'bi-file-pdf text-danger' : (item.type === 'XLSX' ? 'bi-file-excel text-success' : 'bi-file-earmark-text text-primary');
            const html = `<div class="list-group-item p-4 d-flex justify-content-between align-items-center border-0 border-bottom bg-transparent transition-all">
                            <div class="d-flex align-items-center">
                                <div class="resource-icon-bg bg-white rounded-3 p-2 me-3 shadow-sm border border-light">
                                    <i class="bi ${icon} h4 mb-0"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 small fw-black text-dark text-uppercase letter-spacing-1">${item.name}</h6>
                                    <span class="text-muted extra-small fw-bold opacity-75">${item.type} • ${item.size}</span>
                                </div>
                            </div>
                            <a href="${item.url}" class="btn btn-primary btn-sm rounded-pill px-4 fw-bold shadow-sm" download="${item.name}" target="_blank">
                                <i class="bi bi-cloud-download me-2"></i>DOWNLOAD
                            </a>
                        </div>`;
            materialList.insertAdjacentHTML('beforeend', html);
        });
    }

    function markAsComplete(isAuto = false) {
        const btn = document.getElementById('mark-complete-btn');
        if (typeof lessons === 'undefined' || lessons.length === 0) return;
        if(!isAuto) {
            btn.disabled = true;
            btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Updating...';
        }
        $.ajax({
            url: '<?= base_url('student/update-progress') ?>',
            method: 'POST',
            data: { enrollment_id: '<?= $course['id'] ?>', lesson_id: lessons[currentLessonIndex].id },
            success: function(response) {
                if(response.status === 'success') {
                    lessons[currentLessonIndex].is_completed = true;
                    const newProgress = response.new_progress;
                    document.getElementById('progress-bar').style.width = newProgress + '%';
                    document.getElementById('progress-text').textContent = "You've completed " + newProgress + "% of the course";
                    const activeBtn = document.querySelector('#lesson-list button.active');
                    if (activeBtn && !activeBtn.querySelector('.bi-check-circle-fill')) {
                        const target = activeBtn.querySelector('.lesson-title-container');
                        target.insertAdjacentHTML('beforeend', `<span class="badge bg-success-subtle text-success extra-small rounded-pill mt-1"><i class="bi bi-check-circle-fill me-1"></i> Completed</span>`);
                    }
                    if(newProgress >= 100) { btn.textContent = 'Course Completed!'; btn.disabled = true; }
                    else { btn.textContent = 'Marked Complete'; btn.disabled = true; }
                }
            }
        });
    }
</script>

<style>
    .letter-spacing-1 { letter-spacing: 1.5px; }
    .extra-small { font-size: 0.75rem; }
    .fw-black { font-weight: 900; }
    .cursor-pointer { cursor: pointer; }
    .transition-all { transition: all 0.2s ease-in-out; }
    .option-card:hover { border-color: #5751E1 !important; transform: translateX(5px); }
    .option-card.selected { 
        border-color: #5751E1 !important; 
        background-color: #f8f7ff !important;
        box-shadow: 0 4px 12px rgba(87, 81, 225, 0.1);
    }

    #material-list .list-group-item:hover {
        background-color: #f8f9ff !important;
        transform: translateX(5px);
    }
    
    /* Sidebar Improvements */
    #lesson-list .list-group-item {
        transition: all 0.2s ease;
        border-bottom: 1px solid #f0f0f0 !important;
    }
    #lesson-list .list-group-item.active {
        background: #5751E1 !important;
        border-color: #5751E1 !important;
        box-shadow: 0 4px 15px rgba(87, 81, 225, 0.2);
    }
    #lesson-list .list-group-item.active .text-muted,
    #lesson-list .list-group-item.active .extra-small,
    #lesson-list .list-group-item.active .fw-bold {
        color: #fff !important;
    }
    #lesson-list .list-group-item.active .lesson-icon i {
        color: #fff !important;
    }
    #lesson-list .list-group-item.active .bg-success-subtle {
        background-color: rgba(255, 255, 255, 0.2) !important;
        color: #fff !important;
    }
    #lesson-list .list-group-item.active .playing-badge {
        background-color: #fff !important;
        color: #5751E1 !important;
    }

    .lesson-icon i { font-size: 1.2rem; }
    .ratio-16x9 #player { border-radius: 0; }
    .border-dashed { border-style: dashed !important; }
    #q-text { white-space: pre-line; }
</style>

<?= view('student_templates/footer') ?>
<?= view('student_templates/lower_template') ?>
