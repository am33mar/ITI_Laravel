<!DOCTYPE html>
<html lang="en">

<x-head>Update Track</x-head>

<body>
    <x-nav></x-nav>

    <h1 class="text-center my-4 display-4">Update track</h1>
    <form action="{{ route('tracks.update', $track->id) }}" method="POST" enctype="multipart/form-data" class="border p-2 bordered w-75 m-auto">
        @csrf
        @method('PUT')
        <!-- name -->
        <div class="mb-3 mx-4">
            <label for="name" class="form-label">Name</label>
            <input name="name" type="text" class="form-control" id="name" value="{{ $track->name }}">
        </div>

        <!-- branch -->
        <div class="mb-3 mx-4">
            <label for="branch" class="block mb-2 text-sm font-medium text-gray-900">Select a branch</label>
            <select id="branch" name="branch" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5">
                <option selected>{{ $track->branch }}</option>
                @php
                $branches = ['Menofia', 'Benha', 'Mansoura'];
                foreach ($branches as $branch) {
                if ($branch != $track->branch)
                echo "<option>$branch</option>";
                }
                @endphp
            </select>
        </div>
        <!-- courses -->
        <div class="mb-3 mx-4">
            <label for="courses" class="form-label">Number of Courses</label>
            <input name="number_courses" type="number" class="form-control" id="courses" value="{{ $track->number_courses }}">
        </div>

        <div class="mb-3 mx-4">
            <label for="courses" class="form-label">Courses:</label>
            <select name="courses[]" id="courses" class="block w-full pb-4 mt-1 form-multiselect border-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" multiple>
                @foreach($courses as $course)
                @if ($track->courses->contains($course->id))
                <option value="{{ $course->id }}" {{'selected'}}>{{ $course->name }}</option>
                @else
                <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endif

                @endforeach
            </select>
        </div>
        <!-- image -->
        <div class="mb-3 mx-4">
            <label for="icon" class="form-label">Image:</label>
            <div class="d-flex align-items-center mt-2">
                <!-- display current image -->
                <img id="current-image" src="{{ asset('images/tracks/' . $track->icon) }}" alt="{{ $track->name }}" class="d-inline w-[40px] h-[40px] rounded-circle border-2 border-primary me-2">
                <!-- input image -->
                <input name="icon" type="file" class="form-control" id="icon" accept="image/*">
            </div>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-24 mx-4 mb-4 rounded">Update</button>
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