<!DOCTYPE html>
<html lang="en">

<x-head>Update Course</x-head>

<body>
    <x-nav></x-nav>
    <h1 class="text-center my-4 display-4">Update Course</h1>
    <form action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data" class="border p-2 bordered w-75 m-auto">
        @csrf
        @method('PUT')
        <!-- name -->
        <div class="mb-3 mx-4">
            <label for="name" class="form-label">Name</label>
            <input name="name" type="text" class="form-control" id="name" value="{{$course->name}}">
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- Total Grade -->
        <div class="mb-3 mx-4">
            <label for="total_grade" class="form-label">Total Grade</label>
            <input name="total_grade" type="number" class="form-control" id="total_grade" value="{{$course->total_grade}}">
            @error('total_grade')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- description -->
        <div class="mb-3 mx-4">
            <label for="description" class="form-label">Description</label>
            <input name="description" type="text" class="form-control" id="description" value="{{$course->description}}">
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-24 mx-4 mb-4 rounded">Update</button>
    </form>
</body>

</html>