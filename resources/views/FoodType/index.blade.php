<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('食物類型設定') }}
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


                    <div style="width:85%;margin: auto;"
                        class="d-flex justify-content-between align-items-end mb-2 mt-5">
                        <a href="{{ route('FoodType.create') }}" class="btn "
                            style="border-radius: 0;background-color: #999;color:#fff">
                            <span class="d-flex align-items-center mx-0"><i class="material-icons">&#xE147;</i><span
                                    class="ml-1">新增食物類型</span></span>
                        </a>
                        <form action="{{ route('FoodType_search') }}" method="GET" class="">
                            <div class="input-group ">
                                <input type="text" class="form-control" placeholder="Search"
                                    aria-label="Search" aria-describedby="searchBtn" id="searchBtn" name="search" />
                                <button class="input-group-text border-0" style="border-radius: 0;" >
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>


                    <table style="width:85%; margin: auto;">
                        <thead>
                            <tr>
                                <th><label>編號</label></th>
                                <th><label>名稱</label></th>
                                <th><label>排序</label></th>
                                <th><label>操作</label></th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($FoodTypes as $FoodType)
                                    <td data-label="編號"> {{ $FoodType->ft_no }}</td>
                                    <td data-label="名稱"> {{ $FoodType->ft_typename }}</td>
                                    <td data-label="名稱"> {{ $FoodType->ft_sort }}</td>
                                    <td data-label="操作">
                                        <a href="{{ route('FoodType.show', $FoodType->id) }}" class="show mx-1">
                                            <i class="fa-sharp fa-solid fa-eye " style="color:#36304A;"
                                                data-toggle="tooltip" title="檢視"></i></a>


                                        <a href="{{ route('FoodType.edit', $FoodType->id) }}" class="edit mx-1">
                                            <i class="fa-solid fa-pen-to-square" style="color:#36304A;"
                                                data-toggle="tooltip" title="編輯"></i></a>

                                        <form id="del_icon" action="{{ route('FoodType.destroy', $FoodType->id) }}"
                                            method="post" style="display: inline-block;">
                                            @csrf @method('DELETE')

                                            <a href="{{ 'FoodType/delete/' }}{{ $FoodType->id }}" class=" mx-1"
                                                onclick="return confirm('確定要刪除此筆資料嗎?')">
                                                <i class="fa-solid fa-trash" style="color:#36304A;"
                                                    data-toggle="tooltip" title="刪除"></i></a>
                                        </form>
                                    </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>

                    <div style="width:85%;margin:auto;  class=" mt-1" class="d-flex">
                        <div class="card-body d-flex justify-content-end mr-0">
                            {{ $FoodTypes->appends(['search' => request()->search])->links('vendor.pagination.bootstrap-5') }}
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