<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Student Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gradient-to-br font-[Poppins] from-slate-50 to-slate-100 min-h-screen flex flex-col">
    <!-- Navigation Bar -->
    <nav class="bg-gradient-to-r from-indigo-600 to-blue-600 text-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-5">
            <div class="flex justify-between items-center">

                <!-- Logo -->
                <a href="{{ url('/') }}" class="flex items-center gap-3">
                    <div class="bg-white bg-opacity-20 p-2 rounded-lg">
                        <i class="fas fa-graduation-cap text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold">Student Hub</h1>
                        <p class="text-xs text-indigo-100">Management System</p>
                    </div>
                </a>

                <!-- Menu -->
                <ul class="flex gap-2">

                    <!-- Students -->
                    <li>
                        <a href="{{ route('students.index') }}"
                            class="flex items-center gap-2 px-4 py-2 rounded-lg transition
                       {{ request()->routeIs('students.*')
                           ? 'bg-white text-indigo-600 font-semibold shadow'
                           : 'hover:bg-white hover:bg-opacity-20' }}">
                            <i class="fas fa-users"></i>
                            <span>Students</span>
                        </a>
                    </li>

                    <!-- Classes -->
                    <li>
                        <a href="{{ route('classes.index') }}"
                            class="flex items-center gap-2 px-4 py-2 rounded-lg transition
                       {{ request()->routeIs('classes.*')
                           ? 'bg-white text-indigo-600 font-semibold shadow'
                           : 'hover:bg-white hover:bg-opacity-20' }}">
                            <i class="fas fa-chalkboard"></i>
                            <span>Classes</span>
                        </a>
                    </li>

                    <!-- Subjects -->
                    <li>
                        <a href="{{ route('subjects.index') }}"
                            class="flex items-center gap-2 px-4 py-2 rounded-lg transition
                       {{ request()->routeIs('subjects.*')
                           ? 'bg-white text-indigo-600 font-semibold shadow'
                           : 'hover:bg-white hover:bg-opacity-20' }}">
                            <i class="fas fa-book"></i>
                            <span>Subjects</span>
                        </a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow py-12">
        <div class="max-w-7xl mx-auto px-6">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-slate-800 text-slate-400 mt-20 py-8 border-t border-slate-700">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-3 gap-8 mb-8">
                <div>
                    <h3 class="text-white font-semibold mb-3">About</h3>
                    <p class="text-sm">Professional student management system built with Laravel and Tailwind CSS.</p>
                </div>
                <div>
                    <h3 class="text-white font-semibold mb-3">Quick Links</h3>
                    <ul class="text-sm space-y-2">
                        <li><a href="{{ route('students.index') }}" class="hover:text-white transition">Students</a>
                        </li>
                        <li><a href="{{ route('classes.index') }}" class="hover:text-white transition">Classes</a></li>
                        <li><a href="{{ route('subjects.index') }}" class="hover:text-white transition">Subjects</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-semibold mb-3">Information</h3>
                    <p class="text-sm">© 2026 Student Hub. All rights reserved.</p>
                </div>
            </div>
            <div class="border-t border-slate-700 pt-6 text-center text-sm">
                <p>Crafted with for education</p>
            </div>
        </div>
    </footer>
</body>

</html>
