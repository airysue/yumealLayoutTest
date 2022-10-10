<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('餐點管理') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    @if ($message = Session::get('warning'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif


                    <div style="width:85%;margin: auto;"
                        class="d-flex justify-content-between align-items-end mb-2 mt-5">
                        <a href="{{ route('Meal.create') }}" class="btn "
                            style="border-radius: 0;background-color: #999;color:#fff">
                            <span class="d-flex align-items-center mx-0"><i class="material-icons">&#xE147;</i><span
                                    class="ml-1">新增</span></span>
                        </a>
                        <form action="{{ route('Meal_search') }}" method="GET" class="">
                            {{-- <div class="input-group  mb-0">
                                <input type="text" name="search" id="searchBtn" placeholder="Search" required />
                                <button class="btn  ml-2" type="submit" style="border-radius: 0;background-color:#999;color:white;"><i class="fas fa-search"></i></button>
                            </div> --}}


                            <div class="input-group ">
                                <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                                    aria-describedby="searchBtn" id="searchBtn" name="search" />
                                <button class="input-group-text border-0" style="border-radius: 0;">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>






                        </form>
                    </div>


                    <table style="width:85%; margin: auto;">
                        <thead>
                            <tr>
                                <th><label>名稱</label></th>
                                <th><label>類型</label></th>
                                <th><label>網址</label></th>
                                <th><label>圖片</label></th>
                                <th><label>操作</label></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($Meals as $Meal)
                                    <td data-label="名稱"> {{ $Meal->id }}_{{ $Meal->mea_name }}</td>
                                    @if (trim($Meal->mea_type) != null)
                                        <td data-label="類型"> {{ $Meal->mea_type }}</td>
                                    @else
                                        <td data-label="類型"> &nbsp; </td>
                                    @endif



                                    <td data-label="網址">
                                     <a href="" class="edit mx-1">
                                            <i class="fa-solid fa-earth" style="color:#36304A;"
                                                data-toggle="tooltip" title="位置"></i>{{ $Meal->mea_url }}</a>

                                     {{ $Meal->mea_url01 }}</td>

                                     <td>
                                            <img src="{{ asset($Meal->mea_photo_path) }}" width= '50' height='50' class="img img-responsive" style="margin: auto;"  />


                                        </td>

                                    <td data-label="操作">




                                        <a href="{{ route('Meal.show', $Meal->id) }}" class="show mx-1">
                                            <i class="fa-sharp fa-solid fa-eye" style="color:#36304A;"
                                                data-toggle="tooltip" title="檢視"></i></a>


                                        <a href="{{ route('Meal.edit', $Meal->id) }}" class="edit mx-1">
                                            <i class="fa-solid fa-pen-to-square" style="color:#36304A;"
                                                data-toggle="tooltip" title="編輯"></i></a>

                                        <form id="del_icon" action="{{ route('Meal.destroy', $Meal->id) }}"
                                            method="post" style="display: inline-block;">
                                            @csrf @method('DELETE')

                                            <a class="mx-1" href="{{ 'Meal/delete/' }}{{ $Meal->id }}"
                                                onclick="return confirm('確定要刪除此筆資料嗎?')">
                                                <i class="fa-solid fa-trash" style="color:#36304A;"
                                                    data-toggle="tooltip" title="刪除"></i></a>
                                        </form>
                                    </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>

                    <div style="width:85%;margin:auto;" class=" mt-1" class="d-flex">
                        <div class="card-body d-flex justify-content-end mr-0">
                            {{ $Meals->appends(['search' => request()->search])->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>

                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
                    </script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
                        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
                    </script>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
