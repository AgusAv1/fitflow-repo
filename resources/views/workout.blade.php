@extends('layouts.workoutlayout')

@section('title', 'Workout')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/workout.css') }}">
@endsection

@section('content')
<div class="container">
    <h1 class="mb-4">🏋️‍♂️ Workout</h1>

    <!-- Kategori Gerakan -->
    <div class="row">
        <div class="col-md-8">
            <h3>Kumpulan Gerakan Olahraga</h3>
            <div class="accordion" id="exerciseCategories">
                @php
                    $categories = ['Back', 'Arms', 'Legs', 'Core', 'Cardio', 'Full Body'];
                    $exercises = [
                        'Back' => [
                            ['name' => 'Superman', 'description' => 'Berbaring tengkurap, angkat tangan dan kaki secara bersamaan.', 'duration' => '3 set x 15 detik'],
                            ['name' => 'Bent Over Rows', 'description' => 'Menggunakan dumbbell atau berat badan.', 'duration' => '3 set x 12 repetisi'],
                        ],
                        'Arms' => [
                            ['name' => 'Push Up', 'description' => 'Latihan kekuatan lengan dan dada.', 'duration' => '3 set x 15 repetisi'],
                            ['name' => 'Tricep Dips', 'description' => 'Menggunakan kursi atau bangku.', 'duration' => '3 set x 12 repetisi'],
                        ],
                        'Legs' => [
                            ['name' => 'Squats', 'description' => 'Latihan kekuatan kaki dan bokong.', 'duration' => '3 set x 20 repetisi'],
                            ['name' => 'Lunges', 'description' => 'Melatih keseimbangan dan kekuatan kaki.', 'duration' => '3 set x 12 repetisi per kaki'],
                        ],
                        'Core' => [
                            ['name' => 'Plank', 'description' => 'Menahan posisi tubuh lurus.', 'duration' => '3 set x 30 detik'],
                            ['name' => 'Russian Twists', 'description' => 'Latihan otot perut samping.', 'duration' => '3 set x 20 repetisi'],
                        ],
                        'Cardio' => [
                            ['name' => 'Jumping Jacks', 'description' => 'Latihan kardio ringan.', 'duration' => '3 set x 50 repetisi'],
                            ['name' => 'Burpees', 'description' => 'Latihan kardio intens.', 'duration' => '3 set x 15 repetisi'],
                        ],
                        'Full Body' => [
                            ['name' => 'Mountain Climbers', 'description' => 'Latihan seluruh tubuh.', 'duration' => '3 set x 30 detik'],
                            ['name' => 'Burpees', 'description' => 'Latihan kardio dan kekuatan.', 'duration' => '3 set x 15 repetisi'],
                        ],
                    ];
                @endphp

                @foreach ($categories as $index => $category)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{ $index }}">
                        <button class="accordion-button {{ $index != 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                            {{ $category }}
                        </button>
                    </h2>
                    <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-bs-parent="#exerciseCategories">
                        <div class="accordion-body">
                            @foreach ($exercises[$category] as $exercise)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $exercise['name'] }}</h5>
                                    <p class="card-text">{{ $exercise['description'] }}</p>
                                    <p><strong>Durasi/Repetisi:</strong> {{ $exercise['duration'] }}</p>
                                    <button class="btn btn-success btn-sm do-now-btn" data-name="{{ $exercise['name'] }}">Lakukan Sekarang</button>
                                    <button class="btn btn-primary btn-sm schedule-btn" data-name="{{ $exercise['name'] }}" data-bs-toggle="modal" data-bs-target="#scheduleModal">Jadwalkan</button>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Workout Hari Ini -->
        <div class="col-md-4">
            <h3>Workout Hari Ini</h3>
            <ul class="list-group" id="todayWorkoutList">
                <!-- List workout yang dipilih akan muncul di sini -->
            </ul>
        </div>
    </div>

    <!-- Modal Jadwalkan -->
    <div class="modal fade" id="scheduleModal" tabindex="-1" aria-labelledby="scheduleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="scheduleForm" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="scheduleModalLabel">Jadwalkan Workout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <p id="selectedExerciseName"></p>
                    <div class="mb-3">
                        <label for="scheduleDate" class="form-label">Pilih Tanggal</label>
                        <input type="date" class="form-control" id="scheduleDate" required />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan Jadwal</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/workout.js') }}"></script>
@endsection
