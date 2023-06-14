<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            School Database
        </h1>
    </x-slot>

        <h1>Add student</h1>
    <form action="" method="POST">
        @csrf
        <div class="form-group">
            <label for="input_student_name">Name</label>
            <input type="text" class="form-control" id="input_student_name" name="name" aria-describedby="emailHelp" placeholder="Student name" value="">
        </div>
        <div class="form-group">
            <label for="input_homeroom">Homeroom</label>
            <select class="form-control" id="input_homeroom" name="homeroom" value="">
                @foreach($homerooms as $hr)
                    <option value="{{$hr->id}}">{{ $hr->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="input_subjects">Subject to take</label>
            <select multiple class="form-control" id="input_subjects" name="subjects[]">
                @foreach($subjects as $sbj)
                    <option value="{{$sbj->id}}">(id: {{ $sbj->id }}){{ $sbj->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>

</x-app-layout>
