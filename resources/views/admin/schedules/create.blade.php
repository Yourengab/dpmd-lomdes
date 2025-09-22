<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Schedule - DPMD Lomdes</title>
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
    <div class="max-w-4xl mx-auto px-4 py-8">
        <!-- Header -->
        <div class="flex items-center mb-8">
            <a href="{{ route('admin.schedules.index') }}" class="mr-4 text-gray-600 hover:text-gray-800">
                <i class="fas fa-arrow-left text-xl"></i>
            </a>
            <div>
                <h2 class="text-3xl font-bold text-gray-800">Add New Schedule</h2>
                <p class="text-gray-600 mt-2">Create a new presentation schedule</p>
            </div>
        </div>

        <!-- Form -->
        <div class="bg-white rounded-xl shadow-md p-8">
            <form method="POST" action="{{ route('admin.schedules.store') }}" class="space-y-6">
                @csrf

                <!-- Date Field -->
                <div>
                    <label for="date" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-calendar mr-2"></i>Presentation Date *
                    </label>
                    <input
                        type="date"
                        id="date"
                        name="date"
                        value="{{ old('date') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('date') border-red-500 @enderror"
                        required
                    >
                    @error('date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Type Field -->
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-tag mr-2"></i>Type *
                    </label>
                    <select
                        id="type"
                        name="type"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('type') border-red-500 @enderror"
                        required
                    >
                        <option value="">Select Type</option>
                        <option value="desa" {{ old('type') === 'desa' ? 'selected' : '' }}>Desa</option>
                        <option value="kelurahan" {{ old('type') === 'kelurahan' ? 'selected' : '' }}>Kelurahan</option>
                    </select>
                    @error('type')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Meet Link Field -->
                <div>
                    <label for="meet_link" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-link mr-2"></i>Meeting Link *
                    </label>
                    <input
                        type="url"
                        id="meet_link"
                        name="meet_link"
                        value="{{ old('meet_link') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('meet_link') border-red-500 @enderror"
                        placeholder="https://meet.google.com/..."
                        required
                    >
                    @error('meet_link')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Top Village 1 -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="top_village_1" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-map-marker mr-2"></i>Top Village 1
                        </label>
                        <input
                            type="text"
                            id="top_village_1"
                            name="top_village_1"
                            value="{{ old('top_village_1') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('top_village_1') border-red-500 @enderror"
                            placeholder="Village name"
                        >
                        @error('top_village_1')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="time_1" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-clock mr-2"></i>Presentation Time 1
                        </label>
                        <input
                            type="time"
                            id="time_1"
                            name="time_1"
                            value="{{ old('time_1') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('time_1') border-red-500 @enderror"
                        >
                        @error('time_1')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Top Village 2 -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="top_village_2" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-map-marker mr-2"></i>Top Village 2
                        </label>
                        <input
                            type="text"
                            id="top_village_2"
                            name="top_village_2"
                            value="{{ old('top_village_2') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('top_village_2') border-red-500 @enderror"
                            placeholder="Village name"
                        >
                        @error('top_village_2')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="time_2" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-clock mr-2"></i>Presentation Time 2
                        </label>
                        <input
                            type="time"
                            id="time_2"
                            name="time_2"
                            value="{{ old('time_2') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('time_2') border-red-500 @enderror"
                        >
                        @error('time_2')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Top Village 3 -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="top_village_3" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-map-marker mr-2"></i>Top Village 3
                        </label>
                        <input
                            type="text"
                            id="top_village_3"
                            name="top_village_3"
                            value="{{ old('top_village_3') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('top_village_3') border-red-500 @enderror"
                            placeholder="Village name"
                        >
                        @error('top_village_3')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="time_3" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-clock mr-2"></i>Presentation Time 3
                        </label>
                        <input
                            type="time"
                            id="time_3"
                            name="time_3"
                            value="{{ old('time_3') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('time_3') border-red-500 @enderror"
                        >
                        @error('time_3')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex justify-end space-x-4 pt-6">
                    <a href="{{ route('admin.schedules.index') }}" class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition duration-200">
                        Cancel
                    </a>
                    <button
                        type="submit"
                        class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                    >
                        <i class="fas fa-save mr-2"></i>Create Schedule
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>