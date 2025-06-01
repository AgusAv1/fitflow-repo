// JavaScript untuk halaman Workout
// Mengelola daftar workout hari ini dan jadwal workout

document.addEventListener('DOMContentLoaded', () => {
    const todayWorkoutList = document.getElementById('todayWorkoutList');
    const doNowButtons = document.querySelectorAll('.do-now-btn');
    const scheduleButtons = document.querySelectorAll('.schedule-btn');
    const scheduleModal = new bootstrap.Modal(document.getElementById('scheduleModal'));
    const selectedExerciseName = document.getElementById('selectedExerciseName');
    const scheduleForm = document.getElementById('scheduleForm');
    const scheduleDateInput = document.getElementById('scheduleDate');

    let todayWorkouts = [];

    // Fungsi untuk render daftar workout hari ini
    function renderTodayWorkouts() {
        todayWorkoutList.innerHTML = '';
        if (todayWorkouts.length === 0) {
            todayWorkoutList.innerHTML = '<li class="list-group-item">Belum ada workout hari ini.</li>';
            return;
        }
        todayWorkouts.forEach((workout, index) => {
            const li = document.createElement('li');
            li.className = 'list-group-item d-flex justify-content-between align-items-center';
            li.textContent = workout;
            const removeBtn = document.createElement('button');
            removeBtn.className = 'btn btn-danger btn-sm';
            removeBtn.textContent = 'Hapus';
            removeBtn.addEventListener('click', () => {
                todayWorkouts.splice(index, 1);
                renderTodayWorkouts();
            });
            li.appendChild(removeBtn);
            todayWorkoutList.appendChild(li);
        });
    }

    // Event untuk tombol "Lakukan Sekarang"
    doNowButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const exerciseName = btn.getAttribute('data-name');
            if (!todayWorkouts.includes(exerciseName)) {
                todayWorkouts.push(exerciseName);
                renderTodayWorkouts();
            }
        });
    });

    // Event untuk tombol "Jadwalkan"
    scheduleButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const exerciseName = btn.getAttribute('data-name');
            selectedExerciseName.textContent = `Jadwalkan: ${exerciseName}`;
            scheduleForm.setAttribute('data-exercise', exerciseName);
            scheduleDateInput.value = '';
            scheduleModal.show();
        });
    });

    // Event submit form jadwal
    scheduleForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const exerciseName = scheduleForm.getAttribute('data-exercise');
        const date = scheduleDateInput.value;
        if (!date) {
            alert('Silakan pilih tanggal.');
            return;
        }
        // Simpan jadwal ke localStorage (atau bisa ke backend)
        let schedules = JSON.parse(localStorage.getItem('workoutSchedules') || '{}');
        if (!schedules[date]) {
            schedules[date] = [];
        }
        if (!schedules[date].includes(exerciseName)) {
            schedules[date].push(exerciseName);
            localStorage.setItem('workoutSchedules', JSON.stringify(schedules));
            alert(`Workout "${exerciseName}" dijadwalkan pada ${date}`);
        } else {
            alert('Workout sudah dijadwalkan pada tanggal tersebut.');
        }
        scheduleModal.hide();
    });

    // Render awal
    renderTodayWorkouts();
});
