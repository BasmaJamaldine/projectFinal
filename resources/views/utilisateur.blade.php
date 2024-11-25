<x-app-layout>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-4xl font-extrabold text-center mb-10 text-transparent bg-clip-text bg-gradient-to-r from-[#000] to-[#93B1A6]">
            Liste des Utilisateurs
        </h1>
        
        <div class="bg-white rounded-lg shadow-xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="bg-[#93B1A6] px-6 py-3 text-left text-xs font-semibold text-black uppercase tracking-wider">
                                ID
                            </th>
                            <th class="bg-[#93B1A6] px-6 py-3 text-left text-xs font-semibold text-black uppercase tracking-wider">
                                Photo
                            </th>
                            <th class="bg-[#93B1A6] px-6 py-3 text-left text-xs font-semibold text-black uppercase tracking-wider">
                                Nom
                            </th>
                            <th class="bg-[#93B1A6] px-6 py-3 text-left text-xs font-semibold text-black uppercase tracking-wider">
                                Genre
                            </th>
                            <th class="bg-[#93B1A6] px-6 py-3 text-left text-xs font-semibold text-black uppercase tracking-wider">
                                Email
                            </th>
                            <th class="bg-[#93B1A6] px-6 py-3 text-left text-xs font-semibold text-black uppercase tracking-wider">
                                Role
                            </th>
                            <th class="bg-[#93B1A6] px-6 py-3 text-left text-xs font-semibold text-black uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($users as $user)
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $user->id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full object-cover" 
                                             src="{{ asset('/storage/' . $user->profile_image) }}" 
                                             alt="{{ $user->name }}'s profile photo">
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $user->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $user->gender }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $user->email }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        {{ $user->role === 'admin' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                                        {{ $user->role }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex items-center space-x-4">
                                   
                                        <form action="" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 transition duration-150 ease-in-out flex flex-row  gap-1">
                                                Delete
                                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
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
</x-app-layout>