<!DOCTYPE html>
<html lang="en">

<x-head>Create Course</x-head>

<body>
    <x-nav></x-nav>

    <h1 class="text-center my-4 display-4">Add new Course</h1>
    <form action="{{route('courses.store')}}" method="post" enctype="multipart/form-data" class="border bordered p-2 w-75 mx-auto">
        @csrf
        <!-- name -->
        <div class="mb-3 mx-4">
            <label for="name" class="form-label">Name</label>
            <input name="name" type="text" class="form-control" id="name">
            <!-- Display error for 'name' field -->
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- Total Grade -->
        <div class="mb-3 mx-4">
            <label for="total_grade" class="form-label">Total Grade</label>
            <input name="total_grade" type="number" class="form-control" id="total_grade">
            @error('total_grade')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- description -->
        <div class="mb-3 mx-4">
            <label for="description" class="form-label">Description</label>
            <input name="description" type="text" class="form-control" id="description">
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-24 mx-4 mb-4 rounded">Add</button>
    </form>

</body>

</html>