<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            School Database
        </h1>
    </x-slot>

        <h1>Edit student</h1>
    @if (isset($error))
    <div class="alert alert-danger" role="alert">
        {{ $error }}
    </div>
    @elseif(isset($student))
        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label for="input_student_name">Name</label>
                <input type="text" class="form-control" id="input_student_name" name="name" aria-describedby="emailHelp" placeholder="Student name" value="{{ $student->name }}">
            </div>
            <div class="form-group">
                <label for="input_homeroom">Homeroom</label>
                <select class="form-control" id="input_homeroom" name="homeroom" value="{{ $student->homeroom->id }}">
                    @foreach($homerooms as $hr)
                        @if($hr->id == $student->homeroom->id)
                            <option value="{{$hr->id}}" selected>{{ $hr->name }}</option>
                        @else
                            <option value="{{$hr->id}}">{{ $hr->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="input_subjects">Subject to take</label>
                <select multiple class="form-control" id="input_subjects" name="subjects[]">
                    @foreach($subjects as $sbj)
                        @if($student->subjects()->find($sbj->id) !== null)
                            <option value="{{$sbj->id}}" selected>(id: {{ $sbj->id }}){{ $sbj->name }}</option>
                        @else
                            <option value="{{$sbj->id}}">(id: {{ $sbj->id }}){{ $sbj->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    @endif

</x-app-layout>
