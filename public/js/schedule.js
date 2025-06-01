// JavaScript untuk halaman Jadwal Olahraga
// Mengelola kalender interaktif, jadwal workout, dan notifikasi pengingat

document.addEventListener('DOMContentLoaded', () => {
    const calendarEl = document.getElementById('calendar');
    const scheduleModal = new bootstrap.Modal(document.getElementById('scheduleModal'));
    const modalDateEl = document.getElementById('modalDate');
    const scheduledWorkoutsList = document.getElementById('scheduledWorkoutsList');
    const addWorkoutSelect = document.getElementById('addWorkoutSelect');
    const addWorkoutBtn = document.getElementById('addWorkoutBtn');
    const markDoneCheckbox = document.getElementById('markDoneCheckbox');
    const reminderTimeInput = document.getElementById('reminderTime');
    const scheduleForm = document.getElementById('scheduleForm');

    // Data latihan yang sama dengan workout.js (bisa dioptimalkan dengan API/backend)
    const exercises = [
        'Superman', 'Bent Over Rows', 'Push Up', 'Tricep Dips',
        'Squats', 'Lunges', 'Plank', 'Russian Twists',
        'Jumping Jacks', 'Burpees', 'Mountain Climbers'
    ];

    // Simpan jadwal dan status di localStorage
    let workoutSchedules = JSON.parse(localStorage.getItem('workoutSchedules') || '{}');
    let workoutStatus = JSON.parse(localStorage.getItem('workoutStatus') || '{}');
    let workoutReminders = JSON.parse(localStorage.getItem('workoutReminders') || '{}');

    let selectedDate = null;

    // Fungsi untuk generate kalender bulan ini
    function generateCalendar() {
        calendarEl.innerHTML = '';
        const today = new Date();
        const year = today.getFullYear();
        const month = today.getMonth();

        // Dapatkan jumlah hari dalam bulan ini
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        for (let day = 1; day <= daysInMonth; day++) {
            const dateStr = formatDate(year, month + 1, day);
            const dayEl = document.createElement('div');
            dayEl.className = 'calendar-day';
            dayEl.textContent = day;

            // Tandai jika ada workout belum selesai
            if (workoutSchedules[dateStr] && workoutSchedules[dateStr].length > 0) {
                const incomplete = workoutSchedules[dateStr].some(w => !workoutStatus[dateStr] || !workoutStatus[dateStr][w]);
                if (incomplete) {
                    const badge = document.createElement('span');
                    badge.className = 'badge';
                    dayEl.appendChild(badge);
                }
            }

            dayEl.addEventListener('click', () => {
                selectedDate = dateStr;
                openScheduleModal(dateStr);
            });

            calendarEl.appendChild(dayEl);
        }
    }

    // Format tanggal ke yyyy-mm-dd
    function formatDate(year, month, day) {
        return `${year}-${String(month).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
    }

    // Buka modal jadwal untuk tanggal tertentu
    function openScheduleModal(dateStr) {
        modalDateEl.textContent = dateStr;
        renderScheduledWorkouts(dateStr);
        markDoneCheckbox.checked = areAllWorkoutsDone(dateStr);
        reminderTimeInput.value = workoutReminders[dateStr] || '';
        scheduleModal.show();
    }

    // Render daftar workout terjadwal untuk tanggal
    function renderScheduledWorkouts(dateStr) {
        scheduledWorkoutsList.innerHTML = '';
        const workouts = workoutSchedules[dateStr] || [];
        if (workouts.length === 0) {
            scheduledWorkoutsList.innerHTML = '<li class="list-group-item">Belum ada workout terjadwal.</li>';
            return;
        }
        workouts.forEach(workout => {
            const li = document.createElement('li');
            li.className = 'list-group-item d-flex justify-content-between align-items-center';
            li.textContent = workout;

            const checkbox = document.createElement('input');
            checkbox.type = 'checkbox';
            checkbox.className = 'form-check-input ms-2';
            checkbox.checked = workoutStatus[dateStr] && workoutStatus[dateStr][workout];
            checkbox.addEventListener('change', () => {
                if (!workoutStatus[dateStr]) workoutStatus[dateStr] = {};
                workoutStatus[dateStr][workout] = checkbox.checked;
                localStorage.setItem('workoutStatus', JSON.stringify(workoutStatus));
                markDoneCheckbox.checked = areAllWorkoutsDone(dateStr);
                generateCalendar();
            });

            li.appendChild(checkbox);
            scheduledWorkoutsList.appendChild(li);
        });
    }

    // Cek apakah semua workout sudah selesai
    function areAllWorkoutsDone(dateStr) {
        const workouts = workoutSchedules[dateStr] || [];
        if (workouts.length === 0) return false;
        return workouts.every(w => workoutStatus[dateStr] && workoutStatus[dateStr][w]);
    }

    // Tambah workout baru ke jadwal
    function addWorkoutToSchedule() {
        const workout = addWorkoutSelect.value;
        if (!workout) return;
        if (!workoutSchedules[selectedDate]) workoutSchedules[selectedDate] = [];
        if (!workoutSchedules[selectedDate].includes(workout)) {
            workoutSchedules[selectedDate].push(workout);
            localStorage.setItem('workoutSchedules', JSON.stringify(workoutSchedules));
            renderScheduledWorkouts(selectedDate);
            generateCalendar();
        } else {
            alert('Workout sudah terjadwal pada tanggal ini.');
        }
    }

    // Event tambah workout
    addWorkoutBtn.addEventListener('click', addWorkoutToSchedule);

    // Event checkbox tandai semua selesai
    markDoneCheckbox.addEventListener('change', () => {
        if (!workoutStatus[selectedDate]) workoutStatus[selectedDate] = {};
        const workouts = workoutSchedules[selectedDate] || [];
        workouts.forEach(w => {
            workoutStatus[selectedDate][w] = markDoneCheckbox.checked;
        });
        localStorage.setItem('workoutStatus', JSON.stringify(workoutStatus));
        renderScheduledWorkouts(selectedDate);
        generateCalendar();
    });

    // Event simpan form jadwal
    scheduleForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const reminderTime = reminderTimeInput.value;
        if (reminderTime) {
            workoutReminders[selectedDate] = reminderTime;
            localStorage.setItem('workoutReminders', JSON.stringify(workoutReminders));
            alert('Waktu notifikasi pengingat disimpan.');
        }
        scheduleModal.hide();
    });

    // Inisialisasi opsi select workout
    function initWorkoutOptions() {
        exercises.forEach(exercise => {
            const option = document.createElement('option');
            option.value = exercise;
            option.textContent = exercise;
            addWorkoutSelect.appendChild(option);
        });
    }

    // Inisialisasi
    initWorkoutOptions();
    generateCalendar();
});
