<x-layouts::app :title="__('Permission Details')">
    <div class="container mx-auto py-6">
        <div class="flex items-center justify-between mb-6 px-2">
            <h1 class="text-2xl font-bold text-white">{{ __('Permission Details') }}</h1>
            <a href="{{ route('admin.permissions.index') }}" class="text-sm text-zinc-400 hover:text-white transition underline-offset-4 hover:underline">
                {{ __('Back to permissions') }}
            </a>
        </div>

        <!-- Dark Card Container -->
        <div class="bg-zinc-900 border border-zinc-700 shadow-xl rounded-xl p-8">
            <dl class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="space-y-1">
                    <dt class="text-xs font-semibold text-zinc-500 uppercase tracking-widest">{{ __('Permission Name') }}</dt>
                    <dd class="text-lg font-medium text-white">{{ $permission->name }}</dd>
                </div>
                <div class="space-y-1">
                    <dt class="text-xs font-semibold text-zinc-500 uppercase tracking-widest">{{ __('Guard Name') }}</dt>
                    <dd class="text-lg text-zinc-300">
                        <span class="px-2.5 py-0.5 rounded bg-zinc-800 border border-zinc-700 text-sm font-mono">
                            {{ $permission->guard_name }}
                        </span>
                    </dd>
                </div>
                <div class="space-y-1">
                    <dt class="text-xs font-semibold text-zinc-500 uppercase tracking-widest">{{ __('Date Created') }}</dt>
                    <dd class="text-lg text-zinc-300">{{ $permission->created_at?->format('Y-m-d H:i') }}</dd>
                </div>
            </dl>

            <!-- Actions Bar -->
            <div class="mt-10 pt-6 border-t border-zinc-800 flex items-center gap-6">
                @can('edit_permissions')
                <a href="{{ route('admin.permissions.edit', $permission) }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-blue-500 transition shadow-lg shadow-blue-900/20">
                    {{ __('Edit Permission') }}
                </a>
                @endcan
                @can('delete_permissions')
                <form action="{{ route('admin.permissions.destroy', $permission) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure?') }}')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-400 hover:text-red-300 transition font-medium hover:underline">
                        {{ __('Delete Permission') }}
                    </button>
                </form>
                @endcan
            </div>
        </div>
    </div>
</x-layouts::app>