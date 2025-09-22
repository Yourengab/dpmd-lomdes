<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Inovasi - Scoring</title>
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
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                <i class="fas fa-lightbulb mr-1"></i>
                                Daftar Inovasi
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
                    <i class="fas fa-clipboard-list mr-2 text-indigo-600"></i>
                    Innovation List Scoring Sheet
                </h2>
                <p class="text-sm text-gray-600 mt-1">Complete the scoring form for innovation evaluation</p>
            </div>
            
            <div class="p-6">
                @if($template->spreadsheet_url)
                    <div class="mb-6">
                        <div class="bg-indigo-50 border border-indigo-200 rounded-lg p-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-info-circle text-indigo-400 mt-0.5"></i>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-indigo-800">Scoring Instructions</h3>
                                    <p class="mt-1 text-sm text-indigo-700">
                                        Click the button below to access the innovation list scoring spreadsheet. Evaluate innovation quality, impact, and potential for replication.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <iframe src="{{ $template->spreadsheet_url }}" class="w-full h-[600px] border rounded-lg" allowfullscreen></iframe>
                    </div>
                    
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <div class="bg-gray-50 rounded-lg p-4">
                            <h4 class="text-sm font-medium text-gray-900 mb-2">
                                <i class="fas fa-lightbulb mr-1 text-yellow-500"></i>
                                Innovation Scoring Guidelines
                            </h4>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>• Assess innovation originality and creativity</li>
                                <li>• Evaluate practical implementation feasibility</li>
                                <li>• Consider measurable impact and outcomes</li>
                                <li>• Review scalability and replication potential</li>
                                <li>• Analyze resource efficiency and sustainability</li>
                                <li>• Document supporting evidence and rationale</li>
                            </ul>
                        </div>
                    </div>
                @else
                    <div class="text-center py-8">
                        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-6">
                            <i class="fas fa-exclamation-triangle text-yellow-400 text-3xl mb-4"></i>
                            <h3 class="text-lg font-medium text-yellow-800 mb-2">Scoring Sheet Not Available</h3>
                            <p class="text-yellow-700">The innovation list scoring spreadsheet has not been configured yet. Please contact the administrator.</p>
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
                                <dd class="font-medium">Daftar Inovasi</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt>Type:</dt>
                                <dd class="font-medium">Innovation List</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt>Created:</dt>
                                <dd class="font-medium">{{ $template->created_at->format('M d, Y') }}</dd>
                            </div>
                        </dl>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h4 class="font-medium text-gray-900 mb-2">Innovation Evaluation Criteria</h4>
                        <ul class="text-sm text-gray-600 space-y-1">
                            <li>• Novelty and uniqueness of approach</li>
                            <li>• Technical feasibility and implementation</li>
                            <li>• Social and economic impact</li>
                            <li>• Environmental sustainability</li>
                            <li>• Potential for widespread adoption</li>
                            <li>• Cost-effectiveness and efficiency</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Innovation Categories -->
        <div class="mt-6 bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                    <i class="fas fa-tags mr-2 text-gray-600"></i>
                    Innovation Categories
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-blue-50 rounded-lg p-4 text-center">
                        <i class="fas fa-cogs text-blue-600 text-2xl mb-2"></i>
                        <h4 class="font-medium text-blue-900">Technical Innovation</h4>
                        <p class="text-sm text-blue-700 mt-1">Technology-based solutions and digital innovations</p>
                    </div>
                    <div class="bg-green-50 rounded-lg p-4 text-center">
                        <i class="fas fa-users text-green-600 text-2xl mb-2"></i>
                        <h4 class="font-medium text-green-900">Social Innovation</h4>
                        <p class="text-sm text-green-700 mt-1">Community-driven and social impact solutions</p>
                    </div>
                    <div class="bg-purple-50 rounded-lg p-4 text-center">
                        <i class="fas fa-leaf text-purple-600 text-2xl mb-2"></i>
                        <h4 class="font-medium text-purple-900">Environmental Innovation</h4>
                        <p class="text-sm text-purple-700 mt-1">Sustainable and eco-friendly innovations</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
