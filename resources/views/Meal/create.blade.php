<html lang="zh-Hant-TW">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增餐點</title>
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




            <form action="{{ url('/Meal') }}" method="post" enctype="multipart/form-data">
                <h1>新增餐點</h1>
                @csrf
                <fieldset>



                    <label for="mea_name">餐點名稱:<span style="color:red;">
                            @error('mea_name')
                                {{ $message }}
                            @enderror
                        </span></label>
                    <input type="text" name="mea_name" value="{{ old('mea_name') }}">




                    <label for="mea_intr">餐點介紹:
                        <span style="color:red;">
                            @error('mea_intr')
                                {{ $message }}
                            @enderror
                        </span>
                    </label>
                    <textarea name="mea_intr" value="">{{ old('mea_intr') }}</textarea>


                    <label>餐點類型:
                        <span style="color:red;">
                            @error('mea_type')
                                {{ $message }}
                            @enderror
                        </span>
                    </label><br>


                    @php
                        use App\Models\DinerType;
                        $DinerTypes = DinerType::all();
                    @endphp
                    @foreach ($DinerTypes as $DinerType)
                        <label>
                        <input type="checkbox" name="mea_type[]"

                        @if (is_array(old('mea_type')) && in_array($DinerType->id, old('mea_type'))) checked
                        @endif

                        value={{ $DinerType->dt_typename }}>
                                 {{ $DinerType->dt_typename }}
                        </label>
                    @endforeach










                    <br><br>



                    <label for="mea_no">編號:<span style="color:red;">
                            @error('mea_no')
                                {{ $message }}
                            @enderror
                        </span></label>
                    <input type="text" name="mea_no" placeholder="hidden待處理" value="din001">


                    <label for="mea_price">價格（NTD）:
                        <span style="color:red;">
                            @error('mea_price')
                                {{ $message }}
                            @enderror
                        </span></label>
                    <input type="number" name="mea_price" value="{{ old('mea_price') }}">


                        <br> <label>餐點是否包含以下食材:
                        <span style="color:red;">
                            @error('mea_type')
                                {{ $message }}
                            @enderror
                        </span>
                    </label><br>


                    @php
                        use App\Models\DislikeFood;
                        $DislikeFoods = DislikeFood::all();
                    @endphp
                    @foreach ($DislikeFoods as $DislikeFood)
                        <label>
                        <input type="checkbox" name="mea_DislikeFood[]"

                        @if (is_array(old('mea_DislikeFood')) && in_array($DislikeFood->id, old('mea_DislikeFood'))) checked
                        @endif

                        value={{ $DislikeFood->df_name }}>
                                 {{ $DislikeFood->df_name }}
                        </label>
                    @endforeach

<br><br>
                            <label>餐點適合族群:
                        <span style="color:red;">
                            @error('mea_type')
                                {{ $message }}
                            @enderror
                        </span>
                    </label><br>


                    @php
                        use App\Models\DietGroup;
                        $DietGroups = DietGroup::all();
                    @endphp
                    @foreach ($DietGroups as $DietGroup)
                        <label>
                        <input type="checkbox" name="mea_DietGroup[]"

                        @if (is_array(old('mea_DietGroup')) && in_array($DietGroup->id, old('mea_DietGroup'))) checked
                        @endif

                        value={{ $DietGroup->dg_name }}>
                                 {{ $DietGroup->dg_name }}
                        </label>
                    @endforeach



                    <br><br>



                    {{-- @if ($message = Session::get('warning'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif --}}



                    <label for="mea_url">餐點照片:
</label>
                    <input class="form-control" name="mea_photo" type="file" id="mea_photo"> <br><br><br>


                    <label for="mea_remark01">備註（補充說明）: <span style="color:red;">

                        </span></label>
                    <textarea name="mea_remark01" value="">{{ old('mea_remark01') }}</textarea>


                    <fieldset>

                        <button type="submit">存檔送出</button>

            </form>
        </div>
    </div>

</body>

</html>
