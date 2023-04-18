@if (session()->has('message'))
    <div 
    x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
        class="fixed w-full top-0 flex justify-center align-center">
        <div class="bg-laravel text-white max-w-lg px-24 py-3 animate__animated animate__bounceInDown">
            <p>{{ session('message') }}</p>
        </div>
    </div>
@endif
