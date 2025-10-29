@extends('admin.header_footer')

@section('titre', 'Reservations | Admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/admin_residences.css') }}">
@endsection

@section('main')
<div class="container mx-auto px-4 py-8 pt-44 lg:pt-40">

    <h2 class="text-3xl font-extrabold text-gray-900 mb-6 border-b-2 border-indigo-500 pb-2">
        <i class="fas fa-spinner mr-3 text-indigo-600"></i> Gestion des reservations de Réservation
    </h2>

    {{-- Section: Nombre total de reservations --}}
    <div class="bg-white p-4 rounded-lg shadow-md mb-6">
        <p class="text-lg font-semibold text-gray-700">
            <i class="fas fa-list-ul mr-2 text-indigo-500"></i> Total des reservations :
            <span class="text-indigo-600 font-bold">{{ $reservations->count() }}</span>
        </p>
    </div>

    @if ($reservations->isEmpty())
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded-lg shadow-md max-w-lg mx-auto">
            <p class="font-semibold text-center"><i class="fas fa-exclamation-triangle mr-2"></i> Aucune reservations de réservation n'a été trouvée.</p>
        </div>
    @else
        {{-- Tableau des reservations (Responsive) --}}
        <div class="overflow-x-auto bg-white rounded-lg shadow-xl">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Résidence</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Locataire</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dates</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Payé</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($reservations as $reservation)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">#{{ $reservation->id }}</td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-semibold text-indigo-600 truncate max-w-xs">{{ $reservation->residence->nom ?? 'Résidence inconnue' }}</div>
                                <div class="text-xs text-gray-500">{{ $reservation->residence->ville ?? 'N/A' }}</div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $reservation->user->name ?? 'Client Inconnu' }}</div>
                                <div class="text-xs text-gray-500">{{ $reservation->user->email ?? 'N/A' }}</div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                Du {{ \Carbon\Carbon::parse($reservation->date_arrivee)->format('d/m') }}  au  {{ \Carbon\Carbon::parse($reservation->date_depart)->format('d/m/Y') }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-green-600">
                                {{ number_format($reservation->total, 0, ',', ' ') }} FCFA
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                @php
                                    $color = match ($reservation->status) {
                                        'en attente' => 'bg-yellow-100 text-yellow-800',
                                        'confirmée' => 'bg-green-100 text-green-800',
                                        'annulée' => 'bg-red-100 text-red-800',
                                        default => 'bg-gray-100 text-gray-800',
                                    };
                                @endphp
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $color }}">
                                    {{ ucfirst($reservation->status) }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

</div>
@endsection
