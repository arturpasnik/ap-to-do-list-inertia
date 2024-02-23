<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MLP To-Do</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
</head>
<body style="padding: 2rem;background: #f1f1f1">
<nav class="container">
    <div class="row">
        <div class="col-xs-12">
            <img src="{{asset('assets/logo.png')}}"></img>
        </div>
    </div>
</nav>

<section class="container" style="padding-top: 4rem">
    <div class="row">
        <div class="col-xs-12 col-md-4">
            <form method="POST" action="/">
                @csrf

                <input type="text" name="name" placeholder="Insert task name" class="col-xs-12 form-control" style="margin-bottom: 2rem">
                @if($errors->has('name'))
                    <div class="alert alert-danger">
                        <p style="padding-top: 2rem">{{ $errors->get('name')[0] }}</p>
                    </div>
                @endif

                <button class="col-xs-12 btn btn-primary" style="margin-bottom: 2rem">Add</button>
            </form>
        </div>
        <div class="col-xs-12 col-md-8">
            <div class="panel">
                <div class="panel-body" style="background: white;padding: 2rem;">
                    <table style="width: 100%">
                        <tr style="border-bottom: 2px solid #dddddd;">
                            <th style="width: 3rem">#</th>
                            <th>Tasks</th>
                        </tr>
                        @foreach($tasks as $task)
                            <tr style="border-bottom: 1px solid #dddddd;height: 6rem;">
                                <td>{{$task->id}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-9" style="{{$task->status == 2 ? 'text-decoration: line-through;line-height: 3rem' : 'line-height: 3rem'}}">{{$task->name}}</div>
                                        <div class="col-xs-12 col-md-3" style="text-align: end">
                                            @if($task->status == 1)
                                            <form action="/" style="display: inline" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="id" value="{{$task->id}}">
                                                <button style="background: #5cb85c;border: none;color: white;width: 3rem;height: 3rem">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                            <form method="post" action="/" style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{$task->id}}">
                                                <button style="background: #d9534f;border: none;color: white;width: 3rem;height: 3rem">
                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                            @endif
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>



</body>
</html>
