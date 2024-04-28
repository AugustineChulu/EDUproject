<button {{ $attributes->merge(['type' => 'submit', 'class' => 'loginBtn']) }}>
    {{ $slot }}
</button>
