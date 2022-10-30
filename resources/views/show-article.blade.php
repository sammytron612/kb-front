<x-app-layout>
    <div class="container bg-white p-7">

        <div class="flex justify-between items-center border-b py-5">
            <h3 class="text-left text-5xl">View article</h3>
            <button onclick="history.back()" class="px-4 text-md h-8 bg-blue-600 text-white hover:bg-blue-700 border border-blue-400 rounded-lg">Back</button>
        </div>
        <div class="py-5 border-b">
            <h2 class="text-3xl text-blue-700">{{$article->title}}</h2>
        </div>
        <div class="font-semibold grid grid-cols-1 md:grid-cols-3 gap-y-2 gap-x-2 py-3">
            <div>Authored by :<span class="font-normal text-blue-700 text-lg"> {{$article->author_name}}</span></div>
            <div>Views :<span class="font-normal text-blue-700 text-lg"> {{$article->views}}</span></div>
            <div>Section :<span class="font-normal text-blue-700 text-lg"> {{$article->sections->name}}</span></div>
            <div>Created :<span class="font-normal text-blue-700 text-lg"> {{\Carbon\Carbon::parse($article->created_at)->diffForHumans()}}</span></div>
            <div>Rating :<span class="font-normal text-blue-700 text-lg"> </span></div>
        </div>

        <div class="border-2 p-5">
            @php echo $body->body @endphp
        </div>
    </div>

</x-app-layout>
