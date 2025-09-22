<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Pemaparan - DPMD Lomdes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <a href="/" class="flex items-center">
                        <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-trophy text-white"></i>
                        </div>
                        <div>
                            <h1 class="text-xl font-bold text-gray-800">DPMD Lomdes</h1>
                            <p class="text-sm text-gray-600">Desa & Kelurahan Competition</p>
                        </div>
                    </a>
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

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 py-8">
        <!-- Header -->
        <div class="flex items-center mb-8">
            <a href="/" class="mr-4 text-gray-600 hover:text-gray-800">
                <i class="fas fa-arrow-left text-xl"></i>
            </a>
            <div>
                <h2 class="text-3xl font-bold text-gray-800">Jadwal Pemaparan</h2>
                <p class="text-gray-600 mt-2">Jadwal presentasi untuk 3 besar desa dan kelurahan</p>
            </div>
        </div>

        <!-- Schedules -->
        @if($schedules->count() > 0)
            <div class="space-y-6">
                @foreach($schedules as $schedule)
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-calendar text-blue-600 text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800">{{ $schedule->date}}</h3>
                                    <p class="text-gray-600"><strong>{{ ucfirst($schedule->type) }}</strong> Presentation Schedule</p>
                                </div>
                            </div>
                            <a href="{{ $schedule->meet_link }}" target="_blank" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-200">
                                <i class="fas fa-external-link-alt mr-2"></i>Join Meeting
                            </a>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            @if($schedule->top_village_1)
                                <div class="bg-green-50 rounded-lg p-4">
                                    <h4 class="font-semibold text-green-800 mb-2">Urutan Pertama</h4>
                                    <p class="text-green-700">{{ $schedule->top_village_1 }}</p>
                                    <p class="text-sm text-green-600 mt-1">{{ $schedule->time_1 }}</p>
                                </div>
                            @endif

                            @if($schedule->top_village_2)
                                <div class="bg-blue-50 rounded-lg p-4">
                                    <h4 class="font-semibold text-blue-800 mb-2">Urutan Kedua</h4>
                                    <p class="text-blue-700">{{ $schedule->top_village_2 }}</p>
                                    <p class="text-sm text-blue-600 mt-1">{{ $schedule->time_2 }}</p>
                                </div>
                            @endif

                            @if($schedule->top_village_3)
                                <div class="bg-yellow-50 rounded-lg p-4">
                                    <h4 class="font-semibold text-yellow-800 mb-2">Urutan Ketiga</h4>
                                    <p class="text-yellow-700">{{ $schedule->top_village_3 }}</p>
                                    <p class="text-sm text-yellow-600 mt-1">{{ $schedule->time_3 }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-xl shadow-md p-8 text-center">
                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-calendar text-gray-400 text-3xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">No Schedules Available</h3>
                <p class="text-gray-600">Presentation schedules will be announced soon.</p>
                <a href="/" class="inline-block mt-4 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition duration-200">
                    Back to Home
                </a>
            </div>
        @endif
    </div>
</body>
</html>