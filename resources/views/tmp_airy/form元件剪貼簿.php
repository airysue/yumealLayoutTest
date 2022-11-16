<form action="/reg" method="POST">
  @csrf
  <h1> Sign Up </h1>

  <fieldset>

    <legend><span class="number">1</span> 基本資料</legend>

    <label for="name">Name:
      <span style="color:red;">
        @error('user_name')
        {{ $message }}
        @enderror
      </span></label>
    <input type="text" name="user_name" value="{{ old('user_name') }}">

    <label for="email">Email:
      <span style="color:red;">
        @error('user_email')
        {{ $message }}
        @enderror
      </span></label>
    <input type="email" name="user_email" value="{{ old('user_email') }}">

    <label for="tel">Tel:
      <span style="color:red;">
        @error('user_tel')
        {{ $message }}
        @enderror
      </span></label>
    <input type="text" name="user_tel" value="{{ old('user_tel') }}">

    <label>Sex:
      <span style="color:red;">
        @error('user_sex')
        {{ $message }}
        @enderror
      </span>
    </label>
    <input type="radio" value="male" name="user_sex" @if (old('user_sex')=='male' ) checked @endif>
    <label for="sex" class="light">男</label><br>
    <input type="radio" value="female" name="user_sex" @if (old('user_sex')=='female' ) checked @endif>
    <label for="sex" class="light">女</label>

  </fieldset>
  <fieldset>

    <legend><span class="number">2</span>aboutme</legend>

    <label for="aboutme">About me:
      <span style="color:red;">
        @error('aboutme')
        {{ $message }}
        @enderror
      </span>
    </label>
    <textarea name="aboutme" value="">{{ old('aboutme') }}</textarea>



    <label for="landmark">Landmark:
      <span style="color:red;">
        @error('landmark')
        {{ $message }}
        @enderror
      </span></label>
    <select name="landmark">
      <option value="">請選擇</option>
      <optgroup label="北市">
        <option value="tp01" {{ old('landmark') == 'tp01' ? 'selected' : '' }}>北車</option>
        <option value="tp02" {{ old('landmark') == 'tp02' ? 'selected' : '' }}>北美館</option>
        <option value="tp03" {{ old('landmark') == 'tp03' ? 'selected' : '' }}>故宮</option>

      </optgroup>
      <optgroup label="高雄">
        <option value="kh01" {{ old('landmark') == 'kh01' ? 'selected' : '' }}>小港機場</option>
        <option value="kh02" {{ old('landmark') == 'kh02' ? 'selected' : '' }}>旗津</option>
        <option value="kh03" {{ old('landmark') == 'kh03' ? 'selected' : '' }}>中山大學</option>
      </optgroup>

    </select>

    <label>不愛吃的食物:
      <span style="color:red;">
        @error('dislikefood')
        {{ $message }}
        @enderror
      </span>
    </label>

    <input type="checkbox" value="01芹菜" name="dislikefood[]" @if (is_array(old('dislikefood')) && in_array('01芹菜', old('dislikefood'))) checked @endif>
    <label class="light" for="01芹菜">01芹菜</label><br>

    <input type="checkbox" value="02香菜" name="dislikefood[]" @if (is_array(old('dislikefood')) && in_array('02香菜', old('dislikefood'))) checked @endif>
    <label class="light" for="02香菜">02香菜</label><br>

    <input type="checkbox" value="03苦瓜" name="dislikefood[]" @if (is_array(old('dislikefood')) && in_array('03苦瓜', old('dislikefood'))) checked @endif>
    <label class="light" for="03苦瓜">03苦瓜</label><br>

    <input type="checkbox" value="04茄子" name="dislikefood[]" @if (is_array(old('dislikefood')) && in_array('04茄子', old('dislikefood'))) checked @endif>
    <label class="light" for="04茄子">04茄子</label><br>

    <input type="checkbox" value="05青椒" name="dislikefood[]" @if (is_array(old('dislikefood')) && in_array('05青椒', old('dislikefood'))) checked @endif>
    <label class="light" for="05青椒">05青椒</label>

  </fieldset>

  <button type="submit">完成</button>

</form>
