@foreach($result as $key => $val)
    вершина - {{$val['u']}}
    сосед - {{$val['v']}}
    @if(!empty($val['w']))
        вес - {{$val['w']}}
    @endif
    <br>
    <br>
@endforeach


