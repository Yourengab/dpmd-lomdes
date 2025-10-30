
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Jadwal Klarifikasi Lapangan - DPMD Lomdes</title>
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
    <div class="max-w-7xl mx-auto px-4 py-8">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-3xl font-bold text-gray-800">Manage Jadwal Klarifikasi Lapangan</h2>
                <p class="text-gray-600 mt-2">Kelola jadwal klarifikasi lapangan untuk desa dan kelurahan</p>
            </div>
            <a href="{{ route('admin.clarifications.create') }}" class="bg-orange-600 hover:bg-orange-700 text-white px-6 py-3 rounded-lg transition duration-200">
                <i class="fas fa-plus mr-2"></i>Tambah Jadwal
            </a>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Jadwal Table -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($clarifications as $clarification)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $clarification->title }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $clarification->category === 'desa' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                                        {{ ucfirst($clarification->category) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ \Carbon\Carbon::parse($clarification->date)->format('d-m-Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.clarifications.edit', $clarification) }}" class="text-blue-600 hover:text-blue-900">
                                            <i class="fas fa-edit mr-1"></i>Edit
                                        </a>
                                        <form method="POST" action="{{ route('admin.clarifications.destroy', $clarification) }}" onsubmit="return confirm('Yakin ingin menghapus jadwal ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">
                                                <i class="fas fa-trash mr-1"></i>Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-gray-500">Belum ada jadwal klarifikasi lapangan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
