<div id="card_{{$travel->id}}" class="travel_card grow bg-gray-200 p-4 rounded-lg shadow-lg mb-4" onclick="handleClick({{$travel->id}})">
    <div class="bg-purple-300 p-2 text-center rounded-lg">
        <h3 class="text-lg font-bold">Solicitud de Taxi</h3>
    </div>
    <p class="mt-1 text-gray-600"><strong>Calle principal:</strong> {{$travel->main_street}}</p>
    <p class="mt-1 text-gray-600"><strong>Calle secundaria:</strong> {{$travel->secondary_street}}</p>
    <p class="mt-1 text-gray-600"><strong>Referencia:</strong> {{$travel->reference}}</p>
    <p class="mt-1 text-gray-600"><strong>Barrio:</strong> {{$travel->neighborhood}}</p>
    <p class="mt-1 text-gray-600"><strong>Inf. Adicional:</strong> {{$travel->additional_information}}</p>
</div>