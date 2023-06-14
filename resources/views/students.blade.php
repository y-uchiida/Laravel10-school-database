<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            School Database
        </h1>
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div> --}}

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <h1>
        Students list
        <a href="{{asset('/student/add')}}"><button type="button" class="btn btn-info"> + Add</button></a>
    </h1>

    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Homeroom</th>
            <th scope="col">Subjects</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
            @if( empty($students) === false )
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>
                            {{-- homeroom プロパティ経由で、homeroom のレコードの内容を扱える --}}
                            @if ($student->homeroom !== null)
                                {{ $student->homeroom->name }}

                            @else
                                no homeroom
                            @endif
                        </td>

                        <td>
                            <ul>
                                @foreach ($student->subjects as $subject)
                                    <li>{{ $subject->get_data() }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <a href="{{ asset("/student/{$student->id}") }}"><button type="button" class="btn btn-primary">Edit</button></a>
                        </td>
                        <td>

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_user{{ $student->id }}">
                                Open Delete modal
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="delete_user{{ $student->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Student id: {{ $student->id }} 削除</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    {{ $student->name }} を削除します。よろしいですか
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ asset("/student/{$student->id}") }}" method="POST">
                                            {{-- DELETEメソッドのリクエストに対して、削除処理を実行するのが望ましい --}}
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
      </table>

</x-app-layout>
