<p><strong>Studento duomenys atnaujinti</strong></p>

<p>
Vardas: {{ $student->name }}<br>
Pavardė: {{ $student->surname }}<br>
Adresas: {{ $student->address }}<br>
Telefonas: {{ $student->phone }}<br>
Miestas: {{ $student->city->name ?? 'Nežinomas' }}<br>
Grupė: {{ $student->group->name ?? 'Nežinoma' }}<br>
Gimimo data: {{ $student->gim_data }}<br>
Asmens Kodas: {{ $student->asmens_kodas }}
</p>
