@extends('layout')

@section('title', 'View School Class')

@section('content')
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="mb-8 flex justify-between items-start">
            <div>
                <h1 class="text-4xl font-bold text-slate-900 mb-2">Class Details</h1>
                <p class="text-slate-600">View class information and enrolled students</p>
            </div>
            <a href="{{ route('classes.index') }}" class="text-slate-600 hover:text-slate-900 transition">
                <i class="fas fa-arrow-left text-xl"></i>
            </a>
        </div>

        <!-- Class Card -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden mb-8">
            <!-- Card Header -->
            <div class="bg-gradient-to-r from-green-600 to-emerald-600 px-8 py-12">
                <div class="flex items-end gap-6">
                    <div
                        class="w-20 h-20 bg-white bg-opacity-20 rounded-full flex items-center justify-center text-white text-4xl font-bold border-4 border-white">
                        <i class="fas fa-chalkboard"></i>
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold text-white">{{ $class->class_name }}</h2>
                        <p class="text-green-100 text-sm mt-1">Class ID: #{{ $class->id }}</p>
                    </div>
                </div>
            </div>

            <!-- Card Body -->
            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                    <!-- Grade Section -->
                    <div class="border-l-4 border-green-500 pl-6">
                        <p class="text-slate-600 text-sm font-semibold mb-2">
                            <i class="fas fa-graduation-cap text-green-600 mr-2"></i>
                            Grade/Level
                        </p>
                        <p class="text-lg font-semibold text-slate-900">{{ $class->grade }}</p>
                    </div>

                    <!-- Total Students Section -->
                    <div class="border-l-4 border-blue-500 pl-6">
                        <p class="text-slate-600 text-sm font-semibold mb-2">
                            <i class="fas fa-users text-blue-600 mr-2"></i>
                            Total Students
                        </p>
                        <p class="text-lg font-semibold text-slate-900">{{ $class->students->count() }} Students</p>
                    </div>
                </div>

                <!-- Divider -->
                <div class="border-t border-slate-200 my-8"></div>

                <!-- Action Buttons -->
                <div class="flex flex-wrap gap-4 mb-8">
                    <a href="{{ route('classes.edit', $class) }}"
                        class="inline-flex items-center gap-2 bg-gradient-to-r from-amber-500 to-orange-500 text-white px-6 py-3 rounded-lg hover:shadow-lg transform hover:scale-105 transition-all duration-200 font-semibold">
                        <i class="fas fa-edit"></i>
                        <span>Edit Class</span>
                    </a>
                    <form action="{{ route('classes.destroy', $class) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="inline-flex items-center gap-2 bg-gradient-to-r from-red-500 to-pink-500 text-white px-6 py-3 rounded-lg hover:shadow-lg transform hover:scale-105 transition-all duration-200 font-semibold"
                            onclick="return confirm('Are you sure you want to delete this class?')">
                            <i class="fas fa-trash"></i>
                            <span>Delete Class</span>
                        </button>
                    </form>
                    <a href="{{ route('classes.index') }}"
                        class="inline-flex items-center gap-2 bg-slate-200 text-slate-900 px-6 py-3 rounded-lg hover:bg-slate-300 transition-colors font-semibold">
                        <i class="fas fa-arrow-left"></i>
                        <span>Back to List</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Students Section -->
        @if ($class->students->count() > 0)
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                <div class="bg-slate-50 border-b border-slate-200 px-8 py-6">
                    <h3 class="text-2xl font-bold text-slate-900 flex items-center gap-3">
                        <i class="fas fa-list text-blue-600"></i>
                        Enrolled Students
                    </h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-slate-50 border-b border-slate-200">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-900">ID</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-900">Name</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-900">Email</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-900">Phone</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200">
                            @foreach ($class->students as $student)
                                <tr class="hover:bg-slate-50 transition-colors duration-150">
                                    <td class="px-6 py-4 text-sm text-slate-900 font-medium">#{{ $student->id }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 bg-gradient-to-br from-indigo-400 to-blue-500 rounded-full flex items-center justify-center text-white font-bold text-xs">
                                                {{ substr($student->name, 0, 1) }}
                                            </div>
                                            {{--           <span
                                                class="text-sm font-semibold text-slate-900">{{ $subject->subject_name }}</span> --}}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-slate-600">{{ $student->email }}</td>
                                    <td class="px-6 py-4 text-sm text-slate-600">{{ $student->phone }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-12 text-center">
                <i class="fas fa-inbox text-4xl text-slate-300 mb-4 block"></i>
                <p class="text-slate-600 font-medium">No students enrolled yet</p>
                <p class="text-slate-500 text-sm mt-1">Students will appear here as they are added to this class</p>
            </div>
        @endif
        <!-- Subjects Section -->
        <!-- Subjects Section -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden mt-8">

            <!-- Header -->
            <div class="bg-slate-50 border-b border-slate-200 px-8 py-6">
                <h3 class="text-2xl font-bold text-slate-900 flex items-center gap-3">
                    <i class="fas fa-book text-green-600"></i>
                    Class Subjects
                </h3>
            </div>

            <div class="p-8">

                <!-- Add Subject Form -->
                <form action="{{ route('subjects.store') }}" method="POST" class="flex flex-col md:flex-row gap-3 mb-6">

                    @csrf

                    <input type="text" name="subject_name" placeholder="Enter subject name"
                        class="flex-1 px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">

                    <input type="hidden" name="class_id" value="{{ $class->id }}">

                    <button type="submit"
                        class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition font-semibold">

                        <i class="fas fa-plus mr-2"></i>
                        Add Subject
                    </button>

                </form>

                <!-- Subjects List -->
                @if ($class->subjects->count() > 0)

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">

                        @foreach ($class->subjects as $subject)
                            <a href="{{ route('subjects.show', $subject) }}"
                                class="flex items-center gap-3 bg-slate-50 border border-slate-200 p-4 rounded-lg hover:bg-slate-100 transition">

                                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-book text-green-600"></i>
                                </div>

                                <div>
                                    <p class="font-semibold text-slate-900">
                                        {{ $subject->subject_name }}
                                    </p>
                                </div>

                            </a>
                        @endforeach

                    </div>
                @else
                    <div class="text-center py-6">
                        <i class="fas fa-book text-slate-300 text-3xl mb-2"></i>
                        <p class="text-slate-500">No subjects added yet</p>
                    </div>

                @endif

            </div>
        </div>
    </div>

@endsection
