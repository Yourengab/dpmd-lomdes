<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasbor Admin - DPMD Lomdes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center mr-3">
                        <i class="fas fa-trophy text-white"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-gray-800">DPMD Lomdes</h1>
                        <p class="text-sm text-gray-600">Kompetisi Desa & Kelurahan</p>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700">Selamat datang, {{ Auth::guard('admin')->user()->name }}</span>
                    <form method="POST" action="{{ route('admin.logout') }}" class="inline">
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
        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-xl text-white p-6 mb-8">
            <h2 class="text-2xl font-bold mb-2">Selamat datang di Dasbor Admin</h2>
            <p class="text-blue-100">Kelola Kompetisi Desa & Kelurahan untuk Provinsi Bali</p>
        </div>
        <!-- Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="text-center">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-search-location text-orange-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Jadwal Klarifikasi Lapangan</h3>
                    <p class="text-gray-600 text-sm mb-4">Lihat, tambah, sunting, dan hapus jadwal klarifikasi lapangan (desa/kelurahan)</p>
                    <a href="{{ route('admin.clarifications.index') }}" class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded-lg transition duration-200 inline-block">
                        Kelola Jadwal Klarifikasi
                    </a>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="text-center">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-plus text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Kelola Juri</h3>
                    <p class="text-gray-600 text-sm mb-4">Tambah, sunting, atau hapus juri dari sistem</p>
                    <a href="{{ route('admin.judges.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-200 inline-block">
                        Kelola Juri
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-calendar-plus text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Kelola Jadwal</h3>
                    <p class="text-gray-600 text-sm mb-4">Atur jadwal presentasi dan verifikasi</p>
                    <a href="{{ route('admin.schedules.index') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition duration-200 inline-block">
                        Kelola Jadwal
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="text-center">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-file-alt text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Kelola Dokumen</h3>
                    <p class="text-gray-600 text-sm mb-4">Unggah dan kelola dokumen kompetisi</p>
                    <a href="{{ route('admin.documents.index') }}" class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg transition duration-200">
                        Lihat Dokumen
                    </a>
                </div>

                
            </div>

            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="text-center">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-clipboard-list text-yellow-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Spreadsheet Penilaian</h3>
                    <p class="text-gray-600 text-sm mb-4">Kelola spreadsheet penilaian dan untuk tim penilai</p>
                    <a href="{{ route('admin.scoring-templates.index') }}" class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded-lg transition duration-200">
                        Kelola Template
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-file-excel text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Spreadsheet Peserta</h3>
                    <p class="text-gray-600 text-sm mb-4">Tambahkan dan kelola tautan spreadsheet peserta</p>
                    <a href="{{ route('admin.participants.index') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition duration-200">
                        Kelola Spreadsheet
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="text-center">
                    <div class="w-16 h-16 bg-teal-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-video text-teal-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Pengiriman Video</h3>
                    <p class="text-gray-600 text-sm mb-4">Kelola tautan pengiriman video peserta</p>
                    <a href="{{ route('admin.video-submissions.index') }}" class="bg-teal-600 hover:bg-teal-700 text-white px-4 py-2 rounded-lg transition duration-200">
                        Kelola Video
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
