@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gradient-to-b from-gray-900 to-gray-800 text-gray-100">
        <div class="container mx-auto px-4 py-8">
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-white mb-2">Edit Surat Masuk</h1>
                    <p class="text-gray-400">Update data information for {{ $data->name }}</p>
                </div>
                <div class="flex gap-3 mt-4 md:mt-0">

                    <a href="{{ route('admin.profile') }}"
                        class="bg-gray-700 hover:bg-gray-600 text-white font-medium py-2.5 px-5 rounded-lg flex items-center gap-2 transition-all duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                                clip-rule="evenodd" />
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>

            <!-- Notifications -->
            @if (session('success'))
                <div
                    class="bg-emerald-900/50 border-l-4 border-emerald-500 text-emerald-200 p-4 mb-6 rounded-r-lg flex items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-emerald-400 flex-shrink-0"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-rose-900/50 border-l-4 border-rose-500 text-rose-200 p-4 mb-6 rounded-r-lg">
                    <div class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-rose-400 flex-shrink-0"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="font-medium">Please correct the following errors:</span>
                    </div>
                    <ul class="mt-2 ml-9 list-disc text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @elseif (session('error'))
                <div class="bg-rose-900/50 border-l-4 border-rose-500 text-rose-200 p-4 mb-6 rounded-r-lg flex items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-rose-400 flex-shrink-0" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <!-- Form Card -->
            <div
                class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl border border-gray-700/50 shadow-xl overflow-hidden mb-8">
                <div class="p-6 border-b border-gray-700/50">
                    <h2 class="text-xl font-semibold text-white flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                        </svg>
                        Edit data Information
                    </h2>
                </div>

                <form action="{{ route('admin.profile.update', $data->id) }}" method="POST" enctype="multipart/form-data"
                    class="p-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Left Column -->
                        <div class="space-y-6">
                            <!-- Nama Surat -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-300 mb-1">Nama Surat
                                    <span class="text-rose-400">*</span></label>
                                <input type="text" id="name" name="name" value="{{ old('name', $data->name) }}"
                                    class="w-full px-4 py-2.5 bg-gray-900/70 border border-gray-700/50 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-transparent transition-all duration-200"
                                    placeholder="Enter Nama Surat">
                                @error('name')
                                    <p class="mt-1 text-sm text-rose-400">{{ $message }}</p>
                                @enderror
                            </div>


                            <!-- email and Tanggal Diterima -->
                            <div class="grid grid-cols-2 gap-4">
                                <!-- email -->
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Tanggal
                                        Surat <span class="text-rose-400">*</span></label>
                                    <div class="relative">

                                        <input type="email" id="email" name="email"
                                            value="{{ old('email', $data->email) }}"
                                            class="w-full pl-4 pr-4 py-2.5 bg-gray-900/70 border border-gray-700/50 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-transparent transition-all duration-200"
                                            placeholder="0.00">
                                    </div>
                                    @error('email')
                                        <p class="mt-1 text-sm text-rose-400">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Discount -->
                                <div>
                                    <label for="password" class="block text-sm font-medium text-gray-300 mb-1">Tanggal
                                        Diterima <span class="text-rose-400">*</span></label>
                                    <div class="relative">

                                        <input type="password" id="password" name="password"
                                            value="{{ old('password', $data->password) }}"
                                            class="w-full pl-4 pr-4 py-2.5 bg-gray-900/70 border border-gray-700/50 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-transparent transition-all duration-200"
                                            placeholder="0.00">
                                    </div>
                                    @error('password')
                                        <p class="mt-1 text-sm text-rose-400">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- role -->
                            <div>
                                <label for="role" class="block text-sm font-medium text-gray-300 mb-1">role <span
                                        class="text-rose-400">*</span></label>
                                <select name="role" required class="w-full p-3 rounded bg-gray-800 text-white mb-4"
                                    required>
                                    <option value="">-- Pilih role --</option>
                                    <option value="admin" {{ old('role', $data->role) == 'admin' ? 'selected' : '' }}>
                                        admin</option>
                                    <option value="sekretaris"
                                        {{ old('role', $data->role) == 'sekretaris' ? 'selected' : '' }}>
                                        sekretaris</option>
                                    <option value="ketua" {{ old('role', $data->role) == 'ketua' ? 'selected' : '' }}>
                                        ketua</option>
                                </select>
                                @error('role')
                                    <p class="mt-1 text-sm text-rose-400">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        <!-- Right Column -->
                        <div class="space-y-6">

                            <!-- Current Image Preview -->
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Current Image</label>
                                <div
                                    class="bg-gray-900/70 border border-gray-700/50 rounded-lg p-4 flex items-center justify-center">
                                    @if ($data->file)
                                        <div class="relative group">
                                            <div
                                                class="absolute -inset-1 bg-gradient-to-r from-cyan-600 to-blue-600 rounded-lg blur opacity-25 group-hover:opacity-40 transition duration-1000 group-hover:duration-200">
                                            </div>
                                            <div class="relative">
                                                <img src="{{ filter_var($data->file, FILTER_VALIDATE_URL) ? $data->file : Storage::url($data->file) }}"
                                                    alt="{{ $data->name }}" class="h-40 object-contain rounded-lg"
                                                    loading="lazy" onerror="this.src='/images/fallback.jpg'"
                                                    id="current-file">
                                            </div>
                                        </div>
                                    @else
                                        <div class="h-40 w-full flex items-center justify-center text-gray-500">
                                            <div class="text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-12 w-12 mx-auto text-gray-600 mb-2" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                <p>No image available</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- file Upload -->
                            <div>
                                <label for="file" class="block text-sm font-medium text-gray-300 mb-1">New file
                                    (Upload)</label>
                                <div
                                    class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-700 border-dashed rounded-lg">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                            viewBox="0 0 48 48" aria-hidden="true">
                                            <path
                                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-400">
                                            <label for="file"
                                                class="relative cursor-pointer bg-gray-800 rounded-md font-medium text-cyan-400 hover:text-cyan-300 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-cyan-500">
                                                <span class="px-2">Upload a file</span>
                                                <input id="file" name="file" type="file" class="sr-only"
                                                    onchange="previewImage(this)">
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-500">PDF, DOCX, PNG up to 10MB</p>
                                    </div>
                                </div>
                                @error('file')
                                    <p class="mt-1 text-sm text-rose-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="mt-8 pt-6 border-t border-gray-700/50 flex flex-wrap gap-3">
                        <button type="submit"
                            class="bg-cyan-600 hover:bg-cyan-700 text-white font-medium py-2.5 px-6 rounded-lg transition-all duration-200 shadow-lg shadow-cyan-900/20 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                            Update Surat
                        </button>
                        <a href="{{ route('admin.profile') }}"
                            class="bg-gray-700 hover:bg-gray-600 text-white font-medium py-2.5 px-6 rounded-lg transition-all duration-200 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        /* Custom scrollbar for webkit browsers */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(31, 41, 55, 0.5);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(75, 85, 99, 0.5);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: rgba(107, 114, 128, 0.5);
        }

        /* File input styling */
        input[type="file"]::file-selector-button {
            border: none;
            background: #374151;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            color: white;
            cursor: pointer;
            transition: background 0.2s ease-in-out;
        }

        input[type="file"]::file-selector-button:hover {
            background: #4B5563;
        }

        /* Glow effects */
        .bg-gradient-to-r {
            animation: glow 2s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from {
                opacity: 0.25;
            }

            to {
                opacity: 0.35;
            }
        }

        /* Smooth transitions */
        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 300ms;
        }
    </style>

    <script>
        function previewImage(input) {
            const previewContainer = document.getElementById('current-file');
            const file = input.files[0];

            if (!file || !previewContainer) return;

            const fileType = file.type;

            // Hanya untuk gambar
            if (fileType.startsWith("image/")) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewContainer.src = e.target.result;
                    previewContainer.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                // Jika bukan gambar, sembunyikan gambar dan tampilkan URL
                previewContainer.style.display = 'none';

                // Hapus link sebelumnya jika ada
                const existingLink = document.getElementById('file-link');
                if (existingLink) {
                    existingLink.remove();
                }

                // Tampilkan nama file
                const fileUrl = URL.createObjectURL(file);
                const link = document.createElement('a');
                link.href = fileUrl;
                link.id = 'file-link';
                link.textContent = 'Lihat File (' + file.name + ')';
                link.className = 'text-cyan-400 hover:text-cyan-300 mt-3 block';
                link.target = '_blank';

                previewContainer.parentNode.appendChild(link);
            }
        }
    </script>

@endsection
