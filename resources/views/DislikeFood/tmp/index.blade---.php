<!DOCTYPE html <html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
  {{-- --}}
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'
    integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=='
    crossorigin='anonymous' />
  <style>
  table {
    border: 1px solid #ccc;
    border-collapse: collapse;
    margin: 0;
    padding: 0;
    width: 100%;
    table-layout: fixed;
  }

  table caption {
    font-size: 1.5em;
    /* margin: .5em 0 .75em; */
  }

  table tr {
    background-color: #fff;
    border: 1px solid #e1e5e9;
    padding: .35em;
    border-radius: 3px;
  }

  table thead tr:first-child {
    /* border: 1px solid #0f82e6; */
  }

  table th,
  table td {
    padding: 0.6em;
    text-align: center;
    /* color: #9da9b9; */
    font-size: 15px;
  }

  table td:nth-child(4) {
    font-size: 18px;
  }

  table th {
    font-size: 1em;
    letter-spacing: .1em;
    background: #666;
    color: #FFF;
  }

  /* table tbody tr td .btn-invoice {
            background: #0f82e6;
            color: #FFF;
            font-size: 15px;
            padding: 10px 20px;
            border: 0;
        } */

  table tbody tr td .btn-action {
    background: #666;
    color: #FFF;
    font-size: 15px;
    padding: 10px 20px;
    border: 0;
  }

  tbody tr:nth-child(even) {
    background-color: #eee;
  }

  tbody tr:nth-child(odd) {
    background-color: #fff;
  }

  @media screen and (max-width: 600px) {
    table {
      border: 0;
    }

    table caption {
      font-size: 1.3em;
    }

    table thead {
      border: none;
      clip: rect(0 0 0 0);
      height: 1px;
      margin: -1px;
      overflow: hidden;
      position: absolute;
      width: 1px;
      padding: 0;
    }

    table tr {
      border-bottom: 3px solid #e1e5e9;
      display: block;
      margin-bottom: .625em;
    }

    table th,
    table td {
      padding: 0.625em;
    }

    table td {
      border-bottom: 1px solid #e1e5e9;
      display: block;
      font-size: 0.9em;
      text-align: right;
      color: #9da9b9;
    }

    table td::before {
      content: attr(data-label);
      float: left;
      font-weight: bold;
      text-transform: uppercase;
      color: #656971;
    }

    table td:last-child {
      border-bottom: 0;
    }

    table td:nth-child(4) {
      font-size: 0.9em;
    }
  </style>
  <script>
  function confirmation() {
    if (confirm('???????????????????????????????')) {
      document.getElementById('del_icon').submit();
    } else {
      return false;
    }
  </script>


</head>

<body>
  @if ($message = Session::get('success'))
  <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">??</button>
    <strong>{{ $message }}</strong>
  </div>
  @endif


  <div style="width:85%;margin: auto;" class="mt-5 mb-2 d-flex">
    <a href="{{ route('DislikeFood.create') }}" class="btn " style="border-radius: 0;background-color: #999;color:#fff">
      <span class="d-flex align-items-center mx-2"><i class="material-icons">&#xE147;</i><span
          class="ml-2">?????????????????????</span></span>
    </a>
  </div>

  <table style="width:85%; margin: auto;">
    <thead>
      <tr>
        <th><label>??????</label></th>
        <th><label>??????</label></th>
        <th><label>??????</label></th>
        <th><label>??????</label></th>

      </tr>
    </thead>
    <tbody>
      <tr >
        @foreach ($DislikeFoods as $DislikeFood)
        <td data-label="??????"> {{ $DislikeFood->id }}</td>
        <td data-label="??????"> {{ $DislikeFood->df_name }}</td>
        <td data-label="??????"> {{ $DislikeFood->df_type }}</td>
        <td data-label="?????? " class="" style=" " >
          <a href="{{ route('DislikeFood.show', $DislikeFood->id) }}" class="show mr-3 ">
            <i class="fa-sharp fa-solid fa-eye" style="color:#36304A;" data-toggle="tooltip" title="??????"></i></a>

          <a href="{{ route('DislikeFood.edit', $DislikeFood->id) }}" class="edit mr-3 ">
            <i class="fa-solid fa-pen-to-square" style="color:#36304A;" data-toggle="tooltip" title="??????"></i></a>

          <form id="del_icon" action="{{ route('DislikeFood.destroy', $DislikeFood->id) }}" method="post"
            style="display: inline-block;" class="">
            @csrf @method('DELETE')


            <a  href="{{ 'DislikeFood/delete/'}}{{ $DislikeFood->id }}" onclick="return confirm('???????????????????????????????')">
             <span style=""><i class="fa-solid fa-trash" style="color:#36304A;" data-toggle="tooltip"
                title="??????04"></i></span></a>



          </form>



          <!--??????material-icons  ????????????submi  ??? input ????????????????????????????????????-->
          <!--   <a href="{{ route('DislikeFood.edit', $DislikeFood->id) }}" class="edit">
      <i class="material-icons" data-toggle="tooltip" title="??????"
          style="color:#36304A;background-color:rgba(255,255,255,0);;">&#xE254;</i></a>
-->

 <!--
          {{-- ?????????????????????????????????--}}
         <form action="{{ route('DislikeFood.destroy', $DislikeFood->id) }}" method="post"> @csrf @method('DELETE')   -->
            <!--
<a href="javascript:{}" onclick="document.getElementById('del_icon').submit();">
   <i class="fa-solid fa-trash" style="color:#36304A;"
   data-toggle="tooltip  title="??????02-????????????"></i></a>

 <a href="{{ 'DislikeFood/delete/'}}{{ $DislikeFood->id }}" onclick="return confirmation();">
     <i class="fa-solid fa-trash" style="color:#36304A;"
     data-toggle="tooltip" title="??????00-???????????????work"></i></a>


    -->
            <!--
 <a href="{{ 'DislikeFood/delete/'}}{{ $DislikeFood->id }}"
   onclick="return confirm('???????????????????????????????')">
   <i class="fa-solid fa-trash" style="color:#36304A;" data-toggle="tooltip"
            title="??????04--??????????????????show"></i></a>   -->


  <!--        </form>-->

          {{-- ????????????????????????????????? ???CSS????????????--}}
          <!--
<form action="{{ route('DislikeFood.destroy', $DislikeFood->id) }}" method="post" onclick="return confirm('???????????????????')" style="display: inline-block;" class="delete">
    @csrf
    @method('DELETE')
   <button class="btn mt-0" style="padding:0; border-radius:0;background-color: transprant;display: inline-block;" type="submit">
      <i class="material-icons" data-toggle="tooltip" title="??????-???????????????"
          style="background-color:rgba(255,255,255,0);display: inline-block;">delete</i>
  </button>
</form>
-->









        </td>
      </tr>
      @endforeach


    </tbody>
  </table>
  <div>

  </div>

  <div style="width:85%;margin:auto;  class=" mt-1" class="d-flex">
    <div class="card-body d-flex justify-content-end mr-0">
      {{ $DislikeFoods->appends(['search' => request()->search])->links('vendor.pagination.bootstrap-4') }}
    </div>
  </div>


  <!--
    <div style="width:85%;margin: auto;" class="mt-5 mb-2 ">
        <a href="/" class="btn"
            style="border-radius: 0;background-color: #999;color:#fff"><i class="material-icons">&#xE147;</i>
            <span>?????????</span></a>
    </div>


    <p><a href="/DislikeFood/create">Add a record</a></p>
    <p><a href="/">?????????</a></p>
    -->

</body>

</html>
