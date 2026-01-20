@props(['for'])

@error($for)
    <p {{ $attributes->merge(['class' => 'mt-1 text-sm italic text-red-600']) }}>{{ $message }}</p>
@enderror
