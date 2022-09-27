                @if ($DislikeFoods->isNotEmpty())
                    @foreach ($DislikeFoods as $DislikeFood)
                        <div class="card mt-5">

                            <div class="card-body">
                                <h4 class="card-title"> 編號：{{ $DislikeFood->id }}--討厭食物名稱：{{ $DislikeFood->df_name }}</h4>

                                  </p><br><br>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div>
                        <h4>找不到資料</h4>
                    </div>
                @endif
<a href="/DislikeFood"  >Back to HOME</a>
