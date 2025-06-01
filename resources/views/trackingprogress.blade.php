@extends('layouts.app')

@section('title', 'Progress Tracking')

@section('content')
<div class="container">
    <!-- Header -->
    <div class="page-header">
        <h1>📊 Progress Tracking</h1>
        <p>Pantau perkembangan kesehatan dan kebugaran Anda</p>
        <a href="{{ route('dashboard') }}" class="back-link">← Kembali ke Dashboard</a>
    </div>

    <!-- Progress Overview -->
    <div class="progress-overview">
        <h3>🎯 Target & Pencapaian</h3>
        <div class="overview-grid">
            <div class="overview-card">
                <h4>Berat Badan</h4>
                <div class="progress-data">
                    <span class="current">68 kg</span>
                    <span class="target">/ 65 kg target</span>
                </div>
                <div class="progress-bar">
                    <div class="progress-fill" style="width: 75%"></div>
                </div>
                <span class="progress-text">-3 kg dari target</span>
            </div>

            <div class="overview-card">
                <h4>BMI</h4>
                <div class="progress-data">
                    <span class="current">22.4</span>
                    <span class="target">/ 21.5 target</span>
                </div>
                <div class="progress-bar">
                    <div class="progress-fill" style="width: 85%"></div>
                </div>
                <span class="progress-text">Normal - Sehat</span>
            </div>

            <div class="overview-card">
                <h4>Body Fat</h4>
                <div class="progress-data">
                    <span class="current">18%</span>
                    <span class="target">/ 15% target</span>
                </div>
                <div class="progress-bar">
                    <div class="progress-fill" style="width: 70%"></div>
                </div>
                <span class="progress-text">-3% lagi</span>
            </div>

            <div class="overview-card">
                <h4>Muscle Mass</h4>
                <div class="progress-data">
                    <span class="current">52 kg</span>
                    <span class="target">/ 55 kg target</span>
                </div>
                <div class="progress-bar">
                    <div class="progress-fill" style="width: 65%"></div>
                </div>
                <span class="progress-text">+3 kg lagi</span>
            </div>
        </div>
    </div>

    <!-- Recent Measurements -->
    <div class="recent-measurements">
        <h3>📏 Pengukuran Terbaru</h3>
        <div class="measurement-card">
            <div class="measurement-date">Senin, 26 Mei 2025</div>
            <div class="measurements-grid">
                <div class="measurement-item">
                    <span class="measurement-label">Berat Badan</span>
                    <span class="measurement-value">68.2 kg</span>
                    <span class="measurement-change down">-0.3 kg</span>
                </div>
                <div class="measurement-item">
                    <span class="measurement-label">Lingkar Pinggang</span>
                    <span class="measurement-value">75 cm</span>
                    <span class="measurement-change down">-1 cm</span>
                </div>
                <div class="measurement-item">
                    <span class="measurement-label">Lingkar Lengan</span>
                    <span class="measurement-value">32 cm</span>
                    <span class="measurement-change up">+0.5 cm</span>
                </div>
                <div class="measurement-item">
                    <span class="measurement-label">Lingkar Dada</span>
                    <span class="measurement-value">92 cm</span>
                    <span class="measurement-change up">+1 cm</span>
                </div>
            </div>
            <button class="add-measurement-btn">➕ Tambah Peng
