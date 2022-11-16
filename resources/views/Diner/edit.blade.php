<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編輯餐飲店</title>
    <link rel="stylesheet" href="https://codepen.io/gymratpacks/pen/VKzBEp#0">
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/main.css">

    <style>
        *,
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
            <form action="{{ route('Diner.update', $Diner->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <h1>編輯餐飲店</h1>

                {{-- 一次顯示所有錯誤驗證訊息 --}}
                {{-- @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach
                @endif --}}

                <fieldset>

                    <legend><span class="number">1</span></legend>

                    <label for="din_name">名稱:<span style="color:red;">
                            @error('din_name')
                                {{ $message }}
                            @enderror
                        </span></label>
                    <input type="text" name="din_name" value="{{ $Diner->din_name }}">

                    <label for="din_no">編號:<span style="color:red;">
                            @error('din_no')
                                {{ $message }}
                            @enderror
                        </span></label>
                    <input type="text" name="din_no" value="{{ $Diner->din_no }}">

                    {{-- <label for="din_type">類型:
                        <span style="color:red;">
                            @error('din_type')
                                {{ $message }}
                            @enderror
                        </span></label>
                    <input type="text" name="din_type" value="{{ $Diner->din_type }}"> --}}

                    {{-- ---------------------------- --}}





                    <label for="din_intr">特色介紹:
                        <span style="color:red;">
                            @error('din_intr')
                                {{ $message }}
                            @enderror
                        </span>
                    </label>
                    <textarea name="din_intr" value="">{{ $Diner->din_intr }}</textarea>


                    <label>提供餐飲類型:
                        {{-- <span style="color:red;">
                            @error('din_type')
                                {{ $message }}
                            @enderror
                        </span> --}}
                    </label>

                    @php
                        if ($Diner->din_type !== null) {
                            $Diners = json_decode($Diner->din_type);
                        } else {
                            $Diners = [];
                        }
                    @endphp


                    {{-- <input type="checkbox" value="01中式美食" name="din_type[]"
                        {{ in_array('01中式美食', (array) $Diners) ? 'checked' : '' }}>
                    <label class="light" for="01中式美食">01中式美食</label><br> --}}



                    @php
                        use App\Models\DinerType;
                        $DinerTypes = DinerType::all();
                    @endphp
                    @foreach ($DinerTypes as $DinerType)
                        <label>
                            <input type="checkbox" name="din_type[]"
                                {{ in_array($DinerType->dt_typename, (array) $Diners) ? 'checked' : '' }}
                                value={{ $DinerType->dt_typename }}>
                            {{ $DinerType->dt_typename }}
                        </label>
                    @endforeach







                    <label for="email">電子郵件:
                        <span style="color:red;">
                            @error('din_email')
                                {{ $message }}
                            @enderror
                        </span></label>
                    <input type="email" name="din_email" value="{{ $Diner->din_email }}">

                    <label for="tel">電話:
                        <span style="color:red;">
                            @error('din_tel')
                                {{ $message }}
                            @enderror
                        </span></label>
                    <input type="text" name="din_tel" value="{{ $Diner->din_tel }}">

                    <label for="tel">地址:
                        <span style="color:red;">
                            @error('din_addr')
                                {{ $message }}
                            @enderror
                        </span></label>
                    <input type="text" name="din_addr" value="{{ $Diner->din_addr }}">

                    <label for="din_openTime">營業時間<span style="color:red;">

                        </span></label>
                    {{-- <span><input type="text" name="din_openTime" placeholder="開店時間"
                            value="{{ old('din_openTime') }}"> --}}
                    <span>
                        <input type="time" name="din_openTime" class="form-control" placeholder="開店時間"
                            value="{{ $Diner->din_openTime }}" required>

                        <input type="time" name="din_closeTime" class="form-control" placeholder="關店時間"
                            value="{{ $Diner->din_closeTime }}" required>
                    </span>
                    {{-- <input type="datetime-local" name="din_openTime" class="form-control" placeholder="開店時間"> --}}


                    <label for="din_holiday">公休日:
                        <span style="color:red;">
                            @error('din_holiday')
                                {{ $message }}
                            @enderror
                        </span></label>
                    <input type="text" name="din_holiday" value="{{ $Diner->din_holiday }}">

                    <label>是否提供內用:
                        <span style="color:red;">
                            @error('din_takeoutOnly')
                                {{ $message }}
                            @enderror
                        </span>
                    </label>
                    <input type="radio" value="yes" name="din_takeoutOnly"
                        {{ $Diner->din_takeoutOnly == 'yes' ? 'checked' : '' }}>
                    <label for="yes" class="light">是</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" value="no" name="din_takeoutOnly"
                        {{ $Diner->din_takeoutOnly == 'no' ? 'checked' : '' }}>
                    <label for="no" class="light">否，僅限外帶</label>

                    <br><br>

                    {{-- <input type="radio" value="male" name="user_sex"
                        {{ $Register->sex == 'male' ? 'checked' : '' }}>
                    <label for="sex" class="light">男</label><br> --}}

                    <label>服務費需外加？
                        <span style="color:red;">
                            @error('din_extraServiceFee')
                                {{ $message }}
                            @enderror
                        </span>
                    </label>
                    <div style="display: inline-block">
                        <input type="radio" value="yes" name="din_extraServiceFee"
                            {{ $Diner->din_extraServiceFee == 'yes' ? 'checked' : '' }}>
                        <label for="yes" class="light">是</label> &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" value="no" name="din_extraServiceFee"
                            {{ $Diner->din_extraServiceFee == 'no' ? 'checked' : '' }}>
                        <label for="no" class="light">否</label>

                        &nbsp;&nbsp;&nbsp;&nbsp; 外加服務費費率:
                        <span style="color:red;">
                            @error('din_serviceFee')
                                {{ $message }}
                            @enderror
                        </span>
                        <input type="text" style="width: 60px;" name="din_serviceFee"
                            value="{{ $Diner->din_serviceFee }}">
                    </div><br><br>
                    <label for="din_url">餐館網址:
                        <span style="color:red;">
                            @error('din_url')
                                {{ $message }}
                            @enderror
                        </span></label>
                    <input type="text" name="din_url01" value="{{ $Diner->din_url01 }}"> <br><br>

                    <input class="form-control" name="din_photo" type="file"> <br><br>
                    <input class="form-control" name="ori_din_photo" type="hidden"
                        value="{{ $Diner->din_photo }}">
                    {{-- <input class="form-control" name="ori_din_photo" type="text" value="{{ $Diner->din_photo }}"> --}}



                    <label for="din_remark01">備註: <span style="color:red;">

                        </span></label>
                    <textarea name="din_remark01" value="">{{ $Diner->din_remark01 }}</textarea>





                    <fieldset>







                        <button type="submit">完成</button>

            </form>
        </div>
    </div>

</body>

</html>
