<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Scoring Template - DPMD Lomdes</title>
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
            <a href="{{ route('admin.scoring-templates.index') }}" class="mr-4 text-gray-600 hover:text-gray-800">
                <i class="fas fa-arrow-left text-xl"></i>
            </a>
            <div>
                <h2 class="text-3xl font-bold text-gray-800">Add Scoring Template</h2>
                <p class="text-gray-600 mt-2">Create a new scoring template for competition documents</p>
            </div>
        </div>

        <!-- Form -->
        <div class="bg-white rounded-xl shadow-md p-8">
            <form method="POST" action="{{ route('admin.scoring-templates.store') }}" class="space-y-6">
                @csrf
                
                <!-- Title Field -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-heading mr-2"></i>Template Title *
                    </label>
                    <input 
                        type="text" 
                        id="title" 
                        name="title" 
                        value="{{ old('title') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200 @error('title')  @enderror"
                        placeholder="e.g., Scoring Template for Village Registration"
                        required
                    >
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category Selection -->
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-tags mr-2"></i>Template Category *
                    </label>
                    <select 
                        id="category" 
                        name="category" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200 @error('category') @enderror"
                        required
                        onchange="toggleFields()"
                    >
                        <option value="">Choose template category</option>
                        <option value="tahap_administrasi" {{ old('category') === 'tahap_administrasi' ? 'selected' : '' }}>Tahap Administrasi</option>
                        <option value="tahap_pemaparan" {{ old('category') === 'tahap_pemaparan' ? 'selected' : '' }}>Tahap Pemaparan</option>
                        <option value="tahap_klarifikasi_lapangan" {{ old('category') === 'tahap_klarifikasi_lapangan' ? 'selected' : '' }}>Tahap Klarifikasi Lapangan</option>
                        <option value="daftar_inovasi" {{ old('category') === 'daftar_inovasi' ? 'selected' : '' }}>Daftar Inovasi Desa & Kelurahan</option>
                    </select>
                    @error('category')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Document Selection (only for Tahap Administrasi) -->
                <div id="document_selection" style="display: none;">
                    <label for="admin_document_id" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-file-alt mr-2"></i>Select Document *
                    </label>
                    <select 
                        id="admin_document_id" 
                        name="admin_document_id" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200 @error('admin_document_id') @enderror"
                    >
                        <option value="">Choose a document to create scoring template for</option>
                        @foreach($documents as $document)
                            <option value="{{ $document->id }}" {{ old('admin_document_id') == $document->id ? 'selected' : '' }}>
                                {{ $document->title }} ({{ ucfirst($document->category) }})
                            </option>
                        @endforeach
                    </select>
                    <p class="text-sm text-gray-500 mt-1">
                        <i class="fas fa-info-circle mr-1"></i>
                        Select the document that this scoring template will be used for
                    </p>
                    @error('admin_document_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Spreadsheet URL Field (for Tahap Administrasi, Klarifikasi Lapangan, Daftar Inovasi) -->
                <div id="spreadsheet_url_field" style="display: none;">
                    <label for="spreadsheet_url" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-table mr-2"></i>Spreadsheet URL *
                    </label>
                    <input 
                        type="url" 
                        id="spreadsheet_url" 
                        name="spreadsheet_url" 
                        value="{{ old('spreadsheet_url') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200 @error('spreadsheet_url') @enderror"
                        placeholder="https://docs.google.com/spreadsheets/d/..."
                    >
                    <p class="text-sm text-gray-500 mt-1">
                        <i class="fas fa-info-circle mr-1"></i>
                        Paste the public link to your Google Sheets scoring template
                    </p>
                    @error('spreadsheet_url')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Event Date Field (for Tahap Klarifikasi Lapangan) -->
                <div id="event_date_field" style="display: none;">
                    <label for="event_date" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-calendar mr-2"></i>Event Date *
                    </label>
                    <input 
                        type="date" 
                        id="event_date" 
                        name="event_date" 
                        value="{{ old('event_date') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200 @error('event_date') @enderror"
                    >
                    @error('event_date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tahap Pemaparan Fields -->
                <div id="pemaparan_fields" style="display: none;">
                    <div class="space-y-6">
                        <div>
                            <label for="questions_spreadsheet_url" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-question-circle mr-2"></i>Daftar Pertanyaan Pemaparan URL *
                            </label>
                            <input 
                                type="url" 
                                id="questions_spreadsheet_url" 
                                name="questions_spreadsheet_url" 
                                value="{{ old('questions_spreadsheet_url') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200 @error('questions_spreadsheet_url') @enderror"
                                placeholder="https://docs.google.com/spreadsheets/d/..."
                            >
                            @error('questions_spreadsheet_url')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="village_spreadsheet_url" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-home mr-2"></i>Nilai Pemaparan Desa URL *
                            </label>
                            <input 
                                type="url" 
                                id="village_spreadsheet_url" 
                                name="village_spreadsheet_url" 
                                value="{{ old('village_spreadsheet_url') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200 @error('village_spreadsheet_url') @enderror"
                                placeholder="https://docs.google.com/spreadsheets/d/..."
                            >
                            @error('village_spreadsheet_url')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="district_spreadsheet_url" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-building mr-2"></i>Nilai Pemaparan Kelurahan URL *
                            </label>
                            <input 
                                type="url" 
                                id="district_spreadsheet_url" 
                                name="district_spreadsheet_url" 
                                value="{{ old('district_spreadsheet_url') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200 @error('district_spreadsheet_url') @enderror"
                                placeholder="https://docs.google.com/spreadsheets/d/..."
                            >
                            @error('district_spreadsheet_url')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Description Field -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-align-left mr-2"></i>Description
                    </label>
                    <textarea 
                        id="description" 
                        name="description" 
                        rows="4"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200 @error('description')  @enderror"
                        placeholder="Brief description of the scoring criteria and guidelines..."
                    >{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Buttons -->
                <div class="flex justify-end space-x-4 pt-6">
                    <a href="{{ route('admin.scoring-templates.index') }}" class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition duration-200">
                        Cancel
                    </a>
                    <button 
                        type="submit" 
                        class="px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2"
                    >
                        <i class="fas fa-save mr-2"></i>Create Template
                    </button>
                </div>
            </form>
        </div>

        <!-- Help Section -->
        <div class="mt-8 bg-purple-50 rounded-xl p-6">
            <h3 class="text-lg font-semibold text-purple-800 mb-3">
                <i class="fas fa-lightbulb mr-2"></i>Scoring Template Tips
            </h3>
            <div class="space-y-2 text-purple-700">
                <p><strong>Google Sheets:</strong> Make sure to set sharing permissions to "Anyone with the link can view"</p>
                <p><strong>Template Structure:</strong> Include criteria, scoring ranges, and clear instructions for judges</p>
                <p><strong>Document Link:</strong> This template will be linked to the selected document for judges to use</p>
                <p><strong>Access:</strong> Judges will be able to view and use this scoring template in their dashboard</p>
            </div>
        </div>
    </div>

    <script>
        function toggleFields() {
            const category = document.getElementById('category').value;
            
            // Hide all conditional fields
            document.getElementById('document_selection').style.display = 'none';
            document.getElementById('spreadsheet_url_field').style.display = 'none';
            document.getElementById('event_date_field').style.display = 'none';
            document.getElementById('pemaparan_fields').style.display = 'none';
            
            // Clear required attributes
            document.getElementById('admin_document_id').removeAttribute('required');
            document.getElementById('spreadsheet_url').removeAttribute('required');
            document.getElementById('event_date').removeAttribute('required');
            document.getElementById('questions_spreadsheet_url').removeAttribute('required');
            document.getElementById('village_spreadsheet_url').removeAttribute('required');
            document.getElementById('district_spreadsheet_url').removeAttribute('required');
            
            // Show relevant fields based on category
            switch(category) {
                case 'tahap_administrasi':
                    document.getElementById('document_selection').style.display = 'block';
                    document.getElementById('spreadsheet_url_field').style.display = 'block';
                    document.getElementById('admin_document_id').setAttribute('required', 'required');
                    document.getElementById('spreadsheet_url').setAttribute('required', 'required');
                    break;
                case 'tahap_pemaparan':
                    document.getElementById('pemaparan_fields').style.display = 'block';
                    document.getElementById('questions_spreadsheet_url').setAttribute('required', 'required');
                    document.getElementById('village_spreadsheet_url').setAttribute('required', 'required');
                    document.getElementById('district_spreadsheet_url').setAttribute('required', 'required');
                    break;
                case 'tahap_klarifikasi_lapangan':
                    document.getElementById('event_date_field').style.display = 'block';
                    document.getElementById('spreadsheet_url_field').style.display = 'block';
                    document.getElementById('event_date').setAttribute('required', 'required');
                    document.getElementById('spreadsheet_url').setAttribute('required', 'required');
                    break;
                case 'daftar_inovasi':
                    document.getElementById('spreadsheet_url_field').style.display = 'block';
                    document.getElementById('spreadsheet_url').setAttribute('required', 'required');
                    break;
            }
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            toggleFields();
        });
    </script>
</body>
</html>
