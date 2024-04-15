<tr>
    <!--begin::order=-->
    <td>
        <a href="../sales/details.html" class="text-gray-600 text-hover-primary mb-1">#{{$appointment->id}}</a>
    </td>
    <!--end::order=-->
    <!--begin::Business=-->
    <td>
        <a href="../sales/details.html" class="text-gray-600 text-hover-primary mb-1">#{{$appointment->business->name}}</a>
    </td>
    <!--end::Business=-->
    <!--begin::Status=-->
    <td>
        {!! $appointment->status("html") !!}
    </td>
    <!--end::Status=-->
    <!--begin::Amount=-->
    <td>₺{{number_format(calculateTotal($appointment->services), 2)}}</td>
    <!--end::Amount=-->

    <!--begin::Date=-->
    <td>{{\Illuminate\Support\Carbon::parse($appointment->services->first()->start_time)->translatedFormat('d.m.Y, H:i')}}</td>
    <!--end::Date=-->
</tr>
