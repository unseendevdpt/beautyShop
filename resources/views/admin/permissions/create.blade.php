<x-layouts::app :title="__('Create Permission')">
    <div class="container mx-auto py-6">
        <div class="flex items-center justify-between mb-6 px-2">
            <h1 class="text-2xl font-bold text-white">{{ __('Create Permission') }}</h1>
            <a href="{{ route('admin.permissions.index') }}" class="text-sm text-zinc-400 hover:text-white transition underline-offset-4 hover:underline">
                {{ __('Back to permissions') }}
            </a>
        </div>

        <!-- Dark Card Container -->
        <div class="bg-zinc-900 border border-zinc-700 shadow-xl rounded-xl p-8">
            <form method="POST" action="{{ route('admin.permissions.store') }}" class="space-y-6">
                @csrf
                
                @include('admin.permissions._form', ['permission' => null])

                <div class="flex items-center gap-4 pt-6 border-t border-zinc-800">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-blue-500 transition shadow-lg shadow-blue-900/20">
                        {{ __('Save Permission') }}
                    </button>
                    
                    <a href="{{ route('admin.permissions.index') }}" class="text-zinc-400 hover:text-zinc-200 transition">
                        {{ __('Cancel') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layouts::app>