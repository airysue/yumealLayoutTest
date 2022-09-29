<html lang="zh-Hant-TW">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>新增知名連鎖餐飲</title>
  <link rel="stylesheet" href="https://codepen.io/gymratpacks/pen/VKzBEp#0">
  <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
  <style>
    *:before,
    *:after {
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
    }

    body {
      font-family: 'Nunito', sans-serif;
      color: #384047;
    }

    form {
      max-width: 300px;
      margin: 10px auto;
      padding: 10px 20px;
      background: #f4f7f8;
      border-radius: 8px;
    }

    h1 {
      margin: 0 0 30px 0;
      text-align: center;
    }

    input[type="text"],
    input[type="password"],
    input[type="date"],
    input[type="datetime"],
    input[type="email"],
    input[type="number"],
    input[type="search"],
    input[type="tel"],
    input[type="time"],
    input[type="url"],
    textarea,
    select {
      background: rgba(255, 255, 255, 0.1);
      border: none;
      font-size: 16px;
      height: auto;
      margin: 0;
      outline: 0;
      padding: 15px;
      width: 100%;
      background-color: #e8eeef;
      color: #8a97a0;
      box-shadow: 0 1px 0 rgba(0, 0, 0, 0.03) inset;
      margin-bottom: 30px;
    }

    input[type="radio"],
    input[type="checkbox"] {
      margin: 0 4px 8px 0;
    }

    select {
      padding: 6px;
      height: 32px;
      border-radius: 2px;
    }

    button {
      padding: 19px 39px 18px 39px;
      color: #FFF;
      background-color: #4bc970;
      font-size: 18px;
      text-align: center;
      font-style: normal;
      border-radius: 5px;
      width: 100%;
      border: 1px solid #3ac162;
      border-width: 1px 1px 3px;
      box-shadow: 0 -1px 0 rgba(255, 255, 255, 0.1) inset;
      margin-bottom: 10px;
    }

    fieldset {
      margin-bottom: 30px;
      border: none;
    }

    legend {
      font-size: 1.4em;
      margin-bottom: 10px;
    }

    label {
      display: block;
      margin-bottom: 8px;
    }

    label.light {
      font-weight: 300;
      display: inline;
    }

    .number {
      background-color: #5fcf80;
      color: #fff;
      height: 30px;
      width: 30px;
      display: inline-block;
      font-size: 0.8em;
      margin-right: 4px;
      line-height: 30px;
      text-align: center;
      text-shadow: 0 1px 0 rgba(255, 255, 255, 0.2);
      border-radius: 100%;
    }

    @media screen and (min-width: 480px) {

      form {
        max-width: 480px;
      }

    }
  </style>
</head>

<body>
  <div class="row">
    <div class="col-md-12">




      <form action="/ChainDiner" method="post">
        <h1>新增知名連鎖餐飲</h1>
        @csrf
        <fieldset>

          <legend><span class="number">1</span></legend>

          <label for="cd_name">名稱:<span style="color:red;">
              @error('cd_name')
              {{ $message }}
              @enderror
            </span></label>
          <input type="text" name="cd_name" value="{{ old('cd_name') }}">

          <label for="cd_no">編號:<span style="color:red;">
              @error('cd_no')
              {{ $message }}
              @enderror
            </span></label>
          <input type="text" name="cd_no" value="{{ old('cd_no') }}">

          <label for="cd_type">類型:
            <span style="color:red;">
              @error('cd_type')
              {{ $message }}
              @enderror
            </span></label>
          <input type="text" name="cd_type" value="{{ old('cd_type') }}">
          <label for="cd_remark">備註: <span style="color:red;">

            </span></label>
          <textarea name="cd_remark" value="">{{ old('cd_remark') }}</textarea>


          <fieldset>

            <button type="submit">存檔送出</button>

      </form>
    </div>
  </div>

</body>

</html>
