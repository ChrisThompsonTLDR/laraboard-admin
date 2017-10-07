<li @if(request()->is($nav['is_active'])){!! 'class="active"' !!}@endif>
<a href="{{ route($nav['route']) }}">
    @if (!empty($nav['icon']))
    <span class="icon-ring"><i class="{{ $nav['icon'] }}" aria-hidden="true"></i></span>
    @endif
    {{ $nav['text'] }}
</a>
</li>