@extends('layouts.schedulelayout')

@section('title', 'Jadwal Olahraga')

@section('styles')
<!-- Tambahkan CSS khusus jika diperlukan -->
<style>
    /* Kalender sederhana */
    .calendar {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 10px;
        margin-bottom: 20px;
    }
    .calendar-day {
        padding: 10px;
        background: #f8fafc;
        border-radius: 8px;
        text-align: center;
        cursor: pointer;
        position: relative;
        border: 1px solid #ddd;
    }
    .calendar-day:hover {
        background: #e2e8f0;
    }
    .calendar-day.active {
        background: #70A604;
        color: white;
        font-weight: bold;
    }
    .calendar-day .badge {
        position: absolute;
        top: 5px;
        right: 5px;
        width: 10px;
        height: 10px;
        background: #dc3545;
        border-radius: 50%;
    }
</style>
@endsection

@section('content')
<div class="container">
    <h1 class="mb-4">📅 Jadwal Olahraga</h1>

    <!-- Kalender -->
    <div class="calendar" id="calendar">
        <!-- Hari-hari kalender akan di-generate oleh JS -->
    </div>

    <!-- Modal Jadwal -->
    <div class="modal fade" id="scheduleModal" tabindex="-1" aria-labelledby="scheduleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="scheduleForm" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="scheduleModalLabel">Jadwal untuk <span id="modalDate"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <h6>Olahraga Terjadwal</h6>
                    <ul class="list-group mb-3" id="scheduledWorkoutsList">
                        <!-- List olahraga terjadwal akan muncul di sini -->
                    </ul>

                    <h6>Tambah Olahraga Baru</h6>
                    <select class="form-select mb-3" id="addWorkoutSelect">
                        <!-- Opsi olahraga akan diisi oleh JS -->
                    </select>

                    <button type="button" class="btn btn-primary mb-3" id="addWorkoutBtn">Tambah</button>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="markDoneCheckbox" />
                        <label class="form-check-label" for="markDoneCheckbox">
                            Tandai semua olahraga selesai
                        </label>
                    </div>

                    <div class="mt-3">
                        <label for="reminderTime" class="form-label">Waktu Notifikasi Pengingat</label>
                        <input type="time" class="form-control" id="reminderTime" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/schedule.js') }}"></script>
@endsection
