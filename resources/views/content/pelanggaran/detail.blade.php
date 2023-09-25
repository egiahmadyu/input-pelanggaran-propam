<form>
    <div class="form-group">
        <label for="exampleInputPassword1">NRP / NIP</label>
        <input type="text" class="form-control" readonly id="exampleInputPassword1" value="{{ $data->nrp_nip }}">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Jenis Pelanggaran</label>
        <input type="text" class="form-control" readonly id="exampleInputPassword1"
            value="{{ $data->jenis_pelanggarans->name }}">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Nama Pelanggar</label>
        <input type="text" class="form-control" readonly id="exampleInputPassword1" value="{{ $data->name }}">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Jenis Kelamin</label>
        <input type="text" class="form-control" readonly id="exampleInputPassword1"
            value="{{ $data->genders->gender }}">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Polda / Sederajat</label>
        <input type="text" class="form-control" readonly id="exampleInputPassword1"
            value="{{ $data->satuan_poldas->name }}">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Polres / Sederajat</label>
        <input type="text" class="form-control" readonly id="exampleInputPassword1"
            value="{{ $data->polres ? $data->satuan_polres->name : '' }}">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Polsek / Sederajat</label>
        <input type="text" class="form-control" readonly id="exampleInputPassword1"
            value="{{ $data->polsek ? $data->satuan_polseks->name : '' }}">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Diktuk</label>
        <input type="text" class="form-control" readonly id="exampleInputPassword1"
            value="{{ $data->diktuk ? $data->getDiktuk->name : '' }}">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Jabatan</label>
        <input type="text" class="form-control" readonly id="exampleInputPassword1" value="{{ $data->jabatan }}">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Pasal Pelanggaran</label>
        <input type="text" class="form-control" readonly id="exampleInputPassword1"
            value="{{ $data->pasal_pelanggaran }}">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Kronologi Singkat</label>
        <textarea name="jabatan" class="form-control" readonly>{{ $data->kronologi_singkat }}</textarea>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">No LP</label>
        <input type="text" class="form-control" readonly id="exampleInputPassword1" value="{{ $data->nolp }}">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Tanggal LP</label>
        <input type="text" class="form-control" readonly id="exampleInputPassword1"
            value="{{ date('d-m-Y', strtotime($data->tgllp)) }}">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Wujud Perbuatan Pelanggaran</label>
        <textarea name="jabatan" class="form-control" readonly>{{ $data->wujud_perbuatan ? $data->wujud_perbuatans->name : '' }}</textarea>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Pasal Pelanggaran</label>
        <input type="text" class="form-control" readonly id="exampleInputPassword1"
            value="{{ $data->pasal_pelanggaran }}">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Pidana</label>
        <input type="text" class="form-control" readonly id="exampleInputPassword1" value="{{ $data->pidana }}">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Wujud Perbuatan Pidana</label>
        <input type="text" class="form-control" readonly id="exampleInputPassword1"
            value="{{ $data->wujud_perbuatan_pidana ? $data->getWujudPerbuatanPidana->name : '' }}">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">No LP Pidana</label>
        <input type="text" class="form-control" readonly id="exampleInputPassword1"
            value="{{ $data->nolp_pidana }}">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Tanggal LP</label>
        <input type="text" class="form-control" readonly id="exampleInputPassword1"
            value="{{ $data->tgllp_pidana ? date('d-m-Y', strtotime($data->tgllp_pidana)) : '' }}">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Pasal Pidana</label>
        <input type="text" class="form-control" readonly id="exampleInputPassword1"
            value="{{ $data->pasal_pidana }}">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Peran Narkoba</label>
        <input type="text" class="form-control" readonly id="exampleInputPassword1"
            value="{{ $data->peran_narkoba ? $data->getPeranNarkoba->name : '' }}">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Jenis Narkoba</label>
        <input type="text" class="form-control" readonly id="exampleInputPassword1"
            value="{{ $data->jenis_narkoba ? $data->getJenisNarkoba->name : '' }}">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">No Kep</label>
        <input type="text" class="form-control" readonly id="exampleInputPassword1" value="{{ $data->no_kep }}">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Tanggal KEP</label>
        <input type="text" class="form-control" readonly id="exampleInputPassword1"
            value="{{ $data->tgl_kep ? date('d-m-Y', strtotime($data->tgl_kep)) : '' }}">
    </div>
    @for ($i = 1; $i <= 10; $i++)
        <?php $putusan = 'getPutusan' . $i;
        $no_putusan = 'putusan_' . $i; ?>
        <div class="form-group">
            <label for="exampleInputPassword1">Putusan {{ $i }}</label>
            <input type="text" class="form-control" readonly id="exampleInputPassword1"
                value="{{ $data->$no_putusan ? $data->$putusan->name : '' }}">
        </div>
    @endfor

</form>
