@extends('layouts.app')

@section('title', 'Edit Surat Keluar')

@section('content')
    <div class="min-h-screen bg-gradient-to-b from-gray-900 to-gray-800 text-gray-100">
        <div class="container mx-auto px-4 py-8">
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-white mb-2">Edit Surat Keluar</h1>
                    <p class="text-gray-400">Update data information for {{ $data->nama_surat }}</p>
                </div>
                <div class="flex gap-3 mt-4 md:mt-0">
                    {{-- <a href="{{ route('datas.show', $data->pro_id) }}"
                        class="bg-gray-700 hover:bg-gray-600 text-white font-medium py-2.5 px-5 rounded-lg flex items-center gap-2 transition-all duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                            <path fill-rule="evenodd"
                                d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                clip-rule="evenodd" />
                        </svg>
                        View data
                    </a> --}}
                    <a href="{{ route('sekretaris.surat-keluar.index') }}"
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

                <form action="{{ route('sekretaris.surat-keluar.update', $data->no_surat) }}" method="POST"
                    enctype="multipart/form-data" class="p-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Left Column -->
                        <div class="space-y-6">
                            <!-- Nama Surat -->
                            <input type="text"
                                class="w-full px-4 py-2.5 bg-gray-900/70 border border-gray-700/50 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-transparent transition-all duration-200"
                                name="no_surat" value="{{ $data->no_surat }}" hidden">
                            <div>
                                <label for="nama_surat" class="block text-sm font-medium text-gray-300 mb-1">Nama Surat
                                    <span class="text-rose-400">*</span></label>
                                <input type="text" id="nama_surat" name="nama_surat"
                                    value="{{ old('nama_surat', $data->nama_surat) }}"
                                    class="w-full px-4 py-2.5 bg-gray-900/70 border border-gray-700/50 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-transparent transition-all duration-200"
                                    placeholder="Enter Nama Surat">
                                @error('nama_surat')
                                    <p class="mt-1 text-sm text-rose-400">{{ $message }}</p>
                                @enderror
                            </div>


                            <!-- Tanggal_Surat and Tanggal Diterima -->
                            <div class="grid grid-cols-2 gap-4">
                                <!-- Tanggal_Surat -->
                                <div>
                                    <label for="Tanggal_Surat" class="block text-sm font-medium text-gray-300 mb-1">Tanggal
                                        Surat <span class="text-rose-400">*</span></label>
                                    <div class="relative">

                                        <input type="date" id="Tanggal_Surat" name="tgl_surat"
                                            value="{{ old('tgl_surat', $data->tgl_surat) }}"
                                            class="w-full pl-4 pr-4 py-2.5 bg-gray-900/70 border border-gray-700/50 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-transparent transition-all duration-200"
                                            placeholder="0.00">
                                    </div>
                                    @error('tgl_surat')
                                        <p class="mt-1 text-sm text-rose-400">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Discount -->
                                <div>
                                    <label for="Tanggal_Diterima"
                                        class="block text-sm font-medium text-gray-300 mb-1">Tanggal
                                        Diterima <span class="text-rose-400">*</span></label>
                                    <div class="relative">

                                        <input type="date" id="Tanggal_Diterima" name="tgl_dikirim"
                                            value="{{ old('tgl_dikirim', $data->tgl_dikirim) }}"
                                            class="w-full pl-4 pr-4 py-2.5 bg-gray-900/70 border border-gray-700/50 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-transparent transition-all duration-200"
                                            placeholder="0.00">
                                    </div>
                                    @error('tgl_dikirim')
                                        <p class="mt-1 text-sm text-rose-400">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Asal -->
                            <div>
                                <label for="keterangan" class="block text-sm font-medium text-gray-300 mb-1">keterangan
                                    <span class="text-rose-400">*</span></label>
                                <input type="text" id="keterangan" name="keterangan"
                                    value="{{ old('keterangan', $data->keterangan) }}"
                                    class="w-full px-4 py-2.5 bg-gray-900/70 border border-gray-700/50 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-transparent transition-all duration-200"
                                    placeholder="Enter keterangan">
                                @error('keterangan')
                                    <p class="mt-1 text-sm text-rose-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- perihal -->
                            <div>
                                <label for="perihal" class="block text-sm font-medium text-gray-300 mb-1">perihal <span
                                        class="text-rose-400">*</span></label>
                                <textarea id="perihal" name="perihal" rows="4"
                                    class="w-full px-4 py-2.5 bg-gray-900/70 border border-gray-700/50 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-transparent transition-all duration-200"
                                    placeholder="Enter data perihal">{{ old('perihal', $data->perihal) }}</textarea>
                                @error('perihal')
                                    <p class="mt-1 text-sm text-rose-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-6">

                            <!-- Asal -->
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-300 mb-1">status
                                    <span class="text-rose-400">*</span></label>
                                <select name="status" required class="w-full p-3 rounded bg-gray-800 text-white mb-4"
                                    required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="diterima"
                                        {{ old('status', $data->status) == 'diterima' ? 'selected' : '' }}>
                                        diterima</option>
                                    <option value="dibatalkan"
                                        {{ old('status', $data->status) == 'dibatalkan' ? 'selected' : '' }}>
                                        dibatalkan</option>
                                </select>
                                @error('status')
                                    <p class="mt-1 text-sm text-rose-400">{{ $message }}</p>
                                @enderror
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
                                        <p class="text-xs text-gray-500">PDF, DOCX, Max to 3MB</p>
                                    </div>
                                </div>
                                @error('file')
                                    <p class="mt-1 text-sm text-rose-400">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- FILE URL --}}
                            @php
                                $fileUrl = filter_var($data->file, FILTER_VALIDATE_URL)
                                    ? $data->file
                                    : Storage::url($data->file);
                            @endphp

                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Current File</label>
                                <div class="bg-gray-900/70 border border-gray-700/50 rounded-lg p-4">
                                    @if ($data->file)
                                        <a href="{{ $fileUrl }}" target="_blank"
                                            class="text-blue-400 hover:underline break-all">
                                            {{ $fileUrl }}
                                        </a>
                                    @else
                                        <p class="text-gray-500">No file available</p>
                                    @endif
                                </div>
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
                        <a href="{{ route('sekretaris.surat-keluar.index') }}"
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
        // Preview uploaded image
        function previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const currentImage = document.getElementById('current-file');
                    if (currentImage) {
                        currentImage.src = e.target.result;
                    }
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        // Preview image from URL
        function previewImageUrl(url) {
            if (url) {
                const currentImage = document.getElementById('current-file');
                if (currentImage) {
                    currentImage.src = url;
                    // Set a fallback in case the URL is invalid
                    currentImage.onerror = function() {
                        this.src = '/images/fallback.jpg';
                    }
                }
            }
        }
    </script>
@endsection
