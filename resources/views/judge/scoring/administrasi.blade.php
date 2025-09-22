<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tahap Administrasi - Scoring</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-6">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">{{ $template->title }}</h1>
                        <p class="text-sm text-gray-600 mt-1">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                <i class="fas fa-file-alt mr-1"></i>
                                Tahap Administrasi
                            </span>
                        </p>
                    </div>
                    <div class="flex items-center space-x-3">
                        <a href="{{ route('judge.scoring') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                            <i class="fas fa-arrow-left mr-2"></i>Kembali
                        </a>
                    </div>
                </div>
            </div>
            
        <!-- Scoring Section -->
        @if($template->spreadsheet_url)
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-6">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900">
                    <i class="fas fa-star mr-2 text-yellow-600"></i>
                    Scoring Form
                </h2>
                <p class="text-sm text-gray-600 mt-1">Use the spreadsheet below to input your scores for administrative evaluation</p>
            </div>
            
            <div class="p-6">
                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-4">
                    <div class="flex items-start">
                        <i class="fas fa-info-circle text-yellow-600 mt-0.5 mr-3"></i>
                        <div>
                            <h4 class="font-medium text-yellow-900 mb-1">Scoring Instructions</h4>
                            <p class="text-sm text-yellow-800">
                                Review all administrative documents above, then use the scoring spreadsheet to evaluate each criterion. 
                                Consider document completeness, accuracy, and compliance with requirements.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <iframe src="{{ $template->spreadsheet_url }}" 
                            class="w-full h-96 border-0"
                            title="Administrative Scoring Form">
                    </iframe>
                </div>
                
                <div class="mt-4 flex items-center justify-between">
                    <a href="{{ $template->spreadsheet_url }}" target="_blank" 
                       class="inline-flex items-center px-4 py-2 border border-blue-300 rounded-md shadow-sm text-sm font-medium text-blue-700 bg-blue-50 hover:bg-blue-100">
                        <i class="fas fa-external-link-alt mr-2"></i>
                        Open in New Tab
                    </a>
                    
                    <div class="text-sm text-gray-600">
                        <i class="fas fa-clock mr-1"></i>
                        Remember to save your progress regularly
                    </div>
                </div>
            </div>
        </div>
        @endif

       
    </div>
</div>
</body>
</html>
