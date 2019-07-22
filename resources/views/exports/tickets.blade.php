<table>
    <thead>
    <tr>
        <th>id</th>
        <th>Nombre usuario</th>
        <th>Empresa</th>
        <th>Teléfono</th>
        <th>Email</th>
        <th>Asunto</th>
        <th>Tipo de servicio</th>
        <th>Dirección</th>
        <th>Regional</th>
        <th>Número SAP</th>
        <th>Identificación</th>
        <th>Punto de venta</th>
        <th>Archivo usuario</th>
        <th>Archivo Admin</th>
        <th>Centro de operación</th>
        <th>Ciudad</th>
        <th>Otra ciudad</th>
        <th>Solicitud</th>
        <th>Usuario soporte</th>
        <th>Estado</th>
        <th>Costo de la factura</th>

        <th>Albúm</th>
        <th>Transportadora</th>
        <th>Planilla</th>
        <th>Otro solicitud de insumos</th>

        <th>Fecha de creación</th>
        <th>Fecha de la última actualización</th>
    </tr>
    </thead>
    <tbody>
    @foreach($tickets as $ticket)
        <tr>
            <td>{{$ticket->id}}</td>
            <td>{{$ticket->name}}</td>
            <td>{{$ticket->company}}</td>
            <td>{{$ticket->cellphone}}</td>
            <td>{{$ticket->email}}</td>
            <td>{{$ticket->serviceSubcategory->serviceCategory->name}}</td>
            <td>{{$ticket->serviceSubcategory->name}}</td>
            <td>{{$ticket->address}}</td>
            <td>{{$ticket->regional}}</td>
            <td>{{$ticket->sap_number}}</td>
            <td>{{$ticket->identification}}</td>
            <td>{{$ticket->sell_point}}</td>
            <td>{{$ticket->file2}}</td>
            <td>{{$ticket->file}}</td>
            <td>{{$ticket->operation_center}}</td>
            <td>{{$ticket->city->municipio}}</td>
            <td>{{$ticket->city_text}}</td>
            <td>{{$ticket->request}}</td>
            <td>{{optional($ticket->user)->name}}</td>
            <td>{{$ticket->ticketState->nameClass() }}</td>
            <td>{{$ticket->invoice_cost}}</td>

            <td>{{$ticket->album}}</td>
            <td>{{$ticket->type_category}}</td>
            <td>{{$ticket->spreadsheets}}</td>
            <td>{{$ticket->other}}</td>

            <td>{{$ticket->created_at}}</td>
            <td>{{$ticket->updated_at}}</td>

    @endforeach
    </tbody>
</table>
