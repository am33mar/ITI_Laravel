<!DOCTYPE html>
<html lang="en">

<x-head>Create Student</x-head>

<body>
    <x-nav></x-nav>
    <h1 class="text-center my-4 display-4">Add new student</h1>
    <form action="{{route('students.store')}}" method="post" enctype="multipart/form-data" class="border bordered p-2 w-75 mx-auto">
        @csrf
        <!-- name -->
        <div class="mb-3 mx-4">
            <label for="name" class="form-label">Name</label>
            <input name="name" type="text" class="form-control" id="name"">
        </div>
        <!-- email -->
        <div class=" mb-3 mx-4">
            <label for="email" class="form-label">Email address</label>
            <input name="email" type="email" class="form-control" id="email">
        </div>
        <!-- grade -->
        <div class="mb-3 mx-4">
            <label for="grade" class="form-label">Grade </label>
            <input name="grade" type="number" class="form-control" id="grade">
        </div>
        <!-- gender -->
        <label class="form-check-label mx-4">
            Gender
        </label>
        <div class="form-check mx-4">
            <input name="gender" class="form-check-input" type="radio" id="radio1" value="male">
            <label class="form-check-label" for="radio1">
                male
            </label>
        </div>
        <div class="form-check mx-4 mb-3">
            <input name="gender" class="form-check-input" type="radio" id="radio2" value="female">
            <label class="form-check-label" for="radio2">
                Female
            </label>
        </div>
        <!-- image -->
        <div class="mb-3 mx-4">
            <label for="image" class="form-label">Image </label>
            <div class="d-flex align-items-center mt-1">
                <!-- display current image -->
                <img id="current-image" class="d-inline w-[40px] h-[40px] rounded-circle border-2 border-primary me-2">
                <!-- input image -->
                <input name="image" type="file" class="form-control" id="image" accept="image/*">
            </div>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-24 mx-4 mb-3 rounded">Add</button>
    </form>

    <!-- script to update image preview -->
    <script>
        document.getElementById('image').addEventListener('change', function(event) {
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