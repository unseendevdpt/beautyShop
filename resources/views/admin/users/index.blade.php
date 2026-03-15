<x-layouts::app :title="__('Users')">
@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endpush

<div class="container mx-auto py-6 text-gray-100">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-white">{{ __('Users') }}</h1>
        @can('create_users')
        <a href="{{ route('admin.users.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500 transition">
            {{ __('Add User') }}
        </a>
        @endcan
    </div>

    <!-- Table Container -->
    <div class="bg-zinc-900 shadow-xl rounded-lg overflow-hidden border border-zinc-700">
        <table id="users-table" class="min-w-full divide-y divide-zinc-700">
            <thead class="bg-zinc-800">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-zinc-400 uppercase tracking-wider">{{ __('ID') }}</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-zinc-400 uppercase tracking-wider">{{ __('Name') }}</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-zinc-400 uppercase tracking-wider">{{ __('Email') }}</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-zinc-400 uppercase tracking-wider">{{ __('Role') }}</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-zinc-400 uppercase tracking-wider">{{ __('Created At') }}</th>
                    <th class="px-6 py-3 text-right text-xs font-semibold text-zinc-400 uppercase tracking-wider">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-zinc-800 bg-zinc-900">
                @foreach($users as $user)
                    <tr class="hover:bg-zinc-800/50 transition">
                        <td class="px-6 py-4 text-zinc-300 whitespace-nowrap">{{ $user->id }}</td>
                        <td class="px-6 py-4 text-zinc-100 font-medium whitespace-nowrap">{{ $user->name }}</td>
                        <td class="px-6 py-4 text-zinc-400 whitespace-nowrap">{{ $user->email }}</td>
                        <td class="px-6 py-4 text-zinc-400 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs rounded bg-zinc-800 border border-zinc-700">
                                {{ $user->getRoleNames()->implode(', ') ?: '-' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-zinc-400 whitespace-nowrap">{{ $user->created_at->format('Y-m-d') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                            @can('show_users')
                            <a href="{{ route('admin.users.show', $user) }}" class="text-blue-400 hover:text-blue-300 mr-3">{{ __('View') }}</a>
                            @endcan
                            @can('edit_users')
                                <a href="{{ route('admin.users.edit', $user) }}" class="text-blue-400 hover:text-blue-300 mr-3">{{ __('Edit') }}</a>
                            @endcan
                            @can('delete_users')
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline-block" onsubmit="return confirm('{{ __('Are you sure?') }}')">
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

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#users-table').DataTable({
                responsive: true,
                // ... your existing language config
            });
        });
    </script>   
@endpush
</x-layouts::app>