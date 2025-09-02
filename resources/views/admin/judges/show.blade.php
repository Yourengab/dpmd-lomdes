<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Judge Details - DPMD Lomdes</title>
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
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center">
                <a href="{{ route('admin.judges.index') }}" class="mr-4 text-gray-600 hover:text-gray-800">
                    <i class="fas fa-arrow-left text-xl"></i>
                </a>
                <div>
                    <h2 class="text-3xl font-bold text-gray-800">Judge Details</h2>
                    <p class="text-gray-600 mt-2">View judge information and credentials</p>
                </div>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('admin.judges.edit', $judge) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg transition duration-200">
                    <i class="fas fa-edit mr-2"></i>Edit
                </a>
                <form method="POST" action="{{ route('admin.judges.destroy', $judge) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this judge?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition duration-200">
                        <i class="fas fa-trash mr-2"></i>Delete
                    </button>
                </form>
            </div>
        </div>

        <!-- Judge Information Card -->
        <div class="bg-white rounded-xl shadow-md p-8">
            <div class="flex items-center mb-6">
                <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mr-6">
                    <i class="fas fa-user text-blue-600 text-3xl"></i>
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $judge->name }}</h3>
                    <p class="text-gray-600">{{ $judge->position ?? 'No position assigned' }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Basic Information -->
                <div class="space-y-4">
                    <h4 class="text-lg font-semibold text-gray-800 border-b pb-2">Basic Information</h4>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Full Name</label>
                        <p class="text-gray-800">{{ $judge->name }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Position</label>
                        <p class="text-gray-800">{{ $judge->position ?? '-' }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Indicator Assigned</label>
                        <p class="text-gray-800">{{ $judge->indicator_assigned ?? '-' }}</p>
                    </div>
                </div>

                <!-- Account Information -->
                <div class="space-y-4">
                    <h4 class="text-lg font-semibold text-gray-800 border-b pb-2">Account Information</h4>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Username</label>
                        <p class="text-gray-800 font-mono bg-gray-100 px-3 py-2 rounded">{{ $judge->username }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Account Created</label>
                        <p class="text-gray-800">{{ $judge->created_at->format('F d, Y \a\t g:i A') }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Last Updated</label>
                        <p class="text-gray-800">{{ $judge->updated_at->format('F d, Y \a\t g:i A') }}</p>
                    </div>
                </div>
            </div>

            <!-- Login Information -->
            <div class="mt-8 p-4 bg-blue-50 rounded-lg">
                <h4 class="text-lg font-semibold text-blue-800 mb-2">
                    <i class="fas fa-info-circle mr-2"></i>Login Information
                </h4>
                <p class="text-blue-700 mb-2">This judge can login using the following credentials:</p>
                <div class="bg-white p-3 rounded border">
                    <p><strong>Login URL:</strong> <code class="bg-gray-100 px-2 py-1 rounded">{{ url('/judge/login') }}</code></p>
                    <p><strong>Username:</strong> <code class="bg-gray-100 px-2 py-1 rounded">{{ $judge->username }}</code></p>
                    <p><strong>Password:</strong> <span class="text-gray-500 italic">As set by admin</span></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
