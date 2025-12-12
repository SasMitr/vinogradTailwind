@extends('admin.layouts.base')

@section('content')

    <div class="border border-lightgray/10 p-5">
        <h2 class="text-base font-semibold mb-4">Lable Text</h2>
        <form action="{{route('admin.dashboard.index')}}" x-data="mysubmit" class="space-y-4">
            <div class="space-y-2">
                <label for="username1" class="text-sm text-lightgray">Type Username:</label>
                <input name="name" id="username1" type="text" class="form-input" placeholder="Username" required="">
            </div>
            <input @click.prevent="toggle($event.target)" id="submitform" type="button"
                   class="btn border text-blue-600 border-transparent transition-all duration-300 hover:text-white hover:bg-blue-600 bg-blue-300"
                   value="Submit">
        </form>
    </div>



    <div class="border border-lightgray/10 p-5">
        <h2 class="text-base font-semibold mb-4">Table Editable</h2>
        <div class="overflow-auto" x-data="{
            items: [
                { id: 1, name: 'Lindsay Walton', title: 'Front-end Developer', phone: '832-333-0011', role: 'Admin' },
                { id: 2, name: 'Courtney Henry', title: 'Designer', phone: '551-697-3625', role: 'Owner' },
                { id: 3, name: 'Tom Cook', title: 'Director of Product', phone: '208-628-0572', role: 'Admin' },
                { id: 4, name: 'Whitney Francis', title: 'Copywriter', phone: '903-342-3348', role: 'Owner' },
                { id: 5, name: 'Leonard Krasner', title: 'Senior Designer', phone: '602-690-7009', role: 'Admin' }
            ]
        }">
            <caption class="caption-top">
                <span class="text-lightgray text-sm">Text Double Click To Edit Table.</span>
            </caption>
            <table class="min-w-[640px] w-full mt-4 table-hover">
                <thead>
                <tr class="text-left">
                    <th>#</th>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Phone No.</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <template x-for="item in items" :key="item.id">
                    <tr x-show="showElement" x-data="{ showElement: true }">
                        <td x-text="item.id"></td>
                        <td>
                            <span x-text="item.name"
                                x-on:dblclick="
                                    item.editing = true;
                                    $nextTick(() => $refs.name.focus());"
                                x-show="!item.editing">

                            </span>
                            <input :id="'name_'+item.id" type="text" class="form-input"
                                   x-ref="name"
                                   x-model="item.name"
                                   x-on:keydown.enter="item.editing = false; item.name = $store.mystore.actions(item.name)"
                                   x-show="item.editing"/>
                        </td>
                        <td>
                            <span x-text="item.title"
                                x-on:dblclick="
                                    item.editing = true;
                                    $nextTick(() => $refs.title.focus());"
                                x-show="!item.editing">

                            </span>
                            <input :id="'title_'+item.id" type="text" class="form-input"
                                   x-ref="title"
                                   x-model="item.title"
                                   x-on:keydown.enter="item.editing = false"
                                   x-show="item.editing"/>
                        </td>
                        <td>
                            <span
                                x-text="item.phone"
                                @dblclick="
                                    item.editing = true;
                                    $nextTick(() => $refs.phone.focus());"
                                x-show="!item.editing">

                            </span>
                            <input :id="'phone_'+item.id" type="text" class="form-input"
                                   x-ref="phone"
                                   x-model="item.phone"
                                   x-on:keydown.enter="
                                    item.editing = false;
                                    sendData(item.phone)"
                                   x-show="item.editing"/>
                        </td>
                        <td>
                            <span x-text="item.role"
                                  x-on:dblclick="
                                    item.editing = true;
                                    $nextTick(() => $refs.role.focus());"
                                  x-show="!item.editing">

                            </span>
                            <select :id="'role_'+item.id" class="form-select"
                                    x-ref="role"
                                    x-model="item.role"
                                    x-on:keydown.enter="item.editing = false"
                                    x-show="item.editing">
                                <option>Admin</option>
                                <option>Owner</option>
                            </select>
                        </td>
                        <td>
                            <button class="text-danger ms-2" x-on:click="showElement = false">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.29166 5.13898C2.29166 4.75545 2.57947 4.44454 2.93451 4.44454L5.15471 4.44417C5.59584 4.43209 5.985 4.12909 6.13511 3.68084C6.13905 3.66906 6.14359 3.65452 6.15987 3.60177L6.25553 3.29169C6.31407 3.10157 6.36508 2.93594 6.43644 2.78789C6.7184 2.20299 7.24005 1.79683 7.84288 1.69285C7.99547 1.66653 8.15706 1.66664 8.34254 1.66677H11.2409C11.4264 1.66664 11.588 1.66653 11.7406 1.69285C12.3434 1.79683 12.8651 2.20299 13.147 2.78789C13.2184 2.93594 13.2694 3.10157 13.3279 3.29169L13.4236 3.60177C13.4399 3.65452 13.4444 3.66906 13.4484 3.68084C13.5985 4.12909 14.0648 4.43246 14.5059 4.44454H16.6488C17.0038 4.44454 17.2917 4.75545 17.2917 5.13898C17.2917 5.5225 17.0038 5.83342 16.6488 5.83342H2.93451C2.57947 5.83342 2.29166 5.5225 2.29166 5.13898Z"
                                        fill="currentColor"></path>
                                    <path opacity="0.3"
                                          d="M9.67232 18.3333H10.3281C12.5843 18.3333 13.7125 18.3333 14.4459 17.6139C15.1794 16.8946 15.2545 15.7146 15.4046 13.3547L15.6208 9.95428C15.7023 8.67382 15.743 8.03358 15.375 7.62788C15.007 7.22217 14.3856 7.22217 13.1429 7.22217H6.85755C5.61477 7.22217 4.99337 7.22217 4.62541 7.62788C4.25744 8.03358 4.29815 8.67382 4.37959 9.95428L4.59584 13.3547C4.74593 15.7146 4.82097 16.8946 5.55446 17.6139C6.28795 18.3333 7.41607 18.3333 9.67232 18.3333Z"
                                          fill="currentColor"></path>
                                </svg>
                            </button>
                        </td>
                    </tr>
                </template>
                </tbody>
            </table>
        </div>
    </div>

@endsection
