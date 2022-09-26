<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>
<body>
      @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

我是沒穿衣服的 indexBasic.blade.php

    {{-- <p>{{ session('mssg') }}</p> --}}
    <p><a href="{{route('DislikeFood.create') }}">Add a record</a></p>

        @foreach ($DislikeFoods as $DislikeFood)
        {{ $DislikeFood->id }}姓名{{ $DislikeFood->name }}
        --電子郵件{{ $DislikeFood->email }}
        --電話{{ $DislikeFood->tel }}
        --性別{{ $DislikeFood->sex }}


<br>






        <span><a href="{{ route('DislikeFood.edit', $DislikeFood->id) }}">『Edit this record』</a></span>
        <span><a href="{{ route('DislikeFood.show', $DislikeFood->id) }}">『Show this record』</a></span>

        <form action="{{ route('DislikeFood.destroy', $DislikeFood->id) }}" method="post" onclick="return confirm('確定要刪除嗎?')">
            @csrf
            @method('DELETE')

            <button type="submit" value="DELETE" name="DELETE">delete</button>
        </form>




        </span><br><br>
    @endforeach





    <p><a href="/DislikeFood/create">Add a record</a></p>
    <p><a href="/">回首頁</a></p>
</body>
</html>






