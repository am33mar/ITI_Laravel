<!DOCTYPE html>
<html lang="en">

<x-head>Create Track</x-head>

<body>
    <x-nav></x-nav>

    <h1 class="text-center my-4 display-4">Add new track</h1>
    <form action="{{route('tracks.store')}}" method="post" enctype="multipart/form-data" class="border bordered p-2 w-75 mx-auto">
        @csrf
        <!-- name -->
        <div class="mb-3 mx-4">
            <label for="name" class="form-label">Name</label>
            <input name="name" type="text" class="form-control" id="name">
        </div>
        <!-- branch -->
        <div class="mb-3 mx-4">
            <label for="branch" class="block mb-2 font-medium text-gray-900">Select a branch</label>
            <select id="branch" name="branch" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5">
                <option selected>Choose a branch</option>
                @php
                $branches = ['Menofia', 'Benha', 'Mansoura'];
                foreach ($branches as $branch)
                echo "<option>$branch</option>";
                @endphp
            </select>
        </div>
        <!-- courses -->
        <div class="mb-3 mx-4">
            <label for="courses" class="form-label">Number of Courses</label>
            <input name="number_courses" type="number" class="form-control" id="courses">
        </div>
        <!-- image -->
        <div class="mb-3 mx-4">
            <label for="icon" class="form-label">Image:</label>
            <div class="d-flex align-items-center mt-2">
                <!-- display current image -->
                <img id="current-image" class="d-inline w-[40px] h-[40px] rounded-circle border-2 border-primary me-2">
                <!-- input image -->
                <input name="icon" type="file" class="form-control" id="icon" accept="image/*">
            </div>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-24 mx-4 mb-4 rounded">Add</button>
    </form>


    <!-- script to update image preview -->
    <script>
        document.getElementById('icon').addEventListener('change', function(event) {
            var fileInput = event.target;
            var file = fileInput.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = document.getElementById('current-image');
                    img.src = e.target.result;
                    img.style.display = 'inline';
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>

</html>