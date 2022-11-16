<html lang="zh-Hant-TW">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增餐飲店</title>
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




            <form action="{{ url('/Diner') }}" method="post" enctype="multipart/form-data">
                <h1>新增餐飲店</h1>
                @csrf
                <fieldset>



                    <label for="din_name">店家名稱:<span style="color:red;">
                            @error('din_name')
                                {{ $message }}
                            @enderror
                        </span></label>
                    <input type="text" name="din_name" value="{{ old('din_name') }}">




                    <label for="din_intr">特色介紹:
                        <span style="color:red;">
                            @error('din_intr')
                                {{ $message }}
                            @enderror
                        </span>
                    </label>
                    <textarea name="din_intr" value="">{{ old('din_intr') }}</textarea>


                    <label>提供餐飲類型:
                        <span style="color:red;">
                            @error('din_type')
                                {{ $message }}
                            @enderror
                        </span>
                    </label>

                    {{-- <input type="checkbox" value="01中式美食" name="din_type[]"
                        @if (is_array(old('din_type')) && in_array('01中式美食', old('din_type'))) checked @endif>
                    <label class="light" for="01中式美食">01芹菜</label><br> --}}


                    @php
                        use App\Models\DinerType;
                        $DinerTypes = DinerType::all();
                    @endphp
                    @foreach ($DinerTypes as $DinerType)
                        <label>
                        <input type="checkbox" name="din_type[]"

                        @if (is_array(old('din_type')) && in_array($DinerType->id, old('din_type'))) checked
                        @endif

                        value={{ $DinerType->dt_typename }}>
                                 {{ $DinerType->dt_typename }}
                        </label>
                    @endforeach










                    <br><br>

                    {{-- @php
                    use App\Models\DislikeFood;
                    $DislikeFoods =  DislikeFood::all();
                    @endphp
                    @foreach ($DislikeFoods as $DislikeFood)
                    <label><input type="checkbox" name="DislikeFood[]" value={{$DislikeFood->id}}>{{$DislikeFood->df_name}} </label>
                    @endforeach --}}

                    <label for="din_no">編號:<span style="color:red;">
                            @error('din_no')
                                {{ $message }}
                            @enderror
                        </span></label>
                    <input type="text" name="din_no" placeholder="hidden待處理" value="din001">


                    <label for="email">電子郵件:
                        <span style="color:red;">
                            @error('din_email')
                                {{ $message }}
                            @enderror
                        </span></label>
                    <input type="email" name="din_email" value="{{ old('din_email') }}">

                    <label for="tel">電話:
                        <span style="color:red;">
                            @error('din_tel')
                                {{ $message }}
                            @enderror
                        </span></label>
                    <input type="text" name="din_tel" value="{{ old('din_tel') }}">

                    <label for="tel">地址:
                        <span style="color:red;">
                            @error('din_addr')
                                {{ $message }}
                            @enderror
                        </span></label>
                    <input type="text" name="din_addr" value="{{ old('din_addr') }}">

                    <label for="din_openTime">營業時間<span style="color:red;">

                        </span></label>
                    {{-- <span><input type="text" name="din_openTime" placeholder="開店時間"
                            value="{{ old('din_openTime') }}"> --}}
                    <span>
                        <input type="time" name="din_openTime" class="form-control" placeholder="開店時間"
                            value="{{ old('din_openTime') }}" required>

                        <input type="time" name="din_closeTime" class="form-control" placeholder="關店時間"
                            value="{{ old('din_closeTime') }}" required>
                    </span>
                    {{-- <input type="datetime-local" name="din_openTime" class="form-control" placeholder="開店時間"> --}}


                    <label for="din_holiday">公休日:
                        <span style="color:red;">
                            @error('din_holiday')
                                {{ $message }}
                            @enderror
                        </span></label>
                    <input type="text" name="din_holiday" value="{{ old('din_holiday') }}">

                    <label>是否提供內用:
                        <span style="color:red;">
                            @error('din_takeoutOnly')
                                {{ $message }}
                            @enderror
                        </span>
                    </label>
                    <input type="radio" value="yes" name="din_takeoutOnly"
                        @if (old('din_takeoutOnly') == 'yes') checked @endif>
                    <label for="yes" class="light">是</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" value="no" name="din_takeoutOnly"
                        @if (old('din_takeoutOnly') == 'no') checked @endif>
                    <label for="no" class="light">否，僅限外帶</label>
                    <br><br>

                    <label>服務費需外加？
                        <span style="color:red;">
                            @error('din_extraServiceFee')
                                {{ $message }}
                            @enderror
                        </span>
                    </label>
                    <div style="display: inline-block">
                        <input type="radio" value="yes" name="din_extraServiceFee"
                            @if (old('din_extraServiceFee') == 'yes') checked @endif>
                        <label for="yes" class="light">是</label> &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" value="no" name="din_extraServiceFee"
                            @if (old('din_extraServiceFee') == 'no') checked @endif>
                        <label for="no" class="light">否</label>

                        &nbsp;&nbsp;&nbsp;&nbsp; 外加服務費費率:
                        <span style="color:red;">
                            @error('din_serviceFee')
                                {{ $message }}
                            @enderror
                        </span>
                        <input type="text" style="width: 60px;" name="din_serviceFee"
                            value="{{ old('din_serviceFee') }}">
                    </div><br><br>
                    <label for="din_url">餐館網址:
                        <span style="color:red;">
                            @error('din_url')
                                {{ $message }}
                            @enderror
                        </span></label>
                    <input type="text" name="din_url01" value="{{ old('din_url01') }}"> <br><br>



                    @if ($message = Session::get('warning'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif




                    <input class="form-control" name="din_photo" type="file" id="din_photo"> <br><br>


                    <label for="din_remark01">備註（補充說明）: <span style="color:red;">

                        </span></label>
                    <textarea name="din_remark01" value="">{{ old('din_remark01') }}</textarea>


                    <fieldset>

                        <button type="submit">存檔送出</button>

            </form>
        </div>
    </div>

</body>

</html>
