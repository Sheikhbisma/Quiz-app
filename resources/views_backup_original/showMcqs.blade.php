@extends('layout.MasterLayout')

@section('content')

<div class="min-h-screen bg-gray-100 py-10 px-6">

    <div class="max-w-5xl mx-auto bg-white shadow-xl rounded-2xl overflow-hidden">

        <!-- Header -->
        <div class="bg-purple-600 text-white text-center py-4">
            <h2 class="text-2xl font-bold">MCQS List {{str_replace('-',' ',$qName)}}</h2>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left text-gray-700">

                <thead class="bg-gray-200 text-gray-800 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3">#ID</th>
                        <th class="px-6 py-3">MCQS</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">

                    @forelse($view as $v)
                    <tr class="hover:bg-gray-100 transition duration-200">
                        <td class="px-6 py-4 font-semibold text-gray-600">
                            {{ $v->id }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $v->mcqs }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="2" class="text-center text-red-500 py-6 font-semibold">
                            No MCQS Available
                        </td>
                    </tr>
                    @endforelse

                </tbody>

            </table>
        </div>

    </div>

</div>

@endsection