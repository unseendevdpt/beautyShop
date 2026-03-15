<x-layouts::app :title="__('Role Details')">
    <div class="container mx-auto py-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-white">{{ __('Role Details') }}</h1>
            <a href="{{ route('admin.roles.index') }}" class="text-sm text-zinc-400 hover:text-white transition underline-offset-4 hover:underline">
                {{ __('Back to roles') }}
            </a>
        </div>

        <!-- Dark Card Container -->
        <div class="bg-zinc-900 border border-zinc-700 shadow-xl rounded-lg p-8">
            <dl class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="space-y-1">
                    <dt class="text-xs font-semibold text-zinc-500 uppercase tracking-wider">{{ __('Role Name') }}</dt>
                    <dd class="text-lg font-medium text-white">{{ $role->name }}</dd>
                </div>
                <div class="space-y-1">
                    <dt class="text-xs font-semibold text-zinc-500 uppercase tracking-wider">{{ __('Guard Name') }}</dt>
                    <dd class="text-lg text-zinc-300">
                        <span class="px-2 py-0.5 rounded bg-zinc-800 border border-zinc-700 text-sm">
                            {{ $role->guard_name }}
                        </span>
                    </dd>
                </div>
                <div class="space-y-2">
                    <dt class="text-xs font-semibold text-zinc-500 uppercase tracking-wider">{{ __('Assigned Permissions') }}</dt>
                    <dd class="flex flex-wrap gap-2">
                        @forelse($permissions as $permission)
                            <span class="px-2.5 py-0.5 rounded-full bg-green-900/30 border border-green-800 text-green-400 text-xs font-medium">
                                {{ $permission->name }}
                            </span>
                        @empty
                            <span class="text-zinc-500 italic text-sm">{{ __('No permissions assigned') }}</span>
                        @endforelse
                    </dd>
                </div>
                <div class="space-y-1">
                    <dt class="text-xs font-semibold text-zinc-500 uppercase tracking-wider">{{ __('Date Created') }}</dt>
                    <dd class="text-lg text-zinc-300">{{ $role->created_at?->format('Y-m-d H:i') }}</dd>
                </div>
            </dl>

            <!-- Actions Bar -->
            <div class="mt-10 pt-6 border-t border-zinc-800 flex items-center gap-6">
                @can('edit_roles')
                <a href="{{ route('admin.roles.edit', $role) }}" class="bg-blue-600 text-white px-6 py-2 rounded font-medium hover:bg-blue-500 transition shadow-lg shadow-blue-900/20">
                    {{ __('Edit Role') }}
                </a>
                @endcan
                @can('delete_roles')
                <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure?') }}')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-400 hover:text-red-300 transition font-medium hover:underline">
                        {{ __('Delete Role') }}
                    </button>
                </form>
                @endcan
            </div>
        </div>
    </div>
</x-layouts::app>