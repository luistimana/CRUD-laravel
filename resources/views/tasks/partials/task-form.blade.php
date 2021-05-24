<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                @if(!empty($task))
                    Editar Tarea
                @else
                    Nueva Tarea
                @endif
            </div>

            <div class="card-body">
                <form method="POST" action="{{ !empty($task) ? route('tasks.edit', [$task->id]) : route('tasks.store') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="task-title" class="col-md-4 col-form-label text-md-right">Título</label>

                        <div class="col-md-6">
                            <input id="task-title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ !empty($task) ? $task->title : old('title') }}" required autofocus>

                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                @if(!empty($task))
                                    Editar
                                @else
                                    Agregar
                                @endif
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>