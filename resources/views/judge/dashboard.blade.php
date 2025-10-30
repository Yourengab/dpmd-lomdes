<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Juri - DPMD Lomdes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center mr-3">
                        <i class="fas fa-gavel text-white"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-gray-800">DPMD Lomdes</h1>
                        <p class="text-sm text-gray-600">Panel Juri</p>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4">
                    <div class="text-right">
                        <p class="text-gray-700 font-medium">{{ Auth::guard('judge')->user()->name }}</p>
                        <p class="text-sm text-gray-500">{{ Auth::guard('judge')->user()->position ?? 'Juri' }}</p>
                    </div>
                    <form method="POST" action="{{ route('judge.logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition duration-200">
                            <i class="fas fa-sign-out-alt mr-2"></i>Keluar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 py-8">
        <!-- Welcome Card -->
        <div class="bg-gradient-to-r from-green-600 to-emerald-600 rounded-xl text-white p-6 mb-8">
            <h2 class="text-2xl font-bold mb-2">Selamat Datang, {{ Auth::guard('judge')->user()->name }}</h2>
            <p class="text-green-100">Panel Juri - Penilaian Lomba Desa & Kelurahan</p>
            @if(Auth::guard('judge')->user()->indicator_assigned)
                <p class="text-green-100 mt-2">
                    <i class="fas fa-clipboard-list mr-2"></i>
                    Indikator Ditugaskan: <strong>{{ Auth::guard('judge')->user()->indicator_assigned }}</strong>
                </p>
            @endif
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-star text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Masukan Nilai</h3>
                    <p class="text-gray-600 text-sm mb-4">Nilai Desa/Kelurahan</p>
                    <a href="{{ route('judge.scoring') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition duration-200">
                        Mulai Penilaian
                    </a>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="text-center">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-calendar text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Jadwal Pemaparan</h3>
                    <p class="text-gray-600 text-sm mb-4">Lihat jadwal pemaparan peserta</p>
                    <a href="{{ route('judge.schedule') }}" class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg transition duration-200">
                        Lihat Jadwal Pemaparan
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-file-excel text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Spreadsheet Peserta</h3>
                    <p class="text-gray-600 text-sm mb-4">Lihat spreadsheet peserta terbaru</p>
                        @if (!empty($sheetLink))
                            <a href="{{ $sheetLink }}" target="_blank" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition duration-200">
                                Lihat Spreadsheet
                            </a>
                        @else
                            <button class="bg-gray-400 text-white px-4 py-2 rounded-lg cursor-not-allowed" disabled>
                                Belum ada sheet peserta
                            </button>
                        @endif
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="mt-8 bg-white rounded-xl shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">
                <i class="fas fa-clock mr-2"></i>Aktivitas Terbaru
            </h3>
            <div class="text-center py-8 text-gray-500">
                <i class="fas fa-history text-4xl text-gray-300 mb-4"></i>
                <p>Tidak ada aktivitas terbaru</p>
                <p class="text-sm">Riwayat penilaian dan aktivitas Anda akan muncul di sini</p>
            </div>
        </div>
    </div>
</body>
</html>
