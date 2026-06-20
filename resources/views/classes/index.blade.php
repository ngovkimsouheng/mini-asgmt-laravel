@extends('layout')

@section('title', 'School Classes')

@section('content')
    <div>
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h1 class="text-4xl font-bold text-slate-900 mb-2">School Classes</h1>
                    <p class="text-slate-600">Manage and organize all your school classes</p>
                </div>
                <a href="{{ route('classes.create') }}"
                    class="inline-flex items-center gap-2 bg-gradient-to-r from-green-600 to-emerald-600 text-white px-6 py-3 rounded-lg hover:shadow-lg transform hover:scale-105 transition-all duration-200 font-semibold">
                    <i class="fas fa-plus"></i>
                    <span>Add New Class</span>
                </a>
            </div>

            @if (session('success'))
                <div
                    class="flex items-center gap-3 bg-green-50 border border-green-200 text-green-800 px-6 py-4 rounded-lg mb-6 animate-fade-in">
                    <i class="fas fa-check-circle text-lg"></i>
                    <span>{{ session('success') }}</span>
                    <button onclick="this.parentElement.remove()" class="ml-auto text-green-800 hover:text-green-900">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            @endif
        </div>

        <!-- Classes Table -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-slate-200">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-slate-50 border-b border-slate-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-slate-900">ID</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-slate-900">Class Name</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-slate-900">Grade</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-slate-900">Total Students</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-slate-900">
                                Total Subjects
                            </th>
                            <th class="px-6 py-4 text-center text-sm font-semibold text-slate-900">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200">
                        @forelse($classes as $class)
                            <tr class="hover:bg-slate-50 transition-colors duration-150">
                                <td class="px-6 py-4 text-sm text-slate-900 font-medium">#{{ $class->id }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full flex items-center justify-center text-white font-bold text-sm">
                                            <i class="fas fa-chalkboard text-xs"></i>
                                        </div>
                                        <span class="text-sm font-semibold text-slate-900">{{ $class->class_name }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center gap-2 bg-blue-50 text-blue-700 px-3 py-1 rounded-full text-sm font-medium">
                                        Grade {{ $class->grade }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center gap-2 bg-purple-50 text-purple-700 px-3 py-1 rounded-full text-sm font-medium">
                                        <i class="fas fa-users text-xs"></i>
                                        {{ $class->students->count() }} Students
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center gap-2 bg-green-50 text-green-700 px-3 py-1 rounded-full text-sm font-medium">
                                        <i class="fas fa-book text-xs"></i>
                                        {{ $class->subjects_count }} Subjects
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('classes.show', $class) }}"
                                            class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors"
                                            title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('classes.edit', $class) }}"
                                            class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-amber-50 text-amber-600 hover:bg-amber-100 transition-colors"
                                            title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('classes.destroy', $class) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition-colors"
                                                title="Delete" onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <i class="fas fa-inbox text-4xl text-slate-300 mb-4"></i>
                                        <p class="text-slate-600 font-medium">No classes found</p>
                                        <p class="text-slate-500 text-sm mt-1">Create your first class to get started</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>

        </div>
        <div class="py-8">
            {{ $classes->links() }}
        </div>

    </div>

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.3s ease-out;
        }
    </style>
@endsection
