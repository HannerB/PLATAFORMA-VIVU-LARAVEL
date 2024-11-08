<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Municipio</th>
                <th>Centro</th>
                <th>Nombre Curso</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cursos as $curso)
                <tr>
                    <td>{{ $curso->Municipio_Curso }}</td>
                    <td>{{ $curso->Centro_Formacion }}</td>
                    <td>{{ $curso->Nombre_Curso }}</td>
                    <td>{{ $curso->Estado_Curso }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
