@extends('layouts.main')
@section('meta')
    <title>{{'Cотрудники'}}</title>
@endsection

@section('content')
    <table id="employe-table">
        <tr>
            <th>ФИО</th>
            <th>Дата рождения</th>
            <th>Отдел</th>
            <th>Должность</th>
            <th>Тип сотрудника</th>
            <th>Оплата за месяц</th>
        </tr>
        @foreach($employes as $employe)
            <tr>
                <td>{{$employe->full_name}}</td>
                <td>{{$employe->birthday}}</td>
                <td>{{$employe->department->name}}</td>
                <td>{{$employe->position}}</td>
                <td>{{$employe->getTypePayment()}}</td>
                <td>{{$employe->monthly_payment.'$'}}</td>
            </tr>
        @endforeach
    </table>
    {{$employes->links("pagination::simple-mine")}}

@endsection


