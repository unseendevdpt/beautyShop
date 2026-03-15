<x-layouts::app :title="__('Roles')">
    <div class="container mx-auto py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-white">{{ __('Roles') }}</h1>
            @can('create_roles')
            <a href="{{ route('admin.roles.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500 transition shadow-lg shadow-blue-900/20">
                {{ __('Add Role') }}
            </a>
            @endcan
        </div>

        <div class="bg-zinc-900 border border-zinc-700 shadow-xl rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-zinc-700">
                <thead class="bg-zinc-800">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-zinc-400 uppercase tracking-wider">{{ __('ID') }}</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-zinc-400 uppercase tracking-wider">{{ __('Name') }}</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-zinc-400 uppercase tracking-wider">{{ __('Guard') }}</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-zinc-400 uppercase tracking-wider">{{ __('Created At') }}</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold text-zinc-400 uppercase tracking-wider">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-800 bg-zinc-900">
                    @foreach($roles as $role)
                        <tr class="hover:bg-zinc-800/50 transition">
                            <td class="px-6 py-4 text-zinc-400 whitespace-nowrap text-sm">{{ $role->id }}</td>
                            <td class="px-6 py-4 text-zinc-100 font-medium whitespace-nowrap">{{ $role->name }}</td>
                            <td class="px-6 py-4 text-zinc-400 whitespace-nowrap">
                                <span class="px-2 py-0.5 text-xs rounded bg-zinc-800 border border-zinc-700">
                                    {{ $role->guard_name }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-zinc-400 whitespace-nowrap text-sm">{{ $role->created_at?->format('Y-m-d') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                @can('show_roles')
                                <a href="{{ route('admin.roles.show', $role) }}" class="text-zinc-400 hover:text-white mr-3">{{ __('View') }}</a>
                                @endcan
                                @can('edit_roles')
                                <a href="{{ route('admin.roles.edit', $role) }}" class="text-blue-400 hover:text-blue-300 mr-3">{{ __('Edit') }}</a>
                                @endcan
                                @can('delete_roles')
                                <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" class="inline-block" onsubmit="return confirm('{{ __('Are you sure?') }}')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300">{{ __('Delete') }}</button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts::app>