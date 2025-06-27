@props([
    'dataContainerClass' => null, // class of the div that contains input and label

    'label' => 'Floating label',
    'id' => 'floating_input',
    'name' => '',
    'value' => null,
    'class' => '',

    'dataLabelClass' => null, // label class -> will overwrite default
])

<div class="relative z-0 mb-6 w-full group {{ $dataContainerClass }}">
    <input {{ $attributes->merge(['type' => 'text']) }} name="{{ $name }}" id="{{ $id }}"
        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
        @if ($value) value="{{ $value }}" @endif placeholder=" " @if( $attributes->has('required') ) required @endif />
    <label for="{{ $id }}"
        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 {{ $dataLabelClass }}">
        {{ $label }}
    </label>
</div>
{{--
<input type="numeric" name="phone" placeholder="Find phone" id="phone" class="border border-gray-300 p-3 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" autocomplete="off" required>
 --}}
