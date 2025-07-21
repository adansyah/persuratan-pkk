@extends('layouts.app')

@section('title', 'Add Profile')

@section('content')
    <div class="min-h-screen bg-gradient-to-b from-gray-900 to-gray-800 text-gray-100">
        <div class="container mx-auto px-4 py-8">
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-white mb-2">Add Profile</h1>
                    <p class="text-gray-400">Menambah data Informasi Pengguna </p>
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
                        Insert data Information
                    </h2>
                </div>

                <form action="{{ route('admin.profile.store') }}" method="POST" enctype="multipart/form-data"
                    class="p-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Left Column -->
                        <div class="space-y-6">
                            <!-- Nama  -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-300 mb-1">Nama Lengkap
                                    <span class="text-rose-400">*</span></label>
                                <input type="text" id="name" name="name"
                                    class="w-full px-4 py-2.5 bg-gray-900/70 border border-gray-700/50 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-transparent transition-all duration-200"
                                    placeholder="Enter Nama ">
                                @error('name')
                                    <p class="mt-1 text-sm text-rose-400">{{ $message }}</p>
                                @enderror
                            </div>


                            <!-- email  -->
                            <!-- email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-300 mb-1">email <span
                                        class="text-rose-400">*</span></label>
                                <div class="relative">

                                    <input type="email" id="email" name="email"
                                        class="w-full pl-4 pr-4 py-2.5 bg-gray-900/70 border border-gray-700/50 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-transparent transition-all duration-200"
                                        placeholder="Enter Email">
                                </div>
                                @error('email')
                                    <p class="mt-1 text-sm text-rose-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- password -->
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-300 mb-1">Password

                                    <div class="relative">

                                        <input type="password" id="password" name="password"
                                            class="w-full pl-4 pr-4 py-2.5 bg-gray-900/70 border border-gray-700/50 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-transparent transition-all duration-200"
                                            placeholder="********" required>
                                    </div>
                                    @error('password')
                                        <p class="mt-1 text-sm text-rose-400">{{ $message }}</p>
                                    @enderror
                            </div>

                            <!-- role -->
                            <div>
                                <label for="role" class="block text-sm font-medium text-gray-300 mb-1">Jabatan <span
                                        class="text-rose-400">*</span></label>
                                <select name="role" required class="w-full p-3 rounded bg-gray-800 text-white mb-4"
                                    required>
                                    <option value="">-- Pilih Jabatan --</option>
                                    <option value="admin">
                                        admin</option>
                                    <option value="sekretaris">
                                        sekretaris</option>
                                    <option value="ketua">
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
                                    <div class="relative group">
                                        <div
                                            class="absolute -inset-1 bg-gradient-to-r from-cyan-600 to-blue-600 rounded-lg blur opacity-25 group-hover:opacity-40 transition duration-1000 group-hover:duration-200">
                                        </div>
                                        <div class="relative">
                                            <img src="" alt="no data" class="h-40 object-contain rounded-lg"
                                                loading="lazy" onerror="this.src='/images/fallback.jpg'"
                                                id="current-file">
                                        </div>
                                    </div>

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
                                        <p class="text-xs text-gray-500">PNG, JPG, JPEG up to 5MB</p>
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
                            Update
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
            if (input.files && input.files[0]) {
                const file = input.files[0];
                const currentImage = document.getElementById('current-file');

                if (file.type.startsWith("image/")) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        if (currentImage) {
                            currentImage.src = e.target.result;
                        }
                    }

                    reader.readAsDataURL(file);
                } else {
                    alert("Hanya file gambar (JPG, PNG, JPEG) yang bisa ditampilkan.");
                    input.value = ""; // reset input
                }
            }
        }
    </script>


@endsection
