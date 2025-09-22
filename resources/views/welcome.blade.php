<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DPMD Lomdes - Desa & Kelurahan Competition</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    <!-- Header -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center mr-3">
                        <i class="fas fa-trophy text-white text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-gray-800">DPMD Lomdes</h1>
                        <p class="text-sm text-gray-600">Desa & Kelurahan Competition</p>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4">
                    <a href="/admin/login" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-200">
                        <i class="fas fa-user-shield mr-2"></i>Admin Login
                    </a>
                    <a href="/judge/login" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition duration-200">
                        <i class="fas fa-user-shield mr-2"></i>Judge Login
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="max-w-7xl mx-auto px-4 py-16">
        <div class="text-center">
            <div class="w-24 h-24 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-8">
                <i class="fas fa-trophy text-white text-4xl"></i>
            </div>
            <h1 class="text-4xl md:text-6xl font-bold text-gray-800 mb-6">
                Lomba Desa & Kelurahan 2026
            </h1>
            <p class="text-xl text-gray-600 mb-8 max-w-3xl mx-auto">
                Sistem Informasi Lomba Desa dan Kelurahan Provinsi Bali - Portal resmi untuk peserta, juri, dan administrator
            </p>
            <a href="{{ route('register.index') }}" class="inline-block bg-green-600 hover:bg-green-700 text-white px-8 py-4 rounded-lg font-semibold text-lg transition duration-200 mb-8">
                <i class="fas fa-user-plus mr-2"></i>Daftar Sekarang
            </a>
            
            <!-- Quick Links -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-calendar text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Jadwal Pemaparan</h3>
                    <p class="text-gray-600 text-sm mb-4">Lihat jadwal presentasi <strong>khusus 3 besar</strong></p>
                    <a href="{{ route('schedules.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-200 inline-block">
                        Lihat Jadwal
                    </a>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-trophy text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Klarifikasi Lapangan</h3>
                    <p class="text-gray-600 text-sm mb-4">Lihat jadwal klarifikasi lapangan  <strong>khusus 3 besar</strong></p>
                    <a href="{{ route('schedules.index') }}" class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg transition duration-200 inline-block">
                        Lihat Jadwal
                    </a>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-video text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Video Submission</h3>
                    <p class="text-gray-600 text-sm mb-4">Link untuk mengumpulkan video presentasi</p>
                    <a href="{{ route('video-submissions.index') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition duration-200 inline-block">
                        Lihat Link
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Documents Section -->
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Daftar Lomba Desa & Kelurahan</h2>
                <p class="text-gray-600">Kumpulkan dokumen penting untuk mendaftar lomba desa dan kelurahan</p>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Village Documents -->
                <div class="bg-green-50 rounded-xl p-6">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-home text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-green-800">Dokumen Desa</h3>
                            <p class="text-green-600">Untuk peserta kategori desa</p>
                        </div>
                    </div>
                    
                    @if($villageDocuments->count() > 0)
                        <div class="space-y-3">
                            @foreach($villageDocuments as $document)
                                <div class="bg-white rounded-lg p-4 flex items-center justify-between">
                                    <div class="flex items-center">
                                        <i class="fas fa-file-alt text-green-600 mr-3"></i>
                                        <div>
                                            <h4 class="font-medium text-gray-800">{{ $document->title }}</h4>
                                            @if($document->description)
                                                <p class="text-sm text-gray-600">{{ Str::limit($document->description, 60) }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <a href="{{ route('register.form', $document->id) }}" target="_blank" class="bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded-lg text-sm transition duration-200">
                                        <i class="fas fa-download mr-1"></i>Kumpulkan Dokumen
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8 text-green-600">
                            <i class="fas fa-file-alt text-4xl mb-4 opacity-50"></i>
                            <p>Belum ada dokumen tersedia</p>
                        </div>
                    @endif
                </div>

                <!-- District Documents -->
                <div class="bg-blue-50 rounded-xl p-6">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-building text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-blue-800">Dokumen Kelurahan</h3>
                            <p class="text-blue-600">Untuk peserta kategori kelurahan</p>
                        </div>
                    </div>
                    
                    @if($districtDocuments->count() > 0)
                        <div class="space-y-3">
                            @foreach($districtDocuments as $document)
                                <div class="bg-white rounded-lg p-4 flex items-center justify-between">
                                    <div class="flex items-center">
                                        <i class="fas fa-file-alt text-blue-600 mr-3"></i>
                                        <div>
                                            <h4 class="font-medium text-gray-800">{{ $document->title }}</h4>
                                            @if($document->description)
                                                <p class="text-sm text-gray-600">{{ Str::limit($document->description, 60) }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <a href="{{ route('register.form', $document->id) }}" target="_blank" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-lg text-sm transition duration-200">
                                        <i class="fas fa-download mr-1"></i>Kumpulkan Dokumen
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8 text-blue-600">
                            <i class="fas fa-file-alt text-4xl mb-4 opacity-50"></i>
                            <p>Belum ada dokumen tersedia</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Information Section -->
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="text-center">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-file-alt text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="font-semibold text-gray-800 mb-2">Dokumen Resmi</h3>
                    <p class="text-gray-600 text-sm">SOP, Juknis, dan Template</p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-users text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="font-semibold text-gray-800 mb-2">Tim Penilai</h3>
                    <p class="text-gray-600 text-sm">Juri berpengalaman dan kompeten</p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-chart-line text-yellow-600 text-2xl"></i>
                    </div>
                    <h3 class="font-semibold text-gray-800 mb-2">Penilaian Transparan</h3>
                    <p class="text-gray-600 text-sm">Sistem penilaian yang objektif</p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-award text-red-600 text-2xl"></i>
                    </div>
                    <h3 class="font-semibold text-gray-800 mb-2">Penghargaan</h3>
                    <p class="text-gray-600 text-sm">Apresiasi untuk desa/kelurahan terbaik</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <div class="flex items-center justify-center mb-4">
                <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center mr-3">
                    <i class="fas fa-trophy text-white"></i>
                </div>
                <div>
                    <h3 class="font-bold">DPMD Lomdes</h3>
                    <p class="text-sm text-gray-400">Provinsi Bali</p>
                </div>
            </div>
            <p class="text-gray-400">
                © {{ date('Y') }} Dinas Pemberdayaan Masyarakat dan Desa Provinsi Bali. All rights reserved.
            </p>
        </div>
    </footer>
</body>
</html>
