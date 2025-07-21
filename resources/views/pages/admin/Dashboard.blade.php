@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Dashboard Header -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-8">
            <div class="mb-4 md:mb-0">
                <h1 class="text-3xl font-bold text-gray-100">Dashboard</h1>
                <p class="text-gray-400 mt-1">Selamat Datang {{ Auth::user()->name ?? 'User' }} di Persuratan PKK</p>
            </div>

        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Total Products -->
            <div
                class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl shadow-xl border border-gray-700/50 overflow-hidden relative group">
                <div
                    class="absolute inset-0 bg-cyan-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center py-6">
                        <div>
                            <h2 class="text-gray-400 font-medium mb-1">Total Surat Masuk</h2>
                            <p class="text-4xl font-bold text-white mb-3">{{ $suratmasuk }}</p>
                        </div>
                        <div class="p-3 rounded-lg bg-cyan-600/10 border border-cyan-600/20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="h-10 w-10 text-cyan-400"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products in Stock -->
            <div
                class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl shadow-xl border border-gray-700/50 overflow-hidden relative group">
                <div
                    class="absolute inset-0 bg-emerald-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start py-6">
                        <div>
                            <h2 class="text-gray-400 font-medium mb-1">Total Surat Keluar</h2>
                            <p class="text-4xl font-bold text-white mb-3">{{ $suratkeluar }}</p>
                        </div>
                        <div class="p-3 rounded-lg bg-emerald-600/10 border border-emerald-600/20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="h-10 w-10 text-red-400"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 9v.906a2.25 2.25 0 0 1-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 0 0 1.183 1.981l6.478 3.488m8.839 2.51-4.66-2.51m0 0-1.023-.55a2.25 2.25 0 0 0-2.134 0l-1.022.55m0 0-4.661 2.51m16.5 1.615a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V8.844a2.25 2.25 0 0 1 1.183-1.981l7.5-4.039a2.25 2.25 0 0 1 2.134 0l7.5 4.039a2.25 2.25 0 0 1 1.183 1.98V19.5Z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Low Stock Products -->
            <div
                class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl shadow-xl border border-gray-700/50 overflow-hidden relative group">
                <div
                    class="absolute inset-0 bg-amber-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                </div>
                <div class="py-12 px-6">
                    <div class="flex justify-between items-center">
                        <div>
                            <h2 class="text-gray-400 font-medium mb-1">Pengguna</h2>
                            <p class="text-4xl font-bold text-white mb-3">{{ $user }}</p>
                            <div class="flex items-center text-sm">

                            </div>
                        </div>
                        <div class="p-3 rounded-lg bg-amber-600/10 border border-amber-600/20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="h-10 w-10 text-amber-400"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Calendar and Time in Cambodia -->
        <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl shadow-xl border border-gray-700/50 p-6 mb-8">
            <h2 class="text-xl font-semibold text-gray-200 mb-4 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                        clip-rule="evenodd" />
                </svg>
                Indonesia Kalender & Waktu
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Calendar -->
                <div class="bg-gray-900/70 rounded-xl border border-gray-700/50 p-5 shadow-inner">
                    <div class="text-center">
                        <p class="font-bold mb-4 text-gray-200">April 2025</p>
                        <div class="grid grid-cols-7 gap-1 text-xs">
                            <div class="font-medium text-gray-400 p-2">Sun</div>
                            <div class="font-medium text-gray-400 p-2">Mon</div>
                            <div class="font-medium text-gray-400 p-2">Tue</div>
                            <div class="font-medium text-gray-400 p-2">Wed</div>
                            <div class="font-medium text-gray-400 p-2">Thu</div>
                            <div class="font-medium text-gray-400 p-2">Fri</div>
                            <div class="font-medium text-gray-400 p-2">Sat</div>

                            <!-- Sample days (replace with dynamic calendar) -->
                            <div class="p-2"></div>
                            <div class="p-2"></div>
                            <div class="p-2 text-gray-300">1</div>
                            <div class="p-2 text-gray-300">2</div>
                            <div class="p-2 text-gray-300">3</div>
                            <div class="p-2 text-gray-300">4</div>
                            <div class="p-2 text-gray-300">5</div>

                            <div class="p-2 text-gray-300">6</div>
                            <div class="p-2 text-gray-300">7</div>
                            <div class="p-2 text-gray-300">8</div>
                            <div class="p-2 text-gray-300">9</div>
                            <div class="p-2 text-gray-300">10</div>
                            <div class="p-2 text-gray-300">11</div>
                            <div class="p-2 text-gray-300">12</div>

                            <div class="p-2 text-gray-300">13</div>
                            <div class="p-2 text-gray-300">14</div>
                            <div class="p-2 text-gray-300">15</div>
                            <div class="p-2 text-gray-300">16</div>
                            <div class="p-2 text-gray-300">17</div>
                            <div class="p-2 text-gray-300">18</div>
                            <div class="p-2 text-gray-300">19</div>

                            <div class="p-2 text-gray-300">20</div>
                            <div class="p-2 text-gray-300">21</div>
                            <div class="p-2 text-gray-300">22</div>
                            <div class="p-2 text-gray-300">23</div>
                            <div class="p-2 bg-cyan-600/20 rounded-full text-cyan-300 font-medium">24</div>
                            <div class="p-2 text-gray-300">25</div>
                            <div class="p-2 text-gray-300">26</div>

                            <div class="p-2 text-gray-300">27</div>
                            <div class="p-2 text-gray-300">28</div>
                            <div class="p-2 text-gray-300">29</div>
                            <div class="p-2 text-gray-300">30</div>
                            <div class="p-2"></div>
                            <div class="p-2"></div>
                            <div class="p-2"></div>
                        </div>
                    </div>
                </div>

                <!-- Current Time in Cambodia -->
                <div
                    class="bg-gray-900/70 rounded-xl border border-gray-700/50 p-5 shadow-inner flex items-center justify-center">
                    <div class="text-center">
                        <p class="text-sm font-medium text-gray-400 mb-3">Waktu Saat ini di Indonesia</p>
                        <div class="relative">
                            <div class="absolute inset-0 bg-cyan-600/10 blur-xl rounded-full"></div>
                            <p id="IndonesiaTime" class="text-4xl font-bold text-white relative"></p>
                        </div>
                        <p id="IndonesiaDate" class="text-sm text-gray-400 mt-3"></p>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function updateIndonesiaTime() {
                const now = new Date();
                // Cambodia is UTC+7 (no DST)
                const IndonesiaTime = new Date(now.getTime() + 7 * 60 * 60 * 1000);
                const hours = IndonesiaTime.getUTCHours() % 24;
                const minutes = String(IndonesiaTime.getUTCMinutes()).padStart(2, '0');
                const seconds = String(IndonesiaTime.getUTCSeconds()).padStart(2, '0');
                const ampm = IndonesiaTime.getUTCHours() >= 24 ? 'WIB' : 'WIB';
                const day = IndonesiaTime.getUTCDate();
                const month = IndonesiaTime.toLocaleString('ID', {
                    month: 'long'
                });
                const year = IndonesiaTime.getUTCFullYear();
                const weekday = IndonesiaTime.toLocaleString('ID', {
                    weekday: 'long'
                });

                document.getElementById('IndonesiaTime').textContent = `${hours}:${minutes}:${seconds} ${ampm}`;
                document.getElementById('IndonesiaDate').textContent = `${weekday}, ${day} ${month}, ${year}`;
            }

            updateIndonesiaTime();
            setInterval(updateIndonesiaTime, 1000);
        });
    </script>

    <style>
        /* Glow effects */
        #IndonesiaTime {
            text-shadow: 0 0 15px rgba(6, 182, 212, 0.5);
        }

        .bg-cyan-600\/10 {
            box-shadow: 0 0 10px rgba(8, 145, 178, 0.1);
        }

        .bg-emerald-600\/10 {
            box-shadow: 0 0 10px rgba(5, 150, 105, 0.1);
        }

        .bg-amber-600\/10 {
            box-shadow: 0 0 10px rgba(217, 119, 6, 0.1);
        }

        .bg-rose-600\/10 {
            box-shadow: 0 0 10px rgba(225, 29, 72, 0.1);
        }

        /* Smooth transitions */
        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 300ms;
        }

        /* Table styles */
        table {
            border-collapse: separate;
            border-spacing: 0;
        }

        /* Calendar day hover effect */
        .grid-cols-7>div:not(:empty):not(.bg-cyan-600\/20):hover {
            background-color: rgba(8, 145, 178, 0.1);
            border-radius: 9999px;
            cursor: pointer;
        }
    </style>
@endsection
