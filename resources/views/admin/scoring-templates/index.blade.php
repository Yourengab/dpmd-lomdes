<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scoring Templates - DPMD Lomdes</title>
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
                        <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-trophy text-white"></i>
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
                <h2 class="text-3xl font-bold text-gray-800">Scoring Templates</h2>
                <p class="text-gray-600 mt-2">Manage scoring templates for competition documents</p>
            </div>
            <a href="{{ route('admin.scoring-templates.create') }}" class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-lg transition duration-200 transform hover:scale-105">
                <i class="fas fa-plus mr-2"></i>Add New Template
            </a>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
                <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
            </div>
        @endif

        <!-- Templates Grid -->
        @if($templates->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($templates as $template)
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                        <!-- Header -->
                        <div class="bg-gradient-to-r from-purple-500 to-purple-600 p-6">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-chart-bar text-white text-xl"></i>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-lg font-bold text-white">{{ $template->title }}</h3>
                                    @if($template->adminDocument)
                                        <p class="text-purple-100 text-sm">{{ $template->adminDocument->title }}</p>
                                    @elseif($template->event_date)
                                        <p class="text-purple-100 text-sm">{{ $template->event_date->format('d M Y') }}</p>
                                    @else
                                        <p class="text-purple-100 text-sm">{{ ucfirst(str_replace('_', ' ', $template->category)) }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            @if($template->description)
                                <p class="text-gray-600 text-sm mb-4">{{ Str::limit($template->description, 80) }}</p>
                            @endif
                            
                            <div class="flex items-center text-sm text-gray-500 mb-4">
                                <i class="fas fa-tag mr-2"></i>
                                @php
                                    $categoryConfig = [
                                        'tahap_administrasi' => ['color' => 'green', 'label' => 'Tahap Administrasi'],
                                        'tahap_pemaparan' => ['color' => 'purple', 'label' => 'Tahap Pemaparan'],
                                        'tahap_klarifikasi_lapangan' => ['color' => 'orange', 'label' => 'Tahap Klarifikasi Lapangan'],
                                        'daftar_inovasi' => ['color' => 'blue', 'label' => 'Daftar Inovasi']
                                    ];
                                    $config = $categoryConfig[$template->category] ?? ['color' => 'gray', 'label' => 'Unknown'];
                                @endphp
                                <span class="px-2 py-1 bg-{{ $config['color'] }}-100 text-{{ $config['color'] }}-800 rounded-full text-xs">
                                    {{ $config['label'] }}
                                </span>
                            </div>

                            <div class="flex items-center text-sm text-gray-500 mb-6">
                                <i class="fas fa-calendar mr-2"></i>
                                Created: {{ $template->created_at->format('d M Y') }}
                            </div>

                            <!-- Actions -->
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.scoring-templates.show', $template) }}" class="flex-1 bg-blue-500 hover:bg-blue-600 text-white text-center py-2 px-4 rounded-lg text-sm transition duration-200">
                                    <i class="fas fa-eye mr-1"></i>View
                                </a>
                                <a href="{{ route('admin.scoring-templates.edit', $template) }}" class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white text-center py-2 px-4 rounded-lg text-sm transition duration-200">
                                    <i class="fas fa-edit mr-1"></i>Edit
                                </a>
                                <form method="POST" action="{{ route('admin.scoring-templates.destroy', $template) }}" class="flex-1" onsubmit="return confirm('Are you sure you want to delete this template?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg text-sm transition duration-200">
                                        <i class="fas fa-trash mr-1"></i>Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-16">
                <div class="w-24 h-24 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-chart-bar text-purple-600 text-4xl opacity-50"></i>
                </div>
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">No Scoring Templates</h3>
                <p class="text-gray-600 mb-8">You haven't created any scoring templates yet.</p>
                <a href="{{ route('admin.scoring-templates.create') }}" class="inline-flex items-center bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-lg font-semibold transition duration-200">
                    <i class="fas fa-plus mr-2"></i>Create First Template
                </a>
            </div>
        @endif
    </div>
</body>
</html>
