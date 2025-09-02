<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $document->title }} - DPMD Bali</title>
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
                    <a href="/" class="text-gray-600 hover:text-gray-800 transition duration-200">
                        <i class="fas fa-home mr-1"></i>Beranda
                    </a>
                    @if($document->category === 'village')
                        <a href="{{ route('register.village') }}" class="text-gray-600 hover:text-green-600 transition duration-200">
                            <i class="fas fa-arrow-left mr-1"></i>Kembali ke Desa
                        </a>
                    @else
                        <a href="{{ route('register.district') }}" class="text-gray-600 hover:text-blue-600 transition duration-200">
                            <i class="fas fa-arrow-left mr-1"></i>Kembali ke Kelurahan
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="min-h-screen py-8">
        <div class="max-w-5xl mx-auto px-4">
            <!-- Header Section -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-{{ $document->category === 'village' ? 'green' : 'blue' }}-100 rounded-full mb-4">
                    <i class="fas fa-{{ $document->category === 'village' ? 'home' : 'building' }} text-{{ $document->category === 'village' ? 'green' : 'blue' }}-600 text-2xl"></i>
                </div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $document->title }}</h1>
                <p class="text-gray-600">{{ $document->category === 'village' ? 'Formulir Pendaftaran Desa' : 'Formulir Pendaftaran Kelurahan' }}</p>
                @if($document->description)
                    <div class="mt-4 p-4 bg-{{ $document->category === 'village' ? 'green' : 'blue' }}-50 rounded-lg max-w-2xl mx-auto">
                        <p class="text-gray-700">{{ $document->description }}</p>
                    </div>
                @endif
            </div>

            <!-- Embedded Google Form -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="p-4">
                    <iframe src="{{ $document->file_url }}{{ strpos($document->file_url, '?') !== false ? '&' : '?' }}embedded=true" 
                            width="100%" 
                            height="1200" 
                            frameborder="0"
                            class="w-full rounded-lg">
                        Loading form...
                    </iframe>
                </div>
                
                <!-- Fallback Link -->
                <div class="p-4 bg-gray-50 border-t">
                    <p class="text-sm text-gray-600 text-center">
                        <i class="fas fa-info-circle mr-1"></i>
                        Jika form tidak muncul dengan baik, 
                        <a href="{{ $document->file_url }}" target="_blank" class="text-{{ $document->category === 'village' ? 'green' : 'blue' }}-600 hover:underline font-medium">
                            klik di sini untuk membuka di tab baru
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; 2024 DPMD Provinsi Bali. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
