<div class="leftbar">
    <div class="card">
        @if(isset($popular_tools))
            <h3 class="card-title">En çok kullanılan araçlar</h3>
            <ul>
                @foreach($popular_tools as $tool)
                    <li><a href="/tool/{{$tool->tool->slug}}">{{$tool->tool->name}} ({{$tool->count}})</a></li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
