@extends('layouts.app')

@section('title', 'Dashboard')

{{-- Link ke file CSS terpisah --}}
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

@section('content')
<div class="container">
    <!-- Header Dashboard -->
    <div class="dashboard-header">
        <div class="header-content">
            <div class="welcome-section">
                <h1>Dashboard FitFlow</h1>
                <p>Selamat datang kembali! Mari lanjutkan perjalanan sehat Anda hari ini.</p>
            </div>
            <div class="header-mascot">
                <div class="mascot-icon">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2L13.09 8.26L22 9L13.09 9.74L12 16L10.91 9.74L2 9L10.91 8.26L12 2Z" fill="white"/>
                        <circle cx="12" cy="12" r="8" stroke="white" stroke-width="2" fill="none" opacity="0.6"/>
                        <path d="M8 12h8M12 8v8" stroke="white" stroke-width="2" opacity="0.8"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="quick-stats">
        <div class="section-header">
            <h3>Today's Activity</h3>
            <a href="#" class="see-all">See all</a>
        </div>
        <div class="stats-grid">
            <div class="stat-card calories">
                <div class="stat-icon">🔥</div>
                <div class="stat-content">
                    <h4>Kalori Target</h4>
                    <p>1800 <span>/ 2000 kcal</span></p>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 90%"></div>
                    </div>
                    <small>Sisa 200 kcal</small>
                </div>
            </div>
            <div class="stat-card workout">
                <div class="stat-icon">💪</div>
                <div class="stat-content">
                    <h4>Workout</h4>
                    <p>2 <span>/ 3 sesi</span></p>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 67%"></div>
                    </div>
                    <small>1 sesi tersisa</small>
                </div>
            </div>
            <div class="stat-card water">
                <div class="stat-icon">💧</div>
                <div class="stat-content">
                    <h4>Air Minum</h4>
                    <p>6 <span>/ 8 gelas</span></p>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 75%"></div>
                    </div>
                    <small>2 gelas lagi</small>
                </div>
            </div>
            <div class="stat-card steps">
                <div class="stat-icon">👟</div>
                <div class="stat-content">
                    <h4>Langkah Kaki</h4>
                    <p>7,850 <span>langkah</span></p>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 78%"></div>
                    </div>
                    <small>Target: 10,000</small>
                </div>
            </div>
        </div>
    </div>

     <!-- Main Features Grid -->
    <div class="main-features">
        <div class="features-grid">
            <!-- To-Do List Section -->
            <div class="feature-section todo-section">
                <div class="section-header">
                    <h3>To-Do List</h3>
                    <a href="{{ route('todolist') }}" class="see-all">See all</a>
                </div>
                <div class="todo-list">
                    <div class="todo-item">
                        <div class="todo-content">
                            <h4> Morning Workout</h4>
                            <p>🏃Lari</p>
                        </div>
                        <div class="todo-checkbox">
                            <input type="checkbox" id="workout1">
                            <label for="workout1"></label>
                        </div>
                    </div>
                    <div class="todo-item">
                        <div class="todo-content">
                            <h4> 🥗 Oatmeal Buah Segar</h4>
                            <p>Healthy Breakfast</p>
                        </div>
                        <div class="todo-checkbox">
                            <input type="checkbox" id="breakfast1">
                            <label for="breakfast1"></label>
                        </div>
                    </div>
                    <div class="todo-item">
                        <div class="todo-content">
                            <h4>💧 Minum Air Putih</h4>
                            <p>Sehari minimal 8 gelas</p>
                        </div>
                        <div class="todo-checkbox">
                            <input type="checkbox" id="water1">
                            <label for="water1"></label>
                        </div>
                    </div>
                    <div class="todo-item">
                        <div class="todo-content">
                            <h4>🧘 Yoga Class</h4>
                            <p>With Rachael Wisdom</p>
                        </div>
                        <div class="todo-checkbox">
                            <input type="checkbox" id="yoga1">
                            <label for="yoga1"></label>
                        </div>
                    </div>
                    <div class="todo-item">
                        <div class="todo-content">
                            <h4>🍗 Chicken Caesar Salad</h4>
                            <p>Healthy Lunch Box</p>
                        </div>
                        <div class="todo-checkbox">
                            <input type="checkbox" id="meal1">
                            <label for="meal1"></label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Workouts Section -->
            <div class="feature-section workouts-section">
                <h3>Workouts</h3>
                <div class="workout-tabs">
                    <button class="tab-btn active">Workout Plans</button>
                </div>
                <div class="workout-content">
                    <div class="workout-card">
                        <!-- Card kecil untuk akses workout dan jadwal -->
                        <div class="d-flex flex-column gap-2 mt-3">
                            <a href="{{ route('workout') }}" class="btn btn-outline-success btn-sm">Ke Halaman Workout</a>
                            <a href="{{ route('schedule') }}" class="btn btn-outline-primary btn-sm">Ke Jadwal Olahraga</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <!-- Workouts Section -->
            <div class="feature-section workouts-section">
                <h3>Workouts</h3>
                <div class="workout-tabs">
                    <button class="tab-btn active">Workout Plans</button>
                    <button class="tab-btn">Your Activities</button>
                </div>
                <div class="workout-content">
                    <div class="workout-card">
                        <div class="workout-placeholder">
                            <span>💪</span>
                        </div>
                    </div>
                    <div class="activity-image">
                        <img src="/api/placeholder/200/150" alt="Yoga Activity" class="activity-img">
                    </div>
                </div>
            </div>
        </div>

        <!-- Cooking Section -->
    <div class="cooking-section">
        <div class="cooking-grid">
            <!-- Timer -->
            <div class="cooking-timer">
                <h3>Cooking Timer</h3>
                <div class="timer-card-container">
                    <a href="{{ route('timer') }}" class="timer-card">
                        <div class="timer-placeholder">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="10" stroke="#70A604" stroke-width="2"/>
                                <circle cx="12" cy="12" r="6" stroke="#82c341" stroke-width="2" fill="rgba(112, 166, 4, 0.1)"/>
                                <path d="M12 6v6l4 2" stroke="#70A604" stroke-width="2" stroke-linecap="round"/>
                                <circle cx="12" cy="12" r="1" fill="#70A604"/>
                                <path d="M12 2v2M12 20v2M2 12h2M20 12h2" stroke="#82c341" stroke-width="1.5" opacity="0.7"/>
                            </svg>
                        </div>
                        <h4>Atur Timer</h4>
                    </a>
                </div>
            </div>

            <!-- Recipes -->
            <div class="cooking-recipes">
                <div class="section-header">
                    <h3>Cooking Recipes</h3>
                    <a href="{{ route('recipes.index') }}" class="see-all">See all</a>
                </div>
                <div class="recipes-grid">
                    @foreach($randomRecipes as $recipe)
                    <div class="recipe-card">
                        <a href="{{ route('recipes.detail', $recipe['id']) }}">
                            <img src="{{ $recipe['image'] }}" alt="{{ $recipe['title'] }}" class="recipe-image">
                            <h4>{{ $recipe['title'] }}</h4>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="quick-actions">
        <h3>Aksi Cepat</h3>
        <div class="action-buttons">
            <button class="action-btn add-food">
                <span class="btn-icon">🍎</span>
                <span>Tambah Makanan</span>
            </button>
            <button class="action-btn add-workout">
                <span class="btn-icon">💪</span>
                <span>Catat Workout</span>
            </button>
            <button class="action-btn add-water">
                <span class="btn-icon">💧</span>
                <span>Input Air Minum</span>
            </button>
            <button class="action-btn add-note">
                <span class="btn-icon">📝</span>
                <span>Tulis Catatan</span>
            </button>
        </div>
    </div>

    <!-- Daily Tip -->
    <div class="daily-tip">
        <div class="tip-header">
            <h3>💡 Tips Hari Ini</h3>
        </div>
        <div class="tip-content">
            <p><strong>Hidrasi yang Cukup:</strong> Minum air putih minimal 8 gelas sehari untuk menjaga metabolisme tubuh tetap optimal. Mulailah hari dengan segelas air hangat untuk membangunkan sistem pencernaan.</p>
        </div>
    </div>

</div>
@endsection
