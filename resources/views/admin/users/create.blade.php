<x-layouts::app :title="__('Create User')">
    <div class="container mx-auto py-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-white">{{ __('Create User') }}</h1>
            <a href="{{ route('admin.users.index') }}" class="text-sm text-zinc-400 hover:text-white transition underline-offset-4 hover:underline">
                {{ __('Back to users') }}
            </a>
        </div>

        <!-- Dark Card Container -->
        <div class="bg-zinc-900 border border-zinc-700 shadow-xl rounded-lg p-8">
            <form method="POST" action="{{ route('admin.users.store') }}" class="space-y-6 text-zinc-100">
                @csrf
                
                {{-- Ensure the inputs inside this partial use bg-zinc-800 and text-white --}}
                @include('admin.users._form', ['user' => null, 'roles' => $roles])

                <div class="flex items-center gap-4 pt-4 border-t border-zinc-800">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded font-medium hover:bg-blue-500 transition shadow-lg shadow-blue-900/20">
                        {{ __('Save User') }}
                    </button>
                    
                    <a href="{{ route('admin.users.index') }}" class="text-zinc-400 hover:text-zinc-200 transition">
                        {{ __('Cancel') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layouts::app>