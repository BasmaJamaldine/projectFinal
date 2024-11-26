
<x-app-layout>
    <div class="w-[72vw] m-auto">
         @if(Auth::user()->role === 'admin')
        <div class="min-h-screen  py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl rounded-3xl border border-[#fac365]/20">
                    <div class="p-8">
                        <div class="flex items-center justify-between mb-8">
                            <h1 class="text-4xl font-clash font-bold text-transparent bg-clip-text bg-gradient-to-r from-[#1d1d1d] to-[#93B1A6]">
                                Role Requests
                            </h1>
                            <span class="bg-[#fac365] text-black px-4 py-2 rounded-full text-sm font-medium">
                                {{ $coachs->count() }} Pending Requests
                            </span>
                        </div>

                        <div class="bg-white rounded-xl overflow-hidden">
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-[#fac365]/20">
                                    <thead>
                                        <tr class="bg-[#1d1d1d]">
                                            <th class="px-6 py-4 text-left text-xs font-semibold text-[#fac365] uppercase tracking-wider">
                                                Name
                                            </th>
                                            <th class="px-6 py-4 text-left text-xs font-semibold text-[#fac365] uppercase tracking-wider">
                                                Email
                                            </th>
                                            <th class="px-6 py-4 text-left text-xs font-semibold text-[#fac365] uppercase tracking-wider">
                                                Request
                                            </th>
                                            <th class="px-6 py-4 text-left text-xs font-semibold text-[#fac365] uppercase tracking-wider">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-[#fac365]/10">
                                        @foreach($coachs as $coach)
                                            <tr class="hover:bg-[#fef7e4] transition-colors duration-200">
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0 h-10 w-10">
                                                            <div class="h-10 w-10 rounded-full bg-[#fac365]/20 flex items-center justify-center">
                                                                <span class="text-[#1d1d1d] font-semibold text-lg">
                                                                    {{ substr($coach->name, 0, 1) }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="ml-4">
                                                            <div class="text-sm font-semibold text-gray-900">
                                                                {{ $coach->name }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-600">{{ $coach->email }}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-[#fac365] text-black">
                                                        Coach Request
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                    <div class="flex items-center gap-2">
                                                        <form action="{{ route('admin.role.request', ['userId' => $coach->id, 'status' => 'approved']) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-[#1d1d1d] hover:bg-[#2d2d2d] text-[#fac365] text-sm font-medium rounded-full transition duration-150 ease-in-out">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                                </svg>
                                                                Approve
                                                            </button>
                                                        </form>
                                                        
                                                        <form action="{{ route('admin.role.request', ['userId' => $coach->id, 'status' => 'rejected']) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-full transition duration-150 ease-in-out">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                                </svg>
                                                                Reject
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            @if($coachs->isEmpty())
                                <div class="text-center py-12">
                                    <div class="text-gray-500 text-lg">
                                        No pending role requests at the moment
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="min-h-screen bg-[#fef7e4] flex items-center justify-center">
            <div class="text-center">
                <h2 class="text-2xl font-semibold text-gray-900">Access Denied</h2>
                <p class="mt-2 text-gray-600">You don't have permission to view this page.</p>
            </div>
        </div>
    @endif
    </div>
   
</x-app-layout>