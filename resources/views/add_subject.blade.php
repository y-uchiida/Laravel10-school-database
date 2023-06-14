<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            School Database
        </h1>
    </x-slot>

        @if(isset($message))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <h1>Add Subject</h1>
    <form action="" method="POST">
        @csrf
        <div class="form-group">
          <label for="input_subject_name">Subject name</label>
          <input type="text" class="form-control" name="name" id="input_subject_name" placeholder="Subject name">
        </div>

        <div class="form-group">
            <label for="input_subjects">Students</label>
            <select multiple class="form-control" id="input_subjects" name="students[]">
                @foreach($students as $std)
                    <option value="{{$std->id}}">(id: {{ $std->id }}){{ $std->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>

</x-app-layout>
