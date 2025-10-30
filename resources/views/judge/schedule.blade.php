

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Meet Desa dan Kelurahan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center mr-3">
                        <i class="fas fa-calendar text-white"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-gray-800">DPMD Lomdes</h1>
                        <p class="text-sm text-gray-600">Panel Juri - Jadwal Meet</p>
                    </div>
                </div>
                <a href="{{ route('judge.dashboard') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg transition duration-200">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-900">Jadwal Meet Desa dan Kelurahan</h2>
            <p class="text-gray-600 mt-2">Berikut adalah jadwal meet beserta informasi lengkap peserta</p>
        </div>


        <!-- Jadwal Desa -->
        <div class="mb-8">
            <h3 class="text-xl font-bold text-green-700 mb-4"><i class="fas fa-home mr-2"></i>Jadwal Meet Desa</h3>
            @php $desaSchedules = $schedules->where('type', 'desa'); @endphp
            @forelse($desaSchedules as $schedule)
                <div class="bg-white rounded-xl shadow-md p-6 mb-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-calendar text-green-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-800">{{ \Carbon\Carbon::parse($schedule->date)->format('d-m-Y') }}</h3>
                                <p class="text-gray-600"><strong>Desa</strong> Presentation Schedule</p>
                            </div>
                        </div>
                        @if($schedule->meet_link)
                            <a href="{{ $schedule->meet_link }}" target="_blank" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition duration-200">
                                <i class="fas fa-video mr-2"></i>Join Meet
                            </a>
                        @else
                            <span class="bg-gray-200 text-gray-500 px-4 py-2 rounded-lg">Belum ada link</span>
                        @endif
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        @if($schedule->top_village_1)
                            <div class="bg-green-50 rounded-lg p-4">
                                <h4 class="font-semibold text-green-800 mb-2">Urutan Pertama</h4>
                                <p class="text-green-700">{{ $schedule->top_village_1 }}</p>
                                <p class="text-sm text-green-600 mt-1">{{ $schedule->time_1 ? date('H:i', strtotime($schedule->time_1)) : '-' }}</p>
                            </div>
                        @endif
                        @if($schedule->top_village_2)
                            <div class="bg-blue-50 rounded-lg p-4">
                                <h4 class="font-semibold text-blue-800 mb-2">Urutan Kedua</h4>
                                <p class="text-blue-700">{{ $schedule->top_village_2 }}</p>
                                <p class="text-sm text-blue-600 mt-1">{{ $schedule->time_2 ? date('H:i', strtotime($schedule->time_2)) : '-' }}</p>
                            </div>
                        @endif
                        @if($schedule->top_village_3)
                            <div class="bg-yellow-50 rounded-lg p-4">
                                <h4 class="font-semibold text-yellow-800 mb-2">Urutan Ketiga</h4>
                                <p class="text-yellow-700">{{ $schedule->top_village_3 }}</p>
                                <p class="text-sm text-yellow-600 mt-1">{{ $schedule->time_3 ? date('H:i', strtotime($schedule->time_3)) : '-' }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-xl shadow-md p-8 text-center">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-calendar text-gray-400 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Belum ada jadwal desa</h3>
                    <p class="text-gray-600">Jadwal presentasi desa akan diumumkan segera.</p>
                </div>
            @endforelse
        </div>

        <!-- Jadwal Kelurahan -->
        <div>
            <h3 class="text-xl font-bold text-blue-700 mb-4"><i class="fas fa-city mr-2"></i>Jadwal Meet Kelurahan</h3>
            @php $kelurahanSchedules = $schedules->where('type', 'kelurahan'); @endphp
            @forelse($kelurahanSchedules as $schedule)
                <div class="bg-white rounded-xl shadow-md p-6 mb-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-calendar text-blue-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-800">{{ \Carbon\Carbon::parse($schedule->date)->format('d-m-Y') }}</h3>
                                <p class="text-gray-600"><strong>Kelurahan</strong> Presentation Schedule</p>
                            </div>
                        </div>
                        @if($schedule->meet_link)
                            <a href="{{ $schedule->meet_link }}" target="_blank" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-200">
                                <i class="fas fa-video mr-2"></i>Join Meet
                            </a>
                        @else
                            <span class="bg-gray-200 text-gray-500 px-4 py-2 rounded-lg">Belum ada link</span>
                        @endif
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        @if($schedule->top_village_1)
                            <div class="bg-green-50 rounded-lg p-4">
                                <h4 class="font-semibold text-green-800 mb-2">Urutan Pertama</h4>
                                <p class="text-green-700">{{ $schedule->top_village_1 }}</p>
                                <p class="text-sm text-green-600 mt-1">{{ $schedule->time_1 ? date('H:i', strtotime($schedule->time_1)) : '-' }}</p>
                            </div>
                        @endif
                        @if($schedule->top_village_2)
                            <div class="bg-blue-50 rounded-lg p-4">
                                <h4 class="font-semibold text-blue-800 mb-2">Urutan Kedua</h4>
                                <p class="text-blue-700">{{ $schedule->top_village_2 }}</p>
                                <p class="text-sm text-blue-600 mt-1">{{ $schedule->time_2 ? date('H:i', strtotime($schedule->time_2)) : '-' }}</p>
                            </div>
                        @endif
                        @if($schedule->top_village_3)
                            <div class="bg-yellow-50 rounded-lg p-4">
                                <h4 class="font-semibold text-yellow-800 mb-2">Urutan Ketiga</h4>
                                <p class="text-yellow-700">{{ $schedule->top_village_3 }}</p>
                                <p class="text-sm text-yellow-600 mt-1">{{ $schedule->time_3 ? date('H:i', strtotime($schedule->time_3)) : '-' }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-xl shadow-md p-8 text-center">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-calendar text-gray-400 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Belum ada jadwal kelurahan</h3>
                    <p class="text-gray-600">Jadwal presentasi kelurahan akan diumumkan segera.</p>
                </div>
            @endforelse
        </div>
    </div>
</body>
</html>
