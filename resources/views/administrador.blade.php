<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Radio Taxi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        /* For IE, Edge and Firefox */
        .scrollbar-hide {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }

       #asignarForm  input {
        opacity: 0;
        height: 1px;
        display: block
   }
    </style>
    {{-- <link href="{{asset('css/app.css')}}" rel="stylesheet"> --}}
</head>

<body>
    <div class="flex justify-between ">
        <h3 class="flex justify-center mt-3 text-2xl font-bold text-gray-700 ml-16">ASIGNAR VIAJES</h3>
        <a href="{{ route('admin.users.index') }}"
            class="d-inline-block  bg-red-700 hover:bg-red-900 text-white font-bold py-1 px-4 rounded mr-16 mt-4 ml-16">
            CRUD
        </a>
    </div>
    <div class="flex justify-between p-6 h-[calc(100vh-3rem)]">
        <div id="travelsContainer"
            class=" grow border-solid border-2 border-gray-800 rounded mr-20 ml-10 p-4 overflow-y-scroll scrollbar-hide">
            @foreach ($travels as $travel)
                <x-card_travels :travel="$travel" />
            @endforeach

        </div>
        <div class="w-[15%] flex flex-col align-center justify-center">
            <button onclick="handlePassTravel()"
                class=" d-inline-block  bg-red-700 hover:bg-red-900 text-white font-bold rounded m-10 p-3">>>>></button>
            <button onclick="handleRegresTravel()"
                class=" d-inline-block  bg-red-700 hover:bg-red-900 text-white font-bold rounded m-10 p-3">
                <<<< </button>
        </div>
        <div class="grow flex flex-col">
            <div id="selectedTravelContainer"
                class="h-[35%] border-solid border-2 border-gray-800 rounded ml-20 mr-10 p-4 mb-8">

            </div>

            <div class=" h-[45%] border-solid border-2 border-gray-800 rounded ml-20 mr-10 p-4">
                <select  onchange="handleSelectChange(this)"  class="bg-white border border-gray-400 rounded p-2 w-full">
                    <option disabled selected >Seleccionar....</option>
                    @foreach ($drivers as $driver)
                        <option value="{{ $driver->id }}" class="text-gray-700">{{ $driver->name }}
                            {{ $driver->last_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mx-auto h-[10%] mt-16">

                <form id="asignarForm" action="{{ route('admin.update') }}" method="post">

                    @csrf
                    @method('put')
                    <input required id="id" name="id">
                    <input required id="driver_id" name="driver_id">

                    <button
                        type="submit"
                        class="d-inline-block w-28 bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded mr-10 ml-16">
                        ASIGNAR
                    </button>
                    <button
                        class="d-inline-block w-28 bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded ">
                        CANCELAR
                    </button>
                </form>
            </div>

        </div>
    </div>

    <script>
        const handleClick = (id) => {
            const cards = document.querySelectorAll('.travel_card');
            cards.forEach(card => {
                card.classList.remove('border');
                card.classList.remove('border-red-500');
            })
            const card = document.getElementById('card_' + id);

            card.classList.add('border');
            card.classList.add('border-red-500');

        }

        const handlePassTravel = () => {
            const selectedCard = document.querySelector('.travel_card.border');
            const id = selectedCard.id.split('_')[1];

            document.getElementById('id').value = id;


            selectedCard.style.display = 'none';
            const htmlCard = selectedCard.innerHTML;

            const selectedTravelContainer = document.querySelector('#selectedTravelContainer');
            selectedTravelContainer.innerHTML = htmlCard;

        }

        const handleRegresTravel = () => {
            const selectedCardContainer = document.querySelector('#selectedCardContainer');
            selectedTravelContainer.innerHTML = "";
            const cards = document.querySelectorAll('.travel_card');
            cards.forEach(card => {
                card.style.display = 'block';
            })
            document.getElementById('id').value = "";

        }

        const handleSelectChange = (e) => {
           document.getElementById('driver_id').value = e.value;
        }
    </script>

</body>

</html>
