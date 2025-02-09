<div>
    @if ($getRecord()->status == 'discharge')
        <x-button label="Discharge Form" slate icon="printer" sm class="font-medium" squared href=""
            @click="printOut($refs.printContainer.outerHTML);" />

        <div class="hidden">
            <div class="bg-white  p-5" x-ref="printContainer">
                <div class="flex justify-between  items-center">
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
                <div class="mt-5 ">
                    <h1 class="">PROVINCIAL FORM NO. 50</h1>
                    <h1 class="">Revised 20028</h1>
                    <h1 class="">Provincial Prison: <strong class="underline">SULTAN KUDARAT PROVINCIAL
                            JAIL</strong>,
                        Isulan, Sultan Kudarat</h1>
                </div>
                <div class="my-5 border-4 text-center font-semibold text-xl text-white py-1 bg-green-500 ">
                    <span>CERTIFICATION OF DISCHARGE FFROM PRISON</span>
                </div>
                <div class="mt-5 flex justify-end ">
                    <span class="font-semibold">Date: {{ now()->format('F d, Y') }}</span>
                </div>
                <div class="grid grid-cols-7 ">
                    <div class="border col-span-2 p-1">
                        <span class=" ">PRISONER'S NAME:</span>
                    </div>
                    <div class="border col-span-5 p-1">
                        <span class="font-semibold ">{{ $getRecord()->fullname }}</span>
                    </div>
                    <div class="border col-span-2 p-1">
                        <span class=" ">CRIMINAL CASE/S NO./S:</span>
                    </div>
                    <div class="border col-span-2 p-1">
                        <span class="font-semibold ">{{ $getRecord()->dischargeInfo->criminal_case }}</span>
                    </div>
                    <div class="border col-span-1 p-1">
                        <span class=" ">CLASS:</span>
                    </div>
                    <div class="border col-span-2 p-1">
                        <span class="font-semibold ">{{ $getRecord()->dischargeInfo->class }}</span>
                    </div>
                    <div class="border col-span-3 p-1">
                        <span class=" ">Who was sentenced/committed on:</span>
                    </div>
                    <div class="border col-span-4 p-1">
                        <span class="font-semibold ">{{ $getRecord()->dischargeInfo->committed_on }}</span>
                    </div>
                    <div class="border col-span-1 p-1">
                        <span class=" ">By:</span>
                    </div>
                    <div class="border col-span-6 p-1">
                        <span class="font-semibold ">{{ $getRecord()->dischargeInfo->by }}</span>
                    </div>
                    <div class="border col-span-7 p-1">
                        <span class=" ">To be confined in jail during pendency of his/her/their case/s</span>
                    </div>
                    <div class="border col-span-1 p-1">
                        <span class=" ">For:</span>
                    </div>
                    <div class="border col-span-6 p-1">
                        <span class="font-semibold ">{{ $getRecord()->dischargeInfo->for }}</span>
                    </div>
                    <div class="border col-span-4 p-1">
                        <span class=" ">is released from confinement this date</span>
                    </div>
                    <div class="border col-span-3 p-1">
                        <span class="font-semibold ">{{ $getRecord()->dischargeInfo->release }}</span>
                    </div>
                    <div class="border col-span-4 p-1">
                        <span class=" ">For the case filed againts him/her/them, as per Order of</span>
                    </div>
                    <div class="border col-span-3 p-1">
                        <span class="font-semibold ">{{ $getRecord()->dischargeInfo->order_of }}</span>
                    </div>
                    <div class="border col-span-1 p-1">
                        <span class=" ">Dated</span>
                    </div>
                    <div class="border col-span-6 p-1">
                        <span
                            class="font-semibold ">{{ \Carbon\Carbon::parse($getRecord()->dischargeInfo->date)->format('F d, Y') }}</span>
                    </div>
                    <div class="border col-span-7 p-4">
                        <span class="font-semibold "></span>
                    </div>
                    <div class="border col-span-3 p-1">
                        <span class=" ">Number of previous term if imprisonment:</span>
                    </div>
                    <div class="border col-span-4 p-1">
                        <span class="font-semibold ">{{ $getRecord()->dischargeInfo->previous_term }}</span>
                    </div>
                    <div class="border col-span-1 p-1">
                        <span class=" ">REMARKS</span>
                    </div>
                    <div class="border col-span-6 p-1">
                        <span class="font-semibold ">{{ $getRecord()->dischargeInfo->remarks }}</span>
                    </div>
                    <div class="border col-span-2 p-1">
                        <span class=" ">Date of Dicharge</span>
                    </div>
                    <div class="border col-span-5 p-1">
                        <span
                            class="font-semibold ">{{ \Carbon\Carbon::parse($getRecord()->dischargeInfo->date_of_discharge)->format('F d, Y') }}</span>
                    </div>
                </div>
                <div class="mt-5  flex justify-between items-center">
                    <div>
                        <h1 class="border-b-2 border-black font-bold text-center">{{ $getRecord()->fullname }}</h1>
                        <h1 class="text-center">Signature of Prisoner</h1>
                    </div>
                    <div>
                        <h1 class="border-b-2 border-black font-bold text-center">{{ $getRecord()->fullname }}</h1>
                        <h1 class="text-center">Signature of Prisoner</h1>
                    </div>
                </div>
                <div class="mt-10  flex justify-between items-center">
                    <div>
                        <h1 class="border-b-2 border-black text-transparent font-bold">ashdjashdjasdkjasdkhasdkjhkasjdhk
                        </h1>
                        <h1 class="text-center">SIGNATURE OF GUARD AT POST NO. 1</h1>
                    </div>
                    <div>
                        <h1 class="border-b-2 border-black  font-bold">RONITH L. MOLATO, Ph.D, J.D.</h1>
                        <h1 class="text-center">Provincial Warden</h1>
                    </div>
                </div>
                <div class="mt-5  flex justify-between items-center">
                    <div>
                        <h1 class="border-b-2 border-black text-transparent font-bold">ashdjashdjasdkjasdkhasdkjhkasjdhk
                        </h1>
                        <h1 class="text-center">SIGNATURE OF GUARD AT POST NO. 2</h1>
                    </div>

                </div>
                <div class="mt-10 ">
                    <h1>VERIFIED FROM RECORDS:</h1>
                </div>
                <div class="mt-5  flex justify-between items-start">
                    <div>
                        <h1 class="border-b-2 border-black  font-bold">PGI JULIUS-CEZAR A. ORO</h1>
                        <h1 class="text-center">Paralegal Officer</h1>
                    </div>
                    <div class="grid grid-cols-3">
                        <div>
                            <h1 class="text-center">THUMB</h1>
                            <div class="border h-32 w-32">
                            </div>
                        </div>
                        <div>
                            <h1 class="text-center">INDEX</h1>
                            <div class="border h-32 w-32">
                            </div>
                        </div>
                        <div>
                            <h1 class="text-center">MIDDLE</h1>
                            <div class="border h-32 w-32">
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    @endif



</div>
