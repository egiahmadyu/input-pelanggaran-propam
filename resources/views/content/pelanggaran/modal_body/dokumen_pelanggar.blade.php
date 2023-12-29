@if ($pelanggar->jenis_pelanggaran == 1)
    @if (count($dokumen) > 0)
        <table class="table">
            <tr>
                <td>Nama Dokumen</td>
                <td>Tanggal Upload</td>
                <td>#</td>
            </tr>
            @foreach ($dokumen as $value)
                <tr>
                    <td>{{ $value->title }}</td>
                    <td>{{ Helper::tanggal($value->created_at) }}</td>
                    <td><a href="{{ $value->dokumen_keputusan_sidang }}"><button
                                class="btn btn-sm btn-primary">Download</button></a></td>
                </tr>
            @endforeach
        </table>
    @endif
    @if (count($dokumen) < 1)
        <form id="upload_dokumen">
            @csrf
            <h6>Tambah Dokumen</h6>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Dokumen</label>
                <input type="text" class="form-control" id="exampleFormControlFile1" name="title" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Dokumen</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="dokumen" required>
                <input type="text" name="data_pelanggar" id="" value="{{ $pelanggar->id }}" hidden>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endif
@elseif($pelanggar->jenis_pelanggaran == 2)
    @if (count($dokumen) > 0)
        <table class="table">
            <tr>
                <td>Nama Dokumen</td>
                <td>Tanggal Upload</td>
                <td>#</td>
            </tr>
            @foreach ($dokumen as $value)
                <tr>
                    <td>{{ $value->title }}</td>
                    <td>{{ Helper::tanggal($value->created_at) }}</td>
                    <td><a href="{{ $value->dokumen_keputusan_sidang }}">Download</a></td>
                </tr>
            @endforeach
        </table>
    @endif
    @if (count($dokumen) < 4)
        <form id="upload_dokumen">
            @csrf
            <h6>Tambah Dokumen</h6>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Dokumen</label>
                <input type="text" class="form-control" id="exampleFormControlFile1" name="title" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Dokumen</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="dokumen" required>
                <input type="text" name="data_pelanggar" id="" value="{{ $pelanggar->id }}" hidden>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endif
@endif

<script>
    $("#upload_dokumen").on("submit", function(event) {
        event.preventDefault();
        $('.loading').css('display', 'block')
        $.ajax({
            url: "/dokumen/upload",
            type: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(response) {
                $('#modal_dokumen').modal('hide')
                $('.loading').css('display', 'none')
                showModalDokumen({{ $pelanggar->id }}, '{{ $pelanggar->nama }}')

            },
            error: function(xhr, textStatus, error) {
                // Handle error response
            }
        });

    });
</script>
