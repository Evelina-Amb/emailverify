@extends('layouts.layout')

@section('title', 'Pridėti studentą')

@section('content')
    <div class="container">
        <h2>Pridėti studentą</h2>

        <form action="{{ route('students.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Vardas</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="surname" class="form-label">Pavardė</label>
                <input type="text" name="surname" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Adresas</label>
                <input type="text" name="address" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Telefonas</label>
                <input type="text" name="phone" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="city_id" class="form-label">Miestas</label>
                <select name="city_id" class="form-control">
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>
			
			<div class="mb-3">
    <label for="grupe_id" class="form-label">Grupė</label>
    <select name="grupe_id" class="form-control">
        <option value="">-- Pasirinkite grupę --</option>
        @foreach ($groups as $group)
            <option value="{{ $group->id }}">{{ $group->name }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="gim_data" class="form-label">Gimimo data</label>
    <input type="date" name="gim_data" class="form-control">
</div>


            <button type="submit" class="btn btn-success">Pridėti</button>
        </form>
    </div>
@endsection
