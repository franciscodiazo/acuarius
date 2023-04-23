<div class="card">
    <div class="card-header">
        <h3>Pago #{{ $pago->id }}</h3>
    </div>
    <div class="card-body">
        <p>Fecha de pago: {{ $pago->fecha_pago }}</p>
        <p>Monto: ${{ $pago->monto }}</p>
        <p>Credito correspondiente:</p>
        <ul>
            <li>Matricula: {{ $credito->matricula }}</li>
            <li>Fecha de inicio: {{ $credito->fecha_inicio }}</li>
            <li>Fecha final: {{ $credito->fecha_final }}</li>
            <li>Monto: ${{ $credito->monto }}</li>
            <li>Tasa de interés: {{ $credito->tasa_interes }}%</li>
            <li>Plazo en meses: {{ $credito->plazo_meses }}</li>
            <li>Fecha próximo pago: {{ $credito->fecha_proximo_pago }}</li>
            <li>Saldo: ${{ $credito->saldo }}</li>
        </ul>
    </div>
</div>