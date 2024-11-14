<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daily Task</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/mdbootstrap@5.1.0/dist/css/mdb.min.css" rel="stylesheet">

</head>

<body>
    <div class="row">
        <section class="vh-100" style="background-color: #e2d5de;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">

                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                @include('task.suc_or_err')

                                <h6 class="mb-3">Awesome Todo List</h6>

                                <form action="{{ url('tasks/store') }}" method="POST"
                                    class="d-flex justify-content-center align-items-center mb-4">
                                    @csrf
                                    <div data-mdb-input-init class="form-outline flex-fill">
                                        @error('description')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <input name="description" type="text" id="form3"
                                            class="form-control form-control-lg" />
                                        <label class="form-label" for="form3">What do you need to do today?</label>
                                    </div>
                                    <button style="margin-bottom:30px" type="submit" data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-primary btn-lg ms-2">Add</button>
                                </form>




                                <div>

                                    @foreach ($tasks as $task)
                                        <ul class="list-group mb-0">
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center border-start-0 border-top-0 border-end-0 border-bottom rounded-0 mb-2">
                                                <div class="d-flex align-items-center">
                                                    <form id="todo{{ $task->id }}" action="{{ url('tasks/status',$task->id) }}" method="POST">
                                                        @csrf
                                                        <div>
                                                            <input onchange="document.querySelector('#todo{{ $task->id }}').submit()" class="form-check-input mb-3 me-2" type="checkbox" @if ($task->status == 'active')  checked @endif  value=""
                                                            aria-label="..." />
                                                        </div>
                                                    </form>
                                                    <p>{{ $task->description }}</p>
                                                </div>

                                                <div>

                                                    <a style="margin-right: 10px" href="{{ url('tasks/edit/'.$task->id) }}"><i class="fa-solid fa-user-pen"></i></a>

                                                    <a href="{{ url('tasks/delete/'. $task->id) }}" data-mdb-tooltip-init title="Remove item">
                                                        <i class="fas fa-times text-primary"></i>
                                                    </a>
                                                </div>
                                            </li>

                                        </ul>
                                    @endforeach
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>
