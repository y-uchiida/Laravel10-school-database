<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            School Database
        </h1>
    </x-slot>

        <h1>Add teacher</h1>
    <form action="" method="POST">
        @csrf
        <div class="form-group">
            <label for="input_teacher_name">Name</label>
            <input type="text" class="form-control" id="input_teacher_name" name="name" placeholder="Teacher name" value="">
        </div>
        <div class="form-group">
            <label for="input_homeroom">Homeroom</label>
            <select class="form-control" id="input_homeroom" name="homeroom">
                @foreach($homerooms as $hr)
                    <option value="{{$hr->id}}">{{ $hr->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>

</x-app-layout>
