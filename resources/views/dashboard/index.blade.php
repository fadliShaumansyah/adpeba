
<x-dashboard>
   
<div class="mx-4 ">
    <h1 class="text-2xl font-bold">Dashboard</h1>
    <div class="text-gray-500">Tanggal: {{ now()->format('d-m-Y') }}</div>
    <div class="flex  justify-around flex-row ">
        
        
        <div class=" m-4 sm:w-3/4 p-6 flex justify-center  text-gray-500 bg-green-300">
            
            <strong class="  flex text-8xl">{{ $totalAnggota }}</strong>
        
        </div>
        <div class=" m-4 sm:w-3/5 p-6 flex justify-center  text-gray-500 bg-green-300">
            
            <strong class=" flex text-8xl">{{ $totalUser }}</strong>
        
        </div>
    </div>
</div>
</x-dashboard>