<div class="container">
    <h1 style="text-align: center">{{$judul}}</h1>
    <table border="1" cellpadding="10" width="100%" style="margin-bottom: 100px;">
        <tr>
            <th width="5%">NOMOR</th>
            <th width="10%">NAMA</th>
            <th width="10%">NIK</th>
            <th width="20%">FOTO</th>
            <th width="20%">PASSPORT</th>
            <th width="20%">VISA</th>
            <th width="20%">EXITPERMIT</th>

        </tr>
        @php
            $nomor = 0;
        @endphp
        @foreach ($timadvance as $Advance)
            <tr>
                <th>{{ $nomor + 1 }}</th>
                <th>{{ $Advance['nama'] }}</th>
                <th>{{ $Advance['nik'] }}</th>
                <?php if($Advance['foto'] != null){ ?>
                <th><img src="{{ storage_path('app/public/' . $Advance['foto']) }}" style="width:200px"></th>
                <?php }else{ ?>
                <th>-</th>
                <?php } ?>

                <?php if($Advance['scan_passport'] != null){ ?>
                <th><img src="{{ storage_path('app/public/' . $Advance['scan_passport']) }}" style="width:200px"></th>
                <?php }else{ ?>
                <th>-</th>
                <?php } ?>

                <?php if($Advance['scan_visa'] != null){ ?>
                <th><img src="{{ storage_path('app/public/' . $Advance['scan_visa']) }}" style="width:200px"></th>
                <?php }else{ ?>
                <th>-</th>
                <?php } ?>

                <?php if($Advance['scan_visa'] != null){ ?>
                <th><img src="{{ storage_path('app/public/' . $Advance['scan_exitpermit']) }}" style="width:200px"></th>
                <?php }else{ ?>
                <th>-</th>
                <?php } ?>
            </tr>
        @endforeach
    </table>
</div>
