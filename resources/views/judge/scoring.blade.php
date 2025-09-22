<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Nilai - DPMD Lomdes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50">
    <div class="min-h-screen bg-gray-50">
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
                            <p class="text-sm text-gray-600">Panel Juri - Input Nilai</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <a href="{{ route('judge.dashboard') }}"
                            class="text-gray-600 hover:text-gray-800 px-3 py-2 rounded-md text-sm font-medium">
                            <i class="fas fa-home mr-1"></i>Beranda
                        </a>
                        <div class="text-right">
                            <p class="text-gray-700 font-medium">{{ Auth::guard('judge')->user()->name }}</p>
                            <p class="text-sm text-gray-500">{{ Auth::guard('judge')->user()->position ?? 'Juri' }}</p>
                        </div>
                        <form method="POST" action="{{ route('judge.logout') }}" class="inline">
                            @csrf
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition duration-200">
                                <i class="fas fa-sign-out-alt mr-2"></i>Keluar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Header -->
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-900">Input Nilai</h2>
                <p class="text-gray-600 mt-2">Pilih dan lengkapi template penilaian untuk evaluasi</p>
            </div>

            <!-- Category Filter -->
            <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">
                    <i class="fas fa-filter mr-2"></i>Filter Kategori
                </h3>

                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('judge.scoring') }}"
                        class="px-4 py-2 rounded-lg text-sm font-medium transition duration-200 {{ !$category ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                        <i class="fas fa-list mr-2"></i>Semua Kategori
                    </a>

                    <a href="{{ route('judge.scoring', ['category' => 'tahap_administrasi_desa']) }}"
                        class="px-4 py-2 rounded-lg text-sm font-medium transition duration-200 {{ $category === 'tahap_administrasi_desa' ? 'bg-green-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                        <i class="fas fa-file-alt mr-2"></i>Tahap Administrasi Desa
                    </a>

                    <a href="{{ route('judge.scoring', ['category' => 'tahap_administrasi_kelurahan']) }}"
                        class="px-4 py-2 rounded-lg text-sm font-medium transition duration-200 {{ $category === 'tahap_administrasi_kelurahan' ? 'bg-green-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                        <i class="fas fa-file-alt mr-2"></i>Tahap Administrasi Kelurahan
                    </a>

                    <a href="{{ route('judge.scoring', ['category' => 'tahap_pemaparan']) }}"
                        class="px-4 py-2 rounded-lg text-sm font-medium transition duration-200 {{ $category === 'tahap_pemaparan' ? 'bg-purple-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                        <i class="fas fa-presentation mr-2"></i>Tahap Pemaparan
                    </a>

                    <a href="{{ route('judge.scoring', ['category' => 'tahap_klarifikasi_lapangan']) }}"
                        class="px-4 py-2 rounded-lg text-sm font-medium transition duration-200 {{ $category === 'tahap_klarifikasi_lapangan' ? 'bg-orange-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                        <i class="fas fa-search mr-2"></i>Tahap Klarifikasi Lapangan
                    </a>

                    <a href="{{ route('judge.scoring', ['category' => 'daftar_inovasi']) }}"
                        class="px-4 py-2 rounded-lg text-sm font-medium transition duration-200 {{ $category === 'daftar_inovasi' ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                        <i class="fas fa-lightbulb mr-2"></i>Daftar Inovasi
                    </a>
                </div>
            </div>

            <!-- Scoring Templates -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-semibold text-gray-800">
                        <i class="fas fa-chart-bar mr-2"></i>
                        @if ($category)
                            Template {{ ucwords(str_replace('_', ' ', $category)) }}
                        @else
                            Template Penilaian Tersedia
                        @endif
                    </h3>
                    <span class="text-sm text-gray-500">{{ $scoringTemplates->count() }} template ditemukan</span>
                </div>

                @if ($scoringTemplates->count() > 0)
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        @foreach ($scoringTemplates as $template)
                            @php
                                $categoryConfig = [
                                    'tahap_administrasi' => [
                                        'color' => 'green',
                                        'icon' => 'file-alt',
                                        'label' => 'Tahap Administrasi',
                                    ],
                                    'tahap_administrasi_desa' => [
                                        'color' => 'green',
                                        'icon' => 'file-alt',
                                        'label' => 'Tahap Administrasi Desa',
                                    ],
                                    'tahap_administrasi_kelurahan' => [
                                        'color' => 'green',
                                        'icon' => 'file-alt',
                                        'label' => 'Tahap Administrasi Kelurahan',
                                    ],
                                    'tahap_pemaparan' => [
                                        'color' => 'purple',
                                        'icon' => 'presentation',
                                        'label' => 'Tahap Pemaparan',
                                    ],
                                    'tahap_klarifikasi_lapangan' => [
                                        'color' => 'orange',
                                        'icon' => 'search',
                                        'label' => 'Tahap Klarifikasi Lapangan',
                                    ],
                                    'daftar_inovasi' => [
                                        'color' => 'indigo',
                                        'icon' => 'lightbulb',
                                        'label' => 'Daftar Inovasi',
                                    ],
                                ];
                                $config = $categoryConfig[$template->category] ?? [
                                    'color' => 'gray',
                                    'icon' => 'chart-bar',
                                    'label' => 'Unknown',
                                ];
                            @endphp

                            <div
                                class="border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition duration-300">
                                <!-- Template Header -->
                                <div
                                    class="bg-gradient-to-r from-{{ $config['color'] }}-500 to-{{ $config['color'] }}-600 p-4">
                                    <div class="flex items-center">
                                        <div
                                            class="w-12 h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center mr-3">
                                            <i class="fas fa-{{ $config['icon'] }} text-white text-lg"></i>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="text-lg font-semibold text-white">{{ $template->title }}</h4>
                                            @if ($template->adminDocument)
                                                <p class="text-{{ $config['color'] }}-100 text-sm">
                                                    {{ $template->adminDocument->title }}</p>
                                            @elseif($template->event_date)
                                                <p class="text-{{ $config['color'] }}-100 text-sm">
                                                    {{ $template->event_date->format('d M Y') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Template Content -->
                                <div class="p-4">
                                    @if ($template->description)
                                        <p class="text-gray-600 text-sm mb-4">
                                            {{ Str::limit($template->description, 100) }}</p>
                                    @endif

                                    <div class="flex items-center justify-between mb-4">
                                        <span
                                            class="px-3 py-1 bg-{{ $config['color'] }}-100 text-{{ $config['color'] }}-800 rounded-full text-xs font-medium">
                                            {{ $config['label'] }}
                                        </span>
                                        <span class="text-gray-500 text-xs">
                                            <i
                                                class="fas fa-calendar mr-1"></i>{{ $template->created_at->format('d M Y') }}
                                        </span>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="space-y-2">
                                        @if ($template->category === 'tahap_administrasi_desa')
                                            <a href="{{ route('judge.scoring.administrasiDesa', $template->id) }}"
                                                class="w-full bg-{{ $config['color'] }}-600 hover:bg-{{ $config['color'] }}-700 text-white text-center py-2 px-4 rounded-lg text-sm transition duration-200 block">
                                                <i class="fas fa-file-alt mr-1"></i>Buka Formulir Administrasi
                                            </a>
                                        @elseif($template->category === 'tahap_administrasi_kelurahan')
                                            <a href="{{ route('judge.scoring.administrasiKelurahan', $template->id) }}"
                                                class="w-full bg-{{ $config['color'] }}-600 hover:bg-{{ $config['color'] }}-700 text-white text-center py-2 px-4 rounded-lg text-sm transition duration-200 block">
                                                <i class="fas fa-file-alt mr-1"></i>Buka Formulir Administrasi
                                            </a>
                                        @elseif($template->category === 'tahap_pemaparan')
                                            <div class="grid grid-cols-3 gap-2">
                                                <a href="{{ route('judge.scoring.pemaparan.questions', $template->id) }}"
                                                    class="bg-{{ $config['color'] }}-600 hover:bg-{{ $config['color'] }}-700 text-white text-center py-2 px-2 rounded-lg text-xs transition duration-200">
                                                    <i class="fas fa-question-circle mr-1"></i>Pertanyaan
                                                </a>
                                                <a href="{{ route('judge.scoring.pemaparan.village', $template->id) }}"
                                                    class="bg-green-600 hover:bg-green-700 text-white text-center py-2 px-2 rounded-lg text-xs transition duration-200">
                                                    <i class="fas fa-home mr-1"></i>Desa
                                                </a>
                                                <a href="{{ route('judge.scoring.pemaparan.district', $template->id) }}"
                                                    class="bg-blue-600 hover:bg-blue-700 text-white text-center py-2 px-2 rounded-lg text-xs transition duration-200">
                                                    <i class="fas fa-building mr-1"></i>Kecamatan
                                                </a>
                                            </div>
                                        @elseif($template->category === 'tahap_klarifikasi_lapangan')
                                            <a href="{{ route('judge.scoring.klarifikasi', $template->id) }}"
                                                class="w-full bg-{{ $config['color'] }}-600 hover:bg-{{ $config['color'] }}-700 text-white text-center py-2 px-4 rounded-lg text-sm transition duration-200 block">
                                                <i class="fas fa-search mr-1"></i>Buka Formulir Klarifikasi
                                            </a>
                                        @elseif($template->category === 'daftar_inovasi')
                                            <a href="{{ route('judge.scoring.inovasi', $template->id) }}"
                                                class="w-full bg-{{ $config['color'] }}-600 hover:bg-{{ $config['color'] }}-700 text-white text-center py-2 px-4 rounded-lg text-sm transition duration-200 block">
                                                <i class="fas fa-lightbulb mr-1"></i>Buka Formulir Inovasi
                                            </a>
                                        @else
                                            <a href="{{ route('judge.scoring.administrasi', $template->id) }}"
                                                class="w-full bg-{{ $config['color'] }}-600 hover:bg-{{ $config['color'] }}-700 text-white text-center py-2 px-4 rounded-lg text-sm transition duration-200 block">
                                                <i class="fas fa-file-alt mr-1"></i>Buka Formulir Administrasi
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <div class="bg-gray-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-clipboard-list text-gray-400 text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Tidak Ada Template Penilaian</h3>
                        <p class="text-gray-500 mb-4">
                            @if ($category)
                                Tidak ada template penilaian untuk kategori yang dipilih.
                            @else
                                Belum ada template penilaian yang dibuat.
                            @endif
                        </p>
                        @if ($category)
                            <a href="{{ route('judge.scoring') }}"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition duration-200">
                                <i class="fas fa-list mr-2"></i>Lihat Semua Template
                            </a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>

</html>
