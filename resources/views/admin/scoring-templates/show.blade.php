<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $scoringTemplate->title }} - DPMD Lomdes</title>
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
    <div class="max-w-5xl mx-auto px-4 py-8">
        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center">
                <a href="{{ route('admin.scoring-templates.index') }}" class="mr-4 text-gray-600 hover:text-gray-800">
                    <i class="fas fa-arrow-left text-xl"></i>
                </a>
                <div>
                    <h2 class="text-3xl font-bold text-gray-800">{{ $scoringTemplate->title }}</h2>
                    <p class="text-gray-600 mt-2">Scoring template details and preview</p>
                </div>
            </div>
            
            <div class="flex space-x-3">
                <a href="{{ route('admin.scoring-templates.edit', $scoringTemplate) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg transition duration-200">
                    <i class="fas fa-edit mr-2"></i>Edit
                </a>
                <form method="POST" action="{{ route('admin.scoring-templates.destroy', $scoringTemplate) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this template?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition duration-200">
                        <i class="fas fa-trash mr-2"></i>Delete
                    </button>
                </form>
            </div>
        </div>

        <!-- Template Info -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
            <!-- Template Details -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Template Information</h3>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="text-sm font-medium text-gray-600">Template Title</label>
                            <p class="text-gray-800 font-medium">{{ $scoringTemplate->title }}</p>
                        </div>
                        
                        <div>
                            <label class="text-sm font-medium text-gray-600">Category</label>
                            @php
                                $categoryConfig = [
                                    'tahap_administrasi' => ['color' => 'green', 'label' => 'Tahap Administrasi'],
                                    'tahap_pemaparan' => ['color' => 'purple', 'label' => 'Tahap Pemaparan'],
                                    'tahap_klarifikasi_lapangan' => ['color' => 'orange', 'label' => 'Tahap Klarifikasi Lapangan'],
                                    'daftar_inovasi' => ['color' => 'blue', 'label' => 'Daftar Inovasi']
                                ];
                                $config = $categoryConfig[$scoringTemplate->category] ?? ['color' => 'gray', 'label' => 'Unknown'];
                            @endphp
                            <p class="text-gray-800 font-medium">{{ $config['label'] }}</p>
                            <span class="inline-block px-2 py-1 bg-{{ $config['color'] }}-100 text-{{ $config['color'] }}-800 rounded-full text-xs mt-1">
                                {{ $config['label'] }}
                            </span>
                        </div>

                        @if($scoringTemplate->adminDocument)
                            <div>
                                <label class="text-sm font-medium text-gray-600">Linked Document</label>
                                <p class="text-gray-800 font-medium">{{ $scoringTemplate->adminDocument->title }}</p>
                                <span class="inline-block px-2 py-1 bg-gray-100 text-gray-800 rounded-full text-xs mt-1">
                                    {{ ucfirst($scoringTemplate->adminDocument->category) }}
                                </span>
                            </div>
                        @endif

                        @if($scoringTemplate->event_date)
                            <div>
                                <label class="text-sm font-medium text-gray-600">Event Date</label>
                                <p class="text-gray-800 font-medium">{{ $scoringTemplate->event_date->format('d M Y') }}</p>
                            </div>
                        @endif
                        
                        @if($scoringTemplate->description)
                            <div>
                                <label class="text-sm font-medium text-gray-600">Description</label>
                                <p class="text-gray-800">{{ $scoringTemplate->description }}</p>
                            </div>
                        @endif
                        
                        <div>
                            <label class="text-sm font-medium text-gray-600">Created</label>
                            <p class="text-gray-800">{{ $scoringTemplate->created_at->format('d M Y, H:i') }}</p>
                        </div>
                        
                        <div>
                            <label class="text-sm font-medium text-gray-600">Last Updated</label>
                            <p class="text-gray-800">{{ $scoringTemplate->updated_at->format('d M Y, H:i') }}</p>
                        </div>
                        
                        <div class="pt-4 border-t">
                            <a href="{{ $scoringTemplate->spreadsheet_url }}" target="_blank" class="flex items-center justify-center w-full bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-lg transition duration-200">
                                <i class="fas fa-external-link-alt mr-2"></i>Open Spreadsheet
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Embedded Spreadsheet -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="bg-gradient-to-r from-purple-500 to-purple-600 p-4">
                        <h3 class="text-lg font-semibold text-white">
                            <i class="fas fa-table mr-2"></i>Scoring Template Preview
                        </h3>
                    </div>
                    
                    <div class="p-4">
                        <div class="border border-gray-200 rounded-lg overflow-hidden">
                            <iframe src="{{ $scoringTemplate->spreadsheet_url }}{{ strpos($scoringTemplate->spreadsheet_url, '?') !== false ? '&' : '?' }}embedded=true" 
                                    width="100%" 
                                    height="600" 
                                    frameborder="0"
                                    class="w-full">
                                Loading spreadsheet...
                            </iframe>
                        </div>
                        <p class="text-sm text-gray-500 mt-2">
                            <i class="fas fa-info-circle mr-1"></i>
                            If the spreadsheet doesn't load properly, <a href="{{ $scoringTemplate->spreadsheet_url }}" target="_blank" class="text-purple-600 hover:underline">click here to open it in a new tab</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Document Information -->
        @if($scoringTemplate->adminDocument)
        <div class="bg-white rounded-xl shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">
                <i class="fas fa-file-alt mr-2"></i>Related Document Information
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="text-sm font-medium text-gray-600">Document Title</label>
                    <p class="text-gray-800 font-medium">{{ $scoringTemplate->adminDocument->title }}</p>
                </div>
                
                <div>
                    <label class="text-sm font-medium text-gray-600">Category</label>
                    <p class="text-gray-800 font-medium">{{ ucfirst($scoringTemplate->adminDocument->category) }}</p>
                </div>
                
                @if($scoringTemplate->adminDocument->description)
                    <div class="md:col-span-2">
                        <label class="text-sm font-medium text-gray-600">Document Description</label>
                        <p class="text-gray-800">{{ $scoringTemplate->adminDocument->description }}</p>
                    </div>
                @endif
                
                <div class="md:col-span-2">
                    <a href="{{ $scoringTemplate->adminDocument->file_url }}" target="_blank" class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-200">
                        <i class="fas fa-external-link-alt mr-2"></i>View Registration Form
                    </a>
                </div>
            </div>
        </div>
        @else
        <div class="bg-white rounded-xl shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">
                <i class="fas fa-info-circle mr-2"></i>Template Information
            </h3>
            <div class="bg-gray-50 rounded-lg p-4">
                <p class="text-gray-600">This scoring template is not associated with a specific registration document.</p>
            </div>
        </div>
        @endif
    </div>
</body>
</html>
