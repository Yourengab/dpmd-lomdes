<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Lomba - DPMD Bali</title>
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
                    <a href="/" class="text-gray-600 hover:text-green-600 transition duration-200">
                        <i class="fas fa-home mr-1"></i>Beranda
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="min-h-screen py-16">
        <div class="max-w-4xl mx-auto px-4">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">Pendaftaran Lomba</h1>
                <p class="text-xl text-gray-600 mb-2">Lomba Desa dan Kelurahan Provinsi Bali</p>
                <p class="text-gray-500">Pilih kategori pendaftaran sesuai dengan wilayah Anda</p>
            </div>

            <!-- Category Selection -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Village Registration -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="bg-gradient-to-br from-green-500 to-green-600 p-8 text-white">
                        <div class="flex items-center justify-center mb-6">
                            <div class="w-20 h-20 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                                <i class="fas fa-home text-4xl"></i>
                            </div>
                        </div>
                        <h2 class="text-2xl font-bold text-center mb-4">Pendaftaran Desa</h2>
                        <p class="text-green-100 text-center mb-6">
                            Untuk wilayah administratif tingkat desa yang ingin mengikuti lomba
                        </p>
                        
                        <div class="space-y-3 mb-6">
                            <div class="flex items-center text-green-100">
                                <i class="fas fa-check-circle mr-3"></i>
                                <span>Dokumen persyaratan desa</span>
                            </div>
                            <div class="flex items-center text-green-100">
                                <i class="fas fa-check-circle mr-3"></i>
                                <span>Link pendaftaran Google Form</span>
                            </div>
                            <div class="flex items-center text-green-100">
                                <i class="fas fa-check-circle mr-3"></i>
                                <span>Panduan lengkap lomba</span>
                            </div>
                        </div>
                        
                        <a href="{{ route('register.village') }}" class="block w-full bg-white text-green-600 text-center py-3 px-6 rounded-lg font-semibold hover:bg-green-50 transition duration-200">
                            <i class="fas fa-arrow-right mr-2"></i>Daftar Sebagai Desa
                        </a>
                    </div>
                </div>

                <!-- District Registration -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-8 text-white">
                        <div class="flex items-center justify-center mb-6">
                            <div class="w-20 h-20 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                                <i class="fas fa-building text-4xl"></i>
                            </div>
                        </div>
                        <h2 class="text-2xl font-bold text-center mb-4">Pendaftaran Kelurahan</h2>
                        <p class="text-blue-100 text-center mb-6">
                            Untuk wilayah administratif tingkat kelurahan yang ingin mengikuti lomba
                        </p>
                        
                        <div class="space-y-3 mb-6">
                            <div class="flex items-center text-blue-100">
                                <i class="fas fa-check-circle mr-3"></i>
                                <span>Dokumen persyaratan kelurahan</span>
                            </div>
                            <div class="flex items-center text-blue-100">
                                <i class="fas fa-check-circle mr-3"></i>
                                <span>Link pendaftaran Google Form</span>
                            </div>
                            <div class="flex items-center text-blue-100">
                                <i class="fas fa-check-circle mr-3"></i>
                                <span>Panduan lengkap lomba</span>
                            </div>
                        </div>
                        
                        <a href="{{ route('register.district') }}" class="block w-full bg-white text-blue-600 text-center py-3 px-6 rounded-lg font-semibold hover:bg-blue-50 transition duration-200">
                            <i class="fas fa-arrow-right mr-2"></i>Daftar Sebagai Kelurahan
                        </a>
                    </div>
                </div>
            </div>

            <!-- Information Section -->
            <div class="mt-16 bg-white rounded-xl shadow-md p-8">
                <div class="text-center mb-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Informasi Penting</h3>
                    <p class="text-gray-600">Hal-hal yang perlu diperhatikan sebelum mendaftar</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-calendar-alt text-yellow-600 text-2xl"></i>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-2">Periode Pendaftaran</h4>
                        <p class="text-gray-600 text-sm">Pastikan mendaftar sesuai dengan jadwal yang telah ditentukan</p>
                    </div>
                    
                    <div class="text-center">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-file-alt text-purple-600 text-2xl"></i>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-2">Kelengkapan Dokumen</h4>
                        <p class="text-gray-600 text-sm">Siapkan semua dokumen yang diperlukan sebelum mengisi form</p>
                    </div>
                    
                    <div class="text-center">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-phone text-red-600 text-2xl"></i>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-2">Bantuan</h4>
                        <p class="text-gray-600 text-sm">Hubungi panitia jika mengalami kesulitan dalam pendaftaran</p>
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
