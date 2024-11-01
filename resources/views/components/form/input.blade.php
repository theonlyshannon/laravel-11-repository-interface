@props([
    'type' => 'text',
    'name' => '',
    'id' => '',
    'label' => '',
    'placeholder' => '',
    'value' => '',
    'customClass' => '',
    'mb' => '3',
    'formText' => '',
    'iconClass' => '', 
])

@php
    $classes =
        'block w-full px-4 py-2 text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500';
    $classes .= $errors->has($name) ? ' border-red-500' : '';
    $classes .= ' ' . $customClass;
@endphp

<div class="mb-{{ $mb }}">

    @if ($label)
        <label for="{{ $id }}" class="block mb-1 text-gray-700">{{ $label }}</label>
    @endif

    <div class="relative">
        @if ($iconClass)
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <i class="{{ $iconClass }} text-gray-500"></i>
            </div>
        @endif

        <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}"
            placeholder="{{ $placeholder }}" value="{{ old($name, $value) }}"
            {{ $attributes->merge(['class' => $classes . ($iconClass ? ' pl-10' : '')]) }} />

        @if ($type === 'password')
            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                <i class="fa fa-eye text-gray-500 cursor-pointer" id="{{ $id }}-toggle"
                    onclick="togglePassword('{{ $id }}')"></i>
            </div>
        @endif

        @error($name)
            <div class="mt-1 text-sm text-red-500">
                {{ $message }}
            </div>
        @enderror

        @if ($formText)
            <div class="mt-1 text-sm text-gray-500">
                {!! $formText !!}
            </div>
        @endif
    </div>
</div>

@push('auth-scripts')
    <script>
        function togglePassword(inputId) {
            var passwordInput = document.getElementById(inputId);
            var eyeIcon = document.getElementById(inputId + '-toggle');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
    </script>
@endpush
