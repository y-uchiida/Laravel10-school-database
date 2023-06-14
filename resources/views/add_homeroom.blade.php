<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            School Database
        </h1>
    </x-slot>

    <h1>Add homeroom</h1>
    <form action="" method="POST">
        @csrf
        <div class="form-group">
            <label for="input_homeroom_name">Name</label>
            <input type="text" class="form-control" id="input_homeroom_name" name="name" placeholder="Homeroom name" value="">
        </div>

        <div class="form-group">
            <label for="input_homeroom">Teacher</label>
            <select class="form-control" id="input_homeroom" name="teacher">
                @foreach($teachers as $tch)
                    <option value="{{$tch->id}}">{{ $tch->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="input_students">Students</label>
            <select multiple class="form-control" id="input_students" name="students[]">
                @foreach($students as $std)
                    <option value="{{$std->id}}">(id: {{ $std->id }}){{ $std->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
    </form>

</x-app-layout>

