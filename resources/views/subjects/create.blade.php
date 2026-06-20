{{-- @extends('layout')

@section('title', 'Create Subject')

@section('content')
<div class="max-w-2xl mx-auto">

    <h1 class="text-3xl font-bold mb-6">Create Subject</h1>

    <form method="POST" action="{{ route('subjects.store') }}">
        @csrf

        <!-- Subject Name -->
        <div class="mb-4">
            <label>Subject Name</label>
            <input type="text" name="subject_name" required
                class="w-full border p-2 rounded">
        </div>

        <!-- Class Dropdown -->
        <div class="mb-4">
            <label>Assign to Class</label>
            <select name="class_id" required class="w-full border p-2 rounded">
                <option value="">Select Class</option>
                @foreach ($classes as $class)
                    <option value="{{ $class->id }}">
                        {{ $class->class_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Create Subject
        </button>

    </form>
</div>
@endsection --}}
