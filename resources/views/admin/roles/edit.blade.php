<x-layouts::app :title="__('Edit Role')">
    <div class="container mx-auto py-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-white">
                {{ __('Edit Role') }}: <span class="text-blue-400">{{ $role->name }}</span>
            </h1>
            <a href="{{ route('admin.roles.index') }}" class="text-sm text-zinc-400 hover:text-white transition underline-offset-4 hover:underline">
                {{ __('Back to roles') }}
            </a>
        </div>

        <!-- Dark Card Container -->
        <div class="bg-zinc-900 border border-zinc-700 shadow-xl rounded-lg p-8">
            <form method="POST" action="{{ route('admin.roles.update', $role) }}" class="space-y-6">
                @csrf
                @method('PUT')

                @include('admin.roles._form', ['role' => $role])

                <div class="flex items-center gap-4 pt-4 border-t border-zinc-800">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded font-medium hover:bg-blue-500 transition shadow-lg shadow-blue-900/20">
                        {{ __('Update Role') }}
                    </button>
                    
                    <a href="{{ route('admin.roles.index') }}" class="text-zinc-400 hover:text-zinc-200 transition">
                        {{ __('Cancel') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layouts::app>