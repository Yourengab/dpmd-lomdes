
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jadwal Klarifikasi Lapangan - DPMD Lomdes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center">
                        <div class="w-10 h-10 bg-orange-600 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-search-location text-white"></i>
                        </div>
                        <div>
                            <h1 class="text-xl font-bold text-gray-800">DPMD Lomdes</h1>
                            <p class="text-sm text-gray-600">Admin Panel</p>
                        </div>
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700">{{ Auth::guard('admin')->user()->name }}</span>
                    <form method="POST" action="{{ route('admin.logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition duration-200">
                            <i class="fas fa-sign-out-alt mr-2"></i>Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-4xl mx-auto px-4 py-8">
        <!-- Header -->
        <div class="flex items-center mb-8">
            <a href="{{ route('admin.clarifications.index') }}" class="mr-4 text-gray-600 hover:text-gray-800">
                <i class="fas fa-arrow-left text-xl"></i>
            </a>
            <div>
                <h2 class="text-3xl font-bold text-gray-800">Tambah Jadwal Klarifikasi Lapangan</h2>
                <p class="text-gray-600 mt-2">Input jadwal klarifikasi lapangan untuk desa/kelurahan</p>
            </div>
        </div>

        <!-- Form -->
        <div class="bg-white rounded-xl shadow-md p-8">
            <form method="POST" action="{{ route('admin.clarifications.store') }}" class="space-y-6">
                @csrf
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Judul</label>
                    <input type="text" name="title" id="title" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring" required>
                </div>
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                    <select name="category" id="category" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring" required>
                        <option value="desa">Desa</option>
                        <option value="kelurahan">Kelurahan</option>
                    </select>
                </div>
                <div>
                    <label for="date" class="block text-sm font-medium text-gray-700 mb-2">Tanggal</label>
                    <input type="date" name="date" id="date" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring" required>
                </div>
                <div class="flex justify-end">
                    <a href="{{ route('admin.clarifications.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded-lg mr-2">Batal</a>
                    <button type="submit" class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded-lg">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
