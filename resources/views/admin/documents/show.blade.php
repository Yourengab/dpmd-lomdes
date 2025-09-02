<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Details - DPMD Lomdes</title>
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
                <a href="{{ route('admin.documents.index') }}" class="mr-4 text-gray-600 hover:text-gray-800">
                    <i class="fas fa-arrow-left text-xl"></i>
                </a>
                <div>
                    <h2 class="text-3xl font-bold text-gray-800">Document Details</h2>
                    <p class="text-gray-600 mt-2">View document information and access link</p>
                </div>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('admin.documents.edit', $document) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg transition duration-200">
                    <i class="fas fa-edit mr-2"></i>Edit
                </a>
                <form method="POST" action="{{ route('admin.documents.destroy', $document) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this document?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition duration-200">
                        <i class="fas fa-trash mr-2"></i>Delete
                    </button>
                </form>
            </div>
        </div>

        <!-- Document Information Card -->
        <div class="bg-white rounded-xl shadow-md p-8">
            <div class="flex items-center mb-6">
                <div class="w-20 h-20 bg-purple-100 rounded-full flex items-center justify-center mr-6">
                    <i class="fas fa-file-alt text-purple-600 text-3xl"></i>
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $document->title }}</h3>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium mt-2
                        {{ $document->category === 'village' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                        {{ $document->category_name }}
                    </span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Document Information -->
                <div class="space-y-4">
                    <h4 class="text-lg font-semibold text-gray-800 border-b pb-2">Document Information</h4>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Title</label>
                        <p class="text-gray-800">{{ $document->title }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Category</label>
                        <p class="text-gray-800">{{ $document->category_name }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Description</label>
                        <p class="text-gray-800">{{ $document->description ?? 'No description provided' }}</p>
                    </div>
                </div>

                <!-- Access Information -->
                <div class="space-y-4">
                    <h4 class="text-lg font-semibold text-gray-800 border-b pb-2">Access Information</h4>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Document URL</label>
                        <div class="bg-gray-100 p-3 rounded border break-all">
                            <a href="{{ $document->file_url }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                                {{ $document->file_url }}
                                <i class="fas fa-external-link-alt ml-1"></i>
                            </a>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Created</label>
                        <p class="text-gray-800">{{ $document->created_at->format('F d, Y \a\t g:i A') }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Last Updated</label>
                        <p class="text-gray-800">{{ $document->updated_at->format('F d, Y \a\t g:i A') }}</p>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="mt-8 p-4 bg-purple-50 rounded-lg">
                <h4 class="text-lg font-semibold text-purple-800 mb-3">
                    <i class="fas fa-bolt mr-2"></i>Quick Actions
                </h4>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ $document->file_url }}" target="_blank" class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg transition duration-200">
                        <i class="fas fa-external-link-alt mr-2"></i>Open Document
                    </a>
                    <button onclick="copyToClipboard('{{ $document->file_url }}')" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg transition duration-200">
                        <i class="fas fa-copy mr-2"></i>Copy Link
                    </button>
                    <a href="{{ route('admin.documents.edit', $document) }}" class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded-lg transition duration-200">
                        <i class="fas fa-edit mr-2"></i>Edit Document
                    </a>
                </div>
            </div>
        </div>

        <!-- Visibility Information -->
        <div class="mt-8 bg-blue-50 rounded-xl p-6">
            <h4 class="text-lg font-semibold text-blue-800 mb-2">
                <i class="fas fa-eye mr-2"></i>Document Visibility
            </h4>
            <p class="text-blue-700">
                This document is visible to all participants in the <strong>{{ $document->category_name }}</strong> category 
                on the public homepage. Participants can access this document without logging in.
            </p>
        </div>
    </div>

    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                // You could add a toast notification here
                alert('Link copied to clipboard!');
            });
        }
    </script>
</body>
</html>
