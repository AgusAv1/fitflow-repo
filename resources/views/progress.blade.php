@extends('layouts.app')

@section('title', 'Jadwal Harian')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header -->
    <div class="text-center mb-6">
        <h1 class="text-3xl font-bold text-purple-700">📊 Tracking Progress</h1>
        <p class="text-gray-600">Pantau perkembangan kesehatan dan kebugaran Anda</p>
        <a href="{{ route('dashboard') }}" class="text-sm text-blue-500 hover:underline">← Kembali ke Dashboard</a>
    </div>

    <!-- Weekly Selector -->
    <div class="text-center mb-6">
        <input type="week" id="weekSelector" class="border rounded px-4 py-2 shadow-md" placeholder="Pilih Minggu">
    </div>

    <!-- Workout Form -->
    <form method="POST" action="{{ route('progress') }}">
        <h2 class="text-2xl font-semibold mb-4"> 🏋️ Workout Progress</h2>
        @csrf
        @foreach(['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'] as $day)
        <div class="mb-6 border rounded-lg p-4 shadow-md bg-white">
            <div class="flex items-center space-x-2 mb-3">
                <input type="checkbox" name="days[]" value="{{ $day }}" id="{{ $day }}" class="form-checkbox h-5 w-5 text-purple-600">
                <label for="{{ $day }}" class="text-lg font-semibold">{{ $day }}</label>
            </div>

            <div class="mb-3">
                <label class="block text-sm font-medium">Workout Type:</label>
                <select name="type[{{ $day }}]" class="w-full mt-1 border rounded px-3 py-2">
                    <option value="Cardio">Cardio</option>
                    <option value="Strength">Strength</option>
                    <option value="Yoga">Yoga</option>
                    <option value="Stretching">Stretching</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium">Duration (minutes):</label>
                <input type="number" name="duration[{{ $day }}]" min="0" value="0" class="w-full mt-1 border rounded px-3 py-2">
            </div>
        </div>
        @endforeach
        <div class="text-center">
            <button type="submit" class="bg-purple-600 text-black px-6 py-2 rounded shadow hover:bg-purple-700">
                Simpan Progress
            </button>
        </div>
    </form>

    <!-- Progress Summary -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-10">
        <div class="bg-gradient-to-br from-indigo-100 to-purple-100 text-black p-6 rounded-lg text-center shadow">
            <div class="text-3xl font-bold">{{ $totalWorkouts ?? 0 }}</div>
            <div class="mt-2">Total Workouts</div>
        </div>
        <div class="bg-gradient-to-br from-indigo-100 to-purple-100 text-black p-6 rounded-lg text-center shadow">
            <div class="text-3xl font-bold">{{ $totalMinutes ?? 0 }}</div>
            <div class="mt-2">Total Minutes</div>
        </div>
        <div class="bg-gradient-to-br from-indigo-100 to-purple-100 text-black p-6 rounded-lg text-center shadow">
            <div class="text-3xl font-bold">{{ $consistencyRate ?? '0%' }}</div>
            <div class="mt-2">Consistency Rate</div>
        </div>
    </div>

    <!-- Healthy Eating Section -->
    <div class="section mt-10">
        <h2 class="text-2xl font-semibold mb-4">🥗 Healthy Eating Tracker</h2>

        @foreach(['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'] as $day)
        <div class="border rounded-lg shadow-md p-4 mb-6 bg-white">
            <h3 class="text-xl font-semibold mb-4">{{ $day }}</h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium mb-1">Breakfast:</label>
                    <input type="text" name="meals[{{ $day }}][breakfast]" class="w-full border rounded px-3 py-2" placeholder="Healthy breakfast">
                </div>

                <div>
                    <label class="block font-medium mb-1">Lunch:</label>
                    <input type="text" name="meals[{{ $day }}][lunch]" class="w-full border rounded px-3 py-2" placeholder="Healthy lunch">
                </div>

                <div>
                    <label class="block font-medium mb-1">Dinner:</label>
                    <input type="text" name="meals[{{ $day }}][dinner]" class="w-full border rounded px-3 py-2" placeholder="Healthy dinner">
                </div>

                <div>
                    <label class="block font-medium mb-1">Water (glasses):</label>
                    <input type="number" min="0" name="meals[{{ $day }}][water]" class="w-full border rounded px-3 py-2" placeholder="8">
                </div>
            </div>
        </div>
        @endforeach

        <!-- Weekly Notes -->
        <div class="mb-6">
            <label class="block font-medium mb-1">Weekly Nutrition Notes:</label>
            <textarea name="nutrition_notes" class="w-full border rounded px-3 py-2" rows="4" placeholder="Catatan makanan sehat mingguan, tantangan, resep baru, dll."></textarea>
        </div>
    </div>
</div>
@endsection
