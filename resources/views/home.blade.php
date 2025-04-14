{{-- Carbon For Date/Time Formatting --}}
@php
    use Carbon\Carbon;
@endphp

{{-- Layout --}}
@extends('layouts.master')

{{-- Main Content --}}
@section('contenuto')
    <div class="container">

        {{-- Table --}}
        <div class="table-responsive">
            <table class="table text-nowrap table-bordered text-center align-middle">
                
                {{-- Table Head --}}
                <thead>
                    <tr class="table-dark fs-5">
                        <th>Vettore</th>
                        <th>Codice Treno</th>
                        <th>Stazione di Partenza</th>
                        <th>Orario</th>
                        <th>Destinazione</th>
                        <th>Arrivo</th>
                        <th>Carrozze</th>
                        <th>In Orario</th>
                        <th>Cancellato</th>
                    </tr>
                </thead>

                {{-- Table Body --}}
                <tbody>
                    @foreach ($trains as $train)
                        <tr class="{{ $train->cancelled ? 'table-danger' : '' }}">
                            <td class="text-wrap">{{ $train->company }}</td>
                            <td>{{ $train->train_code }}</td>
                            <td>{{ $train->departure_station }}</td>
                            <td>{{ Carbon::parse($train->departure_time)->format('d/m/Y H:i') }}</td>
                            <td>{{ $train->arrival_station }}</td>
                            <td>{{ Carbon::parse($train->arrival_time)->format('d/m/Y H:i') }}</td>
                            <td>{{ $train->carriages }}</td>
                            <td>{{ $train->on_time ? 'Sì' : 'No' }}</td>
                            <td>{{ $train->cancelled ? 'Sì' : 'No' }}</td>
                        </tr>
                    @endforeach
                </tbody>
                
            </table>

            {{-- Paginator --}}
            <div class="mt-4">
                {{ $trains->links() }}
            </div>

        </div>
    </div>
@endsection
