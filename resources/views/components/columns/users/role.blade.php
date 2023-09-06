@props(['value'])

<div>
    {{ count($value) > 0 ? $value[0]->name : '' }}
</div>
