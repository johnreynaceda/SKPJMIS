<div x-data>
    <a href="" @click="printOut($refs.printContainer.outerHTML);"
        class="fixed h-20 w-20 rounded-full right-20 bg-gray-600 hover:bg-gray-500 text-white bottom-20 grid place-content-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-printer">
            <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" />
            <path d="M6 9V3a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6" />
            <rect x="6" y="14" width="12" height="8" rx="1" />
        </svg>
    </a>
    <div class="border">
        <div class=" p-5" x-ref="printContainer">
            <div class="flex justify-center space-x-10 items-center">
                <div>
                    <img src="{{ asset('images/skseal.png') }}" class="h-20" alt="">
                </div>
                <div class="text-center">
                    <h1>Republic of the Philippines</h1>
                    <h1>Province of Sultan Kudarat</h1>
                    <h1 class="font-bold text-lg">PROVINCIAL GOVERNOR’S OFFICE</h1>
                    <h1>Provincial Jail Division</h1>
                    <h1>Isulan, Sultan Kudarat</h1>
                </div>
                <div>
                    <img src="{{ asset('images/skpj_logo.png') }}" class="h-20" alt="">
                </div>
            </div>
            <div class="mt-5 grid grid-cols-4 gap-5 text-gray-700">
                <div>
                    <h1 class="text-sm">FIRSTNAME</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div>
                    <h1 class="text-sm">MIDDLENAME</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div>
                    <h1 class="text-sm">LASTNAME</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div>
                    <h1 class="text-sm">ALIASES</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div>
                    <h1 class="text-sm">SEX</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div>
                    <h1 class="text-sm">CIVIL STATUS</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div>
                    <h1 class="text-sm">DATE OF BIRTH</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div>
                    <h1 class="text-sm">AGE AT THE TIME OD AD. IF NO. DOB</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div class="col-span-2">
                    <h1 class="text-sm">ADDRESS</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div class="col-span-2">
                    <h1 class="text-sm">PLACE OF BIRTH</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div class="col-span-4">

                </div>
                <div>
                    <h1 class="text-sm">NAME OF FATHER</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div>
                    <h1 class="text-sm">NAME OF MOTHER</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div>
                    <h1 class="text-sm">NAME OF SPOUSE</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div>
                    <h1 class="text-sm">NO. OF CHILDREN </h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div>
                    <h1 class="text-sm">NEAREST KIN</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div>
                    <h1 class="text-sm">ADDRESS OF KIN</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div>
                    <h1 class="text-sm">RELATIONSHIP</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div>
                    <h1 class="text-sm">CONTACT NO.</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div>
                    <h1 class="text-sm">HEIGHT</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div>
                    <h1 class="text-sm">WEIGHT</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div>
                    <h1 class="text-sm">RELIGION</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div>
                    <h1 class="text-sm">NATIONALITY</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div>
                    <h1 class="text-sm">NATIVE ORIGIN, TRIBAL AFFILIATION</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div>
                    <h1 class="text-sm">POLITICAL AFFILIATION</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div>
                    <h1 class="text-sm">HIGHEST EDUCATIONAL ATTAINTMENT</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div>
                    <h1 class="text-sm">COURSE</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div>
                    <h1 class="text-sm">OCCUPATION</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div>
                    <h1 class="text-sm">COLOR OF HAIR</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div>
                    <h1 class="text-sm">COLOR OF EYES</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div>
                    <h1 class="text-sm">BLOOD TYPE</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div>
                    <h1 class="text-sm">COMPLEXION</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div class="col-span-3">
                    <h1 class="text-sm">BERTILLON MARKS</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div>
                    <h1 class="text-sm">DATE CRIME COMMITED</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div>
                    <h1 class="text-sm">DATE & TIME ARRESTED</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div class="col-span-4">
                    <div class="border w-ful"></div>
                </div>
                <div class="col-span-4">
                    <div>
                        <h1 class="font-semibold">CIRCUMSTANCES SORROUNDING THE ARREST:</h1>
                    </div>
                </div>
                <div>
                    <h1 class="text-sm">ARRESTING OFFICER</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>

                <div>
                    <h1 class="text-sm">STATION/PRECINCT</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div class="col-span-2">
                    <h1 class="text-sm">NAMES & SIGNATURE OF RECEIVING JAIL OFFICER
                    </h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div>
                    <h1 class="text-sm">DATE & TIME</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div class="col-span-3">
                    <h1 class="text-sm">DATE & TIME</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div>
                    <h1 class="text-sm">INMATE SEARCH BY</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div>
                    <h1 class="text-sm">INMATES PROPERTY HELD BY</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div>
                    <h1 class="text-sm">PROPERTY RECEIPT NO</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div>
                    <h1 class="text-sm">KIND</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div class="col-span-4">
                    <div class="border w-ful"></div>
                </div>
                <div class="col-span-4">
                    <h1 class="font-bold">CASE DETAILS</h1>
                    <div class="mt-5">
                        <div class="flex flex-col">
                            <div class=" overflow-x-auto">
                                <div class="min-w-full inline-block align-middle">
                                    <div class="overflow-hidden border border-gray-300">
                                        <table class=" min-w-full  rounded-xl">
                                            <thead>
                                                <tr class="bg-gray-50">
                                                    <th scope="col"
                                                        class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize">
                                                        CRIMINAL CASE NO/S.</th>
                                                    <th scope="col"
                                                        class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize">
                                                        OFFENSE CHARGED</th>
                                                    <th scope="col"
                                                        class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize">
                                                        JUDGE</th>
                                                    <th scope="col"
                                                        class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize">
                                                        COURT & BRANCH</th>
                                                    <th scope="col"
                                                        class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize">
                                                        DATE FILED</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-300 ">
                                                <tr>
                                                    <td
                                                        class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 ">
                                                        Louis Vuitton</td>
                                                    <td
                                                        class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                                                        20010510 </td>
                                                    <td
                                                        class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                                                        Customer</td>
                                                    <td
                                                        class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                                                        Accessories</td>
                                                    <td
                                                        class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                                                        Accessories</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-4">
                    <h1 class="font-bold">PREVIOUS CRIMINAL RECORDS</h1>
                    <div class="mt-5">
                        <div class="flex flex-col">
                            <div class=" overflow-x-auto">
                                <div class="min-w-full inline-block align-middle">
                                    <div class="overflow-hidden border border-gray-300">
                                        <table class=" min-w-full  rounded-xl">
                                            <thead>
                                                <tr class="bg-gray-50">
                                                    <th scope="col"
                                                        class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize">
                                                        CRIMINAL CASE NO/S.</th>
                                                    <th scope="col"
                                                        class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize">
                                                        OFFENSE CHARGED</th>
                                                    <th scope="col"
                                                        class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize">
                                                        JUDGE</th>
                                                    <th scope="col"
                                                        class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize">
                                                        COURT & BRANCH</th>
                                                    <th scope="col"
                                                        class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize">
                                                        DATE FILED</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-300 ">
                                                <tr>
                                                    <td
                                                        class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 ">
                                                        Louis Vuitton</td>
                                                    <td
                                                        class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                                                        20010510 </td>
                                                    <td
                                                        class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                                                        Customer</td>
                                                    <td
                                                        class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                                                        Accessories</td>
                                                    <td
                                                        class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                                                        Accessories</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-4">
                    <div class="border w-ful"></div>
                </div>
                <div class="col-span-4">
                    <div>
                        <h1 class="font-semibold">MEDICAL CERTIFICATION ISSUED:</h1>
                    </div>
                </div>
                <div>
                    <h1 class="text-sm">REMARKS</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div>
                    <h1 class="text-sm">DATE ISSUED</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div>
                    <h1 class="text-sm">ILLNESS PRIOR COMMITMENT</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div>
                    <h1 class="text-sm">MEDICATION USED</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div>
                    <h1 class="text-sm">NOTE</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
                <div>
                    <h1 class="text-sm">JAIL NURSE</h1>
                    <h1 class="font-semibold">FIRSTNAME</h1>
                </div>
            </div>
        </div>
    </div>
</div>
