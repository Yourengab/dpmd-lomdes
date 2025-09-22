<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tahap Pemaparan - District Scoring</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-6">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">{{ $template->title }}</h1>
                        <p class="text-sm text-gray-600 mt-1">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                <i class="fas fa-building mr-1"></i>
                                District Scoring
                            </span>
                        </p>
                    </div>
                     <a href="{{ route('judge.scoring') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Kembali
                        </a>
                </div>
            </div>
            
            @if($template->description)
            <div class="px-6 py-4">
                <p class="text-gray-700">{{ $template->description }}</p>
            </div>
            @endif
        </div>

        <!-- Scoring Form -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900">
                    <i class="fas fa-clipboard-list mr-2 text-purple-600"></i>
                    District Scoring Sheet
                </h2>
                <p class="text-sm text-gray-600 mt-1">Complete the scoring form for district-level evaluation</p>
            </div>
            
            <div class="p-6">
                @if($template->district_spreadsheet_url)
                    <div class="mb-6">
                        <div class="bg-purple-50 border border-purple-200 rounded-lg p-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-info-circle text-purple-400 mt-0.5"></i>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-purple-800">Scoring Instructions</h3>
                                    <p class="mt-1 text-sm text-purple-700">
                                        Click the button below to access the district scoring spreadsheet. Evaluate district-level performance and submit your scores.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <iframe src="{{ $template->district_spreadsheet_url }}" class="w-full h-[600px] border rounded-lg" allowfullscreen></iframe>
                    </div>
                    
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <div class="bg-gray-50 rounded-lg p-4">
                            <h4 class="text-sm font-medium text-gray-900 mb-2">
                                <i class="fas fa-lightbulb mr-1 text-yellow-500"></i>
                                District Scoring Guidelines
                            </h4>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>• Evaluate district-level coordination and management</li>
                                <li>• Assess policy implementation and governance</li>
                                <li>• Consider inter-village collaboration and support</li>
                                <li>• Review resource allocation and utilization</li>
                                <li>• Analyze overall district impact and outcomes</li>
                                <li>• Submit your final scores before the deadline</li>
                            </ul>
                        </div>
                    </div>
                @else
                    <div class="text-center py-8">
                        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-6">
                            <i class="fas fa-exclamation-triangle text-yellow-400 text-3xl mb-4"></i>
                            <h3 class="text-lg font-medium text-yellow-800 mb-2">Scoring Sheet Not Available</h3>
                            <p class="text-yellow-700">The district scoring spreadsheet has not been configured yet. Please contact the administrator.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Additional Information -->
        <div class="mt-6 bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                    <i class="fas fa-info-circle mr-2 text-gray-600"></i>
                    Additional Information
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h4 class="font-medium text-gray-900 mb-2">Template Details</h4>
                        <dl class="text-sm text-gray-600 space-y-1">
                            <div class="flex justify-between">
                                <dt>Category:</dt>
                                <dd class="font-medium">Tahap Pemaparan</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt>Type:</dt>
                                <dd class="font-medium">District</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt>Created:</dt>
                                <dd class="font-medium">{{ $template->created_at->format('M d, Y') }}</dd>
                            </div>
                        </dl>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h4 class="font-medium text-gray-900 mb-2">District Evaluation Focus</h4>
                        <ul class="text-sm text-gray-600 space-y-1">
                            <li>• Strategic planning and coordination</li>
                            <li>• Multi-village program integration</li>
                            <li>• Resource mobilization and distribution</li>
                            <li>• Policy alignment and compliance</li>
                            <li>• Regional impact and sustainability</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
