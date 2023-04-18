<x-layout>
    <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Login
            </h2>
            <p class="mb-4">Log in to your account</p>
        </header>

        <form action="/users/authenticate" method="POST">
            {{ csrf_field() }}

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Email</label>
                <input value="{{old('email')}}" type="email" class="border border-gray-200 rounded p-2 w-full" name="email" />
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2">
                    Password
                </label>
                <input id="password" type="password" class="border border-gray-200 rounded p-2 w-full" name="password" />
                <input id="checkbox" type="checkbox" id="checkbox"> Show Password
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Sign In
                </button>
            </div>

            <div class="mt-8">
                <p>
                    Don't have an account?
                    <a href="/register" class="text-laravel">Register</a>
                </p>
            </div>
        </form>
    </x-card>
</x-layout>

<script>
    $(document).ready(function(){
        $('#checkbox').on('change', () => {
            $('#password').attr('type', $('#checkbox').prop('checked') ? "text" : "password"); 
        });
    });
</script>
