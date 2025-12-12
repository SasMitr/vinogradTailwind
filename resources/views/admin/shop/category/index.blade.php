@extends('admin.layouts.base')

@section('content')
    <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
        <h2 class="text-base font-semibold mb-4">Category</h2>
        <div class="overflow-auto">
            <table class="min-w-[640px] w-full product-table">
                <thead>
                <tr class="text-left">
                    <th>No</th>
                    <th>IDCustomer</th>
                    <th>Product</th>
                    <th>Customers</th>
                    <th>Location</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Amount</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1.</td>
                    <td>#6545</td>
                    <td>
                        <div class="flex items-center gap-2.5">
                            <img src="assets/images/product/1.png" class="w-[50px] rounded-full" alt="">
                            <div class="flex-1 max-w-[200px] truncate">
                                <p class="line-clamp-1 truncate">Speed Force : Knit</p>
                                <p class="text-gray">Women</p>
                            </div>
                        </div>
                    </td>
                    <td>Ronald Richards</td>
                    <td>Celina, Delaware 10299</td>
                    <td>2</td>
                    <td><span class="bg-success text-white font-bold text-xs py-2 px-3 rounded-full">Paid</span></td>
                    <td>$215</td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>#5412</td>
                    <td>
                        <div class="flex items-center gap-2.5">
                            <img src="assets/images/product/2.png" class="w-[50px] rounded-full" alt="">
                            <div class="flex-1 max-w-[200px] truncate">
                                <p class="line-clamp-1 truncate">Assorted Cross Bag</p>
                                <p class="text-gray">Men</p>
                            </div>
                        </div>
                    </td>
                    <td>Marvin McKinney</td>
                    <td>Cir. Syracuse, Connecticut 35624</td>
                    <td>3</td>
                    <td><span class="bg-orange text-white font-bold text-xs py-2 px-3 rounded-full">Unpaid</span></td>
                    <td>$542</td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>#6622</td>
                    <td>
                        <div class="flex items-center gap-2.5">
                            <img src="assets/images/product/3.png" class="w-[50px] rounded-full" alt="">
                            <div class="flex-1 max-w-[200px] truncate">
                                <p class="line-clamp-1 truncate">Galaxy Hi-Tech Exclusive</p>
                                <p class="text-gray">Children</p>
                            </div>
                        </div>
                    </td>
                    <td>Jane Cooper</td>
                    <td>New Jersey 45463</td>
                    <td>5</td>
                    <td><span class="bg-primary text-white font-bold text-xs py-2 px-3 rounded-full">Done</span></td>
                    <td>$980</td>
                </tr>
                <tr>
                    <td>4.</td>
                    <td>#6425</td>
                    <td>
                        <div class="flex items-center gap-2.5">
                            <img src="assets/images/product/4.png" class="w-[50px] rounded-full" alt="">
                            <div class="flex-1 max-w-[200px] truncate">
                                <p class="line-clamp-1 truncate">Happy Days Wax Candle</p>
                                <p class="text-gray">Women</p>
                            </div>
                        </div>
                    </td>
                    <td>Cameron Williamson</td>
                    <td>Pennsylvania 57867</td>
                    <td>1</td>
                    <td><span class="bg-success text-white font-bold text-xs py-2 px-3 rounded-full">Paid</span></td>
                    <td>$1450</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
