<select {!! $attributes->merge([
  'class' => 'w-full mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-teal-500 dark:focus:border-teal-600 focus:ring-teal-500 dark:focus:ring-teal-600 rounded-md shadow-sm',
]) !!}">
  @foreach ($options as $option)
      <option value={{ $option->id }} @if ($selected === $option->id) selected @endif>{{ ucwords($option->name ?? $option->username) }}
      </option>
  @endforeach
</select>
