@foreach ($anggotas as $anggota)
<div class="col-md-6">
  <div class="card my-1">
      <div class="card-body">
          <div class="row">
              <div class="col-md-2">
                  <i class="fas fa-id-badge fa-5x"></i>
              </div>
              <div class="col-md-10">
                  <table>
                  <tr>
                      <th>
                          Nama Anggota
                      </th>
                      <td>:</td>
                      <td>
                          <!-- Nama Anggota -->
                          {{ $anggota->nama_anggota }}
                      </td>
                  </tr>
                  <tr>
                      <th>
                          Jenis Kelamin
                      </th>
                      <td>:</td>
                      <td>
                          <!-- Jenis Kelamin-->
                          {{ $anggota->jenis_kelamin }}
                      </td>
                  </tr>
                  <tr>
                      <th>
                          No Hp/Wa
                      </th>
                      <td>:</td>
                      <td>
                          <!-- No Handphone/WhatsApp  -->
                          {{ $anggota->nohp }}
                      </td>
                  </tr>
                  <tr>
                      <th>
                          Alamat
                      </th>
                      <td>:</td>
                      <td>
                          <!-- ALamat -->
                          {{ $anggota->alamat }}
                      </td>
                  </tr>
                  </table>
              </div>
          </div>
          <div class="float-right">
              @can('Ubah Data Karyawan')
              <!-- edit -->
              <a href="{{ route('karyawan.edit', ['karyawan'=>$anggota]) }}" class="btn btn-sm btn-warning" role="button">
                  <i class="fas fa-edit"></i>
              </a>
              @endcan
              @can('Hapus Data Karyawan')
              <!-- delete -->
              <form action="{{  route('karyawan.destroy', ['karyawan' => $anggota])  }}" method="POST" class="d-inline">
                 @method('delete')
                 @csrf
                 <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
             </form>
              @endcan
          </div>
      </div>
  </div>
</div>
@endforeach
