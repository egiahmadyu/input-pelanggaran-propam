<h6>Kesatuan Yang Menangani</h6>
<p>
    {{ $pelanggar->polda ? $pelanggar->satuan_poldas->name : '' }}
    {{ $pelanggar->polres ? ', ' . $pelanggar->satuan_polres->name : '' }}
    {{ $pelanggar->polsek ? ', ' . $pelanggar->satuan_polseks->name : '' }}
</p>

<h6>Limpah Ke</h6>
<div class="form-group">
    @csrf
    <input type="text" name="data_pelanggar_id" value="{{ $pelanggar->id }}" hidden>
    <label>Mabes/ Polda</label>
    @if (auth()->user()->getRoleNames()[0] !== 'admin' &&
            auth()->user()->getRoleNames()[0] !== 'mabes')
        @if (auth()->user()->getRoleNames()[0] == 'polda')
            <select class="form-control" id="polda_limpah" style="width: 100%" name="polda" onchange="getPolresLimpah()"
                required=true>
                <option value="">Pilih </option>
                <option value="{{ env('ID_MABES') }}">MABES POLRI</option>
                <option value="{{ auth()->user()->polda_id }}">
                    {{ auth()->user()->satuan_poldas->name }}</option>
            </select>
        @else
            <select class="form-control" id="polda_limpah" style="width: 100%" name="polda" required=true>
                <option value="">Pilih</option>
                <option value="{{ auth()->user()->polda_id }}">
                    {{ auth()->user()->satuan_poldas->name }}</option>
            </select>
        @endif
    @else
        <select class="form-control" id="polda_limpah" style="width: 100%" name="polda" onchange="getPolresLimpah()"
            required=true>
            <option value="">Pilih </option>
            @foreach ($poldas as $polda)
                <option value="{{ $polda->id }}">{{ $polda->name }}</option>
            @endforeach
        </select>
    @endif
</div>
<div class="form-group">
    <label>Satker</label>
    @if (auth()->user()->getRoleNames()[0] == 'polres')
        <select class="form-control" id="polres_limpah" style="width: 100%" name="polres" onchange="getPolsek()">
            <option value="">Pilih </option>
            <option value="{{ auth()->user()->polres_id }}">
                {{ auth()->user()->satuan_polres->name }}</option>
        </select>
    @else
        <select class="form-control" id="polres_limpah" style="width: 100%" name="polres" onchange="getPolsek()">
        </select>
    @endif
</div>
<div class="form-group" style="display:none">
    <label>Satker Polda/ Satker Polres/ Polsek</label>
    <select class="form-control" id="polsek_limpah" style="width: 100%" name="polsek">
    </select>
</div>
