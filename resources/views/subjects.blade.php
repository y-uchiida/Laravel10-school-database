<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            School Database
        </h1>
    </x-slot>

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <h1>
        Subjects list
        <a href="{{ asset('/subject/add')}}"><button type="button" class="btn btn-info"> + Add</button></a>
    </h1>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Students</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
            @if( empty($subjects) === false )
                @foreach($subjects as $subject)
                    <tr>
                        <td>{{ $subject->id }}</td>
                        <td>{{ $subject->name }}</td>
                        <td>
                            <ul>
                                @foreach ($subject->students as $student)
                                    <li>{{ $student->getData() }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <a href="./subject/{{ $subject->id }}"><button type="button" class="btn btn-primary">Edit</button>
                        </td>
                        <td>
                            <form action="{{ asset("/subject/{$subject->id}") }}" method="POST">
                                {{-- DELETEメソッドのリクエストに対して、削除処理を実行するのが望ましい --}}
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                {{ $subjects->links() }}
            @endif
        </tbody>
      </table>

</x-app-layout>
