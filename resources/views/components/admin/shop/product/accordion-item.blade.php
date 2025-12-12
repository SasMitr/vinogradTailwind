<div>
    <button type="button" class="p-4 w-full flex items-center text-gray bg-gray-100"
            :class="{'text-blue-400' : current === {{$current}} }"
            x-on:click="current === {{$current}} ? current = null : current = {{$current}}">
        {{$title}}
        <div class="ml-auto" :class="{'rotate-180' : current === {{$current}} }">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                <path fill="currentColor"
                      d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z"></path>
            </svg>
        </div>
    </button>
    <div x-cloak x-show="current === {{$current}}" x-collapse>
        <div class="p-4 text-lightgray text-sm font-normal border-t border-gray-200 grid lg:grid-cols-12 grid-cols-1 gap-5">
            {{$slot}}
        </div>
    </div>
</div>
