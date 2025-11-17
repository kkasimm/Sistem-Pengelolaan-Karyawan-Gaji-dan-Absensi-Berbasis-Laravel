<form action="{{ route('absensi.update', $absensi->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Karyawan</label>
        <select name="karyawan_id" class="form-control">
            @foreach ($karyawan as $k)
                <option value="{{ $k->id }}"
                    @if ($k->id == $absensi->karyawan_id) selected @endif>
                    {{ $k->nama }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" name="tanggal" value="{{ $absensi->tanggal }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Jam Masuk</label>
        <input type="time" name="jam_masuk" value="{{ $absensi->jam_masuk }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Jam Keluar</label>
        <input type="time" name="jam_keluar" value="{{ $absensi->jam_keluar }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="hadir"  @if($absensi->status == 'hadir') selected @endif>Hadir</option>
            <option value="izin"   @if($absensi->status == 'izin') selected @endif>Izin</option>
            <option value="sakit"  @if($absensi->status == 'sakit') selected @endif>Sakit</option>
            <option value="alfa"   @if($absensi->status == 'alfa') selected @endif>Alfa</option>
        </select>
    </div>

    <button class="btn btn-primary">Update</button>
</form>
