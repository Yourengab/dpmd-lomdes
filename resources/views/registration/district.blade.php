<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Kelurahan - DPMD Bali</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="/" class="flex items-center">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/4/43/Coat_of_arms_of_Bali.svg" alt="Logo Bali" class="h-10 w-10 mr-3">
                        <div>
                            <h1 class="text-xl font-bold text-gray-800">DPMD Bali</h1>
                            <p class="text-xs text-gray-600">Lomdes Competition</p>
                        </div>
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="/" class="text-gray-600 hover:text-blue-600 transition duration-200">
                        <i class="fas fa-home mr-1"></i>Beranda
                    </a>
                    <a href="{{ route('register.index') }}" class="text-gray-600 hover:text-blue-600 transition duration-200">
                        <i class="fas fa-arrow-left mr-1"></i>Kembali
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="min-h-screen py-16">
        <div class="max-w-6xl mx-auto px-4">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-blue-100 rounded-full mb-6">
                    <i class="fas fa-building text-blue-600 text-3xl"></i>
                </div>
                <h1 class="text-4xl font-bold text-gray-800 mb-4">Pendaftaran Kelurahan</h1>
                <p class="text-xl text-gray-600 mb-2">Lomba Kelurahan Provinsi Bali</p>
                <p class="text-gray-500">Isi formulir pendaftaran di bawah ini untuk mendaftar lomba kelurahan</p>
            </div>

            @if($documents->count() > 0)
                <!-- Documents Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    @foreach($documents as $document)
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                            <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-6">
                                <div class="flex items-center">
                                    <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center mr-4">
                                        <i class="fas fa-file-alt text-white text-2xl"></i>
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="text-xl font-bold text-white mb-1">{{ $document->title }}</h3>
                                        <p class="text-blue-100 text-sm">Formulir Pendaftaran Kelurahan</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="p-6">
                                @if($document->description)
                                    <div class="mb-6">
                                        <h4 class="font-semibold text-gray-800 mb-2">Deskripsi:</h4>
                                        <p class="text-gray-600 leading-relaxed">{{ $document->description }}</p>
                                    </div>
                                @endif
                                
                                <div class="space-y-3">
                                    <!-- Form Button -->
                                    <a href="{{ route('register.form', $document->id) }}" class="flex items-center justify-center w-full bg-blue-600 hover:bg-blue-700 text-white py-3 px-6 rounded-lg font-semibold transition duration-200">
                                        <i class="fas fa-edit mr-2"></i>
                                        Isi Formulir
                                    </a>
                                </div>
                                
                                <div class="mt-4 pt-4 border-t border-gray-200">
                                    <div class="flex items-center text-sm text-gray-500">
                                        <i class="fas fa-calendar mr-2"></i>
                                        Ditambahkan: {{ $document->created_at->format('d M Y') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-16">
                    <div class="w-24 h-24 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-file-alt text-blue-600 text-4xl opacity-50"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Belum Ada Dokumen</h3>
                    <p class="text-gray-600 mb-8">Dokumen pendaftaran untuk kelurahan belum tersedia saat ini.</p>
                    <a href="{{ route('register.index') }}" class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition duration-200">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali ke Pilihan Kategori
                    </a>
                </div>
            @endif

            <!-- Information Section -->
            <div class="mt-16 bg-white rounded-xl shadow-md p-8">
                <div class="text-center mb-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Langkah-langkah Pendaftaran</h3>
                    <p class="text-gray-600">Ikuti langkah berikut untuk mendaftar lomba kelurahan</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-blue-600 font-bold text-xl">1</span>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-2">Siapkan Berkas</h4>
                        <p class="text-gray-600 text-sm">Lengkapi dan siapkan semua berkas sesuai panduan</p>
                    </div>
                    
                    <div class="text-center">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-blue-600 font-bold text-xl">2</span>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-2">Isi Formulir</h4>
                        <p class="text-gray-600 text-sm">Lengkapi dan isi formulir sesuai persyaratan, klik link <strong>isi formulir</strong> sesuai dokumen yang ingin diupload</p>
                    </div>
                    
                    <div class="text-center">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-blue-600 font-bold text-xl">3</span>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-2">Selesai</h4>
                        <p class="text-gray-600 text-sm">Ingat untuk mengupload semua berkas yang telah disiapkan</p>
                    </div>
            </div>

            
            <!-- Contact Information -->
            <div class="mt-8 bg-blue-50 rounded-xl p-6">
                <div class="flex items-center justify-center mb-4">
                    <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-phone text-white"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-blue-800">Butuh Bantuan?</h4>
                        <p class="text-blue-600 text-sm">Hubungi panitia jika mengalami kesulitan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; 2024 DPMD Provinsi Bali. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
