@extends('layouts.app')

@section('title', 'To-Do List - FitFlow')

{{-- Link ke file CSS terpisah --}}
<link rel="stylesheet" href="{{ asset('css/todolist.css') }}">

@section('content')
<div class="container">
    <!-- Header -->
    <div class="todolist-header">
        <div class="header-content">
            <div class="header-left">
                <h1>📋 My To-Do List</h1>
                <p>Kelola aktivitas harian Anda untuk hidup yang lebih sehat dan produktif</p>
            </div>
            <div class="header-actions">
                <button class="btn btn-primary add-task-btn" data-bs-toggle="modal" data-bs-target="#addTaskModal">
                    <i class="fas fa-plus"></i> Tambah Task
                </button>
                <div class="progress-summary">
                    <div class="progress-circle">
                        <svg width="60" height="60">
                            <circle cx="30" cy="30" r="25" stroke="#e9ecef" stroke-width="4" fill="none"/>
                            <circle cx="30" cy="30" r="25" stroke="#28a745" stroke-width="4" fill="none"
                                    stroke-dasharray="157" stroke-dashoffset="78.5" class="progress-ring"/>
                        </svg>
                        <span class="progress-text">65%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Tabs -->
    <div class="filter-tabs">
        <button class="filter-btn active" data-filter="all">Semua <span class="count">24</span></button>
        <button class="filter-btn" data-filter="workout">🏃 Olahraga <span class="count">6</span></button>
        <button class="filter-btn" data-filter="nutrition">🥗 Nutrisi <span class="count">8</span></button>
        <button class="filter-btn" data-filter="wellness">🧘 Wellness <span class="count">5</span></button>
        <button class="filter-btn" data-filter="habit">💧 Kebiasaan <span class="count">5</span></button>
        <button class="filter-btn" data-filter="completed">✅ Selesai <span class="count">12</span></button>
    </div>

    <!-- Today's Priority Tasks -->
    <div class="priority-section">
        <div class="section-header">
            <h3>⭐ Prioritas Hari Ini</h3>
            <span class="section-subtitle">Task yang harus diselesaikan hari ini</span>
        </div>
        <div class="priority-grid">
            <div class="todo-item priority-high" data-category="workout">
                <div class="priority-badge">HIGH</div>
                <div class="todo-content">
                    <h4>🏃‍♂️ Morning Cardio Run</h4>
                    <p>Lari pagi 30 menit di taman</p>
                    <div class="task-meta">
                        <span class="time">07:00 - 07:30</span>
                        <span class="category">Olahraga</span>
                    </div>
                </div>
                <div class="todo-checkbox">
                    <input type="checkbox" id="priority1">
                    <label for="priority1"></label>
                </div>
            </div>
            <div class="todo-item priority-medium completed" data-category="nutrition">
                <div class="priority-badge medium">MED</div>
                <div class="todo-content">
                    <h4>🥗 Healthy Breakfast</h4>
                    <p>Oatmeal dengan buah-buahan segar</p>
                    <div class="task-meta">
                        <span class="time">08:00</span>
                        <span class="category">Nutrisi</span>
                    </div>
                </div>
                <div class="todo-checkbox">
                    <input type="checkbox" id="priority2" checked>
                    <label for="priority2"></label>
                </div>
            </div>
            <div class="todo-item priority-high" data-category="habit">
                <div class="priority-badge">HIGH</div>
                <div class="todo-content">
                    <h4>💧 Hydration Goal</h4>
                    <p>Minum 8 gelas air putih hari ini</p>
                    <div class="task-meta">
                        <span class="progress-text">6/8 gelas</span>
                        <span class="category">Kebiasaan</span>
                    </div>
                </div>
                <div class="todo-checkbox">
                    <input type="checkbox" id="priority3">
                    <label for="priority3"></label>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Todo Sections -->
    <div class="todo-sections">
        <!-- Workout Section -->
        <div class="todo-section" data-category="workout">
            <div class="section-header">
                <h3>🏋️‍♂️ Olahraga & Aktivitas Fisik</h3>
                <span class="section-progress">4/6 completed</span>
            </div>
            <div class="todo-list">
                <div class="todo-item completed">
                    <div class="todo-content">
                        <h4>🏃‍♀️ Morning Jog</h4>
                        <p>Jogging 5km di sekitar kompleks</p>
                        <div class="task-meta">
                            <span class="duration">45 menit</span>
                            <span class="calories">~300 kcal</span>
                        </div>
                    </div>
                    <div class="todo-checkbox">
                        <input type="checkbox" id="workout1" checked>
                        <label for="workout1"></label>
                    </div>
                </div>
                <div class="todo-item">
                    <div class="todo-content">
                        <h4>💪 Strength Training</h4>
                        <p>Upper body workout - Push, Pull, Legs</p>
                        <div class="task-meta">
                            <span class="time">16:00</span>
                            <span class="duration">60 menit</span>
                        </div>
                    </div>
                    <div class="todo-checkbox">
                        <input type="checkbox" id="workout2">
                        <label for="workout2"></label>
                    </div>
                </div>
                <div class="todo-item completed">
                    <div class="todo-content">
                        <h4>🧘‍♀️ Yoga Session</h4>
                        <p>Morning yoga flow untuk fleksibilitas</p>
                        <div class="task-meta">
                            <span class="duration">30 menit</span>
                            <span class="instructor">dengan Sarah Wilson</span>
                        </div>
                    </div>
                    <div class="todo-checkbox">
                        <input type="checkbox" id="workout3" checked>
                        <label for="workout3"></label>
                    </div>
                </div>
                <div class="todo-item">
                    <div class="todo-content">
                        <h4>🚶‍♂️ Evening Walk</h4>
                        <p>Jalan santai setelah makan malam</p>
                        <div class="task-meta">
                            <span class="time">19:30</span>
                            <span class="steps">3000 langkah</span>
                        </div>
                    </div>
                    <div class="todo-checkbox">
                        <input type="checkbox" id="workout4">
                        <label for="workout4"></label>
                    </div>
                </div>
                <div class="todo-item completed">
                    <div class="todo-content">
                        <h4>🏊‍♂️ Swimming</h4>
                        <p>Berenang 20 lap di kolam renang</p>
                        <div class="task-meta">
                            <span class="duration">45 menit</span>
                            <span class="calories">~400 kcal</span>
                        </div>
                    </div>
                    <div class="todo-checkbox">
                        <input type="checkbox" id="workout5" checked>
                        <label for="workout5"></label>
                    </div>
                </div>
                <div class="todo-item">
                    <div class="todo-content">
                        <h4>🚴‍♀️ Cycling</h4>
                        <p>Bersepeda ke kantor (round trip)</p>
                        <div class="task-meta">
                            <span class="distance">15 km</span>
                            <span class="eco">Ramah lingkungan</span>
                        </div>
                    </div>
                    <div class="todo-checkbox">
                        <input type="checkbox" id="workout6">
                        <label for="workout6"></label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Nutrition Section -->
        <div class="todo-section" data-category="nutrition">
            <div class="section-header">
                <h3>🍎 Nutrisi & Makanan Sehat</h3>
                <span class="section-progress">5/8 completed</span>
            </div>
            <div class="todo-list">
                <div class="todo-item completed">
                    <div class="todo-content">
                        <h4>🥣 Healthy Breakfast</h4>
                        <p>Oatmeal dengan blueberry dan madu</p>
                        <div class="task-meta">
                            <span class="calories">350 kcal</span>
                            <span class="protein">12g protein</span>
                        </div>
                    </div>
                    <div class="todo-checkbox">
                        <input type="checkbox" id="nutrition1" checked>
                        <label for="nutrition1"></label>
                    </div>
                </div>
                <div class="todo-item">
                    <div class="todo-content">
                        <h4>🥗 Power Lunch Salad</h4>
                        <p>Caesar salad dengan grilled chicken</p>
                        <div class="task-meta">
                            <span class="time">12:30</span>
                            <span class="calories">480 kcal</span>
                        </div>
                    </div>
                    <div class="todo-checkbox">
                        <input type="checkbox" id="nutrition2">
                        <label for="nutrition2"></label>
                    </div>
                </div>
                <div class="todo-item completed">
                    <div class="todo-content">
                        <h4>🍌 Mid-Morning Snack</h4>
                        <p>Pisang dengan selai kacang almond</p>
                        <div class="task-meta">
                            <span class="calories">200 kcal</span>
                            <span class="fiber">5g serat</span>
                        </div>
                    </div>
                    <div class="todo-checkbox">
                        <input type="checkbox" id="nutrition3" checked>
                        <label for="nutrition3"></label>
                    </div>
                </div>
                <div class="todo-item">
                    <div class="todo-content">
                        <h4>🐟 Dinner - Grilled Salmon</h4>
                        <p>Salmon dengan quinoa dan sayuran panggang</p>
                        <div class="task-meta">
                            <span class="time">19:00</span>
                            <span class="omega3">Tinggi Omega-3</span>
                        </div>
                    </div>
                    <div class="todo-checkbox">
                        <input type="checkbox" id="nutrition4">
                        <label for="nutrition4"></label>
                    </div>
                </div>
                <div class="todo-item completed">
                    <div class="todo-content">
                        <h4>🥤 Green Smoothie</h4>
                        <p>Smoothie bayam, apel, dan jahe</p>
                        <div class="task-meta">
                            <span class="vitamins">Vitamin A & C</span>
                            <span class="detox">Detox</span>
                        </div>
                    </div>
                    <div class="todo-checkbox">
                        <input type="checkbox" id="nutrition5" checked>
                        <label for="nutrition5"></label>
                    </div>
                </div>
                <div class="todo-item completed">
                    <div class="todo-content">
                        <h4>🥜 Afternoon Snack</h4>
                        <p>Mixed nuts dan buah kering</p>
                        <div class="task-meta">
                            <span class="healthy-fats">Lemak sehat</span>
                            <span class="portion">30g</span>
                        </div>
                    </div>
                    <div class="todo-checkbox">
                        <input type="checkbox" id="nutrition6" checked>
                        <label for="nutrition6"></label>
                    </div>
                </div>
                <div class="todo-item">
                    <div class="todo-content">
                        <h4>🍓 Evening Fruit</h4>
                        <p>Mixed berries sebagai dessert sehat</p>
                        <div class="task-meta">
                            <span class="antioxidant">Antioksidan</span>
                            <span class="low-cal">Rendah kalori</span>
                        </div>
                    </div>
                    <div class="todo-checkbox">
                        <input type="checkbox" id="nutrition7">
                        <label for="nutrition7"></label>
                    </div>
                </div>
                <div class="todo-item completed">
                    <div class="todo-content">
                        <h4>🥛 Protein Shake</h4>
                        <p>Post-workout protein shake</p>
                        <div class="task-meta">
                            <span class="protein">25g protein</span>
                            <span class="recovery">Recovery</span>
                        </div>
                    </div>
                    <div class="todo-checkbox">
                        <input type="checkbox" id="nutrition8" checked>
                        <label for="nutrition8"></label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Wellness Section -->
        <div class="todo-section" data-category="wellness">
            <div class="section-header">
                <h3>🧘 Wellness & Mental Health</h3>
                <span class="section-progress">3/5 completed</span>
            </div>
            <div class="todo-list">
                <div class="todo-item completed">
                    <div class="todo-content">
                        <h4>🧘‍♀️ Morning Meditation</h4>
                        <p>Meditasi mindfulness 15 menit</p>
                        <div class="task-meta">
                            <span class="duration">15 menit</span>
                            <span class="app">Headspace App</span>
                        </div>
                    </div>
                    <div class="todo-checkbox">
                        <input type="checkbox" id="wellness1" checked>
                        <label for="wellness1"></label>
                    </div>
                </div>
                <div class="todo-item">
                    <div class="todo-content">
                        <h4>📖 Reading Time</h4>
                        <p>Baca buku pengembangan diri</p>
                        <div class="task-meta">
                            <span class="duration">30 menit</span>
                            <span class="book">Atomic Habits</span>
                        </div>
                    </div>
                    <div class="todo-checkbox">
                        <input type="checkbox" id="wellness2">
                        <label for="wellness2"></label>
                    </div>
                </div>
                <div class="todo-item completed">
                    <div class="todo-content">
                        <h4>🎵 Relaxing Music</h4>
                        <p>Dengarkan musik klasik sambil kerja</p>
                        <div class="task-meta">
                            <span class="mood">Stress relief</span>
                            <span class="focus">Produktivitas</span>
                        </div>
                    </div>
                    <div class="todo-checkbox">
                        <input type="checkbox" id="wellness3" checked>
                        <label for="wellness3"></label>
                    </div>
                </div>
                <div class="todo-item">
                    <div class="todo-content">
                        <h4>📝 Gratitude Journal</h4>
                        <p>Tulis 3 hal yang disyukuri hari ini</p>
                        <div class="task-meta">
                            <span class="time">21:00</span>
                            <span class="mindset">Positivity</span>
                        </div>
                    </div>
                    <div class="todo-checkbox">
                        <input type="checkbox" id="wellness4">
                        <label for="wellness4"></label>
                    </div>
                </div>
                <div class="todo-item completed">
                    <div class="todo-content">
                        <h4>🛁 Self-Care Time</h4>
                        <p>Mandi air hangat dengan essential oil</p>
                        <div class="task-meta">
                            <span class="relaxation">Relaksasi</span>
                            <span class="aromatherapy">Aromaterapi</span>
                        </div>
                    </div>
                    <div class="todo-checkbox">
                        <input type="checkbox" id="wellness5" checked>
                        <label for="wellness5"></label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Daily Habits Section -->
        <div class="todo-section" data-category="habit">
            <div class="section-header">
                <h3>💧 Kebiasaan Harian</h3>
                <span class="section-progress">4/5 completed</span>
            </div>
            <div class="todo-list">
                <div class="todo-item completed">
                    <div class="todo-content">
                        <h4>💧 Hydration Tracking</h4>
                        <p>Minum air putih minimal 8 gelas</p>
                        <div class="task-meta">
                            <span class="progress-text">8/8 gelas ✅</span>
                            <span class="achievement">Target tercapai!</span>
                        </div>
                    </div>
                    <div class="todo-checkbox">
                        <input type="checkbox" id="habit1" checked>
                        <label for="habit1"></label>
                    </div>
                </div>
                <div class="todo-item completed">
                    <div class="todo-content">
                        <h4>😴 Sleep Schedule</h4>
                        <p>Tidur sebelum jam 23:00</p>
                        <div class="task-meta">
                            <span class="target">8 jam tidur</span>
                            <span class="quality">Kualitas tidur</span>
                        </div>
                    </div>
                    <div class="todo-checkbox">
                        <input type="checkbox" id="habit2" checked>
                        <label for="habit2"></label>
                    </div>
                </div>
                <div class="todo-item completed">
                    <div class="todo-content">
                        <h4>📱 Digital Detox</h4>
                        <p>Tidak main HP 1 jam sebelum tidur</p>
                        <div class="task-meta">
                            <span class="wellness">Mental health</span>
                            <span time="22:00-23:00">Screen free</span>
                        </div>
                    </div>
                    <div class="todo-checkbox">
                        <input type="checkbox" id="habit3" checked>
                        <label for="habit3"></label>
                    </div>
                </div>
                <div class="todo-item">
                    <div class="todo-content">
                        <h4>🌅 Early Morning Routine</h4>
                        <p>Bangun jam 6 pagi setiap hari</p>
                        <div class="task-meta">
                            <span class="consistency">Konsistensi</span>
                            <span class="energy">More energy</span>
                        </div>
                    </div>
                    <div class="todo-checkbox">
                        <input type="checkbox" id="habit4">
                        <label for="habit4"></label>
                    </div>
                </div>
                <div class="todo-item completed">
                    <div class="todo-content">
                        <h4>🚗 Active Commute</h4>
                        <p>Naik tangga instead of lift</p>
                        <div class="task-meta">
                            <span class="steps">Extra steps</span>
                            <span class="cardio">Mini cardio</span>
                        </div>
                    </div>
                    <div class="todo-checkbox">
                        <input type="checkbox" id="habit5" checked>
                        <label for="habit5"></label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Weekly Goals -->
    <div class="weekly-goals">
        <div class="section-header">
            <h3>🎯 Target Mingguan</h3>
            <span class="week-period">1 - 7 Juni 2025</span>
        </div>
        <div class="goals-grid">
            <div class="goal-card">
                <div class="goal-icon">🏃‍♂️</div>
                <div class="goal-content">
                    <h4>Olahraga Rutin</h4>
                    <p>5 hari workout dalam seminggu</p>
                    <div class="goal-progress">
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 80%"></div>
                        </div>
                        <span>4/5 hari</span>
                    </div>
                </div>
            </div>
            <div class="goal-card">
                <div class="goal-icon">🥗</div>
                <div class="goal-content">
                    <h4>Nutrisi Seimbang</h4>
                    <p>Makan sayur setiap hari</p>
                    <div class="goal-progress">
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 100%"></div>
                        </div>
                        <span>7/7 hari ✅</span>
                    </div>
                </div>
            </div>
            <div class="goal-card">
                <div class="goal-icon">💧</div>
                <div class="goal-content">
                    <h4>Hidrasi Optimal</h4>
                    <p>8 gelas air setiap hari</p>
                    <div class="goal-progress">
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 85%"></div>
                        </div>
                        <span>6/7 hari</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Adding New Task -->
<div class="modal fade" id="addTaskModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">➕ Tambah Task Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="addTaskForm">
                    <div class="mb-3">
                        <label class="form-label">Judul Task</label>
                        <input type="text" class="form-control" placeholder="Masukkan judul task...">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" rows="3" placeholder="Deskripsi task (opsional)..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select class="form-select">
                            <option value="workout">🏋️‍♂️ Olahraga</option>
                            <option value="nutrition">🥗 Nutrisi</option>
                            <option value="wellness">🧘 Wellness</option>
                            <option value="habit">💧 Kebiasaan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Prioritas</label>
                        <select class="form-select">
                            <option value="low">Rendah</option>
                            <option value="medium">Sedang</option>
                            <option value="high">Tinggi</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Waktu (Opsional)</label>
                        <input type="time" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Simpan Task</button>
            </div>
        </div>
    </div>
</div>

<script>
// Filter functionality
document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        // Remove active class from all buttons
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        // Add active class to clicked button
        this.classList.add('active');

        const filter = this.dataset.filter;
        const sections = document.querySelectorAll('.todo-section');
        const items = document.querySelectorAll('.todo-item');

        if (filter === 'all') {
            sections.forEach(section => section.style.display = 'block');
            items.forEach(item => item.style.display = 'flex');
        } else if (filter === 'completed') {
            sections.forEach(section => section.style.display = 'block');
            items.forEach(item => {
                item.style.display = item.classList.contains('completed') ? 'flex' : 'none';
            });
        } else {
            sections.forEach(section => {
                section.style.display = section.dataset.category === filter ? 'block' : 'none';
            });
        }
    });
});

// Checkbox functionality
document.querySelectorAll('.todo-checkbox input').forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        const todoItem = this.closest('.todo-item');
        if (this.checked) {
            todoItem.classList.add('completed');
        } else {
            todoItem.classList.remove('completed');
        }
        updateProgress();
    });
});

// Update progress
function updateProgress() {
    const totalTasks = document.querySelectorAll('.todo-item').length;
    const completedTasks = document.querySelectorAll('.todo-item.completed').length;
    const percentage = Math.round((completedTasks / totalTasks) * 100);

    document.querySelector('.progress-text').textContent = percentage + '%';
    const circumference = 157;
    const offset = circumference - (percentage / 100) * circumference;
    document.querySelector('.progress-ring').style.strokeDashoffset = offset;
}

// Initialize progress
updateProgress();
</script>
@endsection
