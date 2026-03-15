<x-layouts::app :title="__('User Details')">
    <div class="container mx-auto py-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-white">{{ __('User Details') }}</h1>
            <a href="{{ route('admin.users.index') }}" class="text-sm text-zinc-400 hover:text-white transition underline-offset-4 hover:underline">
                {{ __('Back to users') }}
            </a>
        </div>

        <!-- Dark Card Container -->
        <div class="bg-zinc-900 border border-zinc-700 shadow-xl rounded-lg p-8">
            <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                <div class="space-y-1">
                    <dt class="text-xs font-semibold text-zinc-500 uppercase tracking-wider">{{ __('Full Name') }}</dt>
                    <dd class="text-lg font-medium text-white">{{ $user->name }}</dd>
                </div>
                
                <div class="space-y-1">
                    <dt class="text-xs font-semibold text-zinc-500 uppercase tracking-wider">{{ __('Email Address') }}</dt>
                    <dd class="text-lg text-zinc-300">{{ $user->email }}</dd>
                </div>

                <div class="space-y-2">
                    <dt class="text-xs font-semibold text-zinc-500 uppercase tracking-wider">{{ __('Assigned Roles') }}</dt>
                    <dd class="flex flex-wrap gap-2">
                        @forelse($user->getRoleNames() as $role)
                            <span class="px-2.5 py-0.5 rounded-full bg-blue-900/30 border border-blue-800 text-blue-400 text-xs font-medium">
                                {{ $role }}
                            </span>
                        @empty
                            <span class="text-zinc-500 italic text-sm">{{ __('No roles assigned') }}</span>
                        @endforelse
                    </dd>
                </div>

                <div class="space-y-1">
                    <dt class="text-xs font-semibold text-zinc-500 uppercase tracking-wider">{{ __('Joined Date') }}</dt>
                    <dd class="text-lg text-zinc-300">{{ $user->created_at?->format('Y-m-d H:i') }}</dd>
                </div>
            </dl>

            <!-- Actions Bar -->
            <div class="mt-10 pt-6 border-t border-zinc-800 flex items-center gap-6">
                @can('edit_users')
                <a href="{{ route('admin.users.edit', $user) }}" class="bg-blue-600 text-white px-6 py-2 rounded font-medium hover:bg-blue-500 transition shadow-lg shadow-blue-900/20">
                    {{ __('Edit Profile') }}
                </a>
                @endcan
                @can('delete_users')
                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure?') }}')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-400 hover:text-red-300 transition font-medium hover:underline">
                        {{ __('Delete User') }}
                    </button>
                </form>
                @endcan
            </div>
        </div>
    </div>
</x-layouts::app>