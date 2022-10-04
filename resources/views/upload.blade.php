<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
{{-- <form action="/uploadpic" method="post" enctype="multipart/form-data">
@csrf
<input type="file" name="photo">
<button type="submit"> Upload</button>
</form> --}}

                    <div class="control-group">
                        <label label-default="" class="control-label">Photo</label>
                        <div class="controls">
                            <input id="image" name="image" type="file"/>
                            {{-- <input id="photo" name="photo" type="file"/> --}}
                        </div>
                    </div>


</body>
</html>
