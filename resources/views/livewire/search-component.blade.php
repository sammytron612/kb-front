<div class="mt-5 container">
    <div class="w-full px-4 flex justify-center">
        <input type="search" wire:model.debounce.450ms='search' placeholder="Search.." class="w-full md:w-1/2 border rounded-full">
    </div>
    <div class="mt-5 flex justify-center items-center">
        <div wire:loading class="animate-spin rounded-full h-16 w-16 border-b-2 border-blue-900"></div>
      </div>
    <div class="flex justify-center">
        @if($articles)
            <div class="p-5 w-full md:w-2/3 bg-white">
                @if(count($articles))
                    <h3 class="text-4xl font-bold text-left py-4 border-b-2">Results</h3>
                @else
                    <div class="p-5">
                        <h2 class="text-3xl font-bold text-center">No Results</h2>
                        <p class="font-semibold">Your search did not match any documents.</p>
                        <p class="font-extrabold mt-3">Suggestions</p>
                        <ul class="list-disc mt-5">
                            <li>Make sure all words are spelled correctly.</li>
                            <li>Try different, more general, or fewer keywords.</li>
                        </ul>
                    </div>
                @endif
                <div class="w-full mt-5">
                @foreach($articles as $article)
                    <div class="py-3">
                        <a href="{{route('article.show', $article->id)}}" class="text-2xl text-left hover:font-semibold hover:text-blue-800 text-blue-600">{{$article->title}}</a>
                        <div class="text-sm">Authored by : <b>{{$article->author_name}}</b> Views : <b>{{$article->views}}</b> Created : <b>{{\Carbon\Carbon::parse($article->created_at)->diffForHumans()}}</b></div>
                    </div>
                @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
