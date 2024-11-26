
<x-app-layout>
    <div class=" m-auto w-[70vw]  py-12">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-4xl font-clash font-bold text-transparent bg-clip-text bg-gradient-to-r from-[#1d1d1d] to-[#93B1A6]">
                    User Management
                </h1>
         
            </div>

            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-[#fac365]/20">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-[#fac365]/20">
                        <thead>
                            <tr class="bg-[#1d1d1d]">
                                <th class="px-6 py-4 text-left text-xs font-semibold text-[#fac365] uppercase tracking-wider">ID</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-[#fac365] uppercase tracking-wider">Photo</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-[#fac365] uppercase tracking-wider">Name</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-[#fac365] uppercase tracking-wider">Gender</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-[#fac365] uppercase tracking-wider">Email</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-[#fac365] uppercase tracking-wider">Role</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-[#fac365] uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-[#fac365]/10">
                            @foreach ($users as $user)
                                <tr class="hover:bg-[#fef7e4] transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $user->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="h-10 w-10 rounded-full overflow-hidden border-2 border-[#fac365]">
                                            <img class="h-full w-full object-cover" 
                                                 src="{{ asset('/storage/' . $user->profile_image) }}" 
                                                 alt="{{ $user->name }}'s profile photo">
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-semibold text-gray-900">{{ $user->name }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $user->gender }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $user->email }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $user->role === 'admin' ? 'bg-[#fac365] text-black' : 'bg-gray-100 text-gray-800' }}">
                                            {{ $user->role }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex items-center gap-4">
                                          
                                            <form action="" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900 transition duration-150 ease-in-out">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>