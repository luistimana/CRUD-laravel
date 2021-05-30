@if(!empty($tasks))
    <section class="row justify-content-center">
        <div class="col-md-8">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Tareas</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td style="display: flex;">
                            <a class="btn btn-primary" href="{{ route('tasks.edit_view', [$task->id]) }}" style="margin-right: 5px;">
                                Editar
                            </a>
                            
                            <form action="{{ route('tasks.destroy', [$task->id]) }}" method="POST">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endif