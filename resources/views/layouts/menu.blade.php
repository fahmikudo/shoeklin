<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="{{ route('home') }}"><i class="fa fa-users fa-fw"></i> Profile </a>
            </li>
            @if (Auth::user()->jabatan == 'ADMIN')
            <li>
                <a href="{{ route('pegawai-index') }}"><i class="fa fa-bars fa-fw"></i> Pegawai </a>
            </li>
            @endif
            @if (Auth::user()->jabatan == 'ADMIN')
            <li>
                <a href="{{ route('barang-index') }}"><i class="fa fa-bars fa-fw"></i> Barang </a>
            </li>
            @endif
            @if (Auth::user()->jabatan == 'ADMIN')
            <li>
                <a href="{{ route('jenispelayanan-index') }}"><i class="fa fa-bars fa-fw"></i> Jenis Pelayanan </a>
            </li>
            @endif
            <li>
                <a href="{{ route('pelanggan-index') }}"><i class="fa fa-bars fa-fw"></i> Pelanggan </a>
            </li>
            <li>
                <a href="{{ route('penyerahan-index') }}"><i class="fa fa-bars fa-fw"></i> Transaksi </a>
            </li>
            @if (Auth::user()->jabatan == 'ADMIN')
            <li>
                <a href="{{ route('report-index') }}"><i class="fa fa-bars fa-fw"></i> Report </a>
            </li>
            @endif
        </ul>
    </div>
</div>
